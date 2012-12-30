<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Notifications library
 * Originally for WebRM by Davey IJzermans.
 * 
 * Released under MIT License.
 *
 * @author		Davey IJzermans
 * @version		v1.0
 * @license		MIT
 */
class Notifications
{
	/**
	 * CodeIgniter reference
	 *
	 * @var		object
	 */
	private $CI;
	
	/**
	 * Notifications array
	 *
	 * @var		array
	 */
	private $notifications = array();
	
	/**
	 * Template for static notifications
	 * Use {$message} to placehold the message, {$type} for the message type, if needed
	 * Escape $ when using EOT or double quotes!
	 * 
	 * @var		string
	 */
	private $template = "
<div class=\"notification {\$type}\">
	<p>{\$message}</p>
</div>
";
	
	/**
	 * Template for static notification wrapper
	 * Use {$messages} to placehold the message output
	 * Escape $ when using EOT or double quotes!
	 * 
	 * @var		string
	 */
	private $container = "
<div class=\"notifications\">
{\$messages}
</div>
";
	
	/**
	 * Wrap static output in <noscript>-tags? Useful when you also generate dynamic messages
	 * using $this->display_js().
	 * NOTE: forced notifications will not appear within <noscript> tags
	 *
	 * @var		bool
	 */
	private $noscript = false;
	
	/**
	 * Always output container for HTML notifications, even if there are no notifications?
	 *
	 * @var		bool
	 */
	private $force_html_container = true;
	
	/**
	 * Template for dynamic (javascript) notification wrapper
	 * Use {$js} to placehold your javascript output
	 * Escape $ when using EOT or double quotes!
	 * 
	 * @var		string
	 */
	private $javascript_wrap = "
<script type=\"text/javascript\">
/* <![CDATA[ */
	{\$js}
/* ]]> */
</script>
";
	
	/**
	 * Template for dynamic (javascript) notifications
	 * Use {$message} to placehold the message, {$type} for the message type, if needed
	 * Escape when using EOT or double quotes!
	 * 
	 * @var		string
	 */
	private $javascript_template = 'alert("{$message}");';
	
	/**
	 * Constructor. Loads config and loads notifications from session, if enabled.
	 * 
	 * @return	void
	 * @author	Davey IJzermans
	 */
	public function __construct() {
		$this->CI = &get_instance();
		
		//load config file
		$this->CI->config->load('notifications', true);
		$config = $this->CI->config->config['notifications'];
		
		foreach ($config as $key => $item)
			if ($item != "default")
				$this->$key = $item;
		
		if(isset($this->CI->session)) {
			if ($sess_notifications = $this->CI->session->userdata('notifications'))
			//session var contains values, so retrieve them
				$this->notifications = $sess_notifications;
			else
			//no value in session var, so update it with empty array (= $this->notifications)
				$this->update_session_data();
		}
	}
	
	/**
	 * Set a notification and save it to the session.
	 * 
	 * @param	string				$message
	 * @param	string				$type
	 * @return	bool
	 * @author	Davey IJzermans
	 */
	public function notify($message, $type = "info", $location = 'html,js', $force = false) {
		if (is_array($message)) {
			foreach($message as $mes) {
				if (is_array($mes)) {
					call_user_func_array(array($this, 'notify'), $mes);
				} elseif (is_string($mes)) {
					$this->notify($mes, $type);
				}
			}
		} else
			$this->notifications[] = $this->make_notification($message, $type, $location, $force);
		return $this->update_session_data();
	}
	
	/**
	 * Make a valid notification array for using in a custom array
	 * 
	 * @param	string				$message
	 * @param	string				$type
	 * @return	array
	 * @author	Davey IJzermans
	 */
	public function make_notification($message, $type = "info", $location = 'html,js', $force = false) {
		$notification = array(
			'message' => $message,
			'type' => $type,
			'location' => explode(',', str_ireplace(" ", "", $location)),
			'force' => $force
		);
		return $notification;
	}
	
	/**
	 * Form and return javascript output using the javascript templates set.
	 * 
	 * @param	bool				$clear		Clear the notifications array?
	 * @return	string
	 * @author	Davey IJzermans
	 */
	function display_js($clear = true) {
		$js = array();
		foreach ($this->notifications as $n) {
			if(is_string($this->javascript_template)) {
				if(!in_array('js', $n['location']))
					continue;
				$js_temp = $this->javascript_template;
				$js_temp = str_ireplace('{$message}', $n['message'], $js_temp);
				$js_temp = str_ireplace('{$type}', $n['type'], $js_temp);
				$js[] = $js_temp;
			}
		}
		
		$js = implode("\n		", $js);
		$container = $this->javascript_wrap;
		$container = str_ireplace('{$js}', $js, $container);
		$output = $container;
		
		if($clear)
			$this->clear();
		return $output;
	}
	
	/**
	 * Form and return static html output using the templates set.
	 * 
	 * @param	bool				$clear		Clear the notifications array?
	 * @return	string
	 * @author	Davey IJzermans
	 */
	function display_html($clear = true) {
		$html = array();
		$force_arr = array();
		$output = "";
		$count = count($this->notifications);
		$noscript = $this->noscript === true ? true : false;
		$forceout = $this->force_html_container === true ? true : false;
		
		if($count > 0) {
			foreach ($this->notifications as $i => $n) {
				if(!in_array('html', $n['location']))
					continue;
				if (is_string($this->template)) {
					$force = $n['force'] === true ? true : false;
					$n_html = $this->template;
					$n_html = str_ireplace('{$message}', $n['message'], $n_html);
					$n_html = str_ireplace('{$type}', $n['type'], $n_html);
					
					if ($force === true) {
						$force_arr[] = $i;
					} else {
						$n_html = ($noscript ? '<noscript>' : '') . $n_html . ($noscript ? '</noscript>' : '');
					}
					
					$html[] = $n_html;
				}
			}
		
			$html      = implode("\n		", $html);
			if(($count > 0 || count($force_arr) > 0) || ($count > 0 && !$noscript))
			//there are more than zero notifications or more than zero forced notifications, OR there are more than
			//zero notifications and noscript wrapping if disabled
				$output .= str_ireplace('{$messages}', $html, $this->container);
		} elseif($forceout)
				$output .= str_ireplace('{$messages}', '', $this->container);
		
		if($clear)
			$this->clear();
		return $output;
	}
	
	/**
	 * Clear notifications array and save to session variable.
	 * 
	 * @return	bool
	 * @author	Davey IJzermans
	 */
	public function clear() {
		$this->notifications = array();
		return $this->update_session_data();
	}
	
	/**
	 * Save notifications array to session variable.
	 * 
	 * @return	bool
	 * @author	Davey IJzermans
	 */
	public function update_session_data() {
		return isset($this->CI->session) ? $this->CI->session->set_userdata('notifications', $this->notifications) : true;
	}
	
} // END

/* End of file Notifications.php */
/* Location: ./application/libraries/Notifications.php */
<?php if (!defined('BASEPATH')) exit ('No Direct Access Allowed');
/**
 * 
 */
 class wordtime {
 	//Relative Date Function
	function relative_date($time) {
		$today = strtotime(date('M j, Y'));
		$reldays = ($time - $today)/86400;
		$interval = date_diff($time, $today);
		if ($reldays >= 0 && $reldays < 1) {
			return 'Today';
		} else if ($reldays >= 1 && $reldays < 2) {
			return 'Tomorrow';
		} else if ($reldays >= -1 && $reldays < 0) {
			return 'Yesterday';
		}

		if (abs($reldays) < 7) {
		if ($reldays > 0) {
			$reldays = floor($reldays);
				return 'In ' . $reldays . ' day' . ($reldays != 1 ? 's' : '');
		} else {
			$reldays = abs(floor($reldays));
				return $reldays . ' day' . ($reldays != 1 ? 's' : '') . ' ago';
			}
		}
		if (abs($reldays) < 182) {
				return date('l, j F',$time ? $time : time());
		} else {
				return date('l, j F, Y',$time ? $time : time());
			}
		}
	} 
?>
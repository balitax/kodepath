<?php if (!defined('BASEPATH')) exit ('No Direct access allowed');

class identifier {
	public function identifier_param($user_id){
		$date = date_create();
		$get_date = date_timestamp_get($date);
		
		$get_identifier = 
		substr($get_date.$user_id, 0,2)."id".
		substr($get_date.$user_id, 2,3)."en".
		substr($get_date.$user_id, 5,4)."ti".
		substr($get_date, 5);

		return $get_identifier;

	}
}	
	
?>

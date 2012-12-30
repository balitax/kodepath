<?php

if (!defined('BASEPATH'))
    exit('No Direct access allowed');

class counter extends CI_Model{

    function addinfo($page) {
// ########################################################
// ######### check if counter exsist and update ###########
// ########################################################
        $ip = $_SERVER["REMOTE_ADDR"];
        $agent = $_SERVER["HTTP_USER_AGENT"];
        $datetime = date("Y/m/d") . ' ' . date('H:i:s');
        $query = $this->db->query("SELECT page, ip, lastdate FROM hits WHERE page = '$page' AND ip = '$ip'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $lastdate = $key->lastdate;
            }
            $interval = time() - strtotime($lastdate);
            if (round(abs($interval / 60)) >= 60) {
                $updatecounter = mysql_query("UPDATE hits SET count = count+1, lastdate='$datetime' WHERE page = '$page' AND ip='$ip'");
                if (!$updatecounter) {
                    die("Can't update the counter : " . mysql_error()); // remove ?
                }
            }
        } else {
            // This page did not exsist in the counter database. A new counter must be created for this page.
            $insert = mysql_query("INSERT INTO hits (page, ip, lastdate, count)VALUES ('$page','$ip','$datetime', '1')");

            if (!$insert) {
                die("Can\'t insert into hits : " . mysql_error()); // remove ?
            }
        }

// ####################################################
// ######### add IP and user-agent and time ###########
// ####################################################
// gather user data

        if (!mysql_num_rows(mysql_query("SELECT ip_address FROM info WHERE ip_address = '$ip'"))) { // check if the IP is in database
            // if not , add it.	
            $adddata = mysql_query("INSERT INTO info (ip_address, user_agent, datetime) VALUES('$ip' , '$agent','$datetime' ) ");
            if (!$adddata) {
                die('Could not add IP : ' . mysql_error()); // remove ?
            }
        }

// ***************************************************************
// ** delete the first entry in $dbtableinfo if rows > $maxrows **
// ***************************************************************

        $result = mysql_query("SELECT * FROM info", $link);
        $num_rows = mysql_num_rows($result);
        $to_delete = $num_rows - $maxrows;
        if ($to_delete > 0) {
            for ($i = 1; $i <= $to_delete; $i++) {

                $delete = mysql_query("DELETE FROM $dbtableinfo ORDER BY id LIMIT 1");
                if (!$delete) {
                    die('Could not delete : ' . mysql_error()); // remove ?
                }
            }
        }

        mysql_close($link);
    }

}

?>

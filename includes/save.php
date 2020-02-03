<? 
/*
    Copyright (C) 2013-2014 xtr4nge [_AT_] gmail.com

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
<?
include "../../../login_check.php";
include "../../../config/config.php";
include "../_info_.php";
include "../../../functions.php";

include "options_config.php";

// Checking POST & GET variables...
if ($regex == 1) {
	
	mod_beef_conf1
	mod_beef_conf2	
	mod_beef_msf
	mod_beef_msfhost
	mod_beef_msfport
	mod_beef_msfuser
	mod_beef_msfpass
	mod_beef_msfssl
	mod_beef_msfssltype
	mod_beef_msfsslverify
	mod_beef_msfautopwnurl
	mod_beef_msfcallbackhost
		
	regex_standard($_POST['type'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['action'], "../../../msg.php", $regex_extra);
	regex_standard($_GET['mod_action'], "../../../msg.php", $regex_extra);
	regex_standard($_GET['mod_service'], "../../../msg.php", $regex_extra);
	regex_standard($_GET['meterpreter_host'], "../../../msg.php", $regex_extra);
	regex_standard($_GET['meterpreter_port'], "../../../msg.php", $regex_extra);
}

$type = $_POST['type'];
$action = $_POST['action'];
$mod_action = $_GET['mod_action'];
$mod_service = $_GET['mod_service'];
$meterpreter_host = $_POST["meterpreter_host"];
$meterpreter_port = $_POST["meterpreter_port"];

// meterpreter settings
if ($type == "settings") {

    $exec = "/bin/sed -i 's/^\\\$meterpreter_host.*/\\\$meterpreter_host = \\\"".$meterpreter_host."\\\";/g' ../_info_.php";
    //exec("$bin_danger \"" . $exec . "\"", $output); //DEPRECATED
    $output = exec_fruitywifi($exec);

    $exec = "/bin/sed -i 's/^\\\$meterpreter_port.*/\\\$meterpreter_port = \\\"".$meterpreter_port."\\\";/g' ../_info_.php";
    //exec("$bin_danger \"" . $exec . "\"", $output); //DEPRECATED
	exec_fruitywifi($exec);
    
    header('Location: ../index.php?tab=0');
    exit;

}

header('Location: ../index.php');

?>

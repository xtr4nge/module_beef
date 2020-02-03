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
	regex_standard($_POST['type'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_conf1'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_conf2'], "../../../msg.php", $regex_extra);	
	regex_standard($_POST['mod_beef_msf'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_msfhost'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_msfport'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_msfuser'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_msfpass'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_msfssl'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_msfssltype'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_msfsslverify'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_msfautopwnurl'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['mod_beef_msfcallbackhost'], "../../../msg.php", $regex_extra);
}

	$type = $_POST['type'];

	$mod_beef_conf1 = $_POST['mod_beef_conf1'];
	$mod_beef_conf2	 = $_POST['mod_beef_conf2'];

	$mod_beef_msf = $_POST['mod_beef_msf'];
	$mod_beef_msfhost = $_POST['mod_beef_msfhost'];
	$mod_beef_msfport = $_POST['mod_beef_msfport'];
	$mod_beef_msfuser = $_POST['mod_beef_msfuser'];
	$mod_beef_msfpass = $_POST['mod_beef_msfpass'];
	$mod_beef_msfssl = $_POST['mod_beef_msfssl'];
	$mod_beef_msfssltype = $_POST['mod_beef_msfssltype'];
	$mod_beef_msfsslverify = $_POST['mod_beef_msfsslverify'];
	$mod_beef_msfautopwnurl = $_POST['mod_beef_msfautopwnurl'];
	$mod_beef_msfcallbackhost = $_POST['mod_beef_msfcallbackhost'];
		
// Change Settings
if ($type == "settings") {
	
    $exec = "/bin/sed -i 's/^\\\$meterpreter_host.*/\\\$meterpreter_host = \\\"".$meterpreter_host."\\\";/g' ../_info_.php";
$output = exec_fruitywifi($exec);
	
    //mod msfrpc
    $exec = "/bin/sed -i 's/^\\\$mod_beef_msf.*/\\\$mod_beef_msf = \\\"".$mod_beef_msf."\\\";/g' ../_info_.php"; //change main settings
    $output = exec_fruitywifi($exec);
   // $exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
    //$exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2
    
    //mod msfhost
     $exec = "/bin/sed -i 's/^\\\$mod_beef_msfhost.*/\\\$mod_beef_msfhost = \\\"".$mod_beef_msfhost."\\\";/g' ../_info_.php"; //change main settings
        $output = exec_fruitywifi($exec);
	//$exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
  //  $exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2
	    
    //mod msfport
     $exec = "/bin/sed -i 's/^\\\$mod_beef_msfport.*/\\\$mod_beef_msfport = \\\"".$mod_beef_msfport."\\\";/g' ../_info_.php"; //change main settings
        $output = exec_fruitywifi($exec);
	//$exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
    //$exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2
    
    //mod msfuser
     $exec = "/bin/sed -i 's/^\\\$mod_beef_msfuser.*/\\\$mod_beef_msfuser = \\\"".$mod_beef_msfuser."\\\";/g' ../_info_.php"; //change main settings
     $output = exec_fruitywifi($exec);
	
	//$exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
    //$exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2
	    
    //mod msfpass
     $exec = "/bin/sed -i 's/^\\\$mod_beef_msfpass.*/\\\$mod_beef_msfpass = \\\"".$mod_beef_msfpass."\\\";/g' ../_info_.php"; //change main settings
     $output = exec_fruitywifi($exec);
	
	//$exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
    //$exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2
    
    //mod msfssl
     $exec = "/bin/sed -i 's/^\\\$mod_beef_msfssl.*/\\\$mod_beef_msfssl = \\\"".$mod_beef_msfssl."\\\";/g' ../_info_.php"; //change main settings
     $output = exec_fruitywifi($exec);
	
	//$exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
    //$exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2
	    
    //mod msfssltype
     $exec = "/bin/sed -i 's/^\\\$mod_beef_msfssltype.*/\\\$mod_beef_msfssltype = \\\"".$mod_beef_msfssltype."\\\";/g' ../_info_.php"; //change main settings
     $output = exec_fruitywifi($exec);
	//$exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
    //$exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2
    
    //mod msfsslverify
     $exec = "/bin/sed -i 's/^\\\$mod_beef_msfsslverify.*/\\\$mod_beef_msfsslverify = \\\"".$mod_beef_msfsslverify."\\\";/g' ../_info_.php"; //change main settings
     $output = exec_fruitywifi($exec);
	
	//$exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
    //$exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2
	    
    //mod msfautopwnurl
     $exec = "/bin/sed -i 's/^\\\$mod_beef_msfautopwnurl.*/\\\$mod_beef_msfautopwnurl = \\\"".$mod_beef_msfautopwnurl."\\\";/g' ../_info_.php"; //change main settings
     $output = exec_fruitywifi($exec);
	
	// $exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
   // $exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2
    
    //mod msfcallbackhost
     $exec = "/bin/sed -i 's/^\\\$mod_beef_msfcallbackhost.*/\\\$mod_beef_msfcallbackhost = \\\"".$mod_beef_msfcallbackhost."\\\";/g' ../_info_.php"; //change main settings
     $output = exec_fruitywifi($exec);
	
	// $exec = "/bin/sed -i 's/ ../ $mod_beef_conf1 //change beef conf1
   // $exec = "/bin/sed -i 's/ ../ $mod_beef_conf2 //change beef conf2

   // $exec = "/bin/sed -i 's/^\\\$meterpreter_host.*/\\\$meterpreter_host = \\\"".$meterpreter_host."\\\";/g' ../_info_.php";
    //exec("$bin_danger \"" . $exec . "\"", $output); //DEPRECATED
  //  $output = exec_fruitywifi($exec);

   // $exec = "/bin/sed -i 's/^\\\$meterpreter_port.*/\\\$meterpreter_port = \\\"".$meterpreter_port."\\\";/g' ../_info_.php";
    //exec("$bin_danger \"" . $exec . "\"", $output); //DEPRECATED
	// exec_fruitywifi($exec);
    
    header('Location: ../index.php?tab=0');
    exit;

}

header('Location: ../index.php');

?>

<? 
/*
    Copyright (C) 2013-2020 xtr4nge [_AT_] gmail.com

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

// Checking POST & GET variables...
if ($regex == 1) {
	regex_standard($_POST['type'], "../../../msg.php", $regex_extra);	

    
}

$type = $_POST['type'];
$mod_user = $_POST['mod_user'];
$mod_passwd = $_POST['mod_passwd'];
$mod_xhr_poll_timeout = $_POST['mod_xhr_poll_timeout'];
$mod_hook_file = $_POST['mod_hook_file'];
$mod_hook_session_name = $_POST['mod_hook_session_name'];
$mod_dns_hostname_lookup = $_POST['mod_dns_hostname_lookup'];
$mod_sslbeef = $_POST['mod_sslbeef'];
$mod_sslcertpath = $_POST['mod_sslcertpath'];
$mod_sslkeypath = $_POST['mod_sslkeypath'];
$mod_metasploit = $_POST['mod_metasploit'];
$mod_msfhost = $_POST['mod_msfhost'];
$mod_msfport = $_POST['mod_msfport'];
$mod_msfuser = $_POST['mod_msfuser'];
$mod_msfpasswd = $_POST['mod_msfpasswd'];
$mod_msfsslenable = $_POST['mod_msfsslenable'];
$mod_msfsslversion = $_POST['mod_msfsslversion'];
$mod_msfsslverify = $_POST['mod_msfsslverify'];
$mod_msfcallback_host = $_POST['mod_msfcallback_host'];
$mod_msfautopwn_url = $_POST['mod_msfautopwn_url'];


if ($type == "settings") {

    //BEEF SETTINGS

    $exec = "/bin/sed -i 's/^\\\$mod_user.*/\\\$mod_user = \\\"".$mod_user."\\\";/g' ../_info_.php";
    $output = exec_fruitywifi($exec);
    
    $exec = "/bin/sed -i '20 s/user:.*/user: \\\"".$mod_user."\\\"/g' $mod_optpath";
    $output = exec_fruitywifi($exec);
    
    if($mod_passwd !="beef"){
        $exec = "/bin/sed -i 's/^\\\$mod_passwd.*/\\\$mod_passwd = \\\"".$mod_passwd."\\\";/g' ../_info_.php";
        $output = exec_fruitywifi($exec);
        
        $exec = "/bin/sed -i '21 s/passwd:.*/passwd: \\\"".$mod_passwd."\\\"/g' $mod_optpath";
        $output = exec_fruitywifi($exec);
    }else{
        $exec = "/bin/sed -i 's/^\\\$mod_passwd.*/\\\$mod_passwd = \\\"fruity\\\";/g' ../_info_.php";
        $output = exec_fruitywifi($exec);
        
        $exec = "/bin/sed -i '21 s/passwd:.*/passwd: \\\"fruity\\\"/g' $mod_optpath";
        $output = exec_fruitywifi($exec);
    }
    
    $exec = "/bin/sed -i 's/^\\\$mod_xhr_poll_timeout.*/\\\$mod_xhr_poll_timeout = \\\"".$mod_xhr_poll_timeout."\\\";/g' ../_info_.php";
    $output = exec_fruitywifi($exec);
    
    $exec = "/bin/sed -i '44 s/xhr_poll_timeout:.*/xhr_poll_timeout: \\\"".$mod_xhr_poll_timeout."\\\"/g' $mod_optpath";
    $output = exec_fruitywifi($exec);
    
    $exec = "/bin/sed -i 's/^\\\$mod_hook_file.*/\\\$mod_hook_file = \\\"".$mod_hook_file."\\\";/g' ../_info_.php";
    $output = exec_fruitywifi($exec);
    
    $exec = "/bin/sed -i '61 s/hook_file:.*/hook_file: \\\"\/".$mod_hook_file."\\\"/g' $mod_optpath";
    $output = exec_fruitywifi($exec);

    $exec = "/bin/sed -i 's/^\\\$mod_hook_session_name.*/\\\$mod_hook_session_name = \\\"".$mod_hook_session_name."\\\";/g' ../_info_.php";
    $output = exec_fruitywifi($exec);
    
    $exec = "/bin/sed -i '62 s/hook_session_name:.*/hook_session_name: \\\"".$mod_hook_session_name."\\\"/g' $mod_optpath";
    $output = exec_fruitywifi($exec);
    
    if($mod_dns_hostname_lookup == "true"){
        $exec = "/bin/sed -i 's/^\\\$mod_dns_hostname_lookup.*/\\\$mod_dns_hostname_lookup = \\\"true\\\";/g' ../_info_.php";
        $output = exec_fruitywifi($exec);   
        
        $exec = "/bin/sed -i '112 s/dns_hostname_lookup:.*/dns_hostname_lookup: \\\"true\\\"/g' $mod_optpath";
        $output = exec_fruitywifi($exec);
    }else{
        $exec = "/bin/sed -i 's/^\\\$mod_dns_hostname_lookup.*/\\\$mod_dns_hostname_lookup = \\\"false\\\";/g' ../_info_.php";
        $output = exec_fruitywifi($exec);
        
        $exec = "/bin/sed -i '112 s/dns_hostname_lookup:.*/dns_hostname_lookup: \\\"false\\\"/g' $mod_optpath";
        $output = exec_fruitywifi($exec);
    }
    
    if($mod_sslbeef == "true"){
        $exec = "/bin/sed -i 's/^\\\$mod_sslbeef.*/\\\$mod_sslbeef = \\\"true\\\";/g' ../_info_.php";
        $output = exec_fruitywifi($exec);  
        
        $exec = "/bin/sed -i '89 s/enable:.*/enable: \\\"true\\\"/g' $mod_optpath";
        $output = exec_fruitywifi($exec);
        
        
        if($mod_sslcertpath != ""){
            $exec = "/bin/sed -i 's/^\\\$mod_sslcertpath.*/\\\$mod_sslcertpath = \\\"".$mod_sslcertpath."\\\";/g' ../_info_.php";
            $output = exec_fruitywifi($exec);  
            
            $exec = "/bin/sed -i '93 s/cert:.*/cert: \\\"".$mod_sslcertpath."\\\"/g' $mod_optpath";
            $output = exec_fruitywifi($exec);
        }else{
            $exec = "/bin/sed -i 's/^\\\$mod_sslcertpath.*/\\\$mod_sslcertpath = \\\"/etc/nginx/ssl/nginx.crt\\\";/g' ../_info_.php";
            $output = exec_fruitywifi($exec); 
            
            $exec = "/bin/sed -i '93 s/cert:.*/cert: \\\"/etc/nginx/ssl/nginx.crt\\\"/g' $mod_optpath";
            $output = exec_fruitywifi($exec);
        }
    
        if($mod_sslkeypath != ""){
            $exec = "/bin/sed -i 's/^\\\$mod_sslkeypath.*/\\\$mod_sslkeypath = \\\"".$mod_sslkeypath."\\\";/g' ../_info_.php";
            $output = exec_fruitywifi($exec);  
            
            $exec = "/bin/sed -i '92 s/key:.*/key: \\\"".$mod_sslkeypath."\\\"/g' $mod_optpath";
            $output = exec_fruitywifi($exec);
        }else{
            $exec = "/bin/sed -i 's/^\\\$mod_sslkeypath.*/\\\$mod_sslkeypath = \\\"/etc/nginx/ssl/nginx.key\\\";/g' ../_info_.php";
            $output = exec_fruitywifi($exec); 
            
            $exec = "/bin/sed -i '92 s/key:.*/key: \\\"/etc/nginx/ssl/nginx.key\\\"/g' $mod_optpath";
            $output = exec_fruitywifi($exec);
        }
 
    }else{
        $exec = "/bin/sed -i 's/^\\\$mod_sslbeef.*/\\\$mod_sslbeef = \\\"false\\\";/g' ../_info_.php";
        $output = exec_fruitywifi($exec);
    }

    if($mod_metasploit == "true"){
        
        $exec = "/bin/sed -i 's/^\\\$mod_metasploit.*/\\\$mod_metasploit = \\\"true\\\";/g' ../_info_.php";
        $output = exec_fruitywifi($exec);
        
        $exec = "/bin/sed -i '13 s/enable:.*/enable: \\\"true\\\"/g' $mod_optpath";
        $output = exec_fruitywifi($exec);
        
        $exec = "/bin/sed -i '23 s/enable:.*/enable: \\\"true\\\"/g' $mod_cooptpath";
        $output = exec_fruitywifi($exec);
                
        $exec = "/bin/sed -i 's/^\\\$mod_msfhost.*/\\\$mod_msfhost = \\\"".$mod_msfhost."\\\";/g' ../_info_.php";
        exec_fruitywifi($exec);
        
        $exec = "/bin/sed -i '25 s/host:.*/host: \\\"".$mod_msfhost."\\\"/g' $mod_cooptpath";
        $output = exec_fruitywifi($exec);
        
	    $exec = "/bin/sed -i 's/^\\\$mod_msfport.*/\\\$mod_msfport = \\\"".$mod_msfport."\\\";/g' ../_info_.php";
        exec_fruitywifi($exec); 
        
        $exec = "/bin/sed -i '26 s/port:.*/port: \\\"".$mod_msfport."\\\"/g' $mod_cooptpath";
        $output = exec_fruitywifi($exec);

	    $exec = "/bin/sed -i 's/^\\\$mod_msfuser.*/\\\$mod_msfuser = \\\"".$mod_msfuser."\\\";/g' ../_info_.php";
        exec_fruitywifi($exec);
        
        $exec = "/bin/sed -i '27 s/user:.*/user: \\\"".$mod_msfuser."\\\"/g' $mod_cooptpath";
        $output = exec_fruitywifi($exec);

	    $exec = "/bin/sed -i 's/^\\\$mod_msfpasswd.*/\\\$mod_msfpasswd = \\\"".$mod_msfpasswd."\\\";/g' ../_info_.php";
        exec_fruitywifi($exec); 
        
        $exec = "/bin/sed -i '28 s/pass:.*/pass: \\\"".$mod_msfpasswd."\\\"/g' $mod_cooptpath";
        $output = exec_fruitywifi($exec);

        if($mod_msfsslenable == "true"){
            $exec = "/bin/sed -i 's/^\\\$mod_msfsslenable.*/\\\$mod_msfsslenable =  \\\"true\\\";/g' ../_info_.php";
            $output = exec_fruitywifi($exec);
            
            $exec = "/bin/sed -i '30 s/ssl:.*/ssl: \\\"true\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }else{
            $exec = "/bin/sed -i 's/^\\\$mod_msfsslenable.*/\\\$mod_msfsslenable = \\\"false\\\";/g' ../_info_.php";
            $output = exec_fruitywifi($exec);
            
            $exec = "/bin/sed -i '30 s/ssl:.*/ssl: \\\"".$mod_msfsslenable."\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }
        
        if($mod_msfsslversion != ""){
            $exec = "/bin/sed -i 's/^\\\$mod_msfsslversion.*/\\\$mod_msfsslversion = \\\"".$mod_msfsslversion."\\\";/g' ../_info_.php";
            exec_fruitywifi($exec);  
            
            $exec = "/bin/sed -i '31 s/ssl_version:.*/ssl_version: \\\"".$mod_msfsslversion."\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }else{
            $exec = "/bin/sed -i 's/^\\\$mod_msfsslversion.*/\\\$mod_msfsslversion = \\\"TLS1\\\";/g' ../_info_.php";
            $output = exec_fruitywifi($exec);
            
            $exec = "/bin/sed -i '31 s/ssl_version:.*/ssl_version: \\\"TLS1\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }
    
        if($mod_msfsslverify == "true"){
            $exec = "/bin/sed -i 's/^\\\$mod_msfsslverify.*/\\\$mod_msfsslverify =  \\\"true\\\";/g' ../_info_.php";
            exec_fruitywifi($exec);
            
            $exec = "/bin/sed -i '32 s/ssl_verify:.*/ssl_verify: \\\"true\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }else{
            $exec = "/bin/sed -i 's/^\\\$mod_msfsslverify.*/\\\$mod_msfsslverify = \\\"false\\\";/g' ../_info_.php";
            exec_fruitywifi($exec); 
            
            $exec = "/bin/sed -i '32 s/ssl_verify:.*/ssl_verify: \\\"false\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }
    
        if($mod_msfcallback_host != ""){
            $exec = "/bin/sed -i 's/^\\\$mod_msfcallback_host.*/\\\$mod_msfcallback_host =  \\\"".$mod_msfcallback_host."\\\";/g' ../_info_.php";
            exec_fruitywifi($exec);
            
            $exec = "/bin/sed -i '34 s/callback_host:.*/callback_host: \\\"".$mod_msfcallback_host."\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }else{
            $exec = "/bin/sed -i 's/^\\\$mod_msfcallback_host.*/\\\$mod_msfcallback_host =  \\\"".$io_in_ip."\\\";/g' ../_info_.php";
            exec_fruitywifi($exec);
            
            $exec = "/bin/sed -i '34 s/callback_host:.*/callback_host: \\\"".$io_in_ip."\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }
    
        if($mod_msfautopwn_url != ""){
            $exec = "/bin/sed -i '20 s/^\\\$mod_msfautopwn_url.*/\\\$mod_msfautopwn_url =  \\\"".$mod_msfautopwn_url."\\\";/g' ../_info_.php";
            exec_fruitywifi($exec);
            
            $exec = "/bin/sed -i '36 s/autopwn_url:.*/autopwn_url: \\\"".$mod_msfautopwn_url."\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }else{
            $exec = "/bin/sed -i '20 s/^\\\$mod_msfautopwn_url.*/\\\$mod_msfautopwn_url = \\\"autopwn\\\";/g' ../_info_.php";
            exec_fruitywifi($exec);
            
            $exec = "/bin/sed -i '36 s/autopwn_url:.*/autopwn_url: \\\"autopwn\\\"/g' $mod_cooptpath";
            $output = exec_fruitywifi($exec);
        }
        

        }else{
        
        $exec = "/bin/sed -i 's/^\\\$mod_metasploit.*/\\\$mod_metasploit = \\\"false\\\";/g' ../_info_.php";
        $output = exec_fruitywifi($exec);
    
        $exec = "/bin/sed -i '23 s/enable:.*/enable: \\\"false\\\"/g' $mod_cooptpath";
        $output = exec_fruitywifi($exec);
    }

    header('Location: ../index.php?tab=0');
    exit;

}

header('Location: ../index.php');

?>

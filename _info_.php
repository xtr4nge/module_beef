<?
$mod_name="beef";
$mod_version="1.3";
$mod_path="/usr/share/fruitywifi/www/modules/$mod_name";
$mod_logs="$log_path/$mod_name.log"; 
$mod_logs_history="$mod_path/includes/logs/";
$mod_logs_panel="enabled";
$mod_panel="show";
$mod_type="module";
$mod_alias="BeEF";
$mod_isup="ps aux | grep -iEe 'ruby.+beef' | grep -v grep";
$mod_msfbacktask="ps aux | grep -iEe 'msfrpcd' | grep -v grep"; //msfrpcd check

# OPTIONS
$mod_beef_kali="0";
$mod_beef_auto="0";

#User Options
$mod_beef_conf1="$mod_path/config.yaml";
$mod_beef_conf2="$mod_path/extensions/metasploit/config.yaml";
$mod_beef_msfenable="0";
$mod_beef_msfhost="127.0.0.1";
$mod_beef_msfport="55553";
$mod_beef_msfuser="msf";
$mod_beef_msfpass="abc123";
$mod_beef_msfsslenable="0";
$mod_beef_msfssltype="TLS1";
$mod_beef_msfsslverify="0";
$mod_beef_msfautopwnurl="autopwn";
$mod_beef_msfcallbackhost="127.0.0.1";

# EXEC
$bin_sudo = "/usr/bin/sudo";
$bin_beef = "$mod_path/includes/beef";
$bin_mitmproxy = "/usr/local/bin/mitmdump";
$bin_iptables = "/sbin/iptables";
$bin_ifconfig = "/sbin/ifconfig";
$bin_iwlist = "/sbin/iwlist";
$bin_sh = "/bin/sh";
$bin_echo = "/bin/echo";
$bin_grep = "/usr/bin/ngrep";
$bin_killall = "/usr/bin/killall";
$bin_cp = "/bin/cp";
$bin_chmod = "/bin/chmod";
$bin_sed = "/bin/sed";
$bin_rm = "/bin/rm";
$bin_route = "/sbin/route";
$bin_perl = "/usr/bin/perl";
$bin_sleep = "/bin/sleep";
?>

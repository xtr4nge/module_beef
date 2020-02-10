<?
$mod_type="service";
$mod_name="beef";
$mod_alias="Beef";
$mod_version="2.b";
$mod_dep="beef";
$mod_co="Mitmproxy";
$mod_cotwo="Msfrpcd";
$mod_panel="show";
$mod_isup="ps aux | grep -iEe 'beef' | grep -v grep";
$mod_coisup="ps aux|grep -E 'mitmdump.+inject_beef' | grep -v grep";
$mod_cotwoisup="ps aux|grep -E 'msfrpcd' | grep -v grep";

$mod_logs_panel="enabled";
$mod_path="/usr/share/fruitywifi/www/modules/$mod_name";
$mod_logs="$log_path/$mod_name.log"; 
$mod_logs_history="$mod_path/includes/logs/";

$mod_optpath="$mod_path/includes/beef/config.yaml";
$mod_cooptpath="$mod_path/includes/beef/extension/metasploit/config.yaml";

# OPTIONS
$mod_beef_kali="0";
$mod_beef_auto="0";

# USER OPTIONS
# BEEF
$mod_user = "beef";
$mod_passwd = "beef";
$mod_xhr_poll_timeout = "5000";
$mod_hook_file = "hook.js";
$mod_hook_session_name = "BEEF";
$mod_dns_hostname_lookup = "true";
$mod_sslbeef = "false";
$mod_sslcertpath = "";
$mod_sslkeypath = "";
$mod_metasploit = "false";

#MSFRPC
$mod_msfhost = "127.0.0.1";
$mod_msfport = "55553";
$mod_msfuser = "msf";
$mod_msfpasswd = "Hackme01!";

$mod_msfsslenable = "false";
$mod_msfsslversion = "TLS1";
$mod_msfsslverify = "false";
$mod_msfcallback_host =  "10.0.0.1";
$mod_msfautopwn_url =  "autopwn";

# EXEC
$bin_sudo = "/usr/bin/sudo";
$bin_beef = "$mod_path/includes/beef/beef";
$bin_msfrpcd= "/usr/bin/msfrpcd";
$bin_mitmdump = "/bin/mitmdump";
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

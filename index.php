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
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>FruityWiFi : Beef</title>
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>

<link rel="stylesheet" href="../css/jquery-ui.css" />
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../../../style.css" />
<link rel="icon" type="image/x-icon" href="../../img/favicon.ico"/>

<script src="includes/scripts.js?asd"></script>

<script>
$(function() {
    $( "#action" ).tabs();
    $( "#result" ).tabs();
});

</script>

</head>
<body>

<? include "../menu.php"; ?>

<br>

<?
include "../../login_check.php";
include "../../config/config.php";
include "_info_.php";
include "../../functions.php";

// Checking POST & GET variables...
if ($regex == 1) {
	regex_standard($_POST["newdata"], "msg.php", $regex_extra);
    regex_standard($_GET["logfile"], "msg.php", $regex_extra);
    regex_standard($_GET["action"], "msg.php", $regex_extra);
    regex_standard($_POST["service"], "msg.php", $regex_extra);
}

$newdata = $_POST['newdata'];
$logfile = $_GET["logfile"];
$action = $_GET["action"];
$service = $_POST["service"];

// DELETE LOG
if ($logfile != "" and $action == "delete") {
    $exec = "$bin_rm ".$mod_logs_history.$logfile.".log";
    exec_fruitywifi($exec);
}

?>

<div class="rounded-top" align="left"> &nbsp; <b><?=$mod_alias?></b> </div>
<div class="rounded-bottom">

    &nbsp;version <?=$mod_version?><br>  
    
    <?
    if(file_exists($bin_beef)){
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $mod_alias  <font style='color:lime'>installed</font><br>";
	   $ismoduleup = exec($mod_isup);
        if ($ismoduleup != "") {
        	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $mod_alias  <font color='lime'><b>enabled</b></font>.&nbsp; | <a href='includes/module_action.php?service=beef&action=stop&page=module'><b>stop</b></a><br>";
        } else { 
        	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $mod_alias  <font color='red'><b>disabled</b></font>. | <a href='includes/module_action.php?service=beef&action=start&page=module'><b>start</b></a><br>";
    	}
        
        if(file_exists($bin_mitmdump)){
        echo "&nbsp; $mod_co  <font style='color:lime'>installed</font><br>"; 
	       $ismoduleup = exec($mod_coisup);
    	   if ($ismoduleup != "") {
                echo "&nbsp;&nbsp; AutoHook <font color='lime'><b>enabled</b></font>.&nbsp; | <a href='includes/module_action.php?service=beef&action=hookstop&page=module'><b>stop</b></a><br>";
    	   } else { 
        	   echo "&nbsp;&nbsp; AutoHook <font color='red'><b>disabled</b></font>. | <a href='includes/module_action.php?service=beef&action=hookstart&page=module'><b>start</b></a><br>";
    	           }
            } else { 
                echo "&nbsp; $mod_co  <a href='/page_modules.php?show' style='color:red'>install</a><br>";
            }
        
        if(file_exists($bin_msfrpcd)){
        echo "&nbsp;&nbsp;&nbsp; $mod_cotwo  <font style='color:lime'>installed</font><br>";
	       $ismoduleup = exec($mod_cotwoisup);
    	   if ($ismoduleup != "") {
        	   echo "&nbsp;&nbsp;&nbsp; $mod_cotwo  <font color='lime'><b>enabled</b></font>.&nbsp; | <a href='includes/module_action.php?service=msfrpcd&action=stop&page=module'><b>stop</b></a><br>";
    	   } else { 
        	   echo "&nbsp;&nbsp;&nbsp; $mod_cotwo  <font color='red'><b>disabled</b></font>. | <a href='includes/module_action.php?service=msfrpcd&action=start&page=module'><b>start</b></a><br>";
    	           }
            } else { 
                echo "&nbsp;&nbsp;&nbsp; $mod_cotwo  <a href='/page_modules.php?show' style='color:red'>install</a><br>";
            }
        
        $ismoduleup = exec($mod_isup);
    	if ($ismoduleup != "") {
        	echo "&nbsp;&nbsp;&nbsp; UI <a href='http://".$_SERVER['SERVER_ADDR'].":3000/ui/panel' target='_blank'>Panel Login</a>";
	   } 
    } else { 
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $mod_alias  <a href='includes/module_action.php?install=install_$mod_name' style='color:red'>install</a><br>";
    }    
    ?>
    
</div>

<br>

<div id="msg" style="font-size:larger;">
	Loading, please wait...
</div>

<div id="body" style="display:none;">

    <div id="result" class="module">
        <ul>
            <li><a href="#tab-config">Config</a></li>
            <li><a href="#tab-output">Output</a></li>
            <li><a href="#tab-history">History</a></li>
            <li><a href="#tab-about">About</a></li>
        </ul>
        
    <!-- CONFIG -->

        <div id="tab-config" class="history">
        <form method="POST" autocomplete="off" action="includes/save.php">
        <div class="module-options">
		<h4>Config</h4>
		<p>Beef Settings</p>
         <table>
            <tr>
                <td>Beef User: </td>
                <td><input name="mod_user" type="text" value="<?=$mod_user?>"></td>
            </tr>
            <tr>
                <td>Beef Passwd: </td>
                <td><input name="mod_passwd" type="text" required value="<?=$mod_passwd?>"></td>
            </tr>
            <tr>
                <td>Beef Xhr poll timeout: </td>
                <td><input name="mod_xhr_poll_timeout" type="number" value="<?=$mod_xhr_poll_timeout?>"></td>
            </tr>
            <tr>
                <td>Beef Hook file: </td>
                <td><input name="mod_hook_file" type="text" value="<?=$mod_hook_file?>"></td>
            </tr>
            <tr>
                <td>Beef Hook Session Name: </td>
                <td><input name="mod_hook_session_name" type="text" value="<?=$mod_hook_session_name?>"></td>
            </tr>
            <tr>
                <td>Beef Dns Hostname Lookup: </td>
                <td><input name="mod_dns_hostname_lookup" type="checkbox" value="true" <?php if ($mod_dns_hostname_lookup == "true"){?> checked="checked" <?php } ?>></td>
            </tr>
            <tr>
                <td>Beef SSl: </td>
                <td><input name="mod_sslbeef" type="checkbox" value="true" <?php if ($mod_sslbeef == "true"){?> checked="checked" <?php } ?>></td>
            </tr>
            <tr>
                <td>Beef SSl Cert Path: </td>
                <td><input name="mod_sslcertpath" type="text" value="<?=$mod_sslcertpath?>"></td>
            </tr>
            <tr>
                <td>Beef SSl Privkey Path: </td>
                <td><input name="mod_sslkeypath" type="text" value="<?=$mod_sslkeypath?>"></td>
            </tr>
            <tr>
                <td>Beef Metasploit: </td>
                <td><input name="mod_metasploit" type="checkbox" value="true" <?php if ($mod_metasploit == "true"){?> checked="checked" <?php } ?>></td>                
            </tr>
            </table>
            <table>
            <td><p>Msfrpcd Settings<p></td>
            <br>
	    <tr>
                <td>Msfrpcd Host: </td>
                <td><input name="mod_msfhost" type="text" value="<?=$mod_msfhost?>"></td>
            </tr>
	    <tr>
                <td>Msfrpcd Port: </td>
                <td><input name="mod_msfport" type="number" value="<?=$mod_msfport?>"></td>
            </tr>
	    <tr>
                <td>Msfrpcd User: </td>
                <td><input name="mod_msfuser" type="text" value="<?=$mod_msfuser?>"></td>
            </tr>
	    <tr>
                <td>Msfrpcd Passwd: </td>
                <td><input name="mod_msfpasswd" type="text" value="<?=$mod_msfpasswd?>"></td>
            </tr>
            <tr>
                <td>Msfrpcd SSl: </td>
                <td><input name="mod_msfsslenable" type="checkbox" value="true" <?php if ($mod_msfsslenable == "true"){?> checked="checked" <?php } ?>></td>                

            </tr>
            <tr>
                <td>Msfrpcd SSl Version: </td>
                <td><input name="mod_msfsslversion" type="text" value="<?=$mod_msfsslversion?>"></td>                

            </tr>
            <tr>
                <td>Msfrpcd SSl Verify: </td>
                <td><input name="mod_msfsslverify" type="checkbox" value="true" <?php if ($mod_msfsslverify == "true"){?> checked="checked" <?php } ?>></td>                

            </tr>
            <tr>
                <td>Msfrpcd Callback Host: </td>
                <td><input name="mod_msfcallback_host" type="text" value="<?=$mod_msfcallback_host?>"></td>                

            </tr>
            <tr>
                <td>Msfrpcd Autopwn Url: </td>
                <td><input name="mod_msfautopwn_url" type="text" value="<?=$mod_msfautopwn_url?>"></td>
            </tr>
            <tr>
            <td></td>
                <td>
                    <input type="submit" value="save">
                    <input name="type" type="hidden" value="settings">
                </td>
            </tr>
         </table>
		</div> 
	    </form>
        </div>
        
        <!-- END CONFIG -->
        
	    <!-- OUTPUT -->

        <div id="tab-output">
			
			<div>
				<form id="formLogs-Refresh" name="formLogs-Refresh" method="POST" autocomplete="off" action="index.php">
					<input type="submit" value="refresh">
					<br><br>
					<?
						if ($logfile != "" and $action == "view") {
							$filename = $mod_logs_history.$logfile.".log";
						} else {
							$filename = $mod_logs;
						}
					
						$data = open_file($filename);
						
						// REVERSE
						$data_array = explode("\n", $data);
						$data = implode("\n",array_reverse($data_array));
						
					?>
					<textarea id="output" class="module-content" style="font-family: courier;"><?=htmlspecialchars($data)?></textarea>
					<input type="hidden" name="type" value="logs">
				</form>
		
			</div>
            
        </div>
	
		<!-- HISTORY -->

        <div id="tab-history" class="history">
            <input type="submit" value="refresh">
            <br><br>
            
            <?
            $logs = glob($mod_logs_history.'*.log');
            print_r($a);

            for ($i = 0; $i < count($logs); $i++) {
                $filename = str_replace(".log","",str_replace($mod_logs_history,"",$logs[$i]));
                echo "<a href='?logfile=".str_replace(".log","",str_replace($mod_logs_history,"",$logs[$i]))."&action=delete&tab=2'><b>x</b></a> ";
                echo $filename . " | ";
                echo "<a href='?logfile=".str_replace(".log","",str_replace($mod_logs_history,"",$logs[$i]))."&action=view'><b>view</b></a>";
                echo "<br>";
            }
            ?>
            
        </div>

		<!-- END HISTORY -->
        
        <!-- ABOUT -->

        <div id="tab-about" class="history">
            <? include "includes/about.php"; ?>
        </div>
        
        <!-- END ABOUT -->
		
				        
    </div>

    <div id="loading" class="ui-widget" style="width:100%;background-color:#000; padding-top:4px; padding-bottom:4px;color:#FFF">
        Loading...
    </div>

    <script>

    $('#loading').hide();

    </script>

    <?
    if ($_GET["tab"] == 1) {
        echo "<script>";
        echo "$( '#result' ).tabs({ active: 0 });";
        echo "</script>";
    } else if ($_GET["tab"] == 2) {
        echo "<script>";
        echo "$( '#result' ).tabs({ active: 1 });";
        echo "</script>";
    } else if ($_GET["tab"] == 3) {
        echo "<script>";
        echo "$( '#result' ).tabs({ active: 2 });";
        echo "</script>";
    } else if ($_GET["tab"] == 4) {
        echo "<script>";
        echo "$( '#result' ).tabs({ active: 3 });";
        echo "</script>";
    } 
    ?>

</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#body').show();
    $('#msg').hide();
});
</script>

</body>
</html>

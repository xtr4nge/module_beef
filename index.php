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
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>FruityWiFi</title>
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
$tempname = $_GET["tempname"];
$service = $_POST["service"];

// DELETE LOG
if ($logfile != "" and $action == "delete") {
    $exec = "$bin_rm ".$mod_logs_history.$logfile.".log";
    exec_fruitywifi($exec);
}

// SET MODE
if ($_POST["change_mode"] == "1") {
    $ss_mode = $service;
    $exec = "/bin/sed -i 's/ss_mode.*/ss_mode = \\\"".$ss_mode."\\\";/g' _info_.php";
    $output = exec_fruitywifi($exec);
}

?>

<div class="rounded-top" align="left"> &nbsp; <b><?=$mod_alias?></b> </div>
<div class="rounded-bottom">

    &nbsp;version <?=$mod_version?><br>
    <?
	if ($mod_beef_kali == "1") {
		$check_beef = "/usr/bin/beef-xss";
	} else {
		$check_beef = "includes/beef-master/beef";
	}
    if (file_exists($check_beef)) { 
        echo "&nbsp;&nbsp;&nbsp; $mod_alias <font style='color:lime'>installed</font><br>";
    } else {
		echo "&nbsp;&nbsp;&nbsp; $mod_alias <span style='color:red'>install</span><br>";
    } 
    ?>
    
    <?
    $ismoduleup = exec("$mod_isup");
    if ($ismoduleup != "") {
        echo "&nbsp;&nbsp;&nbsp; $mod_alias  <font color='lime'><b>enabled</b></font>.&nbsp; | <a href='includes/module_action.php?service=beef&action=stop&page=module'><b>stop</b></a><br>";
    } else { 
        echo "&nbsp;&nbsp;&nbsp; $mod_alias  <font color='red'><b>disabled</b></font>. | <a href='includes/module_action.php?service=beef&action=start&page=module'><b>start</b></a><br>";
    }
    ?>
	
	<?
    $ismoduleup = exec("ps aux|grep -E 'mitmdump.+inject_beef' | grep -v grep");
    if ($ismoduleup != "") {
        echo "AutoHook <font color='lime'><b>enabled</b></font>.<br>";
    } else { 
        echo "AutoHook <font color='red'><b>disabled</b></font>.<br>";
    }
    ?>
	
	<?
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UI <a href='http://127.0.0.1:3000/ui/panel' target='_blank'>Panel Login</a>";
    ?>
	
	
</div>

<br>

<div id="msg" style="font-size:larger;">
	Loading, please wait...
</div>

<div id="body" style="display:none;">

    <div id="result" class="module">
        <ul>
            <li><a href="#tab-output">Output</a></li>
            <li><a href="#tab-history">History</a></li>
			<li><a href="#tab-options">Options</a></li>
			<li><a href="#tab-about">About</a></li>
        </ul>

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
		
		<!-- OPTIONS -->

        <div id="tab-options" class="history">
			<h5>
			<input id="beef_kali" type="checkbox" name="my-checkbox" <? if ($mod_beef_kali == "1") echo "checked"; ?> onclick="setCheckbox(this, 'mod_beef_kali')" >
            Kali-Linux | NetHunter
			<br><br>
			<input id="beef_auto" type="checkbox" name="my-checkbox" <? if ($mod_beef_auto == "1") echo "checked"; ?> onclick="setCheckbox(this, 'mod_beef_auto')" >
            AutoHook (start mitmproxy to inject hook.js)
			</h5>
		</div>
	
		<!-- END OPTIONS -->
		
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
        echo "$( '#result' ).tabs({ active: 3 });";
        echo "</script>";
    } else if ($_GET["tab"] == 4) {
        echo "<script>";
        echo "$( '#result' ).tabs({ active: 4 });";
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

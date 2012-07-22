<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Type: Infusion / Panel
| Name: BotSlap Panel
| Version: 1.03
| Author: Nicolae Crefelean (kneekoo/Nicu)
| Co-Author: Valerio Vendrame (lelebart)
+--------------------------------------------------------+
| Filename: admin.php
| Author: Nicolae Crefelean (kneekoo/Nicu)
| Co-Author: Valerio Vendrame (lelebart)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
require_once "../../maincore.php";
require_once THEMES."templates/admin_header.php";
include_once INFUSIONS."botslap_panel/minicore.php";

if (!checkrights("CP") || !checkrights("BSP") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect("../index.php"); }

add_to_title(": ".$locale['bsp000']);

if (isset($_GET['status']) && !isset($message)) {
	if ($_GET['status'] == "err") {
		$message = $locale['bsp011'].$locale['bsp012'];
	} elseif ($_GET['status'] == "chk") {
		$message = $locale['bsp013'];
	} elseif ($_GET['status'] == "chka") {
		$message = $locale['bsp013a'];
	} elseif ($_GET['status'] == "csl") {
		$message = $locale['bsp014'];
	} elseif ($_GET['status'] == "freq") {
		$message = $locale['bsp015'];
	} 
	if ($message) {	echo "<div class='admin-message'>".$message."</div>\n"; }
}

$bs = dbarray(dbquery("SELECT * FROM ".DB_BOTSLAP.""));
$interval = array("5", "10", "15", "30", "45", "60", "90", "120", "180", "240");

if (isset($_POST['frequency']) && isnum($_POST['frequency']) && in_array($_POST['frequency'], $interval)) {
	$bs = dbquery("UPDATE ".DB_BOTSLAP." SET `check_frequency` = '".$_POST['frequency']."'");
	redirect(FUSION_SELF.$aidlink."&status=freq");
}
if (isset($_GET['value']) && isnum($_GET['value']) && !isset($_GET['option'])) {
	redirect(FUSION_SELF.$aidlink."&status=err");	
}
if (isset($_GET['option']) && isnum($_GET['option'])) {
	switch ($_GET['option']) {
		case "1":
			if (botslap_check($bs)) {
				redirect(FUSION_SELF.$aidlink."&status=chk");
			} else {
				redirect(FUSION_SELF.$aidlink);
			}
			break;
		case "2":
			$r = dbquery("UPDATE ".DB_BOTSLAP." SET `slap_count` = '0'");
			redirect(FUSION_SELF.$aidlink."&status=csl");
			break;
		case "3":
			if (botslap_check($bs, 1)) {
				redirect(FUSION_SELF.$aidlink."&status=chka");
			} else {
				redirect(FUSION_SELF.$aidlink);
			}
			break;
		default: redirect(FUSION_SELF.$aidlink."&status=err");
	}
}

opentable($locale['bsp000']);

echo "<em>".$locale['bsp001']."</em>\n<hr />\n";
echo "<form name='botslapform' method='post' action='".FUSION_SELF.$aidlink."'>
<table cellspacing='1' cellpadding='0' width='100%' class='tbl-border center'>\n\t<tr>
\t\t<td class='tbl1' width='1%' style='white-space:nowrap'><strong>".$locale['bsp002']."</strong></td>
\t\t<td class='tbl1'>".showdate("longdate", $bs['last_datestamp'])."</td>
\t\t<td class='tbl1' align='center' width='1%' style='white-space:nowrap'><a href='".FUSION_SELF.$aidlink."&amp;option=1'>".$locale['bsp005']."</a></td>
\t</tr>\n\t<tr>
\t\t<td class='tbl2' width='1%' style='white-space:nowrap'><strong>".$locale['bsp003']."</strong></td>
\t\t<td class='tbl2'>".$bs['slap_count']."</td>
\t\t<td align='center' class='tbl2' width='1%' style='white-space:nowrap'><a href='".FUSION_SELF.$aidlink."&amp;option=2'>".$locale['bsp006']."</a></td>
\t</tr>\n\t<tr>
\t\t<td class='tbl1' width='1%' style='white-space:nowrap'><strong>".$locale['bsp004']."</strong></td>
\t\t<td class='tbl1'>".$bs['last_id']."</td>
\t\t<td class='tbl1' align='center' width='1%' style='white-space:nowrap'><a href='".FUSION_SELF.$aidlink."&amp;option=3'>".$locale['bsp007']."</a></td>
\t</tr>\n\t<tr>
\t\t<td class='tbl2' width='1%' style='white-space:nowrap'><strong>".$locale['bsp008'].":</strong></td>
\t\t<td class='tbl2'><select name='frequency' class='textbox'>\n";
for ($i=0;$i<count($interval);$i++) {
echo "\t\t\t<option value='".$interval[$i]."'".($interval[$i] == $bs['check_frequency'] ? " selected='selected'" : "").">".$interval[$i]."</option>\n";
}
echo "\t\t</select> ".$locale['bsp009']."</td>
\t\t<td class='tbl2' align='center' width='1%' style='white-space:nowrap'><input class='button' type='submit' value='".$locale['bsp010']."' /></td>
\t</tr>\n</table>\n</form>\n";

closetable();

require_once THEMES."templates/footer.php";
?>
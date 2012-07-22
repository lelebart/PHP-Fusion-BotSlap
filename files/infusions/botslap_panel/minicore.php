<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Type: Infusion / Panel
| Name: BotSlap Panel
| Version: 1.02
| Author: Nicolae Crefelean (kneekoo/Nicu)
| Co-Author: Valerio Vendrame (lelebart)
+--------------------------------------------------------+
| Filename: minicore.php
| Author: Valerio Vendrame (lelebart)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

if (!defined("BOTSLAP_DIR")) { define("BOTSLAP_DIR", INFUSIONS."botslap_panel/"); }

include_once BOTSLAP_DIR."infusion_db.php";

if (file_exists(BOTSLAP_DIR."locale/".$settings['locale'].".php")) {
	include_once BOTSLAP_DIR."locale/".$settings['locale'].".php";
} else {
	include_once BOTSLAP_DIR."locale/English.php";
}

function botslap_check($bs, $startover = 0) {
	$slap = 0;
	$id = ($startover == 0 ? $bs['last_id'] : "0");
	$r = dbquery("SELECT user_id, user_name, user_email FROM ".DB_USERS." WHERE user_id > ".$id." ORDER BY user_id ASC");
	while ($u = dbarray($r)) {
		$id = $u['user_id'];
		if (preg_match("/^[a-z]*[0-9]+.[0-9]+.[0-9]+.[a-zA-Z]+@[a-zA-Z]+.info$/", $u['user_email']) ||
		   (preg_match("/^[a-zA-Z]+[0-9]+$/", $u['user_name']) && preg_match("/^[0-9]+.[0-9]+@[a-zA-Z0-9.]+$/", $u['user_email']))) {
			$remcomm = dbquery("DELETE FROM ".DB_COMMENTS." WHERE comment_name='".$id."'");
			$remshou = dbquery("DELETE FROM ".DB_SHOUTBOX." WHERE shout_name='".$id."'");
			$remuser = dbquery("DELETE FROM ".DB_USERS." WHERE user_id='".$id."'");
			$slap++;
		}
	}
	$slaps = $bs['slap_count'] + $slap;
	$r = dbquery("UPDATE ".DB_BOTSLAP." SET last_id='".$id."', last_datestamp='".time()."', slap_count='".$slaps."'");
	return $r ? true : false;
}
?>
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
| Filename: infusion.php
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
if (!defined("IN_FUSION") || !checkrights("I")) { die("Access Denied"); }

include_once INFUSIONS."botslap_panel/minicore.php";

$inf_title = $locale['bsp000'];
$inf_description = $locale['bsp001'];
$inf_version = "1.02";
$inf_developer = "Nicolae Crefelean, <br />Valerio Vendrame (lelebart)";
$inf_email = "nicolae.crefelean@forumit.ro";
$inf_weburl = "http://www.phpfusion.ro/";

$inf_folder = "botslap_panel";

$inf_newtable[1] = DB_BOTSLAP." (
  `last_id` MEDIUMINT(7) UNSIGNED NOT NULL,
  `last_datestamp` VARCHAR(10) NOT NULL,
  `slap_count` MEDIUMINT(7) UNSIGNED NOT NULL,
  `check_frequency` MEDIUMINT(5) UNSIGNED NOT NULL
  ) TYPE = MyISAM";

$inf_droptable[1] = DB_BOTSLAP;

$inf_insertdbrow[1] = DB_BOTSLAP." (last_id, last_datestamp, slap_count, check_frequency) VALUES ('0', '0', '0', '10')";

$inf_insertdbrow[2] = DB_PANELS." (panel_name, panel_filename, panel_side, panel_type, panel_status, panel_order) VALUES ('".$locale['bsp000']."', '".$inf_folder."', '1', 'file', '1', '".(dbcount("(panel_id)",DB_PANELS,"panel_side='1'") ? dbcount("(panel_id)",DB_PANELS,"panel_side='1'")+1 : "1")."')";

$inf_deldbrow[1] = DB_PANELS." WHERE panel_filename='".$inf_folder."' LIMIT 1";

$inf_adminpanel[1] = array(
	"title" => $locale['bsp000'],
	"image" => "botslap.gif",
	"panel" => "admin.php",
	"rights" => "BSP"
);
?>
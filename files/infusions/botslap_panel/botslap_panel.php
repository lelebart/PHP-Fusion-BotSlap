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
| Filename: botslap_panel.php
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
if (!defined("IN_FUSION")) { die("Access Denied"); }

include_once INFUSIONS."botslap_panel/minicore.php";

openside($locale['bsp000']);

$bs = dbarray(dbquery("SELECT * FROM ".DB_BOTSLAP.""));
if ((time() - $bs['last_datestamp']) > ($bs['check_frequency'] * 60)) { botslap_check($bs); }

echo THEME_BULLET." ".$locale['bsp002'].showdate("shortdate", $bs['last_datestamp'])."<br />\n";
echo THEME_BULLET." ".$locale['bsp003'].$bs['slap_count']."<br />\n";
echo THEME_BULLET." ".$locale['bsp004'].$bs['last_id']."\n";

closeside();
?>
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Copyright © 2006 - 2008 Nicolae Crefelean
| http://www.phpfusion.ro/
+--------------------------------------------------------+
| Type: Infusion / Panel
| Name: BotSlap Panel
| Version: 1.02
| Author: Nicolae Crefelean (kneekoo/Nicu)
| Co-Author: Valerio Vendrame (lelebart)
+--------------------------------------------------------+
| Filename: readme-english.txt
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

BOTSLAP PANEL, version 1.02
--------------------------
Made by Nicolae Crefelean, PHP-Fusion Romania - http://www.phpfusion.ro
Co-Author: Valerio Vendrame (lelebart), lelebart@php-fusion.it, http://www.php-fusion.it


DESCRIPTION
-----------
The BotSlap Panel is a response to the most common spam bots of PHP-Fusion.
These bots register on the website and post comments or even shouts
that include links to sites with adult content or other commercial activities.

FUNCTIONALITY
-------------
When activated on one of the sides, this panel checks the database for bots
and if it finds anything they will be deleted, along with their posted spam.
The checks are done each 10 minutes so the load on the database won't be high.

PRE-INSTALLATION
----------------
If you're having a previous BotSlap version installed,
Defuse the old version before continuing.

INSTALLATION
------------
1. Copy the botslap_panel folder to your infusions folder in the root of your
   PHP-Fusion portal.

2. Login as Super Administrator and go to the Admin Panel -> System Admin ->
   -> Infusions, choose "Botslap Panel" from the infusions list then click
   the "Infuse" button. A new panel will be added and activated on left side.
   
3. As stated before, the default time frame between the cleanups is 10 minutes.
   IF you need to adjust this parameter you may do so from the control panel.

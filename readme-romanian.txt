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
| Filename: readme-romanian.txt
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

BOTSLAP PANEL, versiunea 1.02
----------------------------
Realizat de Nicolae Crefelean, PHP-Fusion Romania - http://www.phpfusion.ro
Co-Author: Valerio Vendrame (lelebart), lelebart@php-fusion.it, http://www.php-fusion.it


DESCRIERE
---------
Panoul BotSlap este un raspuns la cei mai intalniti roboti de spam ai PHP-Fusion.
Acestia se inregistreaza pe portal si posteaza comentarii sau chiar shout-uri
care includ legaturi catre site-uri cu continut adult sau alte activitati comerciale.

FUNCTIONALITATEA
----------------
Cand este activat pe una dintre laterale, acest panou verifica baza de date,
cauta robotii si daca gaseste ceva ii sterge, la un loc cu spam-ul postat.
Verificarile sunt efectuate din 10 in 10 minute, deci baza de date nu va fi
suprasolicitata.

INAINTE DE INSTALARE
--------------------
Daca ai instalata o versiune anterioara BotSlap,
de-fuzeaza vechea versiune inainte de a continua.

INSTALARE
---------
1. Copiaza folderul botslap_panel in folderul infusions din radacina portalului.

2. Concteaza-te ca Super Administrator si intra in Panoul de administrare ->
   -> Administrare sistem -> Infuzii, alege "Botslap Panel" din lista de infuzii,
   apoi apasa pe butonul "Infuzeaza". A new panel will be added and activated on left side.

3. Cum am mentionat anterior, intervalul implicit de timp dintre curatari este de 10 minute.
   DACA trebuie sa ajustezi acest parametru, o poti face din panou de control al infuziei.

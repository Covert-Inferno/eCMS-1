<?php
/**
 * Filename: append.php
 * User: 'Barracuda'
 * Date: 06.01.14
 * Time: 15:42
 */

/** Temporary smarty variables for some dummy content */
#$smarty->assign('content', 'Wir sind eine rein deutschsprachige Corporation mit folgenden Interessengebieten:<br /><br />- Mining<br />- Forschung<br />- Produktion &amp; Vertrieb<br />- PvP<br />- Missionen<br /><br />Wir sind eine friedliebende Corporation !!<br />Wissen uns aber auch sehr effektiv gegen jede Bedrohung zu verteidigen !!<br /><br />Wir bieten:<br /><br />- Teamplay<br />- Hilfe &amp; Unterst&uuml;tzung f&uuml;r Neueinsteiger<br />- sehr viele gemeinsame Aktionen<br />- regelm&auml;&szlig;ige Corp/Ally-Events<br />- teilkommunistische Corpstruktur<br />- Aufstiegsm&ouml;glichkeiten<br />- 0.0 Zugang<br />- Teamspeak-Server<br />- Webportal<br />- Forum<br />- Killboard<br />- derben Humor<br />- bodenloses Niveau<br /><br />... und jede Menge Spa&szlig; !! ;-)<br /><br />Bei uns wird nat&uuml;rlich kein Miner zum K&auml;mpfen gezwungen und auch kein Kampfpilot zum Minern. Jeder wird seinen F&auml;higkeiten und Interessen entsprechend gef&ouml;rdert und eingesetzt. Wir haben &uuml;ber 30 aktive und erfahrene Piloten aus allen Bereichen, die Dir jederzeit mit Rat und Tat zur Seite stehen und gerne weiterhelfen. Momentan haben wir einige freie Stellen, die wir noch mit guten und aktiven Spielern besetzen wollen. Interessiert ??<br /><br />Du bist:<br /><br />- teamf&auml;hig<br />- mindestens 21 Jahre alt<br />- erfolgreicher Absolvent der Tutorials<br />- aus der Trialzeit raus<br />- kein Pirat oder Player-Killer<br />- kein Teamspeak-Muffel<br />- kein Freelancer/Einzelg&auml;nger<br /><br />... dann bewirb Dich in unserem Forum,<br /><br />oder schau doch einfach mal ganz unverbindlich in unserem &ouml;ffentlichen Chat &quot;Ger-Ki&quot; vorbei. Dort kannst Du auch gleich ein paar German Kings kennenlernen und etwas plaudern.');

/** Load mainframe template */
$smarty->display('mainframe.tpl');

var_dump($_COOKIE);
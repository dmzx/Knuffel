<?php
/**
*
* @version $Id: common.php 62 2017-02-12 13:36:43Z Scanialady $
* @package phpBB Extension - Knuffel (deutsch)
* @copyright (c) 2020 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ‚ ‘ ’ « » „ “ ” …
//

$lang = array_merge($lang, array(
	'KNUFFEL_EXT_VERSION'		=> 'Version',
	'KNUFFEL_DISABLE_MESSAGE'	=> 'Entschuldigung, aber Knuffel ist momentan abgeschaltet!!',
	'KNUFFEL_NO_HIGHSCORES'		=> 'Aktuell keine Highscores vorhanden',
	'KNUFFEL_PLAYING'			=> 'Spielt momentan Knuffel',
	'KNUFFEL_PLAYERS'			=> 'Anzahl Knuffelspieler %1$s',
	'KNUFFEL_CHEAT'				=> '<strong>Fehler!</strong> Du kannst einen Rekord nur einmal senden!',
	'KNUFFEL_PLAY'				=> 'Knuffel spielen',
	'KNUFFEL_LINKS'				=> 'Knuffellinks',
	'KNUFFEL_BACK_INDEX'		=> 'Zurück zur Forenübersicht',
	'KNUFFEL_HIGHSCORETIME'		=> 'Highscore erreicht',
	'KNUFFEL_NO_HIGHSCORETIME'	=> 'Noch keine Highscorezeit hinterlegt',
	'KNUFFEL_HIGHSCORE'			=> 'Knuffelpunkte',
	'KNUFFEL_RANK'				=> 'Highscore',
	'KNUFFEL_USERGUIDE'			=> 'Benutzeranleitung',
	'KNUFFEL'					=> 'Knuffel',
	'KNUFFEL_SCOREBOARD'		=> 'Punkte',
	'KNUFFEL_ACTUAL_RESULT'		=> 'Erzielte Punkte:',
	'KNUFFEL_PLAY_AGAIN'		=> 'Zurück zu Knuffel',
	'KNUFFEL_POSITION'			=> 'Rang',
	'KNUFFEL_PLAYED'			=> 'Gespielt',
	'KNUFFEL_AVERAGE'			=> 'Durchschnitt',
	'KNUFFEL_HIGHSCORE_NAME'	=> 'Name',
	'KNUFFEL_ALLTIME'			=> 'Alltime Knuffelpunkte',
	'KNUFFEL_SCORE'				=> 'Knuffelscore',

	// Dice
	'DICE'						=> 'Würfeln',
	'TOP_3'						=> 'TOP 3',
	'ONE'						=> 'Einser',
	'TWO'						=> 'Zweier',
	'THREE'						=> 'Dreier',
	'FOUR'						=> 'Vierer',
	'FIVE'						=> 'Fünfer',
	'SIX'				 		=> 'Sechser',
	'TOAK'						=> 'Dreierpasch',
	'FOAK'						=> 'Viererpasch',
	'FH'						=> 'Full House',
	'SMALL'						=> 'Kleine Straße',
	'LARGE'						=> 'Große Straße',
	'CHANCE'					=> 'Chance',
	'SUM1'						=> 'Summe',
	'BONUS'						=> '<b>Bonus</b> (bei 63 oder mehr)<b>:</b>',
	'SUMTOP'					=> 'Summe oberer Teil:',
	'SUM2'						=> 'Summe:',
	'UPPERSUM'					=> 'Summe oberer Teil:',
	'SUM'				 		=> 'Gesamtsumme:',
	'COLUMNSUM'					=> 'Spaltensumme:',
	'FINALSUM'					=> 'Endsumme:',
	'RESULT'					=> 'Ergebnis',

	// Buttons
	'KNU_BUTTON_ROLL'			=> '1. Wurf',
	'KNU_BUTTON_RESET_GAME'		=> 'Neu starten',
	'KNU_BUTTON_UNDO'			=> 'Eintrag zurücksetzen',
	'KNU_BUTTON_HIGHSCORE'		=> 'Punkte senden',
	'KNU_TEXTAREA'				=> 'Willkommen zu Knuffel! Mach deinen ersten Wurf.',

	// Sort options
	'SORT_ALLTIME'				=> 'Alltime',
	'SORT_ASC'					=> 'Aufsteigend',
	'SORT_AVARAGE'				=> 'Durchschnitt',
	'SORT_DATE'					=> 'Datum',
	'SORT_DESC'					=> 'Absteigend',
	'SORT_DIRECTION'			=> 'Sortierrichtung',
	'SORT_KEYS'					=> 'Sortiere nach ',
	'SORT_NAME'					=> 'Name',
	'SORT_POINTS'				=> 'Punkte',
	'SORT_PLAYED'				=> 'Gespielt',

	// UPS
	'KNUFFEL_UPS_PLAY'			=> 'Spiele Knuffel mit %1$s',
	'KNUFFEL_UPS_JACKPOT_SCORE'	=> 'Knuffel-Jackpot',
	'KNUFFEL_UPS_NO_POINTS'		=> 'Du hast nicht genug %1$s um Knuffel zu spielen!',
	'KNUFFEL_UPS_INFO'			=> '<strong>Informationen über die Spielekosten und was du ggf. bei Knuffel gewinnen kannst:</strong>',
	'KNUFFEL_UPS_COST'			=> 'Ein Knuffelspiel kostet:',
	'KNUFFEL_UPS_JACKPOT'		=> 'Momentaner Jackpot: %1$s %2$s',
	'KNUFFEL_UPS_BASE_JACKPOT'	=> 'Basisjackpot: %1$s %2$s',
	'KNUFFEL_UPS_GIVE_JACKPOT'	=> 'Zu erreichende Mindestpunktzahl für die Auszahlung des Jackpots: %1$s Knuffel-Punkte',
	'KNUFFEL_UPS_USERGUIDE'		=> 'Nähere Informationen hierzu findest du in der ',
	'KNUFFEL_UPS_NO_PAYOUT'		=> 'Schade, die erreichten Punkte genügen nicht, um den Jackpot zu knacken.',
	'KNUFFEL_UPS_PAYOUT'		=> 'Gratuliere! Du hast den Jackpot in Höhe von %1$s %2$s geknackt.<br/>Der Gewinn wurde dir gutgeschrieben.',

	// Knuffel Userguide
	'KNU_USERGUIDE'				=> 'Benutzerhilfe',
	'KNU_USERGUIDE_UPS_1'		=> 'Knuffel und %1$s',
	'KNU_USERGUIDE_UPS_2'		=> 'Möglicherweise erhebt der Administrator Kosten für das Spielen von Knuffel.<br/><br/>

									<ul>
									<li><strong>Spielkosten</strong> - Dieser Betrag wird dir bei jedem Spiel von deinen %1$s abgezogen.
									Hast du nicht genügend %1$s, kannst du Knuffel auch nicht spielen.</li>
									<li><strong>Momentaner Jackpot</strong> - Das ist der Jackpot, den man gewinnen kann, wenn man genügend Knuffelpoints erreicht hat.
									Deine Bezahlung in Form von %1$s geht in den Jackpot, so daß dieser ständig erhöht wird, bis ihn jemand geknackt hat.</li>
									<li><strong>Basisjackpot</strong> - Der Basisjackpot ist der Betrag, mit dem der Jackpot wieder aufgefüllt wird, wenn diesen jemand geknackt hat.</li>
									<li><strong>Auszahlung Jackpot</strong> - Der Jackpot wird erst ab einer bestimmten Anzahl von Knuffelpunkten ausbezahlt.
									Der Forenbetreiber stellt diesen Wert ein, erscheint er dir zu hoch, dann wende dich bitte an diesen.
									Der Sinn des ganzen liegt darin, daß man nicht einfach sinnlos würfelt und dann dafür auch noch %1$s bekommen würde.
									Ausserdem ist der Highscore ab einer bestimmten Höhe fast nicht mehr zu knacken.
									Mit dieser Möglichkeit den Jackpot ab einer bestimmten Anzahl Knuffelpunkten auszuspielen,
									besteht also immer die Möglichkeit sich ein paar %1$s zu verdienen, egal wie hoch momentan der Highscore von Knuffel ist.</li>
									</ul>',

	'KNU_USERGUIDE_GENERAL_1'	=> 'Allgemeines',
	'KNU_USERGUIDE_GENERAL_2'	=> 'Knuffel (ein Kniffel-Clone) ist ein Würfelspiel, bei dem es darum geht, bestimmte Figuren zu erwürfeln,
									um eine maximale Punktzahl zu erreichen. Gespielt wird mit 5 Würfeln; in jeder Runde darf man maximal dreimal würfeln.
									Zwischen den Würfen kann man jedoch beliebige Würfel zur Seite legen (markieren) und nur mit den anderen weiterwürfeln.
									Ist dreimal gewürfelt worden (oder ist man schon vorher mit dem Ergebnis zufrieden),
									wird der Wurf an beliebiger Stelle auf der Punktekarte eingetragen. Jedes Feld der Punktekarte kann nur einmal ausgefüllt werden.
									Entspricht der Wurf nicht den Anforderungen eines solchen Feldes, so wird dort ein Strich (= 0 Punkte) eingetragen.
									Pro Runde hat man maximal 3 Würfe zur Verfügung.',

	'KNU_USERGUIDE_POINTS_1'	=> 'Punkte',
	'KNU_USERGUIDE_POINTS_2'	=> '<ul>
									<li><strong>Einser - Sechser</strong> - Es wird einfach die Summe aller Würfel notiert, welche die entsprechende Augenzahl tragen.</li>
									<li><strong>Dreierpasch / Viererpasch</strong> - Augensumme - Gültig, wenn eine Augenzahl mindestens 3- bzw. 4-mal vorkommt.</li>
									<li><strong>Full House</strong> - Immer 25 Punkte - Gültig, wenn eine Augenzahl 3-mal und eine andere (!) 2-mal vorkommt.</li>
									<li><strong>Kleine Straße / Große Straße</strong> - Immer 30 bzw. 40 Punkte
									- Gültig, wenn mindestens 4 bzw. 5 aufeinanderfolgende Augenzahlen je mindestens einmal vorkommen.
									Die Reihenfolge der Würfel spielt dabei freilich keine Rolle.</li>
									<li><strong>Knuffel</strong> - Immer 50 Punkte - Gültig, wenn alle 5 Würfel die gleiche Augenzahl haben.</li>
									<li><strong>Chance</strong> - Augensumme - Es wird einfach die Augensumme notiert.
									Dieses Feld ist vor allem dazu da, um Würfe aufzuschreiben, die sonst nirgends hineinpassen.</li>
									<li><strong>Bonus</strong> - Auf die oberen Felder (Einser - Sechser) wird ein Bonus von 35 Punkten aufgeschlagen,
									wenn sie zusammen 63 Punkte oder mehr enthalten. Dies entspricht genau je drei Würfeln von jeder Sorte.</li></ul>',

	'KNU_USERGUIDE_COLUMNS_1'	=> 'Drei Spalten',
	'KNU_USERGUIDE_COLUMNS_2'	=> 'Das Spielfeld besteht aus drei Spalten, deren Spaltensumme mit unterschiedlichen Faktoren multipliziert wird, um ein Endergebnis zu ermitteln:<br/><br/>
									Spalte 1: Summe * 1<br/>
									Spalte 2: Summe * 2<br/>
									Spalte 3: Summe * 3<br/><br/>
									Die Reihenfolge, in der die einzelnen Ergebnisse der Würfelrunden in die einzelnen Felder eingetragen werden, ist völlig beliebig.',

));

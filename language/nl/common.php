<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* Nederlandse vertaling @ Solidjeuh <https://www.froddelpower.be>
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
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'KNUFFEL_EXT_VERSION'		=> 'Versie',
	'KNUFFEL_DISABLE_MESSAGE'	=> 'Sorry, het Yahtzee spel is momenteel uitgeschakeld!',
	'KNUFFEL_NO_HIGHSCORES'		=> 'Er zijn momenteel geen highscores',
	'KNUFFEL_PLAYING'			=> 'Speelt Yahtzee',
	'KNUFFEL_CHEAT'				=> '<strong>Fout!</strong> Je kan maar 1 keer een score verzenden!',
	'KNUFFEL_PLAYERS'			=> 'Yahtzee spelers %1$s',
	'KNUFFEL_PLAY'				=> 'Speel Yahtzee',
	'KNUFFEL_LINKS'				=> 'Yahtzee links',
	'KNUFFEL_BACK_INDEX'		=> 'Terug naar forum index',
	'KNUFFEL_HIGHSCORETIME'		=> 'Highscore bereikt',
	'KNUFFEL_NO_HIGHSCORETIME'	=> 'Geen highscore tijd',
	'KNUFFEL_HIGHSCORE'			=> 'Yahtzee punten',
	'KNUFFEL_RANK'				=> 'Highscore',
	'KNUFFEL_USERGUIDE'			=> 'Gebruikersgids',
	'KNUFFEL'					=> 'Yahtzee',
	'KNUFFEL_SCOREBOARD'		=> 'Punten',
	'KNUFFEL_ACTUAL_RESULT'		=> 'Punten bereikt:',
	'KNUFFEL_PLAY_AGAIN'		=> 'Ga terug naar Yahtzee',
	'KNUFFEL_POSITION'			=> 'Rang',
	'KNUFFEL_PLAYED'			=> 'Gespeeld',
	'KNUFFEL_AVERAGE'			=> 'Gemiddelde',
	'KNUFFEL_HIGHSCORE_NAME'	=> 'Naam',
	'KNUFFEL_ALLTIME'			=> 'Alle-tijden Yahtzee punten',
	'KNUFFEL_SCORE'				=> 'Yahtzee score',

	// Dice
	'DICE'						=> 'Gooi dobbelstenen',
	'TOP_3'						=> 'TOP 3',
	'ONE'						=> 'Enen',
	'TWO'						=> 'Twee&euml;n',
	'THREE'						=> 'Drie&euml;n',
	'FOUR'						=> 'Vieren',
	'FIVE'						=> 'Vijven',
	'SIX'				 		=> 'Zessen',
	'TOAK'						=> 'Drie dezelfde',
	'FOAK'						=> 'Vier dezelfde',
	'FH'						=> 'Full House',
	'SMALL'						=> 'Kleine straat',
	'LARGE'						=> 'Grote straat',
	'CHANCE'					=> 'Kans',
	'SUM1'						=> 'Som',
	'BONUS'						=> '<b>Bonus</b> (als 63 of meer)<b>:</b>',
	'SUMTOP'					=> 'Som Top:',
	'SUM2'						=> 'Som:',
	'UPPERSUM'					=> 'Som Top:',
	'SUM'				 		=> 'Totaal:',
	'COLUMNSUM'					=> 'Som kolom:',
	'FINALSUM'					=> 'Eind Score:',
	'RESULT'					=> 'Resultaat',

	// Buttons
	'KNU_BUTTON_ROLL'			=> '1ste worp',
	'KNU_BUTTON_RESET_GAME'		=> 'Herstart',
	'KNU_BUTTON_UNDO'			=> 'Annuleer laatste invoer',
	'KNU_BUTTON_HIGHSCORE'		=> 'Verzend score',
	'KNU_TEXTAREA'				=> 'Welkom bij Yahtzee! Doe je eerste worp.',

	// Sort options
	'SORT_ALLTIME'				=> 'Alle-tijden',
	'SORT_ASC'					=> 'Oplopend',
	'SORT_AVARAGE'				=> 'Gemiddelde',
	'SORT_DATE'					=> 'Datum',
	'SORT_DESC'					=> 'Aflopend',
	'SORT_DIRECTION'			=> 'Sorteer richting',
	'SORT_KEYS'					=> 'Sorteer op ',
	'SORT_NAME'					=> 'Naam',
	'SORT_POINTS'				=> 'Punten',
	'SORT_PLAYED'				=> 'Gespeeld',

	// UPS
	'KNUFFEL_UPS_PLAY'			=> 'Speel Yahtzee met %1$s',
	'KNUFFEL_UPS_JACKPOT_SCORE'	=> 'Yahtzee Jackpot',
	'KNUFFEL_UPS_NO_POINTS'		=> 'Je hebt niet genoeg %1$s om Yahtzee te spelen!',
	'KNUFFEL_UPS_INFO'			=> '<strong>-Informatie over de Yahtzee kosten en wat je kan winnen:</strong>',
	'KNUFFEL_UPS_COST'			=> 'Spel kosten:',
	'KNUFFEL_UPS_JACKPOT'		=> 'Huidige Jackpot: %1$s %2$s',
	'KNUFFEL_UPS_BASE_JACKPOT'	=> 'Basis Jackpot: %1$s %2$s',
	'KNUFFEL_UPS_GIVE_JACKPOT'	=> 'Uitbetaling van de jackpot als je ten minste: %1$s Yahtzee punten bereikt',
	'KNUFFEL_UPS_USERGUIDE'		=> 'Gedetailleerde informatie kan je vinden in de ',
	'KNUFFEL_UPS_NO_PAYOUT'		=> 'Sorry, de behaalde punten zijn niet hoog genoeg om de jackpot te winnen',
	'KNUFFEL_UPS_PAYOUT'		=> 'Gefeliciteerd! Je won de jackpot van %1$s %2$s.<br/>De jackpot werd overgeschreven naar je account!.',

	// Knuffel Userguide
	'KNU_USERGUIDE'				=> 'Gebruikersgids',
	'KNU_USERGUIDE_UPS_1'		=> 'Yahtzee en %1$s',
	'KNU_USERGUIDE_UPS_2'		=> 'Waarschijnlijk heeft de administrator kosten ingesteld om Yahtzee te spelen.<br/><br/>

									<ul>
									<li><strong>Speel kosten</strong> - Dit bedrag zal afgetrokken worden van je %1$s.
									Als je niet genoeg %1$s hebt kan je geen Yahtzee spelen.</li>
									<li><strong>Huidige Jackpot</strong> - Dit is de jackpot die je kan winnen als je genoeg Yahtzee punten bereikt.
									Je %1$s kosten om Yahtzee te spelen zullen naar de jackpot gaan en de jackpot zal blijven stijgen tot iemand genoeg punten haalt om deze te winnen.</li>
									<li><strong>Basis Jackpot</strong> - Deze waarde zal ingesteld worden na een uitbetaling van de jackpot.</li>
									<li><strong>Jackpot Uitbetaling</strong> - De jackpot zal enkel uitbetaald worden als iemand deze waarde bereikt.
									De beheerder kiest deze waarde. Indien je denkt dat deze te hoog is, contacteer dan de beheerder.
									Het belangrijkste idee achter dit is om te voorkomen dat mensen simpelweg spelen zonder het leuke speel gevoel, en enkel maar %1$s willen winnen..
									Daarnaast is de highscore bijna onbreekbaar als deze te hoog is..
									Daarom zal je soms nog %1$s krijgen zonder dat je de highscore moet verbreken..</li>
									</ul>',

	'KNU_USERGUIDE_GENERAL_1'	=> 'Introductie',
	'KNU_USERGUIDE_GENERAL_2'	=> 'Yahtzee (Kniffel-Clone, ook gekend als Knuffel of dicepoker) is een spel met dobbelstenen waarmee het doel is om bepaalde figuren te gooien
									en een maximum score te bereiken. Het wordt gespeeld met 5 dobbelstenen.
									In iedere ronde mag je de dobbelstenen 3 keer gooien.
									Niettemin, tussen de worpen kan je dobbelstenen apart leggen, en werpen met de dobbelstenen die je nog over hebt..
									Als je de dobbelstenen drie keer gooit (of je bent tevreden met het huidige resultaat) moet je de score invullen op een plek in de score tabel.
									Ieder veld in de score tabel kan maar 1 keer gebruikt worden.
									Indien de worp niet overeenkomt met de vereisten van een veld, moet dat veld doorstreept worden.
									Je mag maar drie keer gooien per ronde.',

	'KNU_USERGUIDE_POINTS_1'	=> 'Punten',
	'KNU_USERGUIDE_POINTS_2'	=> '<ul>
									<li><strong>&Eacute;&eacute;n - Zes</strong> - Het is simpel de som optellen van alle dobbelstenen welke de geschikte getallen bevatten.</li>
									<li><strong>Drie / Vier dezelfde</strong> - Tel de som op van alle dobbelstenen - Geldig wanneer je hetzelfde getal ten minste 3 of 4 keer gooit.</li>
									<li><strong>Full House</strong> - Altijd 25 punten - Geldig wanneer je drie dobbelstenen gooit met hetzelfde getal en twee dobbelstenen met een ander (zelfde) getal.</li>
									<li><strong>Kleine / Grote straat</strong> - 30 / 40 punten - Geldig wanneer je ten minste 4 / 5 opeenvolgende getallen gooit.
									De volgorde van de gespeelde worpen speelt trouwens geen enkele rol.</li>
									<li><strong>Yahtzee</strong> - Altijd 50 punten - Geldig wanneer alle dobbelstenen hetzelfde getal bevatten.</li>
									<li><strong>Kans</strong> - Je kan alle getallen van de dobbelstenen optellen. - Gebruik gewoon deze som.
									Dit veld is er vooral om worpen te noteren die in geen enkel ander veld passen.</li>
									<li><strong>Bonus</strong> - In de bovenste velden van de tabel (&Eacute;&eacute;n - Zes)
									Je ontvangt een extra bonus van 35 punten indien de som van de kolom 63 punten of meer is.
									Dit komt precies overeen met de som als je drie dobbelstenen van elke soort werpt ..</li></ul>',

	'KNU_USERGUIDE_COLUMNS_1'	=> 'Drie kolommen',
	'KNU_USERGUIDE_COLUMNS_2'	=> 'De tabel bestaat uit die kolommen. De som van iedere kolom is vermenigvuldigd met verschillende factoren om de eindresultaten te bepalen.:<br/><br/>
									Kolom 1: Som * 1 <br/>
									Kolom 2: Som * 2<br/>
									Kolom 3: Som * 3<br/><br/>
									De volgorde waarin een resultaat van je worpen neergezet wordt op de tabel is volledig naar jouw keuze.
									Voel je vrij om ze in elke kolom te plaatsen.',

));

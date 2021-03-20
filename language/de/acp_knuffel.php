<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

// Create the lang array if it does not already exist
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
// Some characters for use
// ‚ ‘ ’ « » „ “ ” …

$lang = array_merge($lang, array(
	// Settings
	'KNUFFEL_TITLE'						=> 'Knuffel',
	'KNUFFEL_ENABLE'					=> 'Aktiviere Knuffel:',
	'KNUFFEL_ENABLE_EXPLAIN'			=> 'Hier kannst du Knuffel aktivieren/deaktivieren',
	'KNUFFEL_PAGINATION'				=> 'Seiteneinstellung:',
	'KNUFFEL_PAGINATION_EXPLAIN'		=> 'Die Anzahl der anzuzeigenden Rekorde in den Highscorelisten je Seite',
	'KNUFFEL_PAGINATION_ERROR'			=> 'Du kannst keinen Wert kleiner als 3 eingeben (max 999)!',
	'KNUFFEL_TITLE_EXPLAIN'				=> 'Hier kannst Du die Highscoreliste komplett löschen oder nur die aktuellen Scores löschen und die Alltime Highscores bestehen lassen (empfohlen).',
	'KNUFFEL_DELETE'					=> 'Highscoreliste löschen',
	'KNUFFEL_DELETE_ATTENTION'			=> 'Die folgenden Aktionen können nicht rückgängig gemacht werden!',
	'KNUFFEL_DELETE_CONFIRM'			=> 'Willst du wirklich die Knuffel Highscores zurücksetzen?',
	'KNUFFEL_DELETE_EXPLAIN'			=> 'Hier kannst du die aktuelle Highscoreliste löschen, der Alltime Highscore bleibt bestehen.',
	'KNUFFEL_DELETE_ALL'				=> 'Lösche alle Highscorelisten, Alltime Rekorde eingeschlossen',
	'KNUFFEL_DELETE_ALL_CONFIRM'		=> 'Willst du wirklich alle Knuffelhighscores zurücksetzen? Du löscht dadurch alle vorhandenen Highscores inclusive der Alltime Highscores!',
	'KNUFFEL_DELETE_ALL_EXPLAIN'		=> 'Hier löscht du die komplette Highscoreliste inclusive dem Alltime Highscore.',
	'KNUFFEL_DELETE_BUTTON'				=> 'Löschen',
	'KNUFFEL_DELETE_SUCCESSFULL'		=> 'Highscores erfolgreich gelöscht',
	'KNUFFEL_HIGHSCORE_DELETE'			=> 'Highscores löschen',
	'KNUFFEL_SETTINGS_EXPLAIN'			=> 'Hier kannst du die allgemeinen Einstellungen für Knuffel vornehmen',
	'KNUFFEL_CONFIG_SUCCESS'			=> 'Die Einstellungen wurden erfolgreich aktualisiert',
));

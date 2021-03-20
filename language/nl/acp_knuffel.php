<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* Nederlandse vertaling @ Solidjeuh <https://www.froddelpower.be>
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
// ’ » “ ” …

$lang = array_merge($lang, array(
	// Settings
	'KNUFFEL_TITLE'						=> 'Yahtzee',
	'KNUFFEL_ENABLE'					=> 'Schakel Yahtzee in:',
	'KNUFFEL_ENABLE_EXPLAIN'			=> 'Hier kan je Yahtzee in/uit schakelen',
	'KNUFFEL_PAGINATION'				=> 'paginering:',
	'KNUFFEL_PAGINATION_EXPLAIN'		=> 'Vul hier in hoeveel inzendingen je wil zien in de highscore lijst per pagina',
	'KNUFFEL_PAGINATION_ERROR'			=> 'Je kan geen waarde opgeven die lager is dan 3 (Max 999)!',
	'KNUFFEL_TITLE_EXPLAIN'				=> 'Hier kan je de volledige highscore lijst verwijderen of enkel de huidige lijst, en de “Alle Tijden” highscores laten staan (Aangeraden)',
	'KNUFFEL_DELETE'					=> 'Verwijder highscore lijst',
	'KNUFFEL_DELETE_ATTENTION'			=> 'Volgende acties kunnen niet ongedaan gemaakt worden!!',
	'KNUFFEL_DELETE_CONFIRM'			=> 'Ben je zeker dat je de Yahtzee highscore wil verwijderen?',
	'KNUFFEL_DELETE_EXPLAIN'			=> 'Hier kan je de huidige highscore verwijderen. De “Alle Tijden” waarden blijven intact.',
	'KNUFFEL_DELETE_ALL'				=> 'Verwijder alle highscore lijsten inclusief de “Alle Tijden” records.',
	'KNUFFEL_DELETE_ALL_CONFIRM'		=> 'Ben je zeker dat je de volledige highscore lijst wil resetten? De “Alle Tijden” highscores zullen ook verwijderd worden!',
	'KNUFFEL_DELETE_ALL_EXPLAIN'		=> 'Hier kan je alle highscores lijsten verwijderen. Inclusief de “Alle Tijden” records',
	'KNUFFEL_DELETE_BUTTON'				=> 'Verwijder',
	'KNUFFEL_DELETE_SUCCESSFULL'		=> 'De highscores werden succesvol verwijderd',
	'KNUFFEL_HIGHSCORE_DELETE'			=> 'Verwijder highscores',
	'KNUFFEL_SETTINGS_EXPLAIN'			=> 'Hier kan je de Yahtzee basis instellingen configureren',
	'KNUFFEL_CONFIG_SUCCESS'			=> 'De instellingen werden succesvol geupdate',
));

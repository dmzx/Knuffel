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
	'ACP_KNUFFEL'						=> 'Yahtzee',
	'ACP_KNUFFEL_SETTINGS'				=> 'Yahtzee instellingen',
	// Logs
	'LOG_KNUFFEL_DELETE_HIGHSCORES'		=> '<strong>Yahtzee highscores werden verwijderd</strong>',
	'LOG_KNUFFEL_DELETE_ALL_HIGHSCORES'	=> '<strong>Yahtzee highscores en “Alle Tijden” highscores werden verwijderd</strong>',
	'LOG_KNUFFEL_POINTS'				=> '<strong>Yahtzee punten instellingen werden geupdate</strong>',
	'LOG_KNUFFEL_SETTINGS'				=> '<strong>Yahtzee instellingen geupdate</strong>',
));

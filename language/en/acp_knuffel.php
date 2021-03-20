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
// ’ » “ ” …

$lang = array_merge($lang, array(
	// Settings
	'KNUFFEL_TITLE'						=> 'Knuffel',
	'KNUFFEL_ENABLE'					=> 'Enable Knuffel:',
	'KNUFFEL_ENABLE_EXPLAIN'			=> 'Here you can enable/disable Knuffel',
	'KNUFFEL_PAGINATION'				=> 'Pagination:',
	'KNUFFEL_PAGINATION_EXPLAIN'		=> 'Enter here, how much entries you like to see in the high score list per page',
	'KNUFFEL_PAGINATION_ERROR'			=> 'You cannot	enter a value below 3 (max 999)!',
	'KNUFFEL_TITLE_EXPLAIN'				=> 'Here you can delete either all high score lists or only the current list and leave the All time highscores (recommended)',
	'KNUFFEL_DELETE'					=> 'Delete high score lists',
	'KNUFFEL_DELETE_ATTENTION'			=> 'Following actions cannot be re-done!!',
	'KNUFFEL_DELETE_CONFIRM'			=> 'Are you sure, you want to delete the Knuffel highscores?',
	'KNUFFEL_DELETE_EXPLAIN'			=> 'Here you can delete the current highscores. The all time values remain intact.',
	'KNUFFEL_DELETE_ALL'				=> 'Delete all highscore lists including the Alltime records',
	'KNUFFEL_DELETE_ALL_CONFIRM'		=> 'Are you sure you want to reset all highscore lists? The alltime highscores will be deleted too!',
	'KNUFFEL_DELETE_ALL_EXPLAIN'		=> 'Here you can delete all highscore lists incl. the alltime records',
	'KNUFFEL_DELETE_BUTTON'				=> 'Delete',
	'KNUFFEL_DELETE_SUCCESSFULL'		=> 'The highscores were deleted successfully',
	'KNUFFEL_HIGHSCORE_DELETE'			=> 'Delete highscores',
	'KNUFFEL_SETTINGS_EXPLAIN'			=> 'Here you can configure the basic Knuffel settings',
	'KNUFFEL_CONFIG_SUCCESS'			=> 'The settings were updated successfully',
));

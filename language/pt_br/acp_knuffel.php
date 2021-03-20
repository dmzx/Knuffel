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
	'KNUFFEL_TITLE'						=> 'General',
	'KNUFFEL_ENABLE'					=> 'Habilita General:',
	'KNUFFEL_ENABLE_EXPLAIN'			=> 'Aqui você pode habilitar/desabilitar o jogo General',
	'KNUFFEL_PAGINATION'				=> 'Paginação:',
	'KNUFFEL_PAGINATION_EXPLAIN'		=> 'Entre aqui a quantidade de records por página',
	'KNUFFEL_PAGINATION_ERROR'			=> 'Valores aceitos estão entre 3 e 999!',
	'KNUFFEL_TITLE_EXPLAIN'				=> 'Aqui você pode excluir todos as os records ou somente o atual mantendo o record histórico (recommendado)',
	'KNUFFEL_DELETE'					=> 'Excluir records',
	'KNUFFEL_DELETE_ATTENTION'			=> 'As seguintes ações não podem ser desfeitas!!',
	'KNUFFEL_DELETE_CONFIRM'			=> 'Tem certeza que quer excluir os records do General?',
	'KNUFFEL_DELETE_EXPLAIN'			=> 'Aqui você pode excluir os records atuais. O record histórico permanecerá.',
	'KNUFFEL_DELETE_ALL'				=> 'Excluir todos os records incluindo o histórico',
	'KNUFFEL_DELETE_ALL_CONFIRM'		=> 'Tem certeza que quer excluir todos os records? O record histórico será apagado também!',
	'KNUFFEL_DELETE_ALL_EXPLAIN'		=> 'Aqui você pode excluir todos os records incluindo o histórico',
	'KNUFFEL_DELETE_BUTTON'				=> 'Excluir',
	'KNUFFEL_DELETE_SUCCESSFULL'		=> 'Record excluídos com sucesso',
	'KNUFFEL_HIGHSCORE_DELETE'			=> 'Excluir records',
	'KNUFFEL_SETTINGS_EXPLAIN'			=> 'Aqui você pode configurar as opções básicas do General',
	'KNUFFEL_CONFIG_SUCCESS'			=> 'As configurações foram atualizadas com sucesso',
));

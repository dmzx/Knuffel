<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\migrations;

class knuffel_module extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_KNUFFEL')),
			array('module.add', array(
			'acp', 'ACP_KNUFFEL', array(
					'module_basename'	=> '\dmzx\knuffel\acp\knuffel_module', 'modes' => array('edit_knuffel'),
				),
			)),
		);
	}
}

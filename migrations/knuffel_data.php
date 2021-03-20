<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\migrations;

class knuffel_data extends \phpbb\db\migration\migration
{
	var $ext_version = '1.0.1';

	public function update_data()
	{
		return array(

			// Add config
			array('config.add', array('knuffel_version', $this->ext_version)),

			// Add permission
			array('permission.add', array('u_use_knuffel', true)),

			// Set permission
			array('permission.permission_set', array('REGISTERED', 'u_use_knuffel', 'group')),
		);
	}
}

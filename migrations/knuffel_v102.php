<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\migrations;

class knuffel_v102 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array(
			'\dmzx\knuffel\migrations\knuffel_data',
		);
	}

	public function update_data()
	{
		return array(
			array('config.update', array('knuffel_version', '1.0.2')),
		);
	}
}

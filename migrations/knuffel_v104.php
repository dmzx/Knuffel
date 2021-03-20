<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2021 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\migrations;

class knuffel_v104 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\dmzx\knuffel\migrations\knuffel_v103',
		];
	}

	public function update_data()
	{
		return [
			['config.update', ['knuffel_version', '1.0.4']],
		];
	}
}

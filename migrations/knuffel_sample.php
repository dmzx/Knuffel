<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\migrations;

class knuffel_sample extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array(
			'\dmzx\knuffel\migrations\knuffel_schema',
		);
	}

	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'insert_sample_data'))),
		);
	}

	public function insert_sample_data()
	{
		// Define sample rule data
		$sample_data = array(
			array(
				'knuffel_enable' 		=> '1',
				'knuffel_pagination' 	=> '10',
				'knuffel_cost' 			=> '1.00',
				'knuffel_base_jackpot' 	=> '50.00',
				'knuffel_jackpot' 		=> '50.00',
				'knuffel_give_jackpot' 	=> '1900',
				),
		);

		// Insert sample PM data
		$this->db->sql_multi_insert($this->table_prefix . 'knuffel_config', $sample_data);
	}
}

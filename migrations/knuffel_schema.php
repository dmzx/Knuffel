<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\migrations;

class knuffel_schema extends \phpbb\db\migration\migration
{
	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
				$this->table_prefix . 'knuffel'	=> array(
					'COLUMNS'	=> array(
						'user_id'		=> array('UINT', 0),
						'score'			=> array('UINT', 0),
						'score_time'	=> array('INT:11', 0),
						'alltime'		=> array('UINT', 0),
						'played'		=> array('UINT', 0),
						'average'		=> array('UINT', 0),
						'playing'		=> array('UINT', 0),
					),
					'PRIMARY_KEY'	=> 'user_id',
				),
				$this->table_prefix . 'knuffel_config'	=> array(
					'COLUMNS'	=> array(
						'knuffel_enable'				=> array('UINT:1', 1),
						'knuffel_pagination'			=> array('UINT:3', 10),
						'knuffel_cost'					=> array('DECIMAL:10', 1.00),
						'knuffel_base_jackpot'			=> array('DECIMAL:10', 50.00),
						'knuffel_jackpot'				=> array('DECIMAL:20', 0.00),
						'knuffel_give_jackpot'			=> array('UINT:10', 1900),
					),
				),
			),
		);
	}

	public function revert_schema()
	{
		return 	array(
			'drop_tables' => array(
				$this->table_prefix . 'knuffel',
				$this->table_prefix . 'knuffel_config',
			),
		);
	}
}

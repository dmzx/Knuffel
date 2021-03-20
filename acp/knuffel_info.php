<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\acp;

class knuffel_info
{
	function module()
	{
		 return array(
			'filename'		=> '\dmzx\knuffel\acp\knuffel_module',
			'title'			=> 'ACP_DM_QC',
			'modes'			=> array(
				'edit_knuffel'	=> array(
					'title'	=> 'ACP_KNUFFEL_SETTINGS',
					'auth' 	=> 'ext_dmzx/knuffel && acl_a_board',
					'cat' 	=> array('ACP_KNUFFEL'),
			)),
		);
	}
}

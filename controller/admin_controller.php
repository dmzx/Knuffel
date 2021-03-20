<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\controller;

use phpbb\config\config;
use phpbb\template\template;
use phpbb\log\log_interface;
use phpbb\user;
use phpbb\request\request_interface;
use phpbb\db\driver\driver_interface as db_interface;

class admin_controller
{
	/** @var config */
	protected $config;

	/** @var template */
	protected $template;

	/** @var log_interface */
	protected $log;

	/** @var user */
	protected $user;

	/** @var request_interface */
	protected $request;

	/** @var db_interface */
	protected $db;

	/** @var string */
	protected $knuffel_table;

	/** @var string */
	protected $knuffel_config_table;

	/** @var string Custom form action */
	protected $u_action;

	/**
	 * Constructor
	 *
	 * @param config				$config
	 * @param template				$template
	 * @param log_interface			$log
	 * @param user					$user
	 * @param request_interface		$request
	 * @param db_interface			$db
	 * @param string				$knuffel_table
	 * @param string				$knuffel_config_table
	 */
	public function __construct(
		config $config,
		template $template,
		log_interface $log,
		user $user,
		request_interface $request,
		db_interface $db,
		$knuffel_table,
		$knuffel_config_table
	)
	{
		$this->config 				= $config;
		$this->template 			= $template;
		$this->log 					= $log;
		$this->user 				= $user;
		$this->request 				= $request;
		$this->db 					= $db;
		$this->knuffel_table 		= $knuffel_table;
		$this->knuffel_config_table = $knuffel_config_table;
	}

	/**
	* Display the options a user can configure for this extension
	*
	* @return null
	* @access public
	*/
	public function display_options()
	{
		$this->user->add_lang_ext('dmzx/knuffel', 'acp_knuffel');

		add_form_key('acp_knuffel');

		// Read out config table
		$sql = 'SELECT *
			FROM ' . $this->knuffel_config_table;
		$result = $this->db->sql_query($sql);
		$knuffel_values = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		// Set Values for radio checkbox
		$this->template->assign_vars(array_change_key_case($knuffel_values, CASE_UPPER));

		if ($this->request->is_set_post('action_knuffel_settings'))
		{
			// Values for knuffel_config
			$sql_ary = array (
				'knuffel_pagination'	=> $this->request->variable('knuffel_pagination', 0),
				'knuffel_enable'		=> $this->request->variable('knuffel_enable', 0),
			);

			// Check if paginationis at least 3
			$check_user = $this->request->variable('knuffel_pagination', 0);
			if ($check_user < 3)
			{
				trigger_error($this->user->lang['KNUFFEL_PAGINATION_ERROR'] . adm_back_link($this->u_action), E_USER_WARNING);
			}

			// Update values in phpbb_knuffel_values
			$sql = 'UPDATE ' . $this->knuffel_config_table . ' SET ' . $this->db->sql_build_array('UPDATE', $sql_ary);
			$this->db->sql_query($sql);

			$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_KNUFFEL_SETTINGS');
			trigger_error($this->user->lang['KNUFFEL_CONFIG_SUCCESS'] . adm_back_link($this->u_action));
		}
		else
		{
			$this->template->assign_vars(array(
				'KNUFFEL_PAGINATION'	=> $knuffel_values['knuffel_pagination'],
				'U_BACK'				=> $this->u_action,
				'KNUFFEL_VERSION'		=> $this->config['knuffel_version'],
			));
		}

		if ($this->request->is_set_post('delete'))
		{
			if (confirm_box(true))
			{
				$this->db->sql_query('UPDATE ' . $this->knuffel_table . '
					SET score = 0,
					score_time = 0,
					played = 0,
					average = 0 '
				);

				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_KNUFFEL_DELETE_HIGHSCORES');
				trigger_error($this->user->lang['KNUFFEL_DELETE_SUCCESSFULL'] . adm_back_link($this->u_action));
			}
			// Create a confirmbox with yes and no.
			else
			{
				$s_hidden_fields = build_hidden_fields(array(
					'delete'		=> true,
					)
				);

				// Display mode
				confirm_box(false, $this->user->lang['KNUFFEL_DELETE_CONFIRM'], $s_hidden_fields);
			}
		}

		if ($this->request->is_set_post('deleteall'))
		{
			if (confirm_box(true))
			{
				$this->db->sql_query('DELETE FROM ' . $this->knuffel_table);

				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_KNUFFEL_DELETE_ALL_HIGHSCORES');
				trigger_error($this->user->lang['KNUFFEL_DELETE_SUCCESSFULL'] . adm_back_link($this->u_action));
			}
			// Create a confirmbox with yes and no.
			else
			{
				$s_hidden_fields = build_hidden_fields(array(
					'deleteall'		=> true,
					)
				);

				// Display mode
				confirm_box(false, $this->user->lang['KNUFFEL_DELETE_ALL_CONFIRM'], $s_hidden_fields);
			}
		}
	}

	/**
	* Set page url
	*
	* @param string $u_action Custom form action
	* @return null
	* @access public
	*/
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}
}

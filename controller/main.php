<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\controller;

use phpbb\template\template;
use phpbb\user;
use phpbb\auth\auth;
use phpbb\db\driver\driver_interface as db_interface;
use phpbb\request\request_interface;
use phpbb\config\config;
use phpbb\controller\helper;
use phpbb\cache\service as cache_interface;
use phpbb\pagination;
use phpbb\extension\manager;

class main
{
	/** @var template */
	protected $template;

	/** @var user */
	protected $user;

	/** @var auth */
	protected $auth;

	/** @var db_interface */
	protected $db;

	/** @var request_interface */
	protected $request;

	/** @var config */
	protected $config;

	/** @var helper */
	protected $helper;

	/** @var pagination */
	protected $pagination;

	/** @var manager */
	protected $extension_manager;

	/** @var string */
	protected $root_path;

	/** @var string */
	protected $php_ext;

	/** @var string */
	protected $knuffel_table;

	/** @var string */
	protected $knuffel_config_table;

	/**
	* Constructor
	*
	* @param template		 	$template
	* @param user				$user
	* @param auth				$auth
	* @param db_interface		$db
	* @param request_interface	$request
	* @param config				$config
	* @param helper		 		$helper
	* @param pagination			$pagination
	* @param manager 			$extension_manager
	* @param string				$root_path
	* @param string				$php_ext
	* @param string				$knuffel_table
	* @param string				$knuffel_config_table
	*
	*/
	public function __construct(
		template $template,
		user $user,
		auth $auth,
		db_interface	$db,
		request_interface $request,
		config $config,
		helper $helper,
		pagination $pagination,
		manager $extension_manager,
		$root_path,
		$php_ext,
		$knuffel_table,
		$knuffel_config_table
	)
	{
		$this->template 			= $template;
		$this->user 				= $user;
		$this->auth 				= $auth;
		$this->db 					= $db;
		$this->request 				= $request;
		$this->config 				= $config;
		$this->helper 				= $helper;
		$this->pagination 			= $pagination;
		$this->extension_manager	= $extension_manager;
		$this->root_path 			= $root_path;
		$this->php_ext 				= $php_ext;
		$this->knuffel_table 		= $knuffel_table;
		$this->knuffel_config_table = $knuffel_config_table;

		$this->assign_authors();
	}

	public function handle_knuffel()
	{
		if (!$this->user->data['is_registered'])
		{
			if ($this->user->data['is_bot'])
			{
				redirect(append_sid("{$this->root_path}index.$this->php_ext"));
			}
			login_box('', $this->user->lang['LOGIN_INFO']);
		}

		$board_url = generate_board_url() . '/';

		//Check if you are locked or not
		if (!$this->auth->acl_get('u_use_knuffel'))
		{
			trigger_error('NOT_AUTHORISED');
		}

		// Read out config values
		$sql = 'SELECT *
			FROM ' . $this->knuffel_config_table;
		$result = $this->db->sql_query($sql);
		$knuffel_values = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		// Check if knuffel is enabled
		if ($knuffel_values['knuffel_enable'] == '0')
		{
			trigger_error($this->user->lang['KNUFFEL_DISABLE_MESSAGE']);
		}

		// Start switching the mode...
		$mode = $this->request->variable('mode', 'knuffel');

		switch ($mode)
		{
			// Knuffel Start
			case 'knuffel':

				$page_title = $this->user->lang['KNUFFEL'];
				$template_html = 'knuffel.html';

				// Show Top 3
				$i = 1;
				$sql_array = array(
					'SELECT'	=> 'u.user_id, u.username, u.user_colour, k.*',

					'FROM'		=> array(
					USERS_TABLE	=> 'u',
				),

				'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array($this->knuffel_table => 'k'),
					'ON'	=> 'u.user_id = k.user_id'
					),
				),

					'WHERE'		=> 'k.score > 0',
					'ORDER_BY'	=> 'k.score DESC, k.average DESC',
				);

				$sql = $this->db->sql_build_query('SELECT', $sql_array);
				$result = $this->db->sql_query_limit($sql, 3);

				while ($row = $this->db->sql_fetchrow($result))
				{
					$highscore_position = "<img src='" . $board_url. "ext/dmzx/knuffel/knuffel/images/rank/".$i.".gif' alt='*' />";

					$this->template->assign_block_vars('highscore', array(
						'POSITION'	=> $highscore_position,
						'NAME'		=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
						'POINTS'	=> $row['score'],
					));
					$i++;
				}
				$this->db->sql_freeresult($result);

				$this->template->assign_vars(array(
					'S_KNUFFEL'				=> true,
					'U_KNUFFEL_PLAY'		=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'knuffel_play')),
					'U_KNUFFEL_HIGHSCORE' 	=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'highscore')),
					'U_KNUFFEL_USERGUIDE' 	=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'userguide')),
					'KNUFFEL_FOOTER_VIEW'	=> true,
				));
			break;
			// Knuffel End

			// Knuffel_Play Start
			case 'knuffel_play':

				$page_title = $this->user->lang['KNUFFEL'];
				$template_html = 'knuffel.html';

				// Set cheat-protection, into the database and update average and played
				$sql_array = array(
					'SELECT'	=> '*',
					'FROM'		=> array(
				$this->knuffel_table => 'k',
				),
					'WHERE'		=> 'user_id = ' . (int) $this->user->data['user_id'],
				);
				$sql = $this->db->sql_build_query('SELECT', $sql_array);
				$result = $this->db->sql_query($sql);
				$row = $this->db->sql_fetchrow($result);

				$exist		= isset($row['user_id']);

				if ($exist)
				{
					$played 	= $row['played'] + 1;
					$average 	= round((($row['average'] * ($played - 1))) / $played);

					// Update Knuffel Table User existent
					$sql_ary = array(
						'average'		=> $average,
						'played'		=> $played,
						'playing'		=> '1'
					);

					$sql = 'UPDATE ' . $this->knuffel_table . '
						SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) . '
						WHERE user_id = ' . (int) $this->user->data['user_id'];
					$this->db->sql_query($sql);
				}
				else
				{
					// Update Knuffel Table User not existent
					$sql_ary = array(
						'user_id'		=> (int) $this->user->data['user_id'],
						'played'		=> '1',
						'playing'		=> '1'
					);

					$this->db->sql_query('INSERT INTO ' . $this->knuffel_table . ' ' . $this->db->sql_build_array('INSERT', $sql_ary));
				}

				// For knuffell we need dice!
				$dice_one = "<a href=\"javascript:Hold(0)\"><img id='dice_0' width='32' height='32' alt='*' src='" . $board_url . "ext/dmzx/knuffel/knuffel/images/dice/blank.gif' /></a>";
				$dice_two = "<a href=\"javascript:Hold(1)\"><img id='dice_1' width='32' height='32' alt='*' src='" . $board_url . "ext/dmzx/knuffel/knuffel/images/dice/blank.gif' /></a>";
				$dice_three = "<a href=\"javascript:Hold(2)\"><img id='dice_2' width='32' height='32' alt='*' src='" . $board_url . "ext/dmzx/knuffel/knuffel/images/dice/blank.gif' /></a>";
				$dice_four = "<a href=\"javascript:Hold(3)\"><img id='dice_3' width='32' height='32' alt='*' src='" . $board_url . "ext/dmzx/knuffel/knuffel/images/dice/blank.gif' /></a>";
				$dice_five = "<a href=\"javascript:Hold(4)\"><img id='dice_4' width='32' height='32' alt='*' src='" . $board_url . "ext/dmzx/knuffel/knuffel/images/dice/blank.gif' /></a>";

				// Dynamically define the scoreboard
				for ($i = 0; $i < 13; $i++)
				{
					$j = 100 + $i;
					$k = 200 + $i;
					${"button_".$i} = "<input type='button' class='button1' id='button".$i."' onclick='SetPoints(".$i.")' value='&raquo;' />";
					${"button_".$j} = "<input type='button' class='button1' id='button".$j."' onclick='SetPoints(".$j.")' value='&raquo;' />";
					${"button_".$k} = "<input type='button' class='button1' id='button".$k."' onclick='SetPoints(".$k.")' value='&raquo;' />";
					${"field_".$i} = "<input type='text' readonly='readonly' class='post' id='field".$i."' size='3' value='-' style='text-align:right;padding-right:3px;' />";
					${"field_".$j} = "<input type='text' readonly='readonly' class='post' id='field".$j."' size='3' value='-' style='text-align:right;padding-right:3px;' />";
					${"field_".$k} = "<input type='text' readonly='readonly' class='post' id='field".$k."' size='3' value='-' style='text-align:right;padding-right:3px;' />";
				}

				// The rest of the buttons
				$button_roll = "<input type='button' class='button1' id='dicebutton' onclick='roll()' value='" . $this->user->lang['KNU_BUTTON_ROLL'] . "' />";
				$button_submit = "<input type='submit' class='button1' name='correctsend' id='submitbutton' onclick='Submit()' style='visibility:hidden' value='" . $this->user->lang['KNU_BUTTON_HIGHSCORE'] . "'	/>";
				$button_undo = "<input type='button' class='button1' id='undopoints' onclick='UndoMove()' style='visibility:hidden' value='" . $this->user->lang['KNU_BUTTON_UNDO'] . "'	/>";

				// The rest of the fields
				$field_sum1 = "<input type='text' readonly='readonly' class='post' id='suma1' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_bonus1 = "<input type='text' readonly='readonly' class='post' id='bonus1' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumtop1 = "<input type='text' readonly='readonly' class='post' id='sumtop1' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumlow1 = "<input type='text' readonly='readonly' class='post' id='sumlow1' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_uppersum1 = "<input type='text' readonly='readonly' class='post' id='uppersum1' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumcomplete1 = "<input type='text' readonly='readonly' class='post' id='sumcomplete1' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sum2 = "<input type='text' readonly='readonly' class='post' id='suma2' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_bonus2 = "<input type='text' readonly='readonly' class='post' id='bonus2' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumtop2 = "<input type='text' readonly='readonly' class='post' id='sumtop2' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumlow2 = "<input type='text' readonly='readonly' class='post' id='sumlow2' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_uppersum2 = "<input type='text' readonly='readonly' class='post' id='uppersum2' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumcomplete2 = "<input type='text' readonly='readonly' class='post' id='sumcomplete2' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sum3 = "<input type='text' readonly='readonly' class='post' id='suma3' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_bonus3 = "<input type='text' readonly='readonly' class='post' id='bonus3' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumtop3 = "<input type='text' readonly='readonly' class='post' id='sumtop3' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumlow3 = "<input type='text' readonly='readonly' class='post' id='sumlow3' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_uppersum3 = "<input type='text' readonly='readonly' class='post' id='uppersum3' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumcomplete3 = "<input type='text' readonly='readonly' class='post' id='sumcomplete3' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumfactor1 = "<input type='text' readonly='readonly' class='post' id='sumfactor1' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumfactor2 = "<input type='text' readonly='readonly' class='post' id='sumfactor2' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_sumfactor3 = "<input type='text' readonly='readonly' class='post' id='sumfactor3' size='3' value='0' style='text-align:right;padding-right:3px;' />";
				$field_finalsum = "<input type='text' readonly='readonly' class='post' name='finalscore' id='finalsum' size='4' value='0' style='text-align:right;padding-right:3px;' />";
				$knuffelmessage = "<textarea readonly='readonly' class='post' id='message' rows='3' cols='26' style='text-align:center;overflow:hidden;'>" . $this->user->lang['KNU_TEXTAREA'] . "</textarea>";

				// The factors
				$x1 = "<b> x 1 </b>";
				$x2 = "<b> x 2 </b>";
				$x3 = "<b> x 3 </b>";
				$x1b = "x 1 =";
				$x2b = "x 2 =";
				$x3b = "x 3 =";

				// What about the game logic???
				$logic= "<script type='text/javascript' src='" . $board_url. "ext/dmzx/knuffel/knuffel/script/knuffel260.js'></script><script type='text/javascript'>D6Animator.baseUrl = '" . $board_url . "ext/dmzx/knuffel/knuffel/images/dice/';var user_lang = \"".$this->user->data['user_lang']."\";var animators = [new D6Animator(\"0\", null, \"dice\"), new D6Animator(\"1\", null, \"dice\"), new D6Animator(\"2\", null, \"dice\"), new D6Animator(\"3\", null, \"dice\"), new D6Animator(\"4\", null, \"dice\")]; window.onload = startroll;</script>";

				// Time to get the top 3
				$i = 1;
				$sql_array = array(
				'SELECT'	=> 'u.user_id, u.username, u.user_colour, k.*',

				'FROM'		=> array(
					USERS_TABLE	=> 'u',
				),

				'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array($this->knuffel_table => 'k'),
					'ON'	=> 'u.user_id = k.user_id'
					),
				),

					'WHERE'		=> 'k.score > 0',
					'ORDER_BY'	=> 'k.score DESC, k.average DESC',
				);

				$sql = $this->db->sql_build_query('SELECT', $sql_array);
				$result = $this->db->sql_query_limit($sql, 3);

				while ($row = $this->db->sql_fetchrow($result))
				{
					$highscore_position = "<img src='" . $board_url . "ext/dmzx/knuffel/knuffel/images/rank/".$i.".gif' alt='*' />";

					$this->template->assign_block_vars('highscore', array(
						'POSITION'	=> $highscore_position,
						'NAME'		=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
						'POINTS'	=> $row['score'],
					));
					$i++;
				}
				$this->db->sql_freeresult($result);

				// OK - thats it - let's tell the template what we want!
				$this->template->assign_vars(array(
					'S_KNUFFEL_PLAY'		=> true,
					'U_KNUFFEL_PLAY'		=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'knuffel_play')),
					'L_X1' 					=> $x1,
					'L_X2' 					=> $x2,
					'L_X3' 					=> $x3,
					'L_X1B'		 			=> $x1b,
					'L_X2B' 				=> $x2b,
					'L_X3B' 				=> $x3b,
					'S_DICE_ONE' 			=> $dice_one,
					'S_DICE_TWO' 			=> $dice_two,
					'S_DICE_THREE' 			=> $dice_three,
					'S_DICE_FOUR' 			=> $dice_four,
					'S_DICE_FIVE' 			=> $dice_five,
					'S_0' 					=> $button_0,
					'S_1' 					=> $button_1,
					'S_2' 					=> $button_2,
					'S_3' 					=> $button_3,
					'S_4' 					=> $button_4,
					'S_5' 					=> $button_5,
					'S_6' 					=> $button_6,
					'S_7' 					=> $button_7,
					'S_8' 					=> $button_8,
					'S_9' 					=> $button_9,
					'S_10' 					=> $button_10,
					'S_11' 					=> $button_11,
					'S_12' 					=> $button_12,
					'S_100' 				=> $button_100,
					'S_101' 				=> $button_101,
					'S_102' 				=> $button_102,
					'S_103' 				=> $button_103,
					'S_104' 				=> $button_104,
					'S_105' 				=> $button_105,
					'S_106' 				=> $button_106,
					'S_107' 				=> $button_107,
					'S_108' 				=> $button_108,
					'S_109' 				=> $button_109,
					'S_110' 				=> $button_110,
					'S_111' 				=> $button_111,
					'S_112' 				=> $button_112,
					'S_200' 				=> $button_200,
					'S_201' 				=> $button_201,
					'S_202' 				=> $button_202,
					'S_203' 				=> $button_203,
					'S_204' 				=> $button_204,
					'S_205' 				=> $button_205,
					'S_206' 				=> $button_206,
					'S_207' 				=> $button_207,
					'S_208' 				=> $button_208,
					'S_209' 				=> $button_209,
					'S_210' 				=> $button_210,
					'S_211' 				=> $button_211,
					'S_212' 				=> $button_212,
					'S_ROLL' 				=> $button_roll,
					'S_SUBMIT' 				=> $button_submit,
					'S_UNDO' 				=> $button_undo,
					'S_FIELD_0' 			=> $field_0,
					'S_FIELD_1' 			=> $field_1,
					'S_FIELD_2' 			=> $field_2,
					'S_FIELD_3' 			=> $field_3,
					'S_FIELD_4' 			=> $field_4,
					'S_FIELD_5' 			=> $field_5,
					'S_FIELD_6' 			=> $field_6,
					'S_FIELD_7' 			=> $field_7,
					'S_FIELD_8' 			=> $field_8,
					'S_FIELD_9' 			=> $field_9,
					'S_FIELD_10' 			=> $field_10,
					'S_FIELD_11' 			=> $field_11,
					'S_FIELD_12' 			=> $field_12,
					'S_FIELD_100' 			=> $field_100,
					'S_FIELD_101' 			=> $field_101,
					'S_FIELD_102' 			=> $field_102,
					'S_FIELD_103' 			=> $field_103,
					'S_FIELD_104' 			=> $field_104,
					'S_FIELD_105' 			=> $field_105,
					'S_FIELD_106' 			=> $field_106,
					'S_FIELD_107' 			=> $field_107,
					'S_FIELD_108' 			=> $field_108,
					'S_FIELD_109' 			=> $field_109,
					'S_FIELD_110' 			=> $field_110,
					'S_FIELD_111' 			=> $field_111,
					'S_FIELD_112' 			=> $field_112,
					'S_FIELD_200' 			=> $field_200,
					'S_FIELD_201' 			=> $field_201,
					'S_FIELD_202' 			=> $field_202,
					'S_FIELD_203' 			=> $field_203,
					'S_FIELD_204' 			=> $field_204,
					'S_FIELD_205' 			=> $field_205,
					'S_FIELD_206' 			=> $field_206,
					'S_FIELD_207' 			=> $field_207,
					'S_FIELD_208' 			=> $field_208,
					'S_FIELD_209' 			=> $field_209,
					'S_FIELD_210' 			=> $field_210,
					'S_FIELD_211' 			=> $field_211,
					'S_FIELD_212' 			=> $field_212,
					'S_SUM1' 				=> $field_sum1,
					'S_BONUS1' 				=> $field_bonus1,
					'S_SUMTOP1' 			=> $field_sumtop1,
					'S_SUMLOW1' 			=> $field_sumlow1,
					'S_UPPERSUM1' 			=> $field_uppersum1,
					'S_SUMCOMPLETE1' 		=> $field_sumcomplete1,
					'S_SUMFACTOR1' 			=> $field_sumfactor1,
					'S_SUM2' 				=> $field_sum2,
					'S_BONUS2' 				=> $field_bonus2,
					'S_SUMTOP2' 			=> $field_sumtop2,
					'S_SUMLOW2' 			=> $field_sumlow2,
					'S_UPPERSUM2' 			=> $field_uppersum2,
					'S_SUMCOMPLETE2' 		=> $field_sumcomplete2,
					'S_SUMFACTOR2' 			=> $field_sumfactor2,
					'S_SUM3' 				=> $field_sum3,
					'S_BONUS3' 				=> $field_bonus3,
					'S_SUMTOP3' 			=> $field_sumtop3,
					'S_SUMLOW3' 			=> $field_sumlow3,
					'S_UPPERSUM3' 			=> $field_uppersum3,
					'S_SUMCOMPLETE3' 		=> $field_sumcomplete3,
					'S_SUMFACTOR3' 			=> $field_sumfactor3,
					'S_FINALSUM' 			=> $field_finalsum,
					'S_LOGIC' 				=> $logic,
					'S_KNUFFELMESSAGE' 		=> $knuffelmessage,
					'KNUFFEL_FOOTER_VIEW'	=> true,
					)
				);
			break;
			// Knuffel_Play End

			// Knuffel Userguide Start
			case 'userguide':

				$page_title = $this->user->lang['KNU_USERGUIDE'];
				$template_html = 'knuffel.html';

				$this->template->assign_vars(array(
					'S_KNUFFEL_USERGUIDE'	=> true,
					'U_KNUFFEL'				=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'knuffel')),
					'KNUFFEL_FOOTER_VIEW'	=> true,
				));

				// Template variables for the navigation
				$this->template->assign_block_vars('navlinks', array(
					'FORUM_NAME'	=> $this->user->lang['KNU_USERGUIDE'],
					'U_VIEW_FORUM'	=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'userguide')),
				));
			break;
			// Knuffel Userguide End

			// Knuffelhighscore Start
			case 'highscore':

				$page_title = $this->user->lang['KNUFFEL_RANK'];
				$template_html = 'knuffel.html';

				$mode = $this->request->variable('mode', 'standard');
				$start = $this->request->variable('start', 0);

				// Number of Players
				$number	= $knuffel_values['knuffel_pagination'];

				$sort_days	= $this->request->variable('st', 0);
				$sort_key	= $this->request->variable('sk', 'score');
				$sort_dir	= $this->request->variable('sd', 'd');
				$limit_days = array(0 => $this->user->lang['ALL_POSTS'], 1 => $this->user->lang['1_DAY'], 7 => $this->user->lang['7_DAYS'], 14 => $this->user->lang['2_WEEKS'], 30 => $this->user->lang['1_MONTH'], 90 => $this->user->lang['3_MONTHS'], 180 => $this->user->lang['6_MONTHS'], 365 => $this->user->lang['1_YEAR']);

				$sort_by_text	= array('p' => $this->user->lang['SORT_POINTS'], 'n' => $this->user->lang['SORT_NAME'], 'q' => $this->user->lang['SORT_PLAYED'], 'a' => $this->user->lang['SORT_AVARAGE'], 't' => $this->user->lang['SORT_DATE'], 'z' => $this->user->lang['SORT_ALLTIME']);
				$sort_by_sql 	= array('p' => 'k.score', 'n' => 'u.username', 'q' => 'k.played', 'a' => 'k.average', 't' => 'k.score_time', 'z' => 'k.alltime');

				$s_limit_days 	= $s_sort_key = $s_sort_dir = $u_sort_param = '';
				gen_sort_selects($limit_days, $sort_by_text, $sort_days, $sort_key, $sort_dir, $s_limit_days, $s_sort_key, $s_sort_dir, $u_sort_param);
				$sql_sort_order = $sort_by_sql[$sort_key] . ' ' . (($sort_dir == 'd') ? 'DESC' : 'ASC');

				$i = $start + 1;
				$sql = 'SELECT k.*, u.user_id, u.username, u.user_colour FROM ' . $this->knuffel_table . ' k
					LEFT JOIN ' . USERS_TABLE . ' u ON (u.user_id = k.user_id)
					WHERE k.alltime > 0
					ORDER BY ' . $sql_sort_order;
				$result = $this->db->sql_query_limit($sql, $number, $start);

				while ($row = $this->db->sql_fetchrow($result))
				{
					$score_time = $row['score_time'];

					if ($i < 4)
					{
						$highscore_position = "<b>".$i."</b>";
					}
					else
					{
						$highscore_position = $i;
					}

					if ($row['score_time'] == 0)
					{
						$score_date = $this->user->lang['KNUFFEL_NO_HIGHSCORETIME'];
					}
					else
					{
						$score_date = $this->user->format_date($score_time);
					}

					$this->template->assign_block_vars('highscore', array(
						'POSITION' 		=> $highscore_position,
						'NAME'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
						'POINTS' 		=> $row['score'],
						'SCORE_TIME'	=> $score_date,
						'PLAYED' 		=> $row['played'],
						'AVERAGE' 		=> $row['average'],
						'ALLTIME' 		=> $row['alltime'],
					));
					$i++;
				}
				$this->db->sql_freeresult($result);

				// Pagination
				$sql = 'SELECT COUNT(score) AS total_players
					FROM ' . $this->knuffel_table . '
					WHERE alltime > 0 ';
				$result = $this->db->sql_query($sql);
				$row = $this->db->sql_fetchrow($result);
				$total_players = $row['total_players'];
				$this->db->sql_freeresult($result);

				$pagination_url = $this->helper->route('dmzx_knuffel_controller', array('mode' => 'highscore'));
				//Start pagination
				$this->pagination->generate_template_pagination($pagination_url, 'pagination', 'start', $total_players, $number, $start);

				// OK - thats it - let's tell the template what we want!
				$this->template->assign_vars(array(
					'S_KNUFFEL_HIGHSCORE'	=> true,
					'S_KNUFFEL_ACTION' 		=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 	'highscore', 'sk' => '$sort_key', 'sd'=> $sort_dir)),
					'U_KNUFFEL'				=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'knuffel')),
					'S_SELECT_SORT_DIR'		=> $s_sort_dir,
					'S_SELECT_SORT_KEY'		=> $s_sort_key,
					'TOTAL_PLAYERS'			=> sprintf($this->user->lang['KNUFFEL_PLAYERS'], $total_players),
					'KNUFFEL_FOOTER_VIEW'	=> true,
				));

				// Template variables for the navigation
				$this->template->assign_block_vars('navlinks', array(
					'FORUM_NAME'	=> $this->user->lang['KNUFFEL_RANK'],
					'U_VIEW_FORUM'	=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'highscore')),
				));
			break;
			// Knuffelhighscore End

			// Knuffelscore Start
			case 'score':

				$page_title = $this->user->lang['KNUFFEL_SCORE'];
				$template_html = 'knuffel.html';

				if ($this->request->is_set_post('correctsend'))
				{
					$submitscore = $this->request->variable('finalscore', 0);

					// Read table for cheat-protection...
					$sql_array = array(
						'SELECT'	=> '*',
						'FROM'		=> array(
					$this->knuffel_table => 'k',
					),
						'WHERE'		=> 'user_id = ' . (int) $this->user->data['user_id'],
					);
					$sql = $this->db->sql_build_query('SELECT', $sql_array);
					$result = $this->db->sql_query($sql);
					$row = $this->db->sql_fetchrow($result);

					if ($row['playing'] != '1')
					{
						$message = $this->user->lang['KNUFFEL_CHEAT'] . '<br /><br /><a href="' . $this->helper->route('dmzx_knuffel_controller') . '">&laquo; ' . $this->user->lang['KNUFFEL_PLAY_AGAIN'] . '</a>';
						trigger_error($message);
					}

					$score_time = time();
					$played 	= $row['played'];
					$alltime 	= $row['alltime'];
					$score		= $row['score'];
					$average 	= round((($row['average'] * $played) + $submitscore) / $played);

					if ($submitscore <= $score)
					{
						$sql_ary = array(
							'average'		=> $average,
							'playing'		=> '0'
						);

						$sql = 'UPDATE ' . $this->knuffel_table	. '
							SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) . '
							WHERE user_id = ' . (int) $this->user->data['user_id'];
						$this->db->sql_query($sql);
					}
					else
					{
						if ($submitscore <= $alltime)
						{
							$sql_ary = array(
								'score'			=> $submitscore,
								'score_time'	=> $score_time,
								'average'		=> $average,
								'playing'		=> '0'
							);

							$sql = 'UPDATE ' . $this->knuffel_table	. '
								SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) . '
								WHERE user_id = ' . (int) $this->user->data['user_id'];
							$this->db->sql_query($sql);
						}
						else
						{
							$sql_ary = array(
								'score'			=> $submitscore,
								'score_time'	=> $score_time,
								'alltime'		=> $submitscore,
								'average'		=> $average,
								'playing'		=> '0'
							);

							$sql = 'UPDATE ' . $this->knuffel_table	. '
								SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) . '
								WHERE user_id = ' . (int) $this->user->data['user_id'];
							$this->db->sql_query($sql);
						}
					}

					// OK - that´s it - let's tell the template what we want!
					$this->template->assign_vars(array(
						'S_SCORE'				=> true,
						'U_KNUFFEL'				=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'knuffel')),
						'U_KNUFFEL_HIGHSCORE' 	=> $this->helper->route('dmzx_knuffel_controller', array('mode' => 'highscore')),
						'S_ACTUAL_RESULT' 		=> $submitscore,
						'KNUFFEL_FOOTER_VIEW'	=> true,
					));

				}
			break;
			// Knuffelscore End

			default:
			break;
		}
		// Send all data to the template file
		return $this->helper->render($template_html, $page_title);
	}

	protected function assign_authors()
	{
		// Read version and write to template
		$version = $this->config['knuffel_version'];

		$md_manager = $this->extension_manager->create_extension_metadata_manager('dmzx/knuffel', $this->template);
		$meta = $md_manager->get_metadata();
		$author_names = array();
		$author_homepages = array();

		foreach ($meta['authors'] as $author)
		{
			$author_names[] = $author['name'];
			$author_homepages[] = sprintf('<a href="%1$s" title="%2$s">%2$s</a>', $author['homepage'], $author['name']);
		}
		$this->template->assign_vars(array(
			'KNUFFEL_DISPLAY_NAME'		=> $meta['extra']['display-name'],
			'KNUFFEL_AUTHOR_NAMES'		=> implode(' &amp; ', $author_names),
			'KNUFFEL_AUTHOR_HOMEPAGES'	=> implode(' &amp; ', $author_homepages),
			'KNUFFEL_VERSION'			=> $version,
		));
	}
}
				
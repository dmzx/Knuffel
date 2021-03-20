<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

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
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'KNUFFEL_EXT_VERSION'		=> 'Version',
	'KNUFFEL_DISABLE_MESSAGE'	=> 'Sorry, the Knuffel game is currently disabled!',
	'KNUFFEL_NO_HIGHSCORES'		=> 'There are currently no high scores',
	'KNUFFEL_PLAYING'			=> 'Playing Knuffel',
	'KNUFFEL_PLAYERS'			=> 'Knuffel Players %1$s',
	'KNUFFEL_CHEAT'				=> '<strong>Error!</strong> You can send a record only once!',
	'KNUFFEL_PLAY'				=> 'Play Knuffel',
	'KNUFFEL_LINKS'				=> 'Knuffel links',
	'KNUFFEL_BACK_INDEX'		=> 'Back to forum index',
	'KNUFFEL_HIGHSCORETIME'		=> 'Reached High score',
	'KNUFFEL_NO_HIGHSCORETIME'	=> 'No High score time',
	'KNUFFEL_HIGHSCORE'			=> 'Knuffel points',
	'KNUFFEL_RANK'				=> 'High score',
	'KNUFFEL_USERGUIDE'			=> 'Userguide',
	'KNUFFEL'					=> 'Knuffel',
	'KNUFFEL_SCOREBOARD'		=> 'Points',
	'KNUFFEL_ACTUAL_RESULT'		=> 'Points reached:',
	'KNUFFEL_PLAY_AGAIN'		=> 'Go back to Knuffel',
	'KNUFFEL_POSITION'			=> 'Rank',
	'KNUFFEL_PLAYED'			=> 'Played',
	'KNUFFEL_AVERAGE'			=> 'Average',
	'KNUFFEL_HIGHSCORE_NAME'	=> 'Name',
	'KNUFFEL_ALLTIME'			=> 'All-time Knuffelpoints',
	'KNUFFEL_SCORE'				=> 'Knuffel score',

	// Dice
	'DICE'						=> 'Roll Dice',
	'TOP_3'						=> 'TOP 3',
	'ONE'						=> 'Ones',
	'TWO'						=> 'Twos',
	'THREE'						=> 'Threes',
	'FOUR'						=> 'Fours',
	'FIVE'						=> 'Fives',
	'SIX'				 		=> 'Sixes',
	'TOAK'						=> '3 of a kind',
	'FOAK'						=> '4 of a kind',
	'FH'						=> 'Full House',
	'SMALL'						=> 'Small Straight',
	'LARGE'						=> 'Large Straight',
	'CHANCE'					=> 'Chance',
	'SUM1'						=> 'Sum',
	'BONUS'						=> '<b>Bonus</b> (if 63 or more)<b>:</b>',
	'SUMTOP'					=> 'Sum Top:',
	'SUM2'						=> 'Sum:',
	'UPPERSUM'					=> 'Sum Top:',
	'SUM'				 		=> 'Total:',
	'COLUMNSUM'					=> 'Sum Column:',
	'FINALSUM'					=> 'Final Score:',
	'RESULT'					=> 'Result',

	// Buttons
	'KNU_BUTTON_ROLL'			=> '1st throw',
	'KNU_BUTTON_RESET_GAME'		=> 'Restart',
	'KNU_BUTTON_UNDO'			=> 'Cancel last entry',
	'KNU_BUTTON_HIGHSCORE'		=> 'Submit Score',
	'KNU_TEXTAREA'				=> 'Welcome to Knuffel! Cast your first throw.',

	// Sort options
	'SORT_ALLTIME'				=> 'All-time',
	'SORT_ASC'					=> 'Ascending',
	'SORT_AVARAGE'				=> 'Average',
	'SORT_DATE'					=> 'Date',
	'SORT_DESC'					=> 'Descending',
	'SORT_DIRECTION'			=> 'Sort direction',
	'SORT_KEYS'					=> 'Sort by ',
	'SORT_NAME'					=> 'Name',
	'SORT_POINTS'				=> 'Points',
	'SORT_PLAYED'				=> 'Played',

	// UPS
	'KNUFFEL_UPS_PLAY'			=> 'Play Knuffel with %1$s',
	'KNUFFEL_UPS_JACKPOT_SCORE'	=> 'Knuffel Jackpot',
	'KNUFFEL_UPS_NO_POINTS'		=> 'You don\'t have enough %1$s to play Knuffel!',
	'KNUFFEL_UPS_INFO'			=> '<strong>Informations on the Knuffel costs and what you may win:</strong>',
	'KNUFFEL_UPS_COST'			=> 'Game costs:',
	'KNUFFEL_UPS_JACKPOT'		=> 'Current Jackpot: %1$s %2$s',
	'KNUFFEL_UPS_BASE_JACKPOT'	=> 'Basic Jackpot: %1$s %2$s',
	'KNUFFEL_UPS_GIVE_JACKPOT'	=> 'Payout of the Jackpot, if you reach at least: %1$s Knuffel Points',
	'KNUFFEL_UPS_USERGUIDE'		=> 'Detailed informations, you will find in the ',
	'KNUFFEL_UPS_NO_PAYOUT'		=> 'Sorry, the reached points are not enough to pick up the Jackpot.',
	'KNUFFEL_UPS_PAYOUT'		=> 'Congratulations! You won the Jackpot of %1$s %2$s.<br/>The Jackpot was transferred to your account.',

	// Knuffel Userguide
	'KNU_USERGUIDE'				=> 'Userguide',
	'KNU_USERGUIDE_UPS_1'		=> 'Knuffel and %1$s',
	'KNU_USERGUIDE_UPS_2'		=> 'Probably the administrator set costs for playing Knuffel.<br/><br/>

									<ul>
									<li><strong>Playing costs</strong> - This value will be subtracted from your %1$s.
									If you don\'t have enough %1$s, you can\'t play Knuffel.</li>
									<li><strong>Current Jackpot</strong> - This is the Jackpot you may win, if you reached enough Knuffel points.
									Your %1$s costs for playing Knuffel will go into the Jackpot and the Jackpot will raise until someone reach the minimum points to get it.</li>
									<li><strong>Basic Jackpot</strong> - This value will be set, after a payout of the Jackpot.</li>
									<li><strong>Jackpot Payout</strong> - The Jackpot will only be payed out, if a user reaches this value.
									The admin sets this value. If you think, it\'s too high, ask him/her.
									The main idea behind is to prevent people from just playing around with no sense and gain %1$s for that.
									Additionally the high score is nearly unbreakable, if it is really high.
									Therefore you still may gain some %1$s without having the high score in mind.</li>
									</ul>',

	'KNU_USERGUIDE_GENERAL_1'	=> 'Introduction',
	'KNU_USERGUIDE_GENERAL_2'	=> 'Knuffel (Kniffel-Clone, also known as Yahtzee or dicepoker) is a game of dice with which it is your aim to roll certain figures
									and reach a maximum score. It is played with 5 dice.
									In every round one may throw the dice three times.
									Nevertheless, between the throws one can lay any dice aside (pretend) and roll only the ones that are left.
									If you threw the dice three times (or if you are contented with the result already), the score is put down at any place on the score table.
									Every field of the score table can be used only once.
									If the throw does not correspond to the requirements of such a field, this field has to be crossed out.
									You are only allowed to throw three times per round.',

	'KNU_USERGUIDE_POINTS_1'	=> 'Points',
	'KNU_USERGUIDE_POINTS_2'	=> '<ul>
									<li><strong>One - Six</strong> - It is simply taken down the sum of all dice which carry the suitable number.</li>
									<li><strong>Three / Four of a kind</strong> - Take down the sum of all dice - Valid if you roll a number at least 3- or 4 times.</li>
									<li><strong>Full House</strong> - Always 25 points - Valid if you roll three dice with one number and two dice with another number.</li>
									<li><strong>Minor Straight / Straight</strong> - 30 / 40 points - Valid if you got at least 4 / 5 successive numbers on your dice.
									Besides, the order of the dice plays, admittedly, no role.</li>
									<li><strong>Knuffel</strong> - Always 50 points - Valid if all dice show the same numbers.</li>
									<li><strong>Chance</strong> - You can sum up all numbers of all dice. - Just take down this sum.
									This field is there, above all, in addition to write down throws which fit nowhere else.</li>
									<li><strong>Bonus</strong> - In the upper fields of the table (One - Six)
									you get an additional bonus by 35 points if you can sum up 63 points or more in one column.
									This corresponds exactly the sum if you rolled three dice of every kind..</li></ul>',

	'KNU_USERGUIDE_COLUMNS_1'	=> 'Three Columns',
	'KNU_USERGUIDE_COLUMNS_2'	=> 'The table consists of three columns. The sum of each column is multiplied by different factors to determine the final results:<br/><br/>
									Column 1: Sum * 1 <br/>
									Column 2: Sum * 2<br/>
									Column 3: Sum * 3<br/><br/>
									The order in which the single results of your throws are put down on the table is absolutely up to your choice.
									Feel free to put em into any column.',

));

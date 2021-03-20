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
	'KNUFFEL_EXT_VERSION'		=> 'Versão',
	'KNUFFEL_DISABLE_MESSAGE'	=> 'O jogo General está desabilitado no momento!',
	'KNUFFEL_NO_HIGHSCORES'		=> 'Ainda não há record registrado',
	'KNUFFEL_PLAYING'			=> 'Jogando General',
	'KNUFFEL_PLAYERS'			=> 'Jogadores General %1$s',
	'KNUFFEL_CHEAT'				=> '<strong>Erro!</strong> Você pode enviar um recorde somente uma vez!',
	'KNUFFEL_PLAY'				=> 'Jogar General',
	'KNUFFEL_LINKS'				=> 'Links General',
	'KNUFFEL_BACK_INDEX'		=> 'Voltar ao fórum',
	'KNUFFEL_HIGHSCORETIME'		=> 'Data do recorde',
	'KNUFFEL_NO_HIGHSCORETIME'	=> 'Não há o tempo do recorde',
	'KNUFFEL_HIGHSCORE'			=> 'Pontos',
	'KNUFFEL_RANK'				=> 'Recorde',
	'KNUFFEL_USERGUIDE'			=> 'Instruções',
	'KNUFFEL'					=> 'General',
	'KNUFFEL_SCOREBOARD'		=> 'Pontos',
	'KNUFFEL_ACTUAL_RESULT'		=> 'Pontos alcançados:',
	'KNUFFEL_PLAY_AGAIN'		=> 'Voltar ao General',
	'KNUFFEL_POSITION'			=> 'Classificação',
	'KNUFFEL_PLAYED'			=> 'Jogou',
	'KNUFFEL_AVERAGE'			=> 'Média',
	'KNUFFEL_HIGHSCORE_NAME'	=> 'Nome',
	'KNUFFEL_ALLTIME'			=> 'Geral de pontos',
	'KNUFFEL_SCORE'				=> 'Placar General',

	// Dice
	'DICE'						=> 'Jogar Dados',
	'TOP_3'						=> 'TOP 3',
	'ONE'						=> 'Um',
	'TWO'						=> 'Dois',
	'THREE'						=> 'Três',
	'FOUR'						=> 'Quatro',
	'FIVE'						=> 'Cinco',
	'SIX'				 		=> 'Seis',
	'TOAK'						=> '3 de um valor',
	'FOAK'						=> '4 de um valor',
	'FH'						=> 'Full House',
	'SMALL'						=> 'Sequência Pequena',
	'LARGE'						=> 'Sequência Grande',
	'CHANCE'					=> 'Aleatório',
	'SUM1'						=> 'Soma',
	'BONUS'						=> '<b>Bônus</b> (se 63 ou mais)<b>:</b>',
	'SUMTOP'					=> 'Soma Top:',
	'SUM2'						=> 'Soma:',
	'UPPERSUM'					=> 'Soma Top:',
	'SUM'				 		=> 'Total:',
	'COLUMNSUM'					=> 'Soma Coluna:',
	'FINALSUM'					=> 'Placar Final:',
	'RESULT'					=> 'Resultado',

	// Buttons
	'KNU_BUTTON_ROLL'			=> '1ª jogada',
	'KNU_BUTTON_RESET_GAME'		=> 'Reinicia',
	'KNU_BUTTON_UNDO'			=> 'Cancela último lance',
	'KNU_BUTTON_HIGHSCORE'		=> 'Envia Placar',
	'KNU_TEXTAREA'				=> 'Bem-vindo ao General! Faça sua primeira jogada.',

	// Sort options
	'SORT_ALLTIME'				=> 'All-time',
	'SORT_ASC'					=> 'Crescente',
	'SORT_AVARAGE'				=> 'Média',
	'SORT_DATE'					=> 'Data',
	'SORT_DESC'					=> 'Decrescente',
	'SORT_DIRECTION'			=> 'Ordem de classificação',
	'SORT_KEYS'					=> 'Classificação por ',
	'SORT_NAME'					=> 'Nome',
	'SORT_POINTS'				=> 'Pontos',
	'SORT_PLAYED'				=> 'Jogadas',

	// UPS
	'KNUFFEL_UPS_PLAY'			=> 'Jogue General com %1$s',
	'KNUFFEL_UPS_JACKPOT_SCORE'	=> 'Acumulador General',
	'KNUFFEL_UPS_NO_POINTS'		=> 'Você não tem %1$s suficientes para jogar General!',
	'KNUFFEL_UPS_INFO'			=> '<strong>Sobre os custos do General e o que você pode ganhar:</strong>',
	'KNUFFEL_UPS_COST'			=> 'Custos do jogo:',
	'KNUFFEL_UPS_JACKPOT'		=> 'Acumulado atual: %1$s %2$s',
	'KNUFFEL_UPS_BASE_JACKPOT'	=> 'Acumulado básico: %1$s %2$s',
	'KNUFFEL_UPS_GIVE_JACKPOT'	=> 'Pagamento do acumulado só se você alcançar ao menos: %1$s Pontos General',
	'KNUFFEL_UPS_USERGUIDE'		=> 'Informações detalhadas, você encontra em ',
	'KNUFFEL_UPS_NO_PAYOUT'		=> 'Perdão, os pontos alcançados não são suficientes para pegar o acumulado.',
	'KNUFFEL_UPS_PAYOUT'		=> 'Parabéns! Você ganhou o acumulado de %1$s %2$s.<br/>O acumulado foi transferido para sua conta.',

	// Knuffel Userguide
	'KNU_USERGUIDE'				=> 'Instruções',
	'KNU_USERGUIDE_UPS_1'		=> 'General e %1$s',
	'KNU_USERGUIDE_UPS_2'		=> 'Provavelmente o administrador definiu custos para jogar General.<br/><br/>
									<ul>
									<li><strong>Custos do jogo</strong> - Este valor será subtraído de seus %1$s.
									Se você não tem ao menos %1$s, não poderá jogar General.</li>
									<li><strong>Acumulado total</strong> - Este é o acumulado que você pode ganhar se alcançar pontos General suficientes.
									Seu custo para jogar, de %1$s irão para o acumulado e irá crescer até alguém alcançar o mínimo para pegá-lo.</li>
									<li><strong>Acumulado básico</strong> - Este valor será definido após o pagamento do acumulado.</li>
									<li><strong>Pagamento do acumulado</strong> - O acumulado será pago somente se o usuário alcançar este valor.
									O administrador o valor. Se você acha que é muito alto, questione-o.
									A ideia principal por trás disso é prevenir pessoas de jogar sem noção e ganhar %1$s por isso.
									O recorde é quase imbatível estiver realmente alto. No entanto, você pode ainda ganhar algum %1$s sem ter o recorde em mente.</li>
									</ul>',

	'KNU_USERGUIDE_GENERAL_1'	=> 'Introdução',
	'KNU_USERGUIDE_GENERAL_2'	=> 'General (Knuffel, Kniffel-Clone, Yahtzee ou dicepoker) é um jogo com dados cujo objetivo é obter certas combinações e alcançar o máximo de pontos. É jogado com 5 dados. Em cada turno, você pode jogar os dados até 3 vezes (se não ficar satisfeito com o resultado obtido). Entre cada jogada, você pode deixar de lado quantos dados quiser e jogar os restantes. Ao final das 3 jogadas (ou se você já estiver satisfeito com a combinação), o resultado é colocado em qualquer lugar da tabela de resultados onde ele sirva. Cada campo da tabela de resultados pode ser usado somente uma vez. Se o resultado não servir para nenhum lugar da tabela, um dos campos deverá ser riscado e atribuído 0 pontos a ele.',

	'KNU_USERGUIDE_POINTS_1'	=> 'Pontos',
	'KNU_USERGUIDE_POINTS_2'	=> '<ul>
									<li><strong>Um - Seis</strong> - É a soma simples dos dados que forem daquele valor.</li>
									<li><strong>Trinca / Quadra</strong> - Soma dos dados que sejam do mesmo valor, 3 ou 4 vezes.</li>
									<li><strong>Full House</strong> - 25 points - Vale se forem 3 dados de um valor e 2 de outro.</li>
									<li><strong>Sequência Pequena/Grande</strong> - 30/40 pontos - Vale se conseguir uma sequência de 4 ou 5 números.</li>
									<li><strong>General</strong> - 50 points - Vale se todos os dados forem do mesmo valor.</li>
									<li><strong>Aleatório</strong> - É a soma simples dos dados, em qualquer combinação. Use-o quando nada mais encaixar.</li>
									<li><strong>Bônus</strong> - Na parte mais de cima da tabela (Um-Seis)
									você ganha um bonus de 35 pontos se comar 63 pontos ou mais em uma coluna.</li></ul>',

	'KNU_USERGUIDE_COLUMNS_1'	=> 'Três Colunas',
	'KNU_USERGUIDE_COLUMNS_2'	=> 'A tabela consiste de 3 colunas. A soma de cada coluna é multiplicada por diferentes fatores para determinar o resultado final:<br/><br/>
									Coluna 1: Soma * 1 <br/>
									Coluna 2: Soma * 2<br/>
									Coluna 3: Soma * 3<br/><br/>
									A ordem na qual o resultado de suas jogadas são colocadas na tabela é absolutamente de sua escolha. Sinta-se à vontade de colocar em qualquer coluna.',

));
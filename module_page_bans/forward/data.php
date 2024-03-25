<?php
/**
 * @author Anastasia Sidak <m0st1ce.nastya@gmail.com>
 *
 * @link https://steamcommunity.com/profiles/76561198038416053
 * @link https://github.com/M0st1ce
 *
 * @license GNU General Public License Version 3
 */

empty( $Db->db_data['IksAdmin'] ) && get_iframe( '012','Не найден мод - IksAdmin' );

// Количество банов на странице.
define('PLAYERS_ON_PAGE', '20');

$server_group = (int) intval (get_section('server_group', '0'));


if ($server_group >= $Db->table_statistics_count) {
    get_iframe('009', 'Данный сервер не существует');
    $server_group = 0;
}

// Номер страницы.
$page_num = (int) intval ( get_section( 'num', '1' ) );

// Типа банов.
$ban_type = [0 => '<div class="color-red">' . $Translate->get_translate_phrase('_Forever') . '</div>',1 => '<div class="color-blue">' . $Translate->get_translate_phrase('_Unban') . '</div>'];

// Подсчёт кол-ва страниц
$page_max = ceil($Db->queryNum('IksAdmin', $Db->db_data['IksAdmin'][0]['USER_ID'], $Db->db_data['IksAdmin'][0]['DB_num'], "SELECT COUNT(*) FROM " . $Db->db_data['IksAdmin'][0]['Table'] . "bans ")[0]/PLAYERS_ON_PAGE);

$page_num_min = ($page_num - 1) * PLAYERS_ON_PAGE;


// Запрос на получение информации о банах
$res = $Db->queryAll('IksAdmin', $Db->db_data['IksAdmin'][0]['USER_ID'], $Db->db_data['IksAdmin'][0]['DB_num'], "SELECT `adminsid`, `sid`, `name`, `created`, `time`, `end`, `reason` FROM `" . $Db->db_data['IksAdmin'][0]['Table'] . "bans` ORDER BY `created` DESC LIMIT {$page_num_min}," . PLAYERS_ON_PAGE . "");

$adminlist = $Db->queryAll('IksAdmin', $Db->db_data['IksAdmin'][0]['USER_ID'], $Db->db_data['IksAdmin'][0]['DB_num'], "SELECT `sid`, `name` FROM `" . $Db->db_data['IksAdmin'][0]['Table'] . "admins`");


// Задаём заголовок страницы.
$Modules->set_page_title('Наказания' . ' | ' .  $General->arr_general['short_name']);

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

// Номер страницы.
$page_num = (int) intval ( get_section( 'num', '1' ) );

// Типа мутов.
$comms_type = [0 => '<div class="color-red">' . $Translate->get_translate_phrase('_Forever') . '</div>',1 => '<div class="color-blue">' . $Translate->get_translate_phrase('_Uncomm') . '</div>'];

$page_num_min = ($page_num - 1) * PLAYERS_ON_PAGE;

// Подсчёт кол-ва страниц
$MSVoice = $Db->queryAll('IksAdmin', $Db->db_data['IksAdmin'][0]['USER_ID'], $Db->db_data['IksAdmin'][0]['DB_num'], "SELECT `adminsid`, `sid`, `name`, `created`, `time`, `end`, `reason` FROM `" . $Db->db_data['IksAdmin'][0]['Table'] . "mutes` ORDER BY `created` DESC");

$MSGag = $Db->queryAll('IksAdmin', $Db->db_data['IksAdmin'][0]['USER_ID'], $Db->db_data['IksAdmin'][0]['DB_num'], "SELECT `adminsid`, `sid`, `name`, `created`, `time`, `end`, `reason` FROM `" . $Db->db_data['IksAdmin'][0]['Table'] . "gags` ORDER BY `created` DESC");

$i=0;
foreach ($MSGag as $gag) {
    $MSGag[$i]['type'] = 1;
    $i++;
}

$i=0;
foreach ($MSVoice as $mut) {
    $MSVoice[$i]['type'] = 2;
    $i++;
}

$adminlist = $Db->queryAll('IksAdmin', $Db->db_data['IksAdmin'][0]['USER_ID'], $Db->db_data['IksAdmin'][0]['DB_num'], "SELECT `sid`, `name` FROM `" . $Db->db_data['IksAdmin'][0]['Table'] . "admins`");


# Получение информации о мутах и гагах с уникальными элементами
$uniqueMSMute = [];

foreach (array_merge($MSVoice, $MSGag) as $item) {
    $steamid = $item['sid'];
    $created = $item['created'];
    $key = $steamid . '_' . $created;

    if (!isset($uniqueMSMute[$key])) {
        $uniqueMSMute[$key] = $item;
    }
}

$count = array_values($uniqueMSMute);

$res = array_values(array_slice($uniqueMSMute, $page_num_min, PLAYERS_ON_PAGE));

$page_max = ceil(count($count) / PLAYERS_ON_PAGE);

// Задаём заголовок страницы.
$Modules->set_page_title('Наказания' . ' | ' .  $General->arr_general['short_name']);

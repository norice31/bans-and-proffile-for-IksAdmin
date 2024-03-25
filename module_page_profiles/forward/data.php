<?php
use app\modules\module_page_profiles\ext\Player;
$Router->map('GET|POST', 'profiles/[:id]/', 'profiles');
$Router->map('GET|POST', 'profiles/[:id]/[i:sid]/', 'profiles');
$Router->map('GET|POST', 'profiles/[:id]/[:page]/', 'profiles');
$Router->map('GET|POST', 'profiles/[:id]/[:page]/[i:sid]/', 'profiles');

$Map = $Router->match();
$server_id = $Map['params']['sid'] ?? 0;
$page = $Map['params']['page'] ?? 'info';
$profile = $Map['params']['id'];
$search = intval($_GET['search'] ?? 0);

$comms_type = [
  0 => '<div class="color-red">' . $Translate->get_translate_phrase('_Forever') . '</div>',
  1 => '<div class="color-blue">' . $Translate->get_translate_phrase('_Uncomm') . '</div>'
];

if(!preg_match('^(STEAM_[0-1]:[0-1]:(\d+))|(7656119[0-9]{10})^', $Map['params']['id'])) {
  get_iframe('009', 'Данная страница не существует') && die();
}

if (isset($_SESSION['steamid'])){
  if (empty($Map['params']['id'])) {
    header('Location: '.$General->arr_general['site'].'profiles/'.$_SESSION['steamid32'].'/?search=1/');
  }
} else {
  empty($Map) && get_iframe("404", "Похоже, URL введен хреново");
}

// Проверка поля 'profile' на пустоту.
empty($profile) && get_iframe('009', 'Данная страница не существует');
empty($Db->db_data['IksAdmin']) && get_iframe('012','Не найден мод - IksAdmin  : /storage/cache/sessions/db.php');
empty($Db->db_data['lk']) && get_iframe('012','Не найден мод - lk  : /storage/cache/sessions/db.php');

// Создаём экземпляр класса с импортом подкласса Db и указанием Steam ID игрока.
$Player = new Player($General, $Db, $Translate, $profile, $server_id, $search);

$server_page = $Player->found[$Player->server_group]['server_group'];

// Задаём заголовок страницы.
$Modules->set_page_title($Translate->get_translate_phrase('_Player') . ': ' .  action_text_clear(action_text_trim($Player->get_name(), 20)) . ' - ' . $Player->found[$Player->server_group]['name_servers'] . ' - ' . $General->arr_general['short_name']);

// Задаём описание страницы.
$Modules->set_page_description($Player->found[$Player->server_group]['name_servers'] . ' - '.$Translate->get_translate_module_phrase('module_page_profiles','_Rank').': ' . $Translate->get_translate_phrase($Player->get_rank(), 'ranks_' . $Player->found[$Player->server_group]['ranks_pack']) . ', '.$Translate->get_translate_module_phrase('module_page_profiles','_Exp').': ' .  $Player->get_value());

// Задаём изображение страницы.
$Modules->set_page_image($General->getAvatar(con_steam32to64($Player->get_steam_32()), 1));

// Основной статус игрока
$Player->set_profile_status($Translate->get_translate_phrase('_Player'), 'var(--span-color)');

if(!$Db->mysql_table_search('Core', 0, 0, "lvl_web_profiles")){
  $Db->query('Core', 0, 0, "CREATE TABLE `lvl_web_profiles`  (
    `auth` varchar(22) NOT NULL,
    `vk` text,
    `discord` text,
    `background` varchar(10) NOT NULL DEFAULT '1',
    UNIQUE INDEX `auth`(`auth`) USING BTREE
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8");
}

$ASAdmins = $Player->get_db_ASAdmins();
$Vips = $Player->get_db_Vips();
$ASBans = $Player->get_db_ASBans();
$SBComms = $Player->get_db_ASComms();
$Settings = $Player->get_profile_settings();
$Info = $Player->get_info();
$back = empty($Info['background']) ? $Settings['backs']['1'] : $Settings['backs'][$Info['background']];
$adminlist = $Db->queryAll('IksAdmin', $Db->db_data['IksAdmin'][0]['USER_ID'], $Db->db_data['AdminSystem'][0]['DB_num'], "SELECT `sid`, `name` FROM `" . $Db->db_data['IksAdmin'][0]['Table'] . "admins`");

switch($page){
  case 'info':
    $Shop = $Player->get_db_plugin_Shop();
    $BattlePass = $Player->get_db_plugin_BattlePass();
    $lcrs = $Player->get_db_plugin_lcrs();
  break;
  case 'stats':
  break;
  case 'admin':
    if((!empty($ASAdmins['steamid']) != true)):
      get_iframe("ERROR", "Кажется, это не админ");
    endif;
    $Admins = $Player->get_db_Admins();
  break;
  case 'block':
    $ASComms = $Player->get_db_ASComms();
  break;
  case 'friends':
    $friends = $Player->get_friends();
  break;
  case 'autodemo':
    $autodemo = $Player->get_my_autodemo();
  break;
  case 'transaction':
    if(isset($_SESSION["steamid"]) && (($Player->get_steam_32() == $_SESSION['steamid32']) || isset($_SESSION['user_admin']))){
      $lk = $Player->get_db_lk();
      $web_shop = $Player->get_db_shop();
    } else {
      get_iframe("404", "Кажется, эта страница не доступна");
    }
  break;
  case 'settings':
    if (isset($_SESSION["steamid"]) && ($Player->get_steam_32() == $_SESSION['steamid32'])){
      if (isset($_POST['edit_info'])) :
        $Player->edit_info();
        echo "<meta http-equiv='refresh' content='0'>";
      endif;
    } else {
      get_iframe("404", "Кажется, эта страница не доступна");
    }
  break;
  // case 'install':
  //   if(isset($_SESSION['user_admin'])){

  //   } else {
  //     get_iframe("404", "Данная страница доступна только администратору");
  //   }
  // break;
  
}
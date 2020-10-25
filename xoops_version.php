<?php

$modversion['name'] = 'xoops_movie';
$modversion['version'] = '1.1';
$modversion['description'] = '動画リストページの新規登録、編集、削除等が管理メニューより実行可！';
$modversion['credits'] = 'xoops_movie(sql)v1.1 by<a href=http://www.rc-net.jp/xoops/ target=_blank>RC-NET WEB SERVICES!</a>';
$modversion['author'] = '';
$modversion['help'] = '';
$modversion['license'] = 'free LICENSE';
$modversion['official'] = 'no';
$modversion['image'] = 'logo.gif';
$modversion['dirname'] = 'movie';
// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';
$modversion['hasMain'] = 1;
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables created by sql file (without prefix!)
$modversion['tables'][1] = 'xoops_movie';

<?php
$p = 'index';
require 'configs/requires.php';
$smarty = new SmartyEngine();
$smarty->assign('app_name', _AppName);
$smarty->assign('title', 'Home');
$smarty->assign('p', $p);
$smarty->display('index.tpl');

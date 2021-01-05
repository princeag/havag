<?php
/* Smarty version 3.1.32, created on 2021-01-05 23:01:33
  from '/opt/lampp/htdocs/havag/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ff4a275812d26_74698837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc55c8f7bc6e1ec0f1a0730dae3dae659ba431b7' => 
    array (
      0 => '/opt/lampp/htdocs/havag/templates/header.tpl',
      1 => 1609860223,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff4a275812d26_74698837 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang='en'>
	<head>
		<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? 'Page' : $tmp);?>
 - <?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Collect Data" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
		<link rel="stylesheet" href="css/index.css" type="text/css">
		<?php if ($_smarty_tpl->tpl_vars['p']->value == 'dashboard') {?>
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/>
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
		<?php }?>
		<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/jquery.tagit.css"/>
		<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<?php }
}

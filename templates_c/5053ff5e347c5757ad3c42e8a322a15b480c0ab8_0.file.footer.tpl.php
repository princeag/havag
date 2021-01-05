<?php
/* Smarty version 3.1.32, created on 2021-01-05 23:01:33
  from '/opt/lampp/htdocs/havag/templates/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ff4a275855d92_56887363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5053ff5e347c5757ad3c42e8a322a15b480c0ab8' => 
    array (
      0 => '/opt/lampp/htdocs/havag/templates/footer.tpl',
      1 => 1609860278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff4a275855d92_56887363 (Smarty_Internal_Template $_smarty_tpl) {
?>	<?php if ($_smarty_tpl->tpl_vars['p']->value == 'dashboard') {?>
	<?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"><?php echo '</script'; ?>
>
	<?php }?>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="js/tag-it.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/index.js"><?php echo '</script'; ?>
>
	<?php if ($_smarty_tpl->tpl_vars['p']->value == 'dashboard') {?>
	<?php echo '<script'; ?>
 src="js/dashboard.js"><?php echo '</script'; ?>
>
	<?php }?>
</body>
</html><?php }
}

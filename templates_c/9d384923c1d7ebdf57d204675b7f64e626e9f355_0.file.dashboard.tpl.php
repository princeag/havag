<?php
/* Smarty version 3.1.32, created on 2021-01-05 23:01:41
  from '/opt/lampp/htdocs/havag/templates/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ff4a27da20d27_85966940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d384923c1d7ebdf57d204675b7f64e626e9f355' => 
    array (
      0 => '/opt/lampp/htdocs/havag/templates/dashboard.tpl',
      1 => 1609862354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ff4a27da20d27_85966940 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/havag/lib/smarty-3.1.32/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="modal" tabindex="-1" role="dialog" id="add-tag-modal" aria-labelledby="add-tag-modal" aria-hidden="true">
	<div class="modal-dialog" role="document" style="max-height: 500px; overflow: overlay;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add User Tag</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  		<span aria-hidden="true">&times;</span>
				</button>
			</div>
	    	<form class="form" action="ajax_request.php?callback=add_user_tag" method="POST" id="add_tag_form" autocomplete="off">
		  		<div class="modal-body">
		    		<div class="form-group">
						<label for="User Tag">Add Tag <span class="text-danger">*</span></label>
                        <ul id="user_tags" class="tagit ui-widget ui-widget-content ui-corner-all">
                        </ul>
                        <input type="hidden" value="">
						<input type="hidden" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['user_record_detail']->value['email'];?>
">
                        <small class="input-error h4 text-danger"></small>
                        <small class="input-success h4 text-success"></small>
					</div>
		  		</div>
			  	<div class="modal-footer">
			    	<button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
			    	<button type="submit" class="btn btn-success">Save Tags</button>
			  	</div>
	    	</form>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="add-note-modal" aria-labelledby="add-note-modal" aria-hidden="true">
	<div class="modal-dialog" role="document" style="max-height: 500px; overflow: overlay;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add User Note</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  		<span aria-hidden="true">&times;</span>
				</button>
			</div>
	    	<form class="form" action="ajax_request.php?callback=add_user_note" method="POST" id="add_note_form" autocomplete="off">
		  		<div class="modal-body">
		    		<div class="form-group">
						<label for="User Note">Add Note <span class="text-danger">*</span></label>
                        <textarea name="user_note" class="form-control" id="user_note" cols="30" rows="4" placeholder="Add a note"></textarea>
						<input type="hidden" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['user_record_detail']->value['email'];?>
">
                        <small class="input-error h4 text-danger"></small>
                        <small class="input-success h4 text-success"></small>
					</div>
		  		</div>
			  	<div class="modal-footer">
			    	<button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
			    	<button type="submit" class="btn btn-success">Save Note</button>
			  	</div>
	    	</form>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 offset-md-1 col-12">
			<div class="p-3 border rounded border-secodary bg-light">
				<h1 class="text-center text-uppercase">Dashboard Panel</h1>
				<div>
                    <?php if (!$_smarty_tpl->tpl_vars['user_record_detail']->value) {?>
                        <table class="table" id="user_records">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Occupation</th>
                                    <th>Date of birth</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
                                    <th>User Tags</th>
                                    <th>User Note</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="empty-records d-none text-center">
                            <img src="undraw_empty_xct9.svg" alt="Empty records" width="250px">
                            <p class="text-danger">No Records Found</p>
                        </div>
                    <?php } else { ?>
                        <div class="d-flex justify-content-between">
                            <h4><a href="dashboard.php" title="Go back to home" data-toggle="tooltip"><i class="fa fa-home"></i></a> User Record Detail</h4>
                            <div>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-note-modal">Add Note</button>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-tag-modal">Add Tag</button>
                            </div>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><?php if ($_smarty_tpl->tpl_vars['user_record_detail']->value['profile']) {?><img class="img-thumbnail" width="120" src="uploads/profiles/<?php echo $_smarty_tpl->tpl_vars['user_record_detail']->value['profile'];?>
"><?php } else { ?><i class="fa fa-user-alt"></i><?php }?></td>
                                    <td class="text-right align-middle"><a href="uploads/resume_files/<?php echo $_smarty_tpl->tpl_vars['user_record_detail']->value['resume_file'];?>
">Resume File</a></td>
                                </tr>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_record_detail']->value, 'value', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                                <?php if ($_smarty_tpl->tpl_vars['name']->value == 'profile' || $_smarty_tpl->tpl_vars['name']->value == 'resume_file') {?>
                                    <?php continue 1;?>
                                <?php }?>
                                <tr>
                                    <th><?php echo smarty_modifier_capitalize(implode(explode('_',$_smarty_tpl->tpl_vars['name']->value),' '));?>
</th>
                                    <td>
                                        <?php if (empty($_smarty_tpl->tpl_vars['value']->value)) {?>
                                            <i class="text-info">Not mentioned</i>
                                        <?php } else { ?>
                                            <?php if ($_smarty_tpl->tpl_vars['name']->value == 'user_tags') {?>
                                                <?php $_smarty_tpl->_assignInScope('user_tags', json_decode($_smarty_tpl->tpl_vars['value']->value));?>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_tags']->value, 'tag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
?>
                                                    <span class="badge badge-primary"><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</span>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            <?php } else { ?>
                                            <?php echo $_smarty_tpl->tpl_vars['value']->value;?>

                                            <?php }?>
                                        <?php }?></td>
                                </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    <?php }?>
                </div>
			</div> 
		</div>
	</div>
</div>


<?php echo '<script'; ?>
>
	var error = '';
	var notice = '';
    var user_tags = '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_record_detail']->value['user_tags'])===null||$tmp==='' ? '' : $tmp);?>
';
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

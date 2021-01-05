<?php
/* Smarty version 3.1.32, created on 2021-01-05 21:21:35
  from '/opt/lampp/htdocs/havi/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ff48b07a03973_34405782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8fb7f9e10cfa7714c83d42a6699a10cd061b530' => 
    array (
      0 => '/opt/lampp/htdocs/havi/templates/index.tpl',
      1 => 1609858801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ff48b07a03973_34405782 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 offset-md-2 col-12">
			<div class="alert alert-success alert-dismissible fade show notice d-none">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success!</strong> <span></span>
			</div>
			<div class="alert alert-danger alert-dismissible fade show error d-none">
				<button type="button" class="close">&times;</button>
				<strong>Error!</strong> <span></span>
			</div>
			<div class="p-3 border rounded border-secodary bg-light">
				<h1 class="text-center">FILL UP THE FORM</h1>
				<hr>
				<div class="row mt-4">
					<div class="col-md-9 col-12 mx-auto">
						<p class=""><span class="text-danger">Info: </span> All Fields are required.</p>
						<form action="add_record_process.php" methid="POST" class="form" enctype="multipart/form-data" id="add_record_form">
							<div class="form-group">
								<label for="Full Name">Full Name</label>
								<input type="text" class="form-control" name="name" placeholder="John Doe">	
							</div>
							<div class="form-group">
								<label for="Email Id">Email Address</label>
								<input type="text" class="form-control" name="email" placeholder="johndoe95@gmail.com">	
							</div>
							<div class="form-group">
								<label for="Mobile Number">Mobile Number</label>
								<input type="text" class="form-control" name="mobile" placeholder="+91 99xxx-xxx99">	
							</div>
							<div class="form-group">
								<label for="Password">Set Password</label>
								<input type="password" class="form-control" name="password" placeholder="******">	
							</div>
							<div class="form-group">
								<label for="Occupation">Occupation/Work</label>
								<select name="occupation" id="occupation" class="form-control">
									<?php $_smarty_tpl->_assignInScope('occupation_list', array('Doctor','Engineer','Civil Services','Business','Teacher','Developer','Other'));?>

									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['occupation_list']->value, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value) {
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
							</div>
							<div class="form-group">
								<label for="Short bio">About You <div class="d-inline-block text-secondary small"><span class="counter">0</span> / 250</div></label>
								<textarea name="short_bio" id="short_bio" cols="30" rows="3" placeholder="i love to play cricket and reading books." class='form-control'></textarea>
							</div>
							<div class="form-group">
								<label for="Date of birth">Date of birth</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
									<input type="text" class="form-control" name="dob" id="dob">
								</div>
							</div>
							<div class="form-group">
								<label for="Gender">Gender</label>
								<div class="row">
									<div class="col-3">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" id="male" name="gender" value="male">
											<label class="custom-control-label" for="male">Male</label>
										</div>
									</div>
									<div class="col-3">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" id="female" name="gender" value="female">
											<label class="custom-control-label" for="female">Female</label>
										</div>
									</div>
									<div class="col">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" id="other" name="gender" value="other">
											<label class="custom-control-label" for="other">Other</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="Upload Profile Img">Upload Profile</label>
								<div class="custom-file">
									<input type="file" name="profile" id="profile" class="custom-file-input">
									<label for="profile_img" class="custom-file-label">Click Here to Upload Profile</label>
									<p class="small text-secondary">Profile picture accepted only in png or jpeg.</p>
								</div>
							</div>
							<div class="form-group">
								<label for="Upload Resume">Upload Resume</label>
								<div class="custom-file">
									<input type="file" name="resume" id="resume_file" class="custom-file-input">
									<label for="resume_file" class="custom-file-label">Click Here to Upload Resume</label>
									<p class="small text-secondary">Resume file format should be PDF.</p>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-success">Submit Form</button>
							</div>
						</form>
					</div>
				</div>
			</div> 
		</div>
	</div>
</div>

<?php echo '<script'; ?>
>
	var error = '';
	var notice = '';
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

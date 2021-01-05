{include file="header.tpl"}
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
						<input type="hidden" name="email" id="email" value="{$user_record_detail.email}">
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
						<input type="hidden" name="email" id="email" value="{$user_record_detail.email}">
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
                    {if !$user_record_detail}
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
                    {else}
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
                                    <td>{if $user_record_detail.profile}<img class="img-thumbnail" width="120" src="uploads/profiles/{$user_record_detail.profile}">{else}<i class="fa fa-user-alt"></i>{/if}</td>
                                    <td class="text-right align-middle"><a href="uploads/resume_files/{$user_record_detail.resume_file}">Resume File</a></td>
                                </tr>
                                {foreach $user_record_detail as $name => $value}
                                {if $name == 'profile' || $name == 'resume_file'}
                                    {continue}
                                {/if}
                                <tr>
                                    <th>{'_'|explode:$name|implode:' '|capitalize}</th>
                                    <td>
                                        {if empty($value)}
                                            <i class="text-info">Not mentioned</i>
                                        {else}
                                            {if $name == 'user_tags'}
                                                {assign user_tags $value|json_decode}
                                                {foreach $user_tags as $tag}
                                                    <span class="badge badge-primary">{$tag}</span>
                                                {/foreach}
                                            {else}
                                            {$value}
                                            {/if}
                                        {/if}</td>
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    {/if}
                </div>
			</div> 
		</div>
	</div>
</div>


<script>
	var error = '';
	var notice = '';
    var user_tags = '{$user_record_detail.user_tags|default:''}';
</script>

{include file="footer.tpl"}

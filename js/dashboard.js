$("#user_tags").tagit({
    tagLimit: 5,
    allowDuplicates: false,
    availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"],
    beforeTagAdded: function(event, ui) {
        recent_tag = $(ui.tag).find('input').attr('name','tags[]');
        // console.log(recent_tag);
    },
});

if(user_tags != ''){
    user_tags = JSON.parse(user_tags);
    user_tags.forEach(function(tag){
        // console.log(tag);
        $("#user_tags").tagit("createTag", tag);
    });
}

$("#add_tag_form").submit(function(e){
    e.preventDefault();
    page_action = $(this).attr('action');
    var form_data = $(this).serializeArray();
    console.log(form_data);
    var has_error = false;
    $("#add_tag_form").find(".input-error, .input-success").text('');
    
    if($("[name='tags[]']").length == 0) {
        $("#add_tag_form").find(".input-error").text('Add some user tags');
        return false;
    }

    $.ajax({
        method: 'POST',
        url: page_action,
        data: form_data,
        success: function(data){
            console.log(data);
            data = JSON.parse(data);
            if(typeof data.err != 'undefined') {
                $("#add_tag_form").find(".input-error").text(data.err);
            }
            else {
                console.log(data.notice)
                $("#add_tag_form").find(".input-success").text(data.notice);
                setTimeout(function(){ window.location.reload(); },  1500);
            }
        },
        error: function(xhr, status, error){
        },
        complete: function(xhr, status){
            // console.log(xhr)
            // console.log(status)
        }
    })
})

$("#add_note_form").submit(function(e){
    e.preventDefault();
    page_action = $(this).attr('action');
    var form_data = $(this).serializeArray();
    console.log(form_data);
    var has_error = false;
    $("#add_note_form").find(".input-error, .input-success").text('');
    
    if($("#user_note").val().trim() == '') {
        $("#add_note_form").find(".input-error").text('Add user note');
        return false;
    }

    $.ajax({
        method: 'POST',
        url: page_action,
        data: form_data,
        success: function(data){
            data =  JSON.parse(data);
            console.log(data);

            if(typeof data.err != 'undefined') {
                $("#add_note_form").find(".input-error").text(data.err);
            }
            else {
                $("#add_note_form").find(".input-success").text(data.notice);
                setTimeout(function(){ window.location.reload(); },  1500);
            }
        },
        error: function(xhr, status, error){
        },
        complete: function(xhr, status){
            // console.log(xhr)
            // console.log(status)
        }
    })
})

column_defs = [
    {
        'data': 'profile',
        'searchable': false,
        'targets': [0],
        'className': 'noVis',
        'render': function(data, type, row, meta){
            if(data)
                return '<img class="img-thumbnail" width="60" src="uploads/profiles/'+data+'">';
            else
                return '<i class="fa fa-user-circle text-light"></i>';
        }
    },
    {
        'data': 'email',
        'searchable': true,
        'targets': [1],
        'className': 'noVis',
        'render': function(data, type, row, meta){
            return data+ ' <a title="View User Record" data-toggle="tooltip" data-placement="" href="dashboard.php?email='+data+'"><i class="fa fa-eye"></i></a>';
        }
    },
    {
        'data': 'name',
        'searchable': true,
        'targets': [2],
    },
    {
        'data': 'occupation',
        'searchable': true,
        'targets': [3]
    },
    {
        'data': 'dob',
        'searchable': true,
        'targets': [4]
    },
    {
        'data': 'mobile',
        'searchable': true,
        'targets': [5],
        'visible': false
    },
    {
        'data': 'gender',
        'searchable': true,
        'targets': [6],
        'visible': false
    },
    {
        'data': 'user_tags',
        'searchable': true,
        'targets': [7],
        'visible': false,
        'render': function(data, type, row, meta){
            if(data != '') {
                data = JSON.parse(data);
                let tags = '';
                $.each(data, function(i, v){
                    tags += '<span class="badge badge-primary d-inline-block mr-1">'+v+'</span>';
                })
                return tags;
            }
            else {
                return '<i>N/A</i>';
            }
        }
    },
    {
        'data': 'user_note',
        'searchable': true,
        'targets': [8],
        'visible': false,
        'render': function(data, type, row, meta){
            console.log(row)
            if(data != '') {
                if(data.length > 255) {
                    return '<p class="text-secondary small">'+data.slice(0, 255) + '<a href="dashboard.php?email='+row.email+'" data-toggle="tootlip" title="Clic to view full note">.... Click to view</a></p>'
                }
                else
                    return '<p class="text-secondary small">'+data+'</p>';
            }
            else {
                return '<i>N/A</i>';
            }
        }
    },
];

var mytabel = $('#user_records').DataTable({
    'paging': true,
    "processing": true,
    "searching": true,
    "searchDelay": 550,
    "serverSide": true,
    "columnDefs": column_defs,
    "order": [[0, "desc"]],
    "stateSave": true,
    "pagingType": "simple_numbers",
    "scrollY":        "500px",
    "scrollCollapse": true,
    "lengthChange": true,
    "lengthMenu": [ 15, 30, 50 ],
    "pageLength": 15,
    "language": {
        "info": "Showing page _PAGE_ of _PAGES_"
    },
    "dom": 'Bfrtip',
    "buttons": [
        {
            extend: 'colvis',
            columns: ':not(.noVis)'
        }
    ],
    "initComplete": function() {
        var is_empty = $('body').find('.dataTables_empty').length;

        if(is_empty) {
            $(".empty-records").removeClass('d-none');   
            $('#user_records_wrapper, .bulk, .recently_added, .dataTables_info, .dataTables_paginate, .dataTables_filter, .dataTables_length, .filter_by').addClass('d-none');
        }

        $(".dataTables_filter input")
        .unbind() // Unbind previous default bindings
        .bind("input", function(e) { // Bind our desired behavior
            // If the length is 3 or more characters, or the user pressed ENTER, search
            if(this.value.length > 3 || e.keyCode == 13) {
                // Call the API search function
                mytabel.search(this.value).draw();
            }
            // Ensure we clear the search if they backspace far enough
            if(this.value == "") {
                mytabel.search("").draw();
            }
            return;
        });
    },
    "drawCallback": function( settings ) {
         
    },
    "ajax": {
        "url": "ajax_request.php?callback=getUserRecords",
        "method": "POST",
        "dataSrc": function(data) {
            // data = JSON.parse(data.data);
            // data = data.data;
            console.log(data);
            var table_data = data.data;
            $(".total_resource").text(table_data.length);
            return data.data;
        }
    }
});
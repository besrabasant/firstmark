

$(document).ready(function () {

//  DATE OF BIRTH DATE PICKER
    $('.date-picker').datepicker({'autoclose': true, 'format': 'dd/mm/yyyy'});
    // BLOOD GROUP SELECT BOX

    $(".select2-list").each(function () {
        var ret = $(this).select2({
            allowClear: true,
            minimumResultsForSearch: Infinity
        });
        // custom scrollbars
        var s;
        ret.on("select2-open", function () {
            if (!s) {
                s = $('.select2-drop-active > .select2-results');
                s.niceScroll({
                    autohidemode: false,
                    cursorcolor: "#a4d9fc",
                    cursorwidth: 10,
                    scrollspeed: 40,
                    mousescrollstep: 20,
                    zindex: 99999
                });
            }
        });
    });
    //ADD IMAGE BUTTON

    $('#add-image-btn').click(function (e) {
        e.preventDefault();
        $('#add-image').click();
    });
    $('#remove-image-btn').click(function () {
        $('#add-image').val('');
        $('#remove-image-btn').toggle();
        $('#add-image-btn').toggle();
        $('#add-image-preview').attr('src', '').toggle();
        $('#add-image-field').toggle();
    });
    $('#add-image').change(function () {
        $('#add-image-btn').toggle();
        $('#remove-image-btn').toggle();
        var selectedFile = this.files[0];
        selectedFile.convertToBase64(function (base64) {
            $('#add-image-preview').toggle().attr('src', base64);
        });
        $('#add-image-field').toggle();
    });
    $('#student_contact').click(function () {
        $('#parent-contact-details').toggleClass('opacity-50');
        $(':input', '#parent-contact-details').attr('disabled', !(!$(this).attr('checked')));
        $('textarea', '#parent-contact-details:textarea').attr('disabled', !(!$(this).attr('checked')));
    });
    $('#search-parents-submit').click(function () {
        var postData = {
            'search_param': $('select#search_param').val(),
            'search_value': $('input#search_value').val()
        };
        $.post(baseUrl() + '/parent/search', postData, function (result) {
            console.log(result);
            var html = "";
            if (result == []) {
                html += '<tr>'
                        + '<td colspan="6">'
                        + 'No match Found!!'
                        + '</td>'
                        + '</tr>';
            } else {
                $.each(result, function (index, row) {
                    html += '<tr>'
                            + '<td class="width-1">'
                            + '<div class=" pull-right checkbox checkbox-inline checkbox-styled">'
                            + '<label><input type="checkbox" value="' + row.parent_id + '" name="existing_parent"><span></span></label>'
                            + '</div>'
                            + '</td>'
                            + '<td>' + row.reg_id + '</td>'
                            + '<td>' + row.father_name + '</td>'
                            + '<td>' + row.mother_name + '</td>'
                            + '<td>' + row.phone + '</td>'
                            + '<td>' + row.email + '</td>'
                            + '</tr>';
                });
            }
            $('table#parent-search-results > tbody').html('').append(html);
        }, 'json');
    });
    //ADD DOCUMENT

    $('#add-document-btn').click(function () {
        $('<tr class="fade in" >'
                + '<td><img class="width-4" src="">'
                + '<input id="upload-document" name="document_file[]" type="file" class="form-control" style="display:none"></td>'
                + '<td><br><div class="form-group">'
                + '<input name="document_name[]" type = "text" class = "form-control" >'
                + '<label for = "document_name[]" > Enter Document Name </label>'
                + '</div></td >'
                + '<td class="text-center"><a role="button" id="remove-document" style="display: inline-block;" class=" pull-right btn ink-reaction btn-raised btn-danger v-top">'
                + 'Remove'
                + '</a></td></tr>').appendTo('table#documents>tbody').hide().find('#upload-document').trigger('click');
        
    });

    $(this).on('click', '#remove-document',function () {
        $(this).closest('tr').detach();
    });

    $(this).on('change', '#upload-document', function () {
        var tr = $(this).closest('tr');
        var selectedFile = this.files[0];
        console.log(selectedFile);
        selectedFile.convertToBase64(function (base64) {
            tr.find('img').attr('src', base64);
        });
        tr.show().fadeIn();
    });


    $("[rel='tooltip']").tooltip();

    $('.select2-results').addClass('scroll');
    
    $("#action").click(function(){
        $('input[name=hidden_action]').val($(this).data('action'));
        $('#form-submit').trigger('click');
    });
    
    //FETCHING DATA INTO MODALS AND OFF-CANVAS ELEMENTS
    
    $('#editClassModal').on('show.bs.modal', function (event) {
        
        var modal = $(this);
        var classId = $(event.relatedTarget).closest('tr').attr('data-index');
        
        var url = baseUrl()+'/class/edit/'+classId;
        $.getJSON(url,function(data){
            modal.find('input#class_id').val(data.class_id);
            modal.find('input#class_code').val(data.class_code);
            modal.find('input#class_name').val(data.class_name);
            modal.find('input#room_no').val(data.room_no);
        });
        
    });
    
    $('#editSectionModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        var sectionId = $(event.relatedTarget).closest('tr').attr('data-index');
        var url = baseUrl()+'/section/edit/'+sectionId;
        $.getJSON(url,function(data){
            modal.find('input#section_id').val(data.section_id);
            modal.find('input#section_name').val(data.section_name);
        });
        
    });
    
    $('#editSubjectModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        var subjectId = $(event.relatedTarget).closest('tr').attr('data-index');
        var url = baseUrl()+'/subject/edit/'+subjectId;
        $.getJSON(url,function(data){
            modal.find('input#subject_id').val(data.subject_id);
            modal.find('input#subject_name').val(data.subject_name);
            modal.find('input#subject_code').val(data.subject_code);
        });
        
    });
    
    
    
    
    

});
function formatDate(input) {
    var datePart = input.match(/\d+/g),
            year = datePart[0], // get only two digits
            month = datePart[1], day = datePart[2];
    return day + '/' + month + '/' + year;
}

function which_gender(id) {
    var gender;
    switch (id) {
        case '0' :
            gender = 'Male';
            break;
        case '1' :
            gender = 'Female';
            break;
        case '2' :
            gender = 'Transgender';
            break;
    }
    return gender;
}

function baseUrl() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    return base_url;
}

File.prototype.convertToBase64 = function (callback) {
    var FR = new FileReader();
    FR.onload = function (e) {
        callback(e.target.result);
    };
    FR.readAsDataURL(this);
};
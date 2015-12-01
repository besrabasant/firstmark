

$(document).ready(function(){
    
    $('html').niceScroll({
                    autohidemode: false,
                    cursorcolor: "#a4d9fc",
                    cursorwidth: 12,
                    scrollspeed: 300,
                    mousescrollstep: 60,
                    zindex: 1030
                });
    
    //  DATE OF BIRTH DATE PICKER
    $('#date-of-birth').datepicker({'autoclose':true,'format':'dd/mm/yyyy'});
    
    // BLOOD GROUP SELECT BOX
           
        $(".select2-list").each(function(){
        var ret     = $(this).select2({
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
        
   // INPUT MASK INIT 
   /*$("#phone").inputmask({mask: "999-999-9999", showMaskOnHover: false});
   
    $('#email').inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy: false,
            onBeforePaste: function (pastedValue, opts) {
                pastedValue = pastedValue.toLowerCase();
                return pastedValue.replace("mailto:", "");
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                    cardinality: 1,
                    casing: "lower"
                }
            },
            showMaskOnHover: false
    });*/
    
    
    
    //ADD IMAGE BUTTON
    
    $('#add-image-btn').click(function(e){
       e.preventDefault();
       $('#add-image').click();
    });
    
    $('#remove-image-btn').click(function(){
        console.log('removed');
        $('#add-image').val('');
        $('#add-image-field').val('');
        $('#remove-image-btn').toggle();
        $('#add-image-btn').removeClass('disabled');
    });
    
    $('#add-image').change(function(){
            $('#add-image-field').val($(this).val());
            $('#remove-image-btn').toggle();
            $('#add-image-btn').addClass('disabled');
    });
    
    
    //DATATABLE INIT
    $('#table-students').DataTable({
        "dom": 'lCfrtip',
        "order": [],
        "colVis": {
                "buttonText": "Select Columns",
                "overlayFade": 0,
                "align": "right",
                "exclude": [ 7 ]
        },
        "language": {
                "lengthMenu": 'View _MENU_ <button id="view_nos" type="button" class="btn ink-reaction btn-icon-toggle"><i class="fa fa-angle-down"></i></button> students per page',
                "search": '<i class="fa fa-search"></i>',
                "paginate": {
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>'
                }
        }
		
    });
    
    $("[rel='tooltip']").tooltip();
    
    
    // ADD MATERIAL DESIGN TO ELEMENTS IN DATA TABLES
    $('button.ColVis_Button').removeClass('ColVis_Button ColVis_MasterButton').addClass('btn btn-block ink-reaction btn-default-bright').append('<i style="margin-left:5px;" class="fa fa-caret-down text-default-light"></i>');
    
    $('button','.ColVis').click( function(){
        $('label','ul.ColVis_collection').addClass('checkbox-styled checkbox-primary');
    });
    
    $('.select2-results').addClass('scroll');
    
    
    //FETCHING DATA INTO MODALS AND OFF-CANVAS ELEMENTS
    
    $('#editClassModal').on('show.bs.modal', function (event) {
        
        var modal = $(this);
        var classId = $(event.relatedTarget).closest('tr').attr('data-classindex');
        
        var url = baseUrl()+'/school/edit_class/'+classId;
        $.getJSON(url,function(data){
            modal.find('input#class_id').val(data[0].class_id);
            modal.find('input#class_name').val(data[0].class_name);
            modal.find('input#room_no').val(data[0].room_no);
        });
        
    });
    
    $('a[href=#editStudentInformation]').on('click', function (event) {
        var studentId = $(this).closest('tr').attr('data-Index');
        var offcanvas = $('div#editStudentInformation');
        
        $.getJSON(baseUrl()+'/student/view/'+studentId,function(data){
            offcanvas.find('input#first_name').val(data[0].first_name);
            offcanvas.find('input#middle_name').val(data[0].middle_name);
            offcanvas.find('input#last_name').val(data[0].last_name);
            offcanvas.find('input#gender').val(which_gender(data[0].gender));
            offcanvas.find('input#d_o_b').val(formatDate(data[0].d_o_b));
            
            offcanvas.find('img#image_name').attr('src', baseUrl()+'/uploads/student/photo/'+ data[0].image_name);
            offcanvas.find('input#phone').val(data[0].phone);
            offcanvas.find('input#email').val(data[0].email);
            offcanvas.find('input#address').val(data[0].address);
            offcanvas.find('input#religion').val(data[0].religion);
            
            offcanvas.find('input#blood_group').val(data[0].blood_group);
            $.getJSON(baseUrl()+'/school/edit_class/'+data[0].class_id,function(data){
                offcanvas.find('input#class').val(data[0].class_name);
            });
            offcanvas.find('input#section_id').val(data[0].section_id);
            offcanvas.find('input#transport_id').val(data[0].transport_id);
            offcanvas.find('input#dormitory_id').val(data[0].dormitory_id);

         });
        
    });
    
    $('a[href=#viewStudentInformation]').on('click', function (event) {
        
        var studentId = $(this).closest('tr').attr('data-Index');
        var offcanvas = $('div#viewStudentInformation');
        
        $.getJSON(baseUrl()+'/student/view/'+studentId,function(data){
            offcanvas.find('div#first_name').text(data[0].first_name);
            offcanvas.find('div#middle_name').text(data[0].middle_name);
            offcanvas.find('div#last_name').text(data[0].last_name);
            offcanvas.find('div#gender').text(which_gender(data[0].gender));
            offcanvas.find('img#image_name').attr('src', baseUrl()+'/uploads/student/photo/'+ data[0].image_name);
            offcanvas.find('div#phone').text(data[0].phone);
            offcanvas.find('div#email').text(data[0].email);
            offcanvas.find('div#address').text(data[0].address);
            offcanvas.find('div#religion').text(data[0].religion);
            offcanvas.find('div#d_o_b').text(formatDate(data[0].d_o_b));
            offcanvas.find('div#blood_group').text(data[0].blood_group);
            $.getJSON(baseUrl()+'/school/edit_class/'+data[0].class_id,function(data){
                offcanvas.find('div#class').text(data[0].class_name);
            });
            offcanvas.find('div#section_id').text(data[0].section_id);
            offcanvas.find('div#transport_id').text(data[0].transport_id);
            offcanvas.find('div#dormitory_id').text(data[0].dormitory_id);

         });
        
        
    });
    
    
    
    
    
});


function formatDate (input) {
  var datePart = input.match(/\d+/g),
  year = datePart[0], // get only two digits
  month = datePart[1], day = datePart[2];

  return day+'/'+month+'/'+year;
}

function which_gender(id) {
    var gender;
    switch(id){
        case '0' : gender = 'Male'; break;
        case '1' : gender = 'Female'; break;
        case '2' : gender = 'Transgender'; break;
    }
    return gender;
}

function baseUrl() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    return base_url;
}
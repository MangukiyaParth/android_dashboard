var table;
var SUBPRIMARYID = 0;
jQuery(function () {
    fill_details();
    get_data();
    $(".table-filter-data").on('click', async function(){
        $(".table-filter-data").removeClass('active');
        $(this).addClass('active');
        var extra_option = $(this).attr('data-filter-type');
        $("#extra_option").val(extra_option);
        await table.clearPipeline().draw();
    });
});
function resetform(){
    $('#formevent').val('submit');
}

function fill_details(){
    if($("#playstore").html().trim() == "" || $("#car_type").html().trim() == ""){
        showLoading();
        var req_data = {
            op: "get_details"
            , action: "get_data"
        };
        doAPICall(req_data, async function(data){
            if (data && data != null && data.success) {
                hideLoading();
                var playstoreData = data.playstore;
                var adxData = data.adx;

                if (playstoreData && playstoreData.length > 0) {
                    var playstore_html = "";
                    playstoreData.forEach(playstores => {
                        playstore_html += `<option value="${playstores.id}">${playstores.name}</option>`;
                    });
                    $("#playstore").html(playstore_html);
                    if(CURRENT_DATA.playstore){
                        $("#playstore").val(CURRENT_DATA.playstore).trigger('change');    
                    }
                    else{
                        $("#playstore").trigger('change');
                    }
                }
                if (adxData && adxData.length > 0) {
                    var adx_html = "";
                    adxData.forEach(adx => {
                        adx_html += `<option value="${adx.id}">${adx.name}</option>`;
                    });
                    $("#adx").html(adx_html);
                    if(CURRENT_DATA.adx){
                        $("#adx").val(CURRENT_DATA.adx).trigger('change');    
                    }
                    else{
                        $("#adx").trigger('change');
                    }
                }
                return false;
            }
            else if (data && data != null && !data.success) {
                hideLoading();
                showError(data.message);
                return false;
            }
        });
    }
    else {
        if(CURRENT_DATA.length != 0){
            $("#playstore").val(CURRENT_DATA.playstore).trigger('change');    
            $("#adx").val(CURRENT_DATA.adx).trigger('change');
        }
    }
}

function get_data() {
    table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        fixedHeader: true,
        pagingType: "full_numbers",
        responsive: !0,
        language: { paginate: { previous: "<i class='mdi mdi-chevron-left'>", next: "<i class='mdi mdi-chevron-right'>" } },
        drawCallback: function () { $(".dataTables_paginate > .pagination").addClass("pagination-rounded") },
        ajax: $.fn.dataTable.pipeline({
            url: API_SERVICE_URL,
            pages: 1, // number of pages to cache
            op: CURRENT_PAGE,
            action: "get_data"
        }),
        columns: [
            { data: 'id', name: 'id', "width": "0%", className: "d-none" },
            { data: 'app_code', name: 'app_code', width: "10%" },
            {
                data: 'file',
                orderable: false,
                render: function (data, type, row) {
                    var details ='';
                    if(row.file)
                    {
                        details = "<a href='https://play.google.com/store/apps/details?id=" + row.package_name + "' target='_blank'><img class='dataTable-app-img' src='" + WEB_API_FOLDER + row.file + "'></a>";
                    }
                    return details;
                }, name: 'logo', width: "5%", className: "tbl-img"
            },
            {
                data: 'name',
                render: function (data, type, row) {
                    var details ='';
                    details = "<div>"+ row.app_name +"</div>";
                    if(row.package_name)
                    {
                        details+= "<div>"+ row.package_name +"</div>";
                    }
                    if(row.playstore)
                    {
                        details+= "<div>"+ row.playstore_name +"</div>";
                    }
                    return details;
                }, name: 'logo', width: "20%", className: ""
            },
            { data: 'adx_name', name: 'adx_name', width: "15%" },
            { data: 'status', name: 'status', width: "5%", orderable: false },
            { data: 'status', name: 'status', width: "5%", orderable: false },
            { data: 'status', name: 'status', width: "5%", orderable: false },
            { data: 'notes', name: 'notes', width: "15%", orderable: false },
            { data: 'days', name: 'entry_date', width: "7%" },
        ],
        "columnDefs": [{
            "targets": 10,
            "className": "text-end",
            "data": "id",
            "width": "13%",
            "render": function (data, type, row, meta) {
                var rowid="'"+row.id+"'";
                var html='';
                if(editright == 1)
                {
                    if(row.status == 1){
                        html+='<button class="btn tbl-btn" onclick="update_status(\'' + row.id + '\', 2)"><i class="fa-solid fa-check color-success"></i></button>';
                    }
                    html+='<button class="btn tbl-btn" onclick="edit_slider(' + meta.row + ')"><i class="fa-solid fa-pen"></i></button>';
                    html+='<button class="btn tbl-btn" onclick="openPage(\'manage_app_settings/' + row.id + '\')"><i class="fa-solid fa-gear"></i></button>';
                }
                if(deleteright == 1)
                {
                    html+='<button class="btn tbl-btn" onclick="delete_record(' + rowid + ')"><i class="fa-regular fa-trash-can"></i></button>';
                }
                return type === 'display' ? html: "";
            }
        }]
    });
    $(".extra-btn").css('right', ($("#datatable_filter label").width() + 50)+'px');
}
if($('#'+FORMNAME).length){		
    $('#'+FORMNAME).validate({
        rules:{
            app_name:{
                required: true,			
            },
        },messages:{
            app_name:{
                required:"name is required",
            },
        },
        submitHandler: function(form){
            showLoading();
            var req_data = {
                op: CURRENT_PAGE
                , action: "add_data"
                , playstore: $('#playstore').val()
                , adx: $('#adx').val()
                , app_code: $('#app_code').val()
                , app_name: $('#app_name').val()
                , package_name: $('#package_name').val()
                , web_url: $('#web_url').val()
                , notes: $('#notes').val()
                , status: $("[name='status']:checked").val()
                , formevent: $('#formevent').val()
                , id: $('#id').val()
            };
            if($('#file_name').val())
            {
                req_data['file']=JSON.stringify(JSON.parse($('#file_name').val()));
            }
            doAPICall(req_data, async function(data){
                if (data && data != null && data.success == true) {
                    changeView('details');
                    showMessage(data.message);
                    resetValidation(FORMNAME);
                    hideLoading();
                    await table.clearPipeline().draw();
                    return false;
                }
                else if (data && data != null && data.success == false) {
                    hideLoading();
                    showError(data.message);
                    return false;
                }
            });
        },
    });
}

function edit_slider(index) {
    if (TBLDATA.length > 0) {
        CURRENT_DATA = TBLDATA[index];
        $('#id').val(CURRENT_DATA.id);
        $("#playstore").val(CURRENT_DATA.playstore).trigger('change');    
        $("#adx").val(CURRENT_DATA.adx).trigger('change');

        $('#brand').val(CURRENT_DATA.brand);
        $('#app_code').val(CURRENT_DATA.app_code);
        $('#app_name').val(CURRENT_DATA.app_name);
        $('#package_name').val(CURRENT_DATA.package_name);
        $('#web_url').val(CURRENT_DATA.web_url);
        $('#notes').val(CURRENT_DATA.notes);
        $("[name='status'][value='"+CURRENT_DATA.status+"']").prop('checked', true);
        $('#formevent').val('update');
        var fileData = (CURRENT_DATA.file_data == "" || CURRENT_DATA.file_data == undefined) ? [] : JSON.parse(CURRENT_DATA.file_data);
        fileData.forEach(function(imgData) {
            imgData.upload = imgData;
            myDropzone[0].emit( "addedfile", imgData );
            myDropzone[0].emit( "thumbnail", imgData, WEB_API_FOLDER+imgData.url );
            myDropzone[0].files.push( imgData );
            imgData.upload = "";
        });
        if($("#file").attr('is-multipe') != 'true' && fileData.length > 0)
        {
            $("#file").addClass('dz-max-files-reached');
        }
        $('#file_name').val(JSON.stringify(fileData));

        changeView('form', true);
    }
}

function export_CSV(){
    var filter = $(".table-filter-data.active").attr('data-filter-type');
    // showLoading();
    $.ajax({
        url : API_SERVICE_URL.replace('manage.php','export_csv.php'), 
        type: 'POST',
        data: { op: CURRENT_PAGE, action: "export_csv", filter: filter },
        headers: {'Auth-Token': AUTH_TOKEN},
        success: function(data){
            console.log(data);
            var downloadLink = document.createElement("a");
            var fileData = ['\ufeff'+data];
            var blobObject = new Blob(fileData,{
                type: "text/csv;charset=utf-8;"
            });

            var url = URL.createObjectURL(blobObject);
            downloadLink.href = url;
            downloadLink.download = "apps.csv";

            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);

        }
    }).done(function (res) {
        console.log(res);
    }).fail(function (err) {
        console.log(err);
        let data = err.responseText;
        var downloadLink = document.createElement("a");
        var fileData = ['\ufeff'+data];
        var blobObject = new Blob(fileData,{
            type: "text/csv;charset=utf-8;"
        });

        var url = URL.createObjectURL(blobObject);
        downloadLink.href = url;
        downloadLink.download = "apps.csv";

        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    });
}

function export_CSV1(){
    var filter = $(".table-filter-data.active").attr('data-filter-type');
    // showLoading();
    var req_data = {
        op: CURRENT_PAGE
        , action: "export_csv"
        , filter: filter
    };
    doAPICall(req_data, async function(data){
        if (data && data != null && data.success == true) {
            console.log(data)
            hideLoading();
            return false;
        }
        else if (data && data != null && data.success == false) {
            hideLoading();
            showError(data.message);
            console.log(data)
            return false;
        }
    });
}

function update_status(id, new_status){
    showLoading();
    var req_data = {
        op: CURRENT_PAGE
        , action: "update_status"
        , id: id
        , status: new_status
    };
    doAPICall(req_data, async function(data){
        if (data && data != null && data.success == true) {
            showMessage(data.message);
            hideLoading();
            await table.clearPipeline().draw();
            return false;
        }
        else if (data && data != null && data.success == false) {
            hideLoading();
            showError(data.message);
            return false;
        }
    });
}
var table;
var SUBPRIMARYID = 0;
let subView = 1;
let extra_setting_fields = [];
var OrgData = [];
var MrktData = [];
jQuery(function () {
    PRIMARY_ID = localStorage.getItem('primary_id');
    changeSubView(1);
    manageDefaultInit();
    fill_app_details();
});


//================= Initial Functions =================
function fill_app_details(){
    showLoading();
    var req_data = {
        op: CURRENT_PAGE
        , action: "get_data"
        , id: PRIMARY_ID
    };
    doAPICall(req_data, async function(data){
        if (data && data != null && data.success) {
            hideLoading();
            var appData = data.data;
            OrgData = data.org_data;
            MrktData = data.mrkt_data;
            var html = `<div class="app-title-div">
                            <div class="app-title">
                                <img class="app-heading-img" src="${WEB_API_FOLDER+appData.file}" />
                                <div class="app-details-div">
                                    <h4>${appData.app_name}</h4>
                                    <h5>${appData.package_name}</h5>
                                </div>
                            </div>
                            <div class="app-action">
                                <a class="btn btn-warning organic-view-btn" href="javascript:void(0)" onclick="getResponse(1)">Organic</a>
                                <a class="btn btn-outline-warning marketing-view-btn" href="javascript:void(0)" onclick="getResponse(2)">Marketing</a>
                            </div>
                        </div>`;
            $(".page-name").html(html);
            return false;
        }
        else if (data && data != null && !data.success) {
            hideLoading();
            showError(data.message);
            return false;
        }
    });
}

function changeSubView(v){
    subView = v;
    if(v==1){
        $(".sub-view-btn").addClass('btn-light').removeClass('btn-outline-soft-warning');
        $(".user-view-btn").removeClass('btn-light').addClass('btn-outline-soft-warning').blur();
        $(".setting-div").addClass('d-none');
        $(".user-div").removeClass('d-none');
    }
    else if(v==2){
        $(".sub-view-btn").addClass('btn-light').removeClass('btn-outline-soft-warning');
        $(".retention-view-btn").removeClass('btn-light').addClass('btn-outline-soft-warning').blur();
        $(".setting-div").addClass('d-none');
        $(".user-div").removeClass('d-none');
    }
    else if(v==3){
        $(".sub-view-btn").addClass('btn-light').removeClass('btn-outline-soft-warning');
        $(".setting-o-view-btn").removeClass('btn-light').addClass('btn-outline-soft-warning').blur();
        $(".setting-div").removeClass('d-none');
        $(".user-div").addClass('d-none');
        FillSettingData();
    }
    else{
        $(".sub-view-btn").addClass('btn-light').removeClass('btn-outline-soft-warning');
        $(".setting-m-view-btn").removeClass('btn-light').addClass('btn-outline-soft-warning').blur();
        $(".setting-div").removeClass('d-none');
        $(".user-div").addClass('d-none');
        FillSettingData();
    }
}

function manageDefaultInit(){
    $('#vpn_country').tagEditor({
        placeholder: 'Enter countries ...',
        forceLowercase: false
    });
    $('#bifurcate_location').tagEditor({
        placeholder: 'Enter location ...',
        forceLowercase: false
    });
    // // addTag
    // $('#vpn_country').tagEditor('addTag', 'example');

    // // removeTag
    // $('#vpn_country').tagEditor('removeTag', 'example');

    // function resetform(){
    //     var tags = $('#vpn_country').tagEditor('getTags')[0].tags;
    //     if(tags){
    //         for (i = 0; i < tags.length; i++) { $('#vpn_country').tagEditor('removeTag', tags[i]); }
    //     }
    //     $('#formevent').val('submit');
    // }
}

function FillSettingData(){
    let appSettingData = [];
    if(subView == 3){
        appSettingData = OrgData;
    }
    else{
        appSettingData = MrktData;
    }

    $("#g1_percentage").val((appSettingData && appSettingData.g1_percentage) ? appSettingData.g1_percentage : '');
    $("#g2_percentage").val((appSettingData && appSettingData.g2_percentage) ? appSettingData.g2_percentage : '');
    $("#g3_percentage").val((appSettingData && appSettingData.g3_percentage) ? appSettingData.g3_percentage : '');
    $("#g1_account_name").val((appSettingData && appSettingData.g1_account_name) ? appSettingData.g1_account_name : '');
    $("#g2_account_name").val((appSettingData && appSettingData.g2_account_name) ? appSettingData.g2_account_name : '');
    $("#g3_account_name").val((appSettingData && appSettingData.g3_account_name) ? appSettingData.g3_account_name : '');
    $("#g1_banner").val((appSettingData && appSettingData.g1_banner) ? appSettingData.g1_banner : '');
    $("#g2_banner").val((appSettingData && appSettingData.g2_banner) ? appSettingData.g2_banner : '');
    $("#g3_banner").val((appSettingData && appSettingData.g3_banner) ? appSettingData.g3_banner : '');
    $("#g1_inter").val((appSettingData && appSettingData.g1_inter) ? appSettingData.g1_inter : '');
    $("#g2_inter").val((appSettingData && appSettingData.g2_inter) ? appSettingData.g2_inter : '');
    $("#g3_inter").val((appSettingData && appSettingData.g3_inter) ? appSettingData.g3_inter : '');
    $("#g1_native").val((appSettingData && appSettingData.g1_native) ? appSettingData.g1_native : '');
    $("#g2_native").val((appSettingData && appSettingData.g2_native) ? appSettingData.g2_native : '');
    $("#g3_native").val((appSettingData && appSettingData.g3_native) ? appSettingData.g3_native : '');
    $("#g1_native2").val((appSettingData && appSettingData.g1_native2) ? appSettingData.g1_native2 : '');
    $("#g2_native2").val((appSettingData && appSettingData.g2_native2) ? appSettingData.g2_native2 : '');
    $("#g3_native2").val((appSettingData && appSettingData.g3_native2) ? appSettingData.g3_native2 : '');
    $("#g1_appopen").val((appSettingData && appSettingData.g1_appopen) ? appSettingData.g1_appopen : '');
    $("#g2_appopen").val((appSettingData && appSettingData.g2_appopen) ? appSettingData.g2_appopen : '');
    $("#g3_appopen").val((appSettingData && appSettingData.g3_appopen) ? appSettingData.g3_appopen : '');
    $("#g1_appid").val((appSettingData && appSettingData.g1_appid) ? appSettingData.g1_appid : '');
    $("#g2_appid").val((appSettingData && appSettingData.g2_appid) ? appSettingData.g2_appid : '');
    $("#g3_appid").val((appSettingData && appSettingData.g3_appid) ? appSettingData.g3_appid : '');

    var all_ads = (appSettingData && appSettingData.all_ads) ? appSettingData.all_ads : 'false';
    var fullscreen = (appSettingData && appSettingData.fullscreen) ? appSettingData.fullscreen : 'false';
    var continue_screen = (appSettingData && appSettingData.continue_screen) ? appSettingData.continue_screen : 'false';
    var lets_start_screen = (appSettingData && appSettingData.lets_start_screen) ? appSettingData.lets_start_screen : 'false';
    var age_screen = (appSettingData && appSettingData.age_screen) ? appSettingData.age_screen : 'false';
    var next_screen = (appSettingData && appSettingData.next_screen) ? appSettingData.next_screen : 'false';
    var next_inner_screen = (appSettingData && appSettingData.next_inner_screen) ? appSettingData.next_inner_screen : 'false';
    var contact_screen = (appSettingData && appSettingData.contact_screen) ? appSettingData.contact_screen : 'false';
    var start_screen = (appSettingData && appSettingData.start_screen) ? appSettingData.start_screen : 'false';
    var real_casting_flow = (appSettingData && appSettingData.real_casting_flow) ? appSettingData.real_casting_flow : 'false';
    var app_stop = (appSettingData && appSettingData.app_stop) ? appSettingData.app_stop : 'false';

    $("[name='all_ads'][value='"+all_ads+"']").prop('checked', true);
    $("[name='fullscreen'][value='"+fullscreen+"']").prop('checked', true);
    $("#adblock_version").val((appSettingData && appSettingData.adblock_version) ? appSettingData.adblock_version : '');
    $("[name='continue_screen'][value='"+continue_screen+"']").prop('checked', true);
    $("[name='lets_start_screen'][value='"+lets_start_screen+"']").prop('checked', true);
    $("[name='age_screen'][value='"+age_screen+"']").prop('checked', true);
    $("[name='next_screen'][value='"+next_screen+"']").prop('checked', true);
    $("[name='next_inner_screen'][value='"+next_inner_screen+"']").prop('checked', true);
    $("[name='contact_screen'][value='"+contact_screen+"']").prop('checked', true);
    $("[name='start_screen'][value='"+start_screen+"']").prop('checked', true);
    $("[name='real_casting_flow'][value='"+real_casting_flow+"']").prop('checked', true);
    $("[name='app_stop'][value='"+app_stop+"']").prop('checked', true);

    var vpn = (appSettingData && appSettingData.vpn) ? appSettingData.vpn : 'false';
    var vpn_dialog = (appSettingData && appSettingData.vpn_dialog) ? appSettingData.vpn_dialog : 'false';
    var vpn_dialog_open = (appSettingData && appSettingData.vpn_dialog_open) ? appSettingData.vpn_dialog_open : 'false';
    $("[name='vpn'][value='"+vpn+"']").prop('checked', true);
    $("[name='vpn_dialog'][value='"+vpn_dialog+"']").prop('checked', true);
    $("[name='vpn_dialog_open'][value='"+vpn_dialog_open+"']").prop('checked', true);
    $("#vpn_url").val((appSettingData && appSettingData.vpn_url) ? appSettingData.vpn_url : '');
    $("#vpn_carrier_id").val((appSettingData && appSettingData.vpn_carrier_id) ? appSettingData.vpn_carrier_id : '');
    
    // Remove Existing tags
    clearTageditor('#vpn_country');
    if(appSettingData && appSettingData.vpn_country != ""){
        JSON.parse(appSettingData.vpn_country).forEach(tag => {
            $('#vpn_country').tagEditor('addTag', tag); 
        });
    }

    var app_remove_flag = (appSettingData && appSettingData.app_remove_flag) ? appSettingData.app_remove_flag : 'normal';
    console.log(app_remove_flag);
    $("[name='app_remove_flag'][value='"+app_remove_flag+"']").prop('checked', true);
    $("#app_version").val((appSettingData && appSettingData.app_version) ? appSettingData.app_version : '');
    $("#app_remove_title").val((appSettingData && appSettingData.app_remove_title) ? appSettingData.app_remove_title : '');
    $("#app_remove_description").val((appSettingData && appSettingData.app_remove_description) ? appSettingData.app_remove_description : '');
    $("#app_remove_url").val((appSettingData && appSettingData.app_remove_url) ? appSettingData.app_remove_url : '');
    $("#app_remove_button_name").val((appSettingData && appSettingData.app_remove_button_name) ? appSettingData.app_remove_button_name : '');
    $("#app_remove_skip_button_name").val((appSettingData && appSettingData.app_remove_skip_button_name) ? appSettingData.app_remove_skip_button_name : '');
}

//================= Google Functions =================
function saveGoogleId(){
    showLoading();
    var req_data = {
        op: CURRENT_PAGE
        , action: "save_google_data"
        , id: PRIMARY_ID
        , type: (subView == 3) ? 1 : 2
        , g1_percentage: $("#g1_percentage").val()
        , g2_percentage: $("#g2_percentage").val()
        , g3_percentage: $("#g3_percentage").val()
        , g1_account_name: $("#g1_account_name").val()
        , g2_account_name: $("#g2_account_name").val()
        , g3_account_name: $("#g3_account_name").val()
        , g1_banner: $("#g1_banner").val()
        , g2_banner: $("#g2_banner").val()
        , g3_banner: $("#g3_banner").val()
        , g1_inter: $("#g1_inter").val()
        , g2_inter: $("#g2_inter").val()
        , g3_inter: $("#g3_inter").val()
        , g1_native: $("#g1_native").val()
        , g2_native: $("#g2_native").val()
        , g3_native: $("#g3_native").val()
        , g1_native2: $("#g1_native2").val()
        , g2_native2: $("#g2_native2").val()
        , g3_native2: $("#g3_native2").val()
        , g1_appopen: $("#g1_appopen").val()
        , g2_appopen: $("#g2_appopen").val()
        , g3_appopen: $("#g3_appopen").val()
        , g1_appid: $("#g1_appid").val()
        , g2_appid: $("#g2_appid").val()
        , g3_appid: $("#g3_appid").val()
    };
    doAPICall(req_data, async function(data){
        if (data && data != null && data.success) {
            hideLoading();
            showMessage(data.message);
            return false;
        }
        else if (data && data != null && !data.success) {
            hideLoading();
            showError(data.message);
            return false;
        }
    });
}

function addGoogleTestId(){
    $("#g1_banner").val('ca-app-pub-3940256099942544/630097811');
    $("#g2_banner").val('ca-app-pub-3940256099942544/630097811');
    $("#g3_banner").val('ca-app-pub-3940256099942544/630097811');

    $("#g1_inter").val('ca-app-pub-3940256099942544/1033173712');
    $("#g2_inter").val('ca-app-pub-3940256099942544/1033173712');
    $("#g3_inter").val('ca-app-pub-3940256099942544/1033173712');

    $("#g1_native").val('ca-app-pub-3940256099942544/2247696110');
    $("#g2_native").val('ca-app-pub-3940256099942544/2247696110');
    $("#g3_native").val('ca-app-pub-3940256099942544/2247696110');
    
    $("#g1_native2").val('ca-app-pub-3940256099942544/2247696110');
    $("#g2_native2").val('ca-app-pub-3940256099942544/2247696110');
    $("#g3_native2").val('ca-app-pub-3940256099942544/2247696110');
    
    $("#g1_appopen").val('ca-app-pub-3940256099942544/3419835294');
    $("#g2_appopen").val('ca-app-pub-3940256099942544/3419835294');
    $("#g3_appopen").val('ca-app-pub-3940256099942544/3419835294');

    $("#g1_appid").val("");
    $("#g2_appid").val("");
    $("#g3_appid").val("");
}

function resetGoogleForm(){
    $("#g1_banner").val("");
    $("#g2_banner").val("");
    $("#g3_banner").val("");
    $("#g1_inter").val("");
    $("#g2_inter").val("");
    $("#g3_inter").val("");
    $("#g1_native").val("");
    $("#g2_native").val("");
    $("#g3_native").val("");
    $("#g1_native2").val("");
    $("#g2_native2").val("");
    $("#g3_native2").val("");
    $("#g1_appopen").val("");
    $("#g2_appopen").val("");
    $("#g3_appopen").val("");
    $("#g1_appid").val("");
    $("#g2_appid").val("");
    $("#g3_appid").val("");
}


//================= Other Setting Functions =================
function saveOtherSettings(){
    showLoading();
    var req_data = {
        op: CURRENT_PAGE
        , action: "save_oher_settings"
        , id: PRIMARY_ID
        , type: (subView == 3) ? 1 : 2
        , all_ads: $("[name='all_ads']:checked").val()
        , fullscreen: $("[name='fullscreen']:checked").val()
        , adblock_version: $("#adblock_version").val()
        , continue_screen: $("[name='continue_screen']:checked").val()
        , lets_start_screen: $("[name='lets_start_screen']:checked").val()
        , age_screen: $("[name='age_screen']:checked").val()
        , next_screen: $("[name='next_screen']:checked").val()
        , next_inner_screen: $("[name='next_inner_screen']:checked").val()
        , contact_screen: $("[name='contact_screen']:checked").val()
        , start_screen: $("[name='start_screen']:checked").val()
        , real_casting_flow: $("[name='real_casting_flow']:checked").val()
        , app_stop: $("[name='app_stop']:checked").val()
    };
    doAPICall(req_data, async function(data){
        if (data && data != null && data.success) {
            hideLoading();
            showMessage(data.message);
            return false;
        }
        else if (data && data != null && !data.success) {
            hideLoading();
            showError(data.message);
            return false;
        }
    });
}

function add_setting_field() {
    $("#add_setting_field_modal").modal('show');
}

function append_setting_field(){
    var field_name = $("#add_setting_field_modal #field_name").val();
    var field_type = $("#add_setting_field_modal [name='field_type']:checked").val();
    if(field_name && field_name != ""){
        var new_field = {
            field_name: field_name,
            field_type: field_type
        };
        extra_setting_fields.push(new_field);
        // var new_index = $("#setting_table tr.extra").length;
        var new_index = Date.now().toString();
        add_extra_setting_field(new_field, new_index);
        $("#add_setting_field_modal").modal('hide');
    }
    else{showError("Please add field name")}
}

function add_extra_setting_field(fieldData, index = '0'){
    var html = `<tr class="extra" id="extra${index}">
                    <td>
                        <span class="delete-div" data-index="${index}"><i class="fa fa-close"></i></span>
                        ${fieldData.field_name}
                        <input type="hidden" class="fld_name" value="${fieldData.field_name}" />
                    </td>
                    <td>`;
                    if(fieldData.field_type == 3){
                        html+=`<div class="form-check form-radio-success form-check-inline">
                                    <input type="radio" id="fullscreenShow" name="fullscreen" class="form-check-input">
                                    <label class="form-check-label" for="fullscreenShow">Show</label>
                                </div>
                                <div class="form-check form-radio-success form-check-inline">
                                    <input type="radio" id="fullscreenHide" name="fullscreen" class="form-check-input" checked>
                                    <label class="form-check-label" for="fullscreenHide">Hide</label>
                                </div>
                                <input type="text" id="allAdsShow" name="adblock_version" class="form-control d-inline w-50" placeholder="0">`;
                    }
                    else if(fieldData.field_type == 2){
                        html+=`<input type="text" id="allAdsShow" name="adblock_version" class="form-control" placeholder="0">`;
                    }
                    else{
                        html+=`<div class="form-check form-radio-success form-check-inline">
                                    <input type="radio" id="fullscreenShow" name="fullscreen" class="form-check-input">
                                    <label class="form-check-label" for="fullscreenShow">Show</label>
                                </div>
                                <div class="form-check form-radio-success form-check-inline">
                                    <input type="radio" id="fullscreenHide" name="fullscreen" class="form-check-input" checked>
                                    <label class="form-check-label" for="fullscreenHide">Hide</label>
                                </div>`;
                    }
            html+=`</td>
                </tr>`;
    $("#setting_table").append(html);
}

//================= VPN Setting Functions =================
function saveVPNSettings(){
    showLoading();
    var req_data = {
        op: CURRENT_PAGE
        , action: "save_vpn_settings"
        , id: PRIMARY_ID
        , type: (subView == 3) ? 1 : 2
        , vpn: $("[name='vpn']:checked").val()
        , vpn_dialog: $("[name='vpn_dialog']:checked").val()
        , vpn_dialog_open: $("[name='vpn_dialog_open']:checked").val()
        , vpn_url: $("#vpn_url").val()
        , vpn_carrier_id: $("#vpn_carrier_id").val()
        , vpn_country: JSON.stringify($('#vpn_country').tagEditor('getTags')[0].tags)
    };
    doAPICall(req_data, async function(data){
        if (data && data != null && data.success) {
            hideLoading();
            showMessage(data.message);
            return false;
        }
        else if (data && data != null && !data.success) {
            hideLoading();
            showError(data.message);
            return false;
        }
    });
}

//================= App Remove Setting Functions =================
function saveAppRemoveSettings(){
    showLoading();
    var req_data = {
        op: CURRENT_PAGE
        , action: "save_app_remove_settings"
        , id: PRIMARY_ID
        , type: (subView == 3) ? 1 : 2
        , app_remove_flag: $("[name='app_remove_flag']:checked").val()
        , app_version: $("#app_version").val()
        , app_remove_title: $("#app_remove_title").val()
        , app_remove_description: $("#app_remove_description").val()
        , app_remove_url: $("#app_remove_url").val()
        , app_remove_button_name: $("#app_remove_button_name").val()
        , app_remove_skip_button_name: $("#app_remove_skip_button_name").val()
    };
    doAPICall(req_data, async function(data){
        if (data && data != null && data.success) {
            hideLoading();
            showMessage(data.message);
            return false;
        }
        else if (data && data != null && !data.success) {
            hideLoading();
            showError(data.message);
            return false;
        }
    });
}
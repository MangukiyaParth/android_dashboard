var table;
var SUBPRIMARYID = 0;
let subView = 1;
let extra_setting_fields = [];
var OrgData = [];
var MrktData = [];
var OrgAdData = [];
var OrgBifurcateData = [];
var MrktAdData = [];
var MrktBifurcateData = [];
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
            OrgAdData = data.org_ad;
            OrgBifurcateData = data.org_bifurcate_ad;
            MrktAdData = data.mrkt_ad;
            MrktBifurcateData = data.mrkt_bifurcate_ad;
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
        manageFormfields(1);
        manage_preview_clr(1);
        manageFormfields(2);
        manage_preview_clr(2);
        FillSettingData();
    }
    else{
        $(".sub-view-btn").addClass('btn-light').removeClass('btn-outline-soft-warning');
        $(".setting-m-view-btn").removeClass('btn-light').addClass('btn-outline-soft-warning').blur();
        $(".setting-div").removeClass('d-none');
        $(".user-div").addClass('d-none');
        manageFormfields(1);
        manage_preview_clr(1);
        manageFormfields(2);
        manage_preview_clr(2);
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

    manageFormfields(1);
    manage_preview_clr(1);
    manageFormfields(2);
    manage_preview_clr(2);
    
    $("#app_color, #app_background_color, #native_background_color, #native_text_color, #native_button_background_color, #native_button_text_color, #native_btn_text").on('input', function(){
        manage_preview_clr(1);
    });
    $("[name='native_btn'], [name='bottom_banner']").on("change", function(){
        manageFormfields(1);
        manage_preview_clr(1);
    });
    $("#ad .clr-picker").on('change', function(){
        manage_preview_clr(1);
    });

    $("#bifurcate_app_color, #bifurcate_app_background_color, #bifurcate_native_background_color, #bifurcate_native_text_color, #bifurcate_native_button_background_color, #bifurcate_native_button_text_color, #bifurcate_native_btn_text").on('input', function(){
        manage_preview_clr(1);
    });
    $("[name='bifurcate_native_btn'], [name='bifurcate_bottom_banner']").on("change", function(){
        manageFormfields(1);
        manage_preview_clr(1);
    });
    $("#bifurcate .clr-picker").on('change', function(){
        manage_preview_clr(2);
    });
}

function manageFormfields(type = 1){
    if(type == 1){
        if($("[name='native_btn']:checked").val() == "default"){
            $("#native_btn_text").val('');
            $("#native_btn_text").prop('readonly', true);
        }
        else{
            $("#native_btn_text").removeAttr('readonly');
        } 
    }
    else{
        if($("[name='bifurcate_native_btn']:checked").val() == "default"){
            $("#bifurcate_native_btn_text").val('');
            $("#bifurcate_native_btn_text").prop('readonly', true);
        }
        else{
            $("#bifurcate_native_btn_text").removeAttr('readonly');
        }
    }
}

function manage_preview_clr(type = 1){
    if(type == 1){
        var header_bg = $("#app_color").val();
        if(header_bg != "" && color_regex.test(header_bg)){
            $(".ad-mobile-div .mobile-header").css('background-color', header_bg);
        }
        var app_bg = $("#app_background_color").val();
        if(app_bg != "" && color_regex.test(app_bg)){
            $(".ad-mobile-div .mobile-footer").css('background-color', app_bg);
        }
        var native_bg = $("#native_background_color").val();
        if(native_bg != "" && color_regex.test(native_bg)){
            $(".ad-mobile-div .mobile-body").css('background-color', native_bg);
        }
        var native_text = $("#native_text_color").val();
        if(native_text != "" && color_regex.test(native_text)){
            $(".ad-mobile-div .mobile-body .Test-Ad-title").css('color', native_text);
            $(".ad-mobile-div .mobile-body .Test-Ad-subtitle").css('color', native_text);
        }
        var btn_bg = $("#native_button_background_color").val();
        if(btn_bg != "" && color_regex.test(btn_bg)){
            $(".ad-mobile-div .default-btn").css('background-color', btn_bg);
        }
        var btn_text = $("#native_button_text_color").val();
        if(btn_text != "" && color_regex.test(btn_text)){
            $(".ad-mobile-div .default-btn").css('color', btn_text);
        }
        var default_text_type = $("[name='native_btn']:checked").val();
        if(default_text_type == 'default'){
            $(".ad-mobile-div .default-btn").html('Defalut');
        }
        else {
            var default_text_manual = $("#native_btn_text").val();
            $(".ad-mobile-div .default-btn").html(default_text_manual);
        }

        if($("[name='bottom_banner']:checked").val() == "hide"){
            $(".ad-mobile-div .bottom-ad").addClass('d-none');
        }
        else if($("[name='bottom_banner']:checked").val() == "native"){
            $(".ad-mobile-div .bottom-ad").removeClass('d-none');
            $(".ad-mobile-div .bottom-ad").prop('src', ROOT_URL + 'assets/images/nativeBanner.jpg');
        }
        else if($("[name='bottom_banner']:checked").val() == "banner"){
            $(".ad-mobile-div .bottom-ad").removeClass('d-none');
            $(".ad-mobile-div .bottom-ad").prop('src', ROOT_URL + 'assets/images/banner.jpg');
        }
    }
    else {
        var header_bg = $("#bifurcate_app_color").val();
        if(header_bg != "" && color_regex.test(header_bg)){
            $(".bifurcate-mobile-div .mobile-header").css('background-color', header_bg);
        }
        var app_bg = $("#bifurcate_app_background_color").val();
        if(app_bg != "" && color_regex.test(app_bg)){
            $(".bifurcate-mobile-div .mobile-footer").css('background-color', app_bg);
        }
        var native_bg = $("#bifurcate_native_background_color").val();
        if(native_bg != "" && color_regex.test(native_bg)){
            $(".bifurcate-mobile-div .mobile-body").css('background-color', native_bg);
        }
        var native_text = $("#bifurcate_native_text_color").val();
        if(native_text != "" && color_regex.test(native_text)){
            $(".bifurcate-mobile-div .mobile-body").css('color', native_text);
        }
        var btn_bg = $("#bifurcate_native_button_background_color").val();
        if(btn_bg != "" && color_regex.test(btn_bg)){
            $(".bifurcate-mobile-div .default-btn").css('background-color', btn_bg);
        }
        var btn_text = $("#bifurcate_native_button_text_color").val();
        if(btn_text != "" && color_regex.test(btn_text)){
            $(".bifurcate-mobile-div .default-btn").css('color', btn_text);
        }
        var default_text_type = $("[name='bifurcate_native_btn']:checked").val();
        if(default_text_type == 'default'){
            $(".bifurcate-mobile-div .default-btn").html('Defalut');
        }
        else {
            var default_text_manual = $("#bifurcate_native_btn_text").val();
            $(".bifurcate-mobile-div .default-btn").html(default_text_manual);
        }

        if($("[name='bifurcate_bottom_banner']:checked").val() == "hide"){
            $(".bifurcate-mobile-div .bottom-ad").addClass('d-none');
        }
        else if($("[name='bifurcate_bottom_banner']:checked").val() == "native"){
            $(".bifurcate-mobile-div .bottom-ad").removeClass('d-none');
            $(".bifurcate-mobile-div .bottom-ad").prop('src', ROOT_URL + 'assets/images/nativeBanner.jpg');
        }
        else if($("[name='bifurcate_bottom_banner']:checked").val() == "banner"){
            $(".bifurcate-mobile-div .bottom-ad").removeClass('d-none');
            $(".bifurcate-mobile-div .bottom-ad").prop('src', ROOT_URL + 'assets/images/banner.jpg');
        }
    }
}

function FillSettingData(){
    let appSettingData = [];
    let adData = [];
    let adBifurcateData = [];
    if(subView == 3){
        appSettingData = OrgData;
        adData = OrgAdData;
        adBifurcateData = OrgBifurcateData;
    }
    else{
        appSettingData = MrktData;
        adData = MrktAdData;
        adBifurcateData = MrktBifurcateData;
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

    var all_ads = (appSettingData && appSettingData.all_ads) ? appSettingData.all_ads : 'hide';
    var fullscreen = (appSettingData && appSettingData.fullscreen) ? appSettingData.fullscreen : 'hide';
    var continue_screen = (appSettingData && appSettingData.continue_screen) ? appSettingData.continue_screen : 'hide';
    var lets_start_screen = (appSettingData && appSettingData.lets_start_screen) ? appSettingData.lets_start_screen : 'hide';
    var age_screen = (appSettingData && appSettingData.age_screen) ? appSettingData.age_screen : 'hide';
    var next_screen = (appSettingData && appSettingData.next_screen) ? appSettingData.next_screen : 'hide';
    var next_inner_screen = (appSettingData && appSettingData.next_inner_screen) ? appSettingData.next_inner_screen : 'hide';
    var contact_screen = (appSettingData && appSettingData.contact_screen) ? appSettingData.contact_screen : 'hide';
    var start_screen = (appSettingData && appSettingData.start_screen) ? appSettingData.start_screen : 'hide';
    var real_casting_flow = (appSettingData && appSettingData.real_casting_flow) ? appSettingData.real_casting_flow : 'hide';
    var app_stop = (appSettingData && appSettingData.app_stop) ? appSettingData.app_stop : 'hide';

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

    var vpn = (appSettingData && appSettingData.vpn) ? appSettingData.vpn : 'hide';
    var vpn_dialog = (appSettingData && appSettingData.vpn_dialog) ? appSettingData.vpn_dialog : 'hide';
    var vpn_dialog_open = (appSettingData && appSettingData.vpn_dialog_open) ? appSettingData.vpn_dialog_open : 'hide';
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
    $("[name='app_remove_flag'][value='"+app_remove_flag+"']").prop('checked', true);
    $("#app_version").val((appSettingData && appSettingData.app_version) ? appSettingData.app_version : '');
    $("#app_remove_title").val((appSettingData && appSettingData.app_remove_title) ? appSettingData.app_remove_title : '');
    $("#app_remove_description").val((appSettingData && appSettingData.app_remove_description) ? appSettingData.app_remove_description : '');
    $("#app_remove_url").val((appSettingData && appSettingData.app_remove_url) ? appSettingData.app_remove_url : '');
    $("#app_remove_button_name").val((appSettingData && appSettingData.app_remove_button_name) ? appSettingData.app_remove_button_name : '');
    $("#app_remove_skip_button_name").val((appSettingData && appSettingData.app_remove_skip_button_name) ? appSettingData.app_remove_skip_button_name : '');

    /*** Ad Setting ***/
    var native_loading = (adData && adData.native_loading) ? adData.native_loading : 'onload';
    var bottom_banner = (adData && adData.bottom_banner) ? adData.bottom_banner : 'native';
    var all_screen_native = (adData && adData.all_screen_native) ? adData.all_screen_native : 'hide';
    var list_native = (adData && adData.list_native) ? adData.list_native : 'hide';
    var exit_dialoge_native = (adData && adData.exit_dialoge_native) ? adData.exit_dialoge_native : 'hide';
    var native_btn = (adData && adData.native_btn) ? adData.native_btn : 'default';
    var alternate_with_appopen = (adData && adData.alternate_with_appopen) ? adData.alternate_with_appopen : 'hide';
    var inter_loading = (adData && adData.inter_loading) ? adData.inter_loading : 'onload';
    var app_open_loading = (adData && adData.app_open_loading) ? adData.app_open_loading : 'onload';
    var splash_ads = (adData && adData.splash_ads) ? adData.splash_ads : 'hide';
    var app_open = (adData && adData.app_open) ? adData.app_open : 'onetime';

    $("#app_color").val((adData && adData.app_color) ? adData.app_color : '#000000');
    $("#app_background_color").val((adData && adData.app_background_color) ? adData.app_background_color : '#FFFFFF');
    $("[name='native_loading'][value='"+native_loading+"']").prop('checked', true);
    $("[name='bottom_banner'][value='"+bottom_banner+"']").prop('checked', true);
    $("[name='all_screen_native'][value='"+all_screen_native+"']").prop('checked', true);
    $("[name='list_native'][value='"+list_native+"']").prop('checked', true);
    $("#list_native_cnt").val((adData && adData.list_native_cnt) ? adData.list_native_cnt : '0');
    $("[name='exit_dialoge_native'][value='"+exit_dialoge_native+"']").prop('checked', true);
    $("[name='native_btn'][value='"+native_btn+"']").prop('checked', true);
    $("#native_btn_text").val((adData && adData.native_btn_text) ? adData.native_btn_text : '');
    $("#native_background_color").val((adData && adData.native_background_color) ? adData.native_background_color : '#FFFEFF');
    $("#native_text_color").val((adData && adData.native_text_color) ? adData.native_text_color : '#808080');
    $("#native_button_background_color").val((adData && adData.native_button_background_color) ? adData.native_button_background_color : '#4285F4');
    $("#native_button_text_color").val((adData && adData.native_button_text_color) ? adData.native_button_text_color : '#FFFEFF');
    $("[name='alternate_with_appopen'][value='"+alternate_with_appopen+"']").prop('checked', true);
    $("[name='inter_loading'][value='"+inter_loading+"']").prop('checked', true);
    $("#inter_interval").val((adData && adData.inter_interval) ? adData.inter_interval : '0');
    $("#back_click_inter").val((adData && adData.back_click_inter) ? adData.back_click_inter : '0');
    $("[name='app_open_loading'][value='"+app_open_loading+"']").prop('checked', true);
    $("[name='splash_ads'][value='"+splash_ads+"']").prop('checked', true);
    $("[name='app_open'][value='"+app_open+"']").prop('checked', true);
    
    var bifurcate_native_loading = (adBifurcateData && adBifurcateData.native_loading) ? adBifurcateData.native_loading : 'onload';
    var bifurcate_bottom_banner = (adBifurcateData && adBifurcateData.bottom_banner) ? adBifurcateData.bottom_banner : 'native';
    var bifurcate_all_screen_native = (adBifurcateData && adBifurcateData.all_screen_native) ? adBifurcateData.all_screen_native : 'hide';
    var bifurcate_list_native = (adBifurcateData && adBifurcateData.list_native) ? adBifurcateData.list_native : 'hide';
    var bifurcate_exit_dialoge_native = (adBifurcateData && adBifurcateData.exit_dialoge_native) ? adBifurcateData.exit_dialoge_native : 'hide';
    var bifurcate_native_btn = (adBifurcateData && adBifurcateData.native_btn) ? adBifurcateData.native_btn : 'default';
    var bifurcate_alternate_with_appopen = (adBifurcateData && adBifurcateData.alternate_with_appopen) ? adBifurcateData.alternate_with_appopen : 'hide';
    var bifurcate_inter_loading = (adBifurcateData && adBifurcateData.inter_loading) ? adBifurcateData.inter_loading : 'onload';
    var bifurcate_app_open_loading = (adBifurcateData && adBifurcateData.app_open_loading) ? adBifurcateData.app_open_loading : 'onload';
    var bifurcate_splash_ads = (adBifurcateData && adBifurcateData.splash_ads) ? adBifurcateData.splash_ads : 'hide';
    var bifurcate_app_open = (adBifurcateData && adBifurcateData.app_open) ? adBifurcateData.app_open : 'onetime';

    $("#bifurcate_app_color").val((adBifurcateData && adBifurcateData.app_color) ? adBifurcateData.app_color : '#000000');
    $("#bifurcate_app_background_color").val((adBifurcateData && adBifurcateData.app_background_color) ? adBifurcateData.app_background_color : '#FFFFFF');
    $("[name='bifurcate_native_loading'][value='"+bifurcate_native_loading+"']").prop('checked', true);
    $("[name='bifurcate_bottom_banner'][value='"+bifurcate_bottom_banner+"']").prop('checked', true);
    $("[name='bifurcate_all_screen_native'][value='"+bifurcate_all_screen_native+"']").prop('checked', true);
    $("[name='bifurcate_list_native'][value='"+bifurcate_list_native+"']").prop('checked', true);
    $("#bifurcate_list_native_cnt").val((adBifurcateData && adBifurcateData.list_native_cnt) ? adBifurcateData.list_native_cnt : '0');
    $("[name='bifurcate_exit_dialoge_native'][value='"+bifurcate_exit_dialoge_native+"']").prop('checked', true);
    $("[name='bifurcate_native_btn'][value='"+bifurcate_native_btn+"']").prop('checked', true);
    $("#bifurcate_native_btn_text").val((adBifurcateData && adBifurcateData.native_btn_text) ? adBifurcateData.native_btn_text : '');
    $("#bifurcate_native_background_color").val((adBifurcateData && adBifurcateData.native_background_color) ? adBifurcateData.native_background_color : '#FFFEFF');
    $("#bifurcate_native_text_color").val((adBifurcateData && adBifurcateData.native_text_color) ? adBifurcateData.native_text_color : '#808080');
    $("#bifurcate_native_button_background_color").val((adBifurcateData && adBifurcateData.native_button_background_color) ? adBifurcateData.native_button_background_color : '#4285F4');
    $("#bifurcate_native_button_text_color").val((adBifurcateData && adBifurcateData.native_button_text_color) ? adBifurcateData.native_button_text_color : '#FFFEFF');
    $("[name='bifurcate_alternate_with_appopen'][value='"+bifurcate_alternate_with_appopen+"']").prop('checked', true);
    $("[name='bifurcate_inter_loading'][value='"+bifurcate_inter_loading+"']").prop('checked', true);
    $("#bifurcate_inter_interval").val((adBifurcateData && adBifurcateData.inter_interval) ? adBifurcateData.inter_interval : '0');
    $("#bifurcate_back_click_inter").val((adBifurcateData && adBifurcateData.back_click_inter) ? adBifurcateData.back_click_inter : '0');
    $("[name='bifurcate_app_open_loading'][value='"+bifurcate_app_open_loading+"']").prop('checked', true);
    $("[name='bifurcate_splash_ads'][value='"+bifurcate_splash_ads+"']").prop('checked', true);
    $("[name='bifurcate_app_open'][value='"+bifurcate_app_open+"']").prop('checked', true);

    manageFormfields(1);
    manage_preview_clr(1);
    manageFormfields(2);
    manage_preview_clr(2);
    manageSelectedColor();
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

//================= Ad Setting Functions =================

function saveAdSettings(){
    var req_data = {
        bifurcate_location: ""
        , app_color: $("#app_color").val()
        , app_background_color: $("#app_background_color").val()
        , native_loading: $("[name='native_loading']:checked").val()
        , bottom_banner: $("[name='bottom_banner']:checked").val()
        , all_screen_native: $("[name='all_screen_native']:checked").val()
        , list_native: $("[name='list_native']:checked").val()
        , list_native_cnt: $("#list_native_cnt").val()
        , exit_dialoge_native: $("[name='exit_dialoge_native']:checked").val()
        , native_btn: $("[name='native_btn']:checked").val()
        , native_btn_text: $("#native_btn_text").val()
        , native_background_color: $("#native_background_color").val()
        , native_text_color: $("#native_text_color").val()
        , native_button_background_color: $("#native_button_background_color").val()
        , native_button_text_color: $("#native_button_text_color").val()
        , alternate_with_appopen: $("[name='alternate_with_appopen']:checked").val()
        , inter_loading: $("[name='inter_loading']:checked").val()
        , inter_interval: $("#inter_interval").val()
        , back_click_inter: $("#back_click_inter").val()
        , app_open_loading: $("[name='app_open_loading']:checked").val()
        , splash_ads: $("[name='splash_ads']:checked").val()
        , app_open: $("[name='app_open']:checked").val()
    };
    saveAdsSettings(0, req_data);
}

function saveBifurcate_AdSettings(){
    var req_data = {
        bifurcate_location: $('#bifurcate_location').tagEditor('getTags')[0].tags.join(',')
        , app_color: $("#bifurcate_app_color").val()
        , app_background_color: $("#bifurcate_app_background_color").val()
        , native_loading: $("[name='bifurcate_native_loading']:checked").val()
        , bottom_banner: $("[name='bifurcate_bottom_banner']:checked").val()
        , all_screen_native: $("[name='bifurcate_all_screen_native']:checked").val()
        , list_native: $("[name='bifurcate_list_native']:checked").val()
        , list_native_cnt: $("#bifurcate_list_native_cnt").val()
        , exit_dialoge_native: $("[name='bifurcate_exit_dialoge_native']:checked").val()
        , native_btn: $("[name='bifurcate_native_btn']:checked").val()
        , native_btn_text: $("#bifurcate_native_btn_text").val()
        , native_background_color: $("#bifurcate_native_background_color").val()
        , native_text_color: $("#bifurcate_native_text_color").val()
        , native_button_background_color: $("#bifurcate_native_button_background_color").val()
        , native_button_text_color: $("#bifurcate_native_button_text_color").val()
        , alternate_with_appopen: $("[name='bifurcate_alternate_with_appopen']:checked").val()
        , inter_loading: $("[name='bifurcate_inter_loading']:checked").val()
        , inter_interval: $("#bifurcate_inter_interval").val()
        , back_click_inter: $("#bifurcate_back_click_inter").val()
        , app_open_loading: $("[name='bifurcate_app_open_loading']:checked").val()
        , splash_ads: $("[name='bifurcate_splash_ads']:checked").val()
        , app_open: $("[name='bifurcate_app_open']:checked").val()
    };
    saveAdsSettings(1, req_data);
}

function saveAdsSettings(is_bifurcate = 0, req_data){
    showLoading();
    req_data['op'] = CURRENT_PAGE;
    req_data['action'] = "save_ad_settings";
    req_data['id'] = PRIMARY_ID;
    req_data['type'] = (subView == 3) ? 1 : 2;
    req_data['is_bifurcate'] = is_bifurcate;
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
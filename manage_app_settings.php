<style>
    .user-div .cnt-span{
        font-size: 35px;
        font-weight: 800;
        color: #000;
        margin-right: 10px;
    }

    .user-div .cnt-desc-span{
        font-size: 17px;
        color: #222;
    }
</style>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-xl-12 col-lg-12">
                <div class="card border-radius-15">
                    <div class="card-body">
                        <div class="app-sub-action">
                            <a class="btn btn-outline-soft-warning user-view-btn sub-view-btn me-2" href="javascript:void(0)" onclick="changeSubView(1)">User</a>
                            <a class="btn btn-light retention-view-btn sub-view-btn me-2" href="javascript:void(0)" onclick="changeSubView(2)">Retention</a>
                            <a class="btn btn-light setting-o-view-btn sub-view-btn me-2" href="javascript:void(0)" onclick="changeSubView(3)">Setting (O)</a>
                            <a class="btn btn-light setting-m-view-btn sub-view-btn me-2" href="javascript:void(0)" onclick="changeSubView(4)">Setting (M)</a>
                        </div>
                    </div>
                </div>
                
                <div class="user-div mt-3 d-none">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card border-radius-15">
                                <div class="card-body text-center p-2 d-flex align-items-center justify-content-center">
                                    <span class="cnt-span">112</span> <span class="cnt-desc-span">Total cnt</span>
                                </div> <!-- end card-body-->
                            </div>
                        </div> <!-- end card-->
                        <div class="col-sm-3">
                            <div class="card border-radius-15">
                                <div class="card-body text-center p-2 d-flex align-items-center justify-content-center">
                                    <span class="cnt-span">112</span> <span class="cnt-desc-span">Total cnt</span>
                                </div> <!-- end card-body-->
                            </div>
                        </div> <!-- end card-->
                        <div class="col-sm-3">
                            <div class="card border-radius-15">
                                <div class="card-body text-center p-2 d-flex align-items-center justify-content-center">
                                    <span class="cnt-span">112</span> <span class="cnt-desc-span">Total cnt</span>
                                </div> <!-- end card-body-->
                            </div>
                        </div> <!-- end card-->
                    </div>
                    <div class="card border-radius-15">
                        <div class="card-body">
                        </div>
                    </div>
                </div>

                <div class="card border-radius-15 setting-div mt-3 d-none">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-bordered mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#google" class="nav-link active" data-bs-toggle="tab" role="tab" aria-controls="nav-google" aria-selected="true">
                                    Google
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#ad" class="nav-link" data-bs-toggle="tab" role="tab" aria-controls="nav-ad" aria-selected="false" tabindex="-1">
                                    Ad Setting
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#bifurcate" class="nav-link" data-bs-toggle="tab" role="tab" aria-controls="nav-bifurcate" aria-selected="false" tabindex="-1">
                                    Bifurcate
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#other" class="nav-link" data-bs-toggle="tab" role="tab" aria-controls="nav-other" aria-selected="false" tabindex="-1">
                                    Other Setting
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#vpn" class="nav-link" data-bs-toggle="tab" role="tab" aria-controls="nav-vpn" aria-selected="false" tabindex="-1">
                                    VPN
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#app-remove" class="nav-link" data-bs-toggle="tab" role="tab" aria-controls="nav-app-remove" aria-selected="false" tabindex="-1">
                                    App Remove Flags
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="google" role="tabpanel">
                                <div class="row multi-box">
                                    <div class="col-sm-4 px-1">
                                        <div class="box">
                                            <div class="box-header">Google 1</div>
                                            <hr>
                                            <div class="box-body">
                                                <table class="table table-centered table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>Percentage</td>
                                                            <td><input type="text" class="form-control" placeholder="Percentage" id="g1_percentage" name="g1_percentage" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Account Name</td>
                                                            <td><input type="text" class="form-control" placeholder="Account Name" id="g1_account_name" name="g1_account_name" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Banner</td>
                                                            <td><input type="text" class="form-control" placeholder="Banner" id="g1_banner" name="g1_banner" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Inter</td>
                                                            <td><input type="text" class="form-control" placeholder="Inter" id="g1_inter" name="g1_inter" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Native</td>
                                                            <td><input type="text" class="form-control" placeholder="Native" id="g1_native" name="g1_native" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Native2</td>
                                                            <td><input type="text" class="form-control" placeholder="Native2" id="g1_native2" name="g1_native2" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>AppOpen</td>
                                                            <td><input type="text" class="form-control" placeholder="AppOpen" id="g1_appopen" name="g1_appopen" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>AppId</td>
                                                            <td><input type="text" class="form-control" placeholder="AppId" id="g1_appid" name="g1_appid" /></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 px-1">
                                        <div class="box">
                                            <div class="box-header">Google 2</div>
                                            <hr>
                                            <div class="box-body">
                                                <table class="table table-centered table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>Percentage</td>
                                                            <td><input type="text" class="form-control" placeholder="Percentage" id="g2_percentage" name="g2_percentage" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Account Name</td>
                                                            <td><input type="text" class="form-control" placeholder="Account Name" id="g2_account_name" name="g2_account_name" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Banner</td>
                                                            <td><input type="text" class="form-control" placeholder="Banner" id="g2_banner" name="g2_banner" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Inter</td>
                                                            <td><input type="text" class="form-control" placeholder="Inter" id="g2_inter" name="g2_inter" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Native</td>
                                                            <td><input type="text" class="form-control" placeholder="Native" id="g2_native" name="g2_native" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Native2</td>
                                                            <td><input type="text" class="form-control" placeholder="Native2" id="g2_native2" name="g2_native2" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>AppOpen</td>
                                                            <td><input type="text" class="form-control" placeholder="AppOpen" id="g2_appopen" name="g2_appopen" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>AppId</td>
                                                            <td><input type="text" class="form-control" placeholder="AppId" id="g2_appid" name="g2_appid" /></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 px-1">
                                        <div class="box">
                                            <div class="box-header">Google 3</div>
                                            <hr>
                                            <div class="box-body">
                                                <table class="table table-centered table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>Percentage</td>
                                                            <td><input type="text" class="form-control" placeholder="Percentage" id="g3_percentage" name="g3_percentage" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Account Name</td>
                                                            <td><input type="text" class="form-control" placeholder="Account Name" id="g3_account_name" name="g3_account_name" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Banner</td>
                                                            <td><input type="text" class="form-control" placeholder="Banner" id="g3_banner" name="g3_banner" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Inter</td>
                                                            <td><input type="text" class="form-control" placeholder="Inter" id="g3_inter" name="g3_inter" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Native</td>
                                                            <td><input type="text" class="form-control" placeholder="Native" id="g3_native" name="g3_native" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Native2</td>
                                                            <td><input type="text" class="form-control" placeholder="Native2" id="g3_native2" name="g3_native2" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>AppOpen</td>
                                                            <td><input type="text" class="form-control" placeholder="AppOpen" id="g3_appopen" name="g3_appopen" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>AppId</td>
                                                            <td><input type="text" class="form-control" placeholder="AppId" id="g3_appid" name="g3_appid" /></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-12 text-end">
                                        <button type="button" class="btn btn-primary" onclick="saveGoogleId()">Update</button>
                                        <button type="button" class="btn btn-primary" onclick="addGoogleTestId()">Add Test Id</button>
                                        <button type="button" class="btn btn-primary" onclick="resetGoogleForm()">Reset</button>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="ad" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="row">
                                            <div class="col-sm-2"><h3>App Color</h3></div>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="mb-3 col-sm-6">
                                                        <label class="form-label" for="app_color">App Color for Admin</label>
                                                        <input type="text" id="app_color" name="app_color" class="form-control" placeholder="Enter app color" value="#000000">
                                                    </div>
                                                    <div class="mb-3 col-sm-6">
                                                        <label class="form-label" for="app_background_color">Background Color</label>
                                                        <input type="text" id="app_background_color" name="app_background_color" class="form-control" placeholder="Enter app background color" value="#FFFFFF">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-2"><h3>Native</h3></div>
                                            <div class="col-sm-10">
                                                <table class="table table-centered table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>Native Loading</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="native_pre_loading" name="native_loading" class="form-check-input" value="preload">
                                                                    <label class="form-check-label" for="native_pre_loading">Preload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="native_on_loading" name="native_loading" class="form-check-input" value="onload" checked>
                                                                    <label class="form-check-label" for="native_on_loading">Onload</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bottom Banner</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bottom_native_banner" name="bottom_banner" class="form-check-input" value="native" checked>
                                                                    <label class="form-check-label" for="bottom_native_banner">Native</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bottom_banner" name="bottom_banner" class="form-check-input" value="banner">
                                                                    <label class="form-check-label" for="bottom_banner">Banner</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bottom_banner_hide" name="bottom_banner" class="form-check-input" value="hide">
                                                                    <label class="form-check-label" for="bottom_banner_hide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>All Screen Native</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="allScreenNativeShow" name="all_screen_native" class="form-check-input" value="true">
                                                                    <label class="form-check-label" for="allScreenNativeShow">Show</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="AllScreenNativeHide" name="all_screen_native" class="form-check-input" value="false" checked>
                                                                    <label class="form-check-label" for="AllScreenNativeHide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>List Native</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="listNativeShow" name="list_native" class="form-check-input" value="true">
                                                                    <label class="form-check-label" for="listNativeShow">Show</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="listNativeHide" name="list_native" class="form-check-input" value="false" checked>
                                                                    <label class="form-check-label" for="listNativeHide">Hide</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="number" class="form-control" id="list_native_cnt" name="list_native_cnt" value="0" readonly>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Exit Dialoge Native</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="exitDialogeNativeShow" name="exit_dialoge_native" class="form-check-input" value="true">
                                                                    <label class="form-check-label" for="exitDialogeNativeShow">Show</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="exitDialogeNativeHide" name="exit_dialoge_native" class="form-check-input" value="false" checked>
                                                                    <label class="form-check-label" for="exitDialogeNativeHide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Native Button Text</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="nativeBtnManual" name="native_btn" class="form-check-input" value="manual">
                                                                    <label class="form-check-label" for="nativeBtnManual">Manual</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="nativeBtnDefault" name="native_btn" class="form-check-input" value="default" checked>
                                                                    <label class="form-check-label" for="nativeBtnDefault">Default</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="text" class="form-control" id="native_btn_text" name="native_btn_text" placeholder="Native Button Text">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="card border-radius-15 shadow-none border-light">
                                                    <div class="card-body">
                                                        <h3>Native Color</h3>
                                                        <div class="row">
                                                            <div class="mb-3 col-sm-6">
                                                                <label class="form-label" for="native_background_color">Background</label>
                                                                <input type="text" id="native_background_color" name="native_background_color" class="form-control" placeholder="Enter background" value="#FFFEFF">
                                                            </div>
                                                            <div class="mb-3 col-sm-6">
                                                                <label class="form-label" for="native_text_color">Text</label>
                                                                <input type="text" id="native_text_color" name="native_text_color" class="form-control" placeholder="Enter text color" value="#808080">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="mb-3 col-sm-6">
                                                                <label class="form-label" for="native_button_background_color">Button Background</label>
                                                                <input type="text" id="native_button_background_color" name="native_button_background_color" class="form-control" placeholder="Enter button background" value="#4285F4">
                                                            </div>
                                                            <div class="mb-3 col-sm-6">
                                                                <label class="form-label" for="native_button_text_color">Button Text</label>
                                                                <input type="text" id="native_button_text_color" name="native_button_text_color" class="form-control" placeholder="Enter text color" value="#FFFEFF">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-2"><h3>Inter</h3></div>
                                            <div class="col-sm-10">
                                                <table class="table table-centered table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>Alternate with AppOpen</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="alternateWithAppOpenShow" name="alternate_with_appopen" class="form-check-input" value="show">
                                                                    <label class="form-check-label" for="alternateWithAppOpenShow">Show</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="alternateWithAppOpenHide" name="alternate_with_appopen" class="form-check-input" value="hide" checked>
                                                                    <label class="form-check-label" for="alternateWithAppOpenHide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Inter Loading</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="inter_pre_loading" name="inter_loading" class="form-check-input" value="preload">
                                                                    <label class="form-check-label" for="inter_pre_loading">Preload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="inter_on_loading" name="inter_loading" class="form-check-input" value="onload" checked>
                                                                    <label class="form-check-label" for="inter_on_loading">Onload</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Inter Interval (0 = Hide)</td>
                                                            <td>
                                                                <input type="number" class="form-control" id="inter_interval" name="inter_interval" placeholder="Inter Interval" value="0">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Block Click Inter (0 = Hide)</td>
                                                            <td>
                                                                <input type="number" class="form-control" id="block_click_inter" name="block_click_inter" placeholder="Block Click Inter" value="0">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-2"><h3>App Open</h3></div>
                                            <div class="col-sm-10">
                                                <table class="table table-centered table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>App Loading</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="app_open_pre_loading" name="app_open_loading" class="form-check-input" value="preload">
                                                                    <label class="form-check-label" for="app_open_pre_loading">Preload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="app_open_on_loading" name="app_open_loading" class="form-check-input" value="onload" checked>
                                                                    <label class="form-check-label" for="app_open_on_loading">Onload</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Splash ads</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="splash_ads_preload" name="splash_ads" class="form-check-input" value="inter">
                                                                    <label class="form-check-label" for="splash_ads_preload">Preload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="splash_ads_onload" name="splash_ads" class="form-check-input" value="openads">
                                                                    <label class="form-check-label" for="splash_ads_onload">Onload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="splash_ads_hide" name="splash_ads" class="form-check-input" value="hide" checked>
                                                                    <label class="form-check-label" for="splash_ads_hide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>App Open</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="app_open_onetime" name="app_open" class="form-check-input" value="onetime" checked>
                                                                    <label class="form-check-label" for="app_open_onetime">One Time</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="app_open_everytime" name="app_open" class="form-check-input" value="everytime">
                                                                    <label class="form-check-label" for="app_open_everytime">Every Time</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="app_open_background_hide" name="app_open" class="form-check-input" value="background_hide">
                                                                    <label class="form-check-label" for="app_open_background_hide">Background Hide</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="app_open_hide" name="app_open" class="form-check-input" value="hide">
                                                                    <label class="form-check-label" for="app_open_hide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-2">
                                            <div class="col-sm-12 text-end">
                                                <button type="button" class="btn btn-primary" onclick="saveAdSettings()">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 d-flex justify-content-center">
                                        <div class="mobile-div ad-mobile-div">
                                            <div class="mobile-device"></div>
                                            <div class="mobile-design-preview">
                                                <div class="mobile-header">
                                                    <p>App Name Title</p>
                                                </div>
                                                <div class="mobile-body">
                                                    <img src="[ROOT_URL]assets/images/nativeImage.png" alt="" class="mt-1 w-100">
                                                    <div class="my-2" style="color: rgb(128, 128, 128);">
                                                        <div class="Test-Ad-title">Test Ad: Goggle Ads</div>
                                                        <div class="Test-Ad-subtitle">Stay up to date with your Ads Check</div>
                                                    </div>
                                                    <button class="btn btn-primary w-100 default-btn">Default</button>
                                                </div>
                                                <div class="mobile-footer">
                                                    <div class="px-2 start-app-btn"><button class="btn btn-primary w-100 startapp-btn">Start App</button></div>
                                                    <img src="[ROOT_URL]assets/images/banner.jpg" alt="" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="bifurcate" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="row">
                                            <div class="col-sm-2"><h3>Bifurcate</h3></div>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="mb-3 col-sm-12">
                                                        <label class="form-label" for="bifurcate_location">Location</label>
                                                        <input type="text" id="bifurcate_location" name="bifurcate_location" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-2"><h3>App Color</h3></div>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="mb-3 col-sm-6">
                                                        <label class="form-label" for="bifurcate_app_color">App Color for Admin</label>
                                                        <input type="text" id="bifurcate_app_color" name="bifurcate_app_color" class="form-control" placeholder="Enter app color" value="#000000">
                                                    </div>
                                                    <div class="mb-3 col-sm-6">
                                                        <label class="form-label" for="bifurcate_app_background_color">Background Color</label>
                                                        <input type="text" id="bifurcate_app_background_color" name="bifurcate_app_background_color" class="form-control" placeholder="Enter app background color" value="#FFFFFF">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-2"><h3>Native</h3></div>
                                            <div class="col-sm-10">
                                                <table class="table table-centered table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>Native Loading</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_native_pre_loading" name="bifurcate_native_loading" class="form-check-input" value="preload">
                                                                    <label class="form-check-label" for="bifurcate_native_pre_loading">Preload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_native_on_loading" name="bifurcate_native_loading" class="form-check-input" value="onload" checked>
                                                                    <label class="form-check-label" for="bifurcate_native_on_loading">Onload</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bottom Banner</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_bottom_native_banner" name="bifurcate_bottom_banner" class="form-check-input" value="native" checked>
                                                                    <label class="form-check-label" for="bifurcate_bottom_native_banner">Native</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_bottom_banner" name="bifurcate_bottom_banner" class="form-check-input" value="banner">
                                                                    <label class="form-check-label" for="bifurcate_bottom_banner">Banner</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_bottom_banner_hide" name="bifurcate_bottom_banner" class="form-check-input" value="hide">
                                                                    <label class="form-check-label" for="bifurcate_bottom_banner_hide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>All Screen Native</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_allScreenNativeShow" name="bifurcate_all_screen_native" class="form-check-input" value="true">
                                                                    <label class="form-check-label" for="bifurcate_allScreenNativeShow">Show</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_AllScreenNativeHide" name="bifurcate_all_screen_native" class="form-check-input" value="false" checked>
                                                                    <label class="form-check-label" for="bifurcate_AllScreenNativeHide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>List Native</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_listNativeShow" name="bifurcate_list_native" class="form-check-input" value="true">
                                                                    <label class="form-check-label" for="bifurcate_listNativeShow">Show</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_listNativeHide" name="bifurcate_list_native" class="form-check-input" value="false" checked>
                                                                    <label class="form-check-label" for="bifurcate_listNativeHide">Hide</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="number" class="form-control" id="bifurcate_list_native_cnt" name="bifurcate_list_native_cnt" value="0" readonly>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Exit Dialoge Native</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_exitDialogeNativeShow" name="bifurcate_exit_dialoge_native" class="form-check-input" value="true">
                                                                    <label class="form-check-label" for="bifurcate_exitDialogeNativeShow">Show</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_exitDialogeNativeHide" name="bifurcate_exit_dialoge_native" class="form-check-input" value="false" checked>
                                                                    <label class="form-check-label" for="bifurcate_exitDialogeNativeHide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Native Button Text</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_nativeBtnManual" name="bifurcate_native_btn" class="form-check-input" value="manual">
                                                                    <label class="form-check-label" for="bifurcate_nativeBtnManual">Manual</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_nativeBtnDefault" name="bifurcate_native_btn" class="form-check-input" value="default" checked>
                                                                    <label class="form-check-label" for="bifurcate_nativeBtnDefault">Default</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="text" class="form-control" id="bifurcate_native_btn_text" name="bifurcate_native_btn_text" placeholder="Native Button Text">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="card border-radius-15 shadow-none border-light">
                                                    <div class="card-body">
                                                        <h3>Native Color</h3>
                                                        <div class="row">
                                                            <div class="mb-3 col-sm-6">
                                                                <label class="form-label" for="bifurcate_native_background_color">Background</label>
                                                                <input type="text" id="bifurcate_native_background_color" name="bifurcate_native_background_color" class="form-control" placeholder="Enter background" value="#FFFEFF">
                                                            </div>
                                                            <div class="mb-3 col-sm-6">
                                                                <label class="form-label" for="bifurcate_native_text_color">Text</label>
                                                                <input type="text" id="bifurcate_native_text_color" name="bifurcate_native_text_color" class="form-control" placeholder="Enter text color" value="#808080">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="mb-3 col-sm-6">
                                                                <label class="form-label" for="bifurcate_native_button_background_color">Button Background</label>
                                                                <input type="text" id="bifurcate_native_button_background_color" name="bifurcate_native_button_background_color" class="form-control" placeholder="Enter button background" value="#4285F4">
                                                            </div>
                                                            <div class="mb-3 col-sm-6">
                                                                <label class="form-label" for="bifurcate_native_button_text_color">Button Text</label>
                                                                <input type="text" id="bifurcate_native_button_text_color" name="bifurcate_native_button_text_color" class="form-control" placeholder="Enter text color" value="#FFFEFF">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-2"><h3>Inter</h3></div>
                                            <div class="col-sm-10">
                                                <table class="table table-centered table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>Alternate with AppOpen</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_alternateWithAppOpenShow" name="bifurcate_alternate_with_appopen" class="form-check-input" value="show">
                                                                    <label class="form-check-label" for="bifurcate_alternateWithAppOpenShow">Show</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_alternateWithAppOpenHide" name="bifurcate_alternate_with_appopen" class="form-check-input" value="hide" checked>
                                                                    <label class="form-check-label" for="bifurcate_alternateWithAppOpenHide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Inter Loading</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_inter_pre_loading" name="bifurcate_inter_loading" class="form-check-input" value="preload">
                                                                    <label class="form-check-label" for="bifurcate_inter_pre_loading">Preload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_inter_on_loading" name="bifurcate_inter_loading" class="form-check-input" value="onload" checked>
                                                                    <label class="form-check-label" for="bifurcate_inter_on_loading">Onload</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Inter Interval (0 = Hide)</td>
                                                            <td>
                                                                <input type="number" class="form-control" id="bifurcate_inter_interval" name="bifurcate_inter_interval" placeholder="Inter Interval" value="0">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Block Click Inter (0 = Hide)</td>
                                                            <td>
                                                                <input type="number" class="form-control" id="bifurcate_block_click_inter" name="bifurcate_block_click_inter" placeholder="Block Click Inter" value="0">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-2"><h3>App Open</h3></div>
                                            <div class="col-sm-10">
                                                <table class="table table-centered table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>App Loading</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_app_open_pre_loading" name="bifurcate_app_open_loading" class="form-check-input" value="preload">
                                                                    <label class="form-check-label" for="bifurcate_app_open_pre_loading">Preload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_app_open_on_loading" name="bifurcate_app_open_loading" class="form-check-input" value="onload" checked>
                                                                    <label class="form-check-label" for="bifurcate_app_open_on_loading">Onload</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Splash ads</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_splash_ads_preload" name="bifurcate_splash_ads" class="form-check-input" value="inter">
                                                                    <label class="form-check-label" for="bifurcate_splash_ads_preload">Preload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_splash_ads_onload" name="bifurcate_splash_ads" class="form-check-input" value="openads">
                                                                    <label class="form-check-label" for="bifurcate_splash_ads_onload">Onload</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_splash_ads_hide" name="bifurcate_splash_ads" class="form-check-input" value="hide" checked>
                                                                    <label class="form-check-label" for="bifurcate_splash_ads_hide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>App Open</td>
                                                            <td>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_app_open_onetime" name="bifurcate_app_open" class="form-check-input" value="onetime" checked>
                                                                    <label class="form-check-label" for="bifurcate_app_open_onetime">One Time</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_app_open_everytime" name="bifurcate_app_open" class="form-check-input" value="everytime">
                                                                    <label class="form-check-label" for="bifurcate_app_open_everytime">Every Time</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_app_open_background_hide" name="bifurcate_app_open" class="form-check-input" value="background_hide">
                                                                    <label class="form-check-label" for="bifurcate_app_open_background_hide">Background Hide</label>
                                                                </div>
                                                                <div class="form-check form-radio-success form-check-inline">
                                                                    <input type="radio" id="bifurcate_app_open_hide" name="bifurcate_app_open" class="form-check-input" value="hide">
                                                                    <label class="form-check-label" for="bifurcate_app_open_hide">Hide</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-2">
                                            <div class="col-sm-12 text-end">
                                                <button type="button" class="btn btn-primary" onclick="saveBifurcate_AdSettings()">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 d-flex justify-content-center">
                                        <div class="mobile-div bifurcate-mobile-div">
                                            <div class="mobile-device"></div>
                                            <div class="mobile-design-preview">
                                                <div class="mobile-header">
                                                    <p>App Name Title</p>
                                                </div>
                                                <div class="mobile-body">
                                                    <img src="[ROOT_URL]assets/images/nativeImage.png" alt="" class="mt-1 w-100">
                                                    <div class="my-2" style="color: rgb(128, 128, 128);">
                                                        <div class="Test-Ad-title">Test Ad: Goggle Ads</div>
                                                        <div class="Test-Ad-subtitle">Stay up to date with your Ads Check</div>
                                                    </div>
                                                    <button class="btn btn-primary w-100 default-btn">Default</button>
                                                </div>
                                                <div class="mobile-footer">
                                                    <div class="px-2 start-app-btn"><button class="btn btn-primary w-100 startapp-btn">Start App</button></div>
                                                    <img src="[ROOT_URL]assets/images/banner.jpg" alt="" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="other" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-2"><h3>Setting</h3></div>
                                    <div class="col-sm-10">
                                        <table class="table table-centered table-borderless">
                                            <tbody id="setting_table">
                                                <tr>
                                                    <td>All Ads</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="allAdsShow" name="all_ads" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="allAdsShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="allAdsHide" name="all_ads" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="allAdsHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Full Screen (Navigation)</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="fullscreenShow" name="fullscreen" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="fullscreenShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="fullscreenHide" name="fullscreen" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="fullscreenHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VersionCode for adBlock</td>
                                                    <td>
                                                        <input type="text" id="adblock_version" name="adblock_version" class="form-control" placeholder="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Continue Screen</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="continueSceenShow" name="continue_screen" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="continueSceenShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="continueSceenHide" name="continue_screen" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="continueSceenHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Let's Start Screen</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="letsStartScreenShow" name="lets_start_screen" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="letsStartScreenShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="letsStartScreenHide" name="lets_start_screen" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="letsStartScreenHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Age/Gender Start Screen</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="ageScreenShow" name="age_screen" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="ageScreenShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="ageScreenHide" name="age_screen" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="ageScreenHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Next Screen</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="nextScreenShow" name="next_screen" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="nextScreenShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="nextScreenHide" name="next_screen" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="nextScreenHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Next Inner Screen</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="nextInnerScreenShow" name="next_inner_screen" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="nextInnerScreenShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="nextInnerScreenHide" name="next_inner_screen" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="nextInnerScreenHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Screen</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="contactScreenShow" name="contact_screen" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="contactScreenShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="contactScreenHide" name="contact_screen" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="contactScreenHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Start Screen</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="startScreenShow" name="start_screen" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="startScreenShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="startScreenHide" name="start_screen" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="startScreenHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Real Casting Flow</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="realCastingFlowShow" name="real_casting_flow" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="realCastingFlowShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="realCastingFlowHide" name="real_casting_flow" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="realCastingFlowHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Dialog For App Stop</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="appStopShow" name="app_stop" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="appStopShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="appStopHide" name="app_stop" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="appStopHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-sm-12 text-end">
                                        <button type="button" class="btn btn-primary" onclick="saveOtherSettings()">Update</button>
                                        <button type="button" class="btn btn-primary" onclick="add_setting_field()">Add Field</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="vpn" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-2"><h3>VPN Setting</h3></div>
                                    <div class="col-sm-10">
                                        <table class="table table-centered table-borderless">
                                            <tbody id="setting_table">
                                                <tr>
                                                    <td>VPN</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="vpnShow" name="vpn" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="vpnShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="vpnHide" name="vpn" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="vpnHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VPN Dialog</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="vpnDialogShow" name="vpn_dialog" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="vpnDialogShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="vpnDialogHide" name="vpn_dialog" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="vpnDialogHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VPN Dialog Open</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="vpnDialogOpenShow" name="vpn_dialog_open" class="form-check-input" value="true">
                                                            <label class="form-check-label" for="vpnDialogOpenShow">Show</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="vpnDialogOpenHide" name="vpn_dialog_open" class="form-check-input" value="false" checked>
                                                            <label class="form-check-label" for="vpnDialogOpenHide">Hide</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>VPN List Country</td>
                                                    <td>
                                                        <input type="text" id="vpn_country" name="vpn_country" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VPN URL</td>
                                                    <td>
                                                        <input type="text" id="vpn_url" name="vpn_url" class="form-control" placeholder="VPN URL">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>VPN Carrier Id</td>
                                                    <td>
                                                        <input type="text" id="vpn_carrier_id" name="vpn_carrier_id" class="form-control" placeholder="VPN Carrier Id">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-sm-12 text-end">
                                        <button type="button" class="btn btn-primary" onclick="saveVPNSettings()">Update</button>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="app-remove" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-2"><h3>App Remove Flags</h3></div>
                                    <div class="col-sm-10">
                                        <table class="table table-centered table-borderless">
                                            <tbody id="setting_table">
                                                <tr>
                                                    <td>flags</td>
                                                    <td>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="forceUpdate" name="app_remove_flag" class="form-check-input" value="force_update">
                                                            <label class="form-check-label" for="forceUpdate">Force Update</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="skipUpdate" name="app_remove_flag" class="form-check-input" value="skip_update">
                                                            <label class="form-check-label" for="skipUpdate">Skip Update</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="moveApp" name="app_remove_flag" class="form-check-input" value="move_app">
                                                            <label class="form-check-label" for="moveApp">Move App</label>
                                                        </div>
                                                        <div class="form-check form-radio-success form-check-inline">
                                                            <input type="radio" id="normal" name="app_remove_flag" class="form-check-input" value="normal" checked>
                                                            <label class="form-check-label" for="normal">Normal</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Version</td>
                                                    <td><input type="text" id="app_version" name="app_version" class="form-control" placeholder="App Version"></td>
                                                </tr>
                                                <tr>
                                                    <td>Title</td>
                                                    <td><input type="text" id="app_remove_title" name="app_remove_title" class="form-control" placeholder="Title"></td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td><input type="text" id="app_remove_description" name="app_remove_description" class="form-control" placeholder="Description"></td>
                                                </tr>
                                                <tr>
                                                    <td>URL</td>
                                                    <td><input type="text" id="app_remove_url" name="app_remove_url" class="form-control" placeholder="URL"></td>
                                                </tr>
                                                <tr>
                                                    <td>Button Name</td>
                                                    <td><input type="text" id="app_remove_button_name" name="app_remove_button_name" class="form-control" placeholder="Button Name"></td>
                                                </tr>
                                                <tr>
                                                    <td>Skip Button Name</td>
                                                    <td><input type="text" id="app_remove_skip_button_name" name="app_remove_skip_button_name" class="form-control" placeholder="Skip Button Name"></td>
                                                </tr>
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-sm-12 text-end">
                                        <button type="button" class="btn btn-primary" onclick="saveAppRemoveSettings()">Update</button>
                                    </div>
                                </div>
                            </div>
                                <!-- end preview code-->
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>
    <!-- container -->

</div>
<!-- content -->

<div id="add_setting_field_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title comman_list_model_header" id="multiple-twoModalLabel">Add Field</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="POST">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label class="form-label" for="field_name">Field Name</label>
                            <input type="text" id="field_name" name="field_name" class="form-control" placeholder="field name" />
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label" for="field_name">Type</label>
                            <div class="form-check form-radio-success mb-1">
                                <input type="radio" id="field_type_radio" name="field_type" class="form-check-input" value="1" checked>
                                <label class="form-check-label" for="field_type_radio">Radio</label>
                            </div>
                            <div class="form-check form-radio-success mb-1">
                                <input type="radio" id="field_type_text" name="field_type" class="form-check-input" value="2">
                                <label class="form-check-label" for="field_type_text">Textbox</label>
                            </div>
                            <div class="form-check form-radio-success mb-1">
                                <input type="radio" id="field_type_both" name="field_type" class="form-check-input" value="3">
                                <label class="form-check-label" for="field_type_both">Radio + Textbox</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">close</button>
                <button type="button" class="btn btn-primary" onclick="append_setting_field()">Add</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
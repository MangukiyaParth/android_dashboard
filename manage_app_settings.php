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
                                <div class="row">
                                    <div class="col-sm-4 box">
                                        <div class="box-header">
                                            <h2>Google 1</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="ad" role="tabpanel">
                                <h3>ad</h3>
                            </div>
                            
                            <div class="tab-pane" id="bifurcate" role="tabpanel">
                                <h3>bifurcate</h3>
                            </div>
                            
                            <div class="tab-pane" id="other" role="tabpanel">
                                <h3>other</h3>
                            </div>
                            
                            <div class="tab-pane" id="vpn" role="tabpanel">
                                <h3>vpn</h3>
                            </div>

                            <div class="tab-pane" id="app-remove" role="tabpanel">
                                <h3>app remove</h3>
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
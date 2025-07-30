@extends('admin.layout.app')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card  pia-chart">
                                <div class="card-header border-0 pb-0 flex-wrap">
                                    <div>
                                        <h5 class="fs-18 font-w600">Total Users</h5>
                                    </div>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center custome-tooltip">
                                    <h2>{{ total_users() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card  pia-chart">
                                <div class="card-header border-0 pb-0 flex-wrap">
                                    <div>
                                        <h5 class="fs-18 font-w600">Approved Users</h5>
                                    </div>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center custome-tooltip">
                                    <h2>{{ approved_users() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card  pia-chart">
                                <div class="card-header border-0 pb-0 flex-wrap">
                                    <div>
                                        <h5 class="fs-18 font-w600">Pending Users</h5>
                                    </div>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center custome-tooltip">
                                    <h2>{{ pending_users() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card  pia-chart">
                                <div class="card-header border-0 pb-0 flex-wrap">
                                    <div>
                                        <h5 class="fs-18 font-w600">Rejected Users</h5>
                                    </div>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center custome-tooltip">
                                    <h2>{{ rejected_users() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card  pia-chart">
                                <div class="card-header border-0 pb-0 flex-wrap">
                                    <div>
                                        <h5 class="fs-18 font-w600">Given Widthraw</h5>
                                    </div>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center custome-tooltip">
                                    <h2>{{ given_widthraw() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card  pia-chart">
                                <div class="card-header border-0 pb-0 flex-wrap">
                                    <div>
                                        <h5 class="fs-18 font-w600">Today Given Widthraw</h5>
                                    </div>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center custome-tooltip">
                                    <h2>{{ today_widthraw() }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

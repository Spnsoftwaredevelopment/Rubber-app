@extends('admin.layouts.master')


@section('main')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="card card-full">
            <div class="card-block">
                <div class="row">
                    <div class="col-xs-12">
                        <h4 class="card-title">ผู้เข้าชม 7 วันล่าสุด</h4>
                    </div>
                </div>

                <div class="chart-wrapper" style="height:300px;margin-top:40px;">
                    <canvas id="main-chart" height="300"></canvas>
                </div>
            </div>

            <div class="card-footer">
                <ul>
                    <li>
                        <strong>Google Analytics</strong>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row row-equal">
            <div class="col-xxs-12 col-xs-6 col-lg-3">
                <div class="card">
                    <div class="card-block p-a-1 clearfix">
                        <i class="icon-key bg-primary p-a-1 font-2xl m-r-1 pull-left"></i>
                        <div class="h5 text-primary m-b-0 m-t-h"></div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs">บทบาท</div>
                    </div>

                    <div class="card-footer p-x-1 p-y-h">
                        <a class="font-weight-bold font-xs btn-block text-muted" href="#}">
                            ดูรายละเอียด <i class="fa fa-angle-right pull-right font-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--/.col-->
            <div class="col-xxs-12 col-xs-6 col-lg-3">
                <div class="card">
                    <div class="card-block p-a-1 clearfix">
                        <i class="fa fa-sitemap bg-info p-a-1 font-2xl m-r-1 pull-left"></i>
                        <div class="h5 text-info m-b-0 m-t-h">หน่วยงาน</div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs">หน่วยงาน</div>
                    </div>

                    <div class="card-footer p-x-1 p-y-h">
                        <a class="font-weight-bold font-xs btn-block text-muted" href="#">
                            ดูรายละเอียด <i class="fa fa-angle-right pull-right font-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--/.col-->
            <div class="col-xxs-12 col-xs-6 col-lg-3">
                <div class="card">
                    <div class="card-block p-a-1 clearfix">
                        <i class="icon-user bg-warning p-a-1 font-2xl m-r-1 pull-left"></i>
                        <div class="h5 text-warning m-b-0 m-t-h">ผู้ควบคุม</div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs">ผู้ควบคุม</div>
                    </div>

                    <div class="card-footer p-x-1 p-y-h">
                        <a class="font-weight-bold font-xs btn-block text-muted" href="#">
                            ดูรายละเอียด <i class="fa fa-angle-right pull-right font-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!--/.col-->
            <div class="col-xxs-12 col-xs-6 col-lg-3">
                <div class="card">
                    <div class="card-block p-a-1 clearfix">
                        <i class="icon-menu bg-danger p-a-1 font-2xl m-r-1 pull-left"></i>
                        <div class="h5 text-warning m-b-0 m-t-h">เมนู</div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs">เมนู</div>
                    </div>

                    <div class="card-footer p-x-1 p-y-h">
                        <a class="font-weight-bold font-xs btn-block text-muted" href="#">
                            ดูรายละเอียด <i class="fa fa-angle-right pull-right font-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-5">
                                <h3 class="card-title clearfix m-b-0">สถิติอื่นๆ</h3>
                            </div>
                        </div>

                        <hr class="m-a-0">

                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
                                <ul class="horizontal-bars type-2">
                                        <li>
                                            <i class="icon-globe"></i>
                                            <span class="title">#</span>
                                            <span class="value">#
                                                <span class="text-muted small">#</span>
                                            </span>
                                            <div class="bars">
                                            </div>
                                        </li>
                                    <li class="divider"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

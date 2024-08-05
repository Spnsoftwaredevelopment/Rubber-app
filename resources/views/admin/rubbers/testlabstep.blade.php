@extends('admin.layouts.master')

@section('main')

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>รวมสูตรยาง</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Rubberformula</li>
                        <li class="breadcrumb-item active" aria-current="page">รวมสูตรยางที่ยังไม่ผ่านการทดสอบ</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end::page-header -->

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Basic</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสสูตรยาง</th>
                                        <th class="text-center">ชื่อลูกค้า</th>
                                        <th class="text-center">ความแข็ง</th>
                                        <th>วันที่เพิ่มสูตร</th>
                                        <th class="text-center">การทดสอบ</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rubbers as $rubber)
                                        <tr>
                                            <td>{{ $rubber->id }}</td>
                                            <td>{{ $rubber->name_formula }}</td>
                                            <td class="text-center">{{ $rubber->customer_id }}</td>
                                            <td class="text-center">{{ $rubber->hardness_s }} - {{ $rubber->hardness_e }}</td>
                                            <td>{{ date('d:m:Y', strtotime($rubber->start_date)) }}</td>
                                            <td class="text-center">
                                            @if ($rubber->inspection == 'Approve')
                                                <button type="button" class="btn btn-success btn-floating">
                                                    <i class="ti-check"></i>
                                                </button>
                                            @else
                                            <button type="button" class="btn btn-danger btn-floating">
                                                <i class="ti-close"></i>
                                            </button>
                                            @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                            <button class="dropdown-item" type="button">
                                                                <a class="btn-one" href="{{ url('/admin/rubbers/beforetest' . $rubber->id) }}">บันทึกการทดสอบ<span class="flaticon-next"></span></a>
                                                            </button>
                                                            <button class="dropdown-item" type="button">
                                                                <a class="btn-one" href="{{ url('/admin/rubbers/all_test_rubbers' . $rubber->id) }}">ดูการทดสอบทั้งหมด<span class="flaticon-next"></span></a>
                                                            </button>
                                                        @php
                                                            $isAdministrator = auth()->check() && auth()->user()->role_as == 0;
                                                        @endphp
                                                        @if (!$isAdministrator && $rubber->save_data !== '' && $rubber->save_data !== 'not')
                                                        <button class="dropdown-item" type="button">
                                                            <a class="btn-one" href="{{ url('/admin/rubbers/edit' . $rubber->id) }}">แก้ไข<span class="flaticon-next"></span></a>
                                                        </button>
                                                    @endif
                                                        @if (!$isAdministrator)
                                                            <button class="dropdown-item" type="button">ลบ</button>
                                                            @else
                                                            <p>ติดต่อ หัวหน้า</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสสูตรยาง</th>
                                        <th class="text-center">ชื่อลูกค้า</th>
                                        <th class="text-center">ความแข็ง</th>
                                        <th>วันที่เพิ่มสูตร</th>
                                        <th class="text-center">การทดสอบ</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                {{$rubbers->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

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
                        <li class="breadcrumb-item active" aria-current="page">Rubberformula</li>
                        <li class="breadcrumb-item active" aria-current="page">รวมสูตรยาง</li>
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
                                        <th>ชื่อลูกค้า</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>ความแข็ง</th>
                                        <th>วันที่เริ่มใช้</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rubbers as $rubber)
                                        <tr>
                                            <td>{{ $rubber->id }}</td>
                                            <td>{{ $rubber->name_formula }}</td>
                                            <td>{{ $rubber->customer_id }}</td>
                                            <td>
                                                @foreach ($products as $product)
                                                    @if ($rubber->product_id == $product->id)
                                                        {{ $product->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $rubber->hardness_s }} - {{ $rubber->hardness_e }}</td>
                                            <td>{{ date('d:m:y', strtotime($rubber->start_date)) }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">
                                                            <a class="btn-one" href="{{ url('/admin/rubbers/show' . $rubber->id) }}">รายละเอียด<span class="flaticon-next"></span></a>
                                                        </button>
                                                        @php
                                                        $isAdministrator = auth()->check() && auth()->user()->role_as == 0;
                                                        @endphp

                                                        @if (!$isAdministrator)
                                                            <button class="dropdown-item" type="button">
                                                                <a class="btn-one" href="{{ url('/admin/rubbers/edit' . $rubber->id) }}">แก้ไข<span class="flaticon-next"></span></a>
                                                            </button>
                                                        @endif
                                                        @if (!$isAdministrator)
                                                            {{-- <button class="dropdown-item" type="button">ลบ</button> --}}
                                                            @else
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
                                        <th>ชื่อลูกค้า</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>ความแข็ง</th>
                                        <th>วันที่เริ่มใช้</th>
                                        <th>Action</th>
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

@extends('admin.layouts.master')

@section('main')

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>กลุ่มสินค้า</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">กลุ่มสินค้า</li>
                        <li class="breadcrumb-item active" aria-current="page">กลุ่มสินค้าทั้งหมด</li>
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
                            <h6 class="card-title"></h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>code</th>
                                        <th>ชื่อกลุ่มสินค้า</th>
                                        <th>สร้างโดย</th>
                                        <th>แก้ไขโดย</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->code }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->created_by }}</td>
                                            <td>@if ($product->updated_by)
                                                    {{ $product->updated_by }}
                                                @else
                                                    ยังไม่มีการแก้ไข
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">
                                                            <a class="btn-one" href="{{ url('/admin/products/edit'.$product->id) }}"><span>Edit</span></a>
                                                        </button>
                                                        <button class="dropdown-item" type="button">
                                                            <a class="btn-one" href="{{ url('/admin/products/delete'.$product->id) }}"><span>Delete</span></a>
                                                        </button>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>code</th>
                                        <th>ชื่อกลุ่มสินค้า</th>
                                        <th>สร้างโดย</th>
                                        <th>แก้ไขโดย</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                {{$customers->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection

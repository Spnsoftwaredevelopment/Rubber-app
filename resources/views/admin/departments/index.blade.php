@extends('admin.layouts.master')

@section('main')

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>รายชื่อแผนก</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">แผนก</li>
                        <li class="breadcrumb-item active" aria-current="page">แผนกทั้งหมด</li>
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
                                        <th>ชื่อแผนก</th>
                                        <th>สร้างโดย</th>
                                        <th>แก้ไขโดย</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $department)
                                        <tr>
                                            <td>{{ $department->id }}</td>
                                            <td>{{ $department->name }}</td>
                                            <td>{{ $department->created_by }}</td>
                                            <td>@if ($department->updated_by)
                                                    {{ $department->updated_by }}
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
                                                            <a class="btn-one" href="{{ url('/admin/departments/edit'.$department->id) }}"><span>Edit</span></a>
                                                        </button>
                                                        <button class="dropdown-item" type="button">
                                                            <a class="btn-one" href="{{ url('/admin/departments/delete'.$department->id) }}"><span>Delete</span></a>
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
                                        <th>ชื่อแผนก</th>
                                        <th>สร้างโดย</th>
                                        <th>แก้ไขโดย</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                {{$departments->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

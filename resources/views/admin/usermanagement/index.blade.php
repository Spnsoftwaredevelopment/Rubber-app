@extends('admin.layouts.master')

@section('main')

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>ผู้ใช้</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ผู้ใช้ทั้งหมด</li>
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
                                        <th>id</th>
                                        <th>ชื่อ</th>
                                        <th>username</th>
                                        <th>แผนก</th>
                                        <th>สร้างโดย</th>
                                        <th>แก้ไขโดย</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach ($departments as $item)
                                                    @if ($user->department_id == $item->id)
                                                        {{ $item->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $user->created_by ? ($user->created_by == 'Apirak' ? 'Admin' : $user->created_by) : 'ยังไม่มีการแก้ไข' }}
                                            </td>
                                            <td>
                                                {{ $user->updated_by ? ($user->updated_by == 'Apirak' ? 'Admin' : $user->updated_by) : 'ยังไม่มีการแก้ไข' }}
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">
                                                            <a class="btn-one" href="{{ url('/admin/usermanagement/edit'.$user->id) }}"><span>Edit</span></a>
                                                        </button>
                                                        <button class="dropdown-item" type="button">
                                                            <a class="btn-one" href="{{ url('/admin/usermanagement/delete'.$user->id) }}"><span>Delete</span></a>
                                                        </button>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>ชื่อ</th>
                                        <th>username</th>
                                        <th>แผนก</th>
                                        <th>สร้างโดย</th>
                                        <th>แก้ไขโดย</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                {{$users->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

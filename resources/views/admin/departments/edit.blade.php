@extends('admin.layouts.master')

@section('main')
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>แก้ไขรายชื่อแผนก</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">แผนก</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
    <form action="{{ route('admin.departments.update', ['id' => $departments->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"><strong>แก้ไข</strong></h6>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">ชื่อลูกค้า</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $departments->name }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

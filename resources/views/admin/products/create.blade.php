@extends('admin.layouts.master')

@section('main')
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>เพิ่มกลุ่มสินค้า</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">กลุ่มสินค้า</li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"> <strong>เพิ่มกลุ่มสินค้า</strong></h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <Label>Code</Label>
                                        <input type="text" class="form-control" id="code" name="code">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <Label>ชื่อกลุ่มสินค้า</Label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit"> SAVE </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@extends('admin.layouts.master')

@section('main')
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>เพิ่มสูตรยาง</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">User</li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <form action="{{ route('admin.usermanagement.update', ['id' => $users->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"> <strong>เพิ่มผู้ใช้</strong></h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="name" class="col-md-6 col-form-label text-md-end">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" value="{{ old('name', $users->name) }}" name="name" id="name" required="">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control" value="{{ old('name', $users->email) }}" name="email" required="">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <Label>แผนก</Label>
                                        <select class="form-control select2-example" id="department_id" name="department_id">
                                            {{-- @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" @if ($department->id == old('department_id', $department->name)) selected @endif>
                                                {{ $department->name }}
                                            </option>
                                            @endforeach --}}


                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" {{ ($users->department_id == $department->id) ? 'selected' : '' }}>
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                         {{-- <input id="department_id" type="department_id" class="form-control" value="{{ old('department_id', $users->department_id) }}" name="department_id" required=""> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('บันทึกข้อมูล') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

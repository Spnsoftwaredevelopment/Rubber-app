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
                    <li class="breadcrumb-item" aria-current="page">Rubberformula</li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <form action="{{ route('admin.rubbers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"> <strong>สูตรยางใหม่</strong></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <Label>ชื่อสูตรยาง</Label>
                                        <input type="text" class="form-control" name="name_formula" id="name_formula"
                                            value="{{ old('name_formula') }}" required="" readonly="">
                                        @error('name_formula')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <Label>ชื่อลูกค้า</Label>
                                        <select class="form-control select2-example" id="customer_name" name="customer_id">
                                            <option value="">Select</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->code }}">{{ $customer->code }} -
                                                    {{ $customer->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <Label>กลุ่มสินค้า</Label>
                                        <select class="form-control select2-example" id="product_id" name="product_id">
                                            <option value="">Select</option>
                                            @foreach ($productcategoty as $item)
                                                <option value="{{ $item->code }}">{{ $item->code }} .
                                                    {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ความแข็ง (A)</label>
                                        <font color="red"> *</font>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="hardness_s" id="hardness_s"
                                                required="">
                                            <div class="input-group-append">
                                                <span class="input-group-text">ถึง</span>
                                            </div>
                                            <input type="number" class="form-control" name="hardness_e" id="hardness_e"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <Label>วันที่</Label>
                                        <input type="text" name="start_date" class="form-control startdate">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <Label>REV</Label>
                                        <input type="number" class="form-control" id="ref" name="ref">
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <Label>สูตรยางเก่า</Label>
                                        <input type="text" class="form-control" id="rubber_oldcode"
                                            name="rubber_oldcode">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">รายละเอียดเพิ่มเติม</label>
                                        @if ($rubbers->description)
                                            <input type="text" class="form-control" name="description" id="description"
                                                value="{{ $rubbers->description }}">
                                        @else
                                            <input type="text" class="form-control" name="description" id="description"
                                                value="ไม่มีรายละเอียด">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary style="text-align: left; type="submit"> SAVE </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">สถานะการใช้งาน</h6>
                            <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <Label>เปิด - ปิด กาารใช้งาน</Label>
                                        <select class="form-control select2-example" name="status">
                                            <option value="Disabled" {{ (old('status', $rubbers->status) == 'Disabled')? 'selected' : '' }} >ปิดใช้งาน</option>
                                            <option value="Enabled" {{ (old('status', ) == 'Enabled')? 'selected' : '' }} >เปิดใช้งาน</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <Label>ตรวจ LAB</Label>
                                        <select class="form-control select2-example" name="inspection">
                                            <option value="Disapproved " {{ (old('inspection', $rubbers->status) == 'Disapproved')? 'selected' : '' }} >ยังไม่ผ่าน</option>
                                            <option value="Approve" {{ (old('inspection', ) == 'Approve')? 'selected' : '' }} >ผ่านแล้ว</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit"> SAVE </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </form>
@endsection
@section('js-content')
    <script type="text/javascript">
        $(document).ready(function() {
            let nickname_comp = "";
            $('#record_id').on('change', function() {
                // Use # to reference the ID in the selector
                nickname_comp = $('#record_id').val();
                $('#otherIdInput').val(nickname_comp);

                // Check if material record_id matches the selected record_id
                @foreach ($materials as $material)
                    if ("{{ $material->record_id }}" == nickname_comp) {
                        // If there is a match, update the otherIdInput with the corresponding other_id
                        $('#otherIdInput').val("{{ $material->other_id }}");
                    }
                @endforeach
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#dynamicAddRemove').on('change', '.select2-example', function() {
                var selectedRecordId = $(this).val();
                var otherIdInput = $(this).closest('tr').find('.other-id-input');

                @foreach ($materials as $material)
                    if ("{{ $material->record_id }}" == selectedRecordId) {
                        otherIdInput.val("{{ $material->other_id }}");
                    }
                @endforeach
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            let customer = "";
            let nickname_comp = "";
            let min = "";
            let max = "";

            $('#customer_name, #product_id, #hardness_s, #hardness_e').on('change', function() {
                customer = $('#customer_name').val();
                nickname_comp = $('#product_id').val();
                min = $('#hardness_s').val();
                max = $('#hardness_e').val();
                $('#name_formula').val(customer + "-" + nickname_comp + "-R" + min + "-" + max);
            });
        });
    </script>
@endsection

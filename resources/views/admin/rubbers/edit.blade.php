@extends('admin.layouts.master')

@section('main')
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>บันทึกการทดสอบ</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Rubberformula</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
    <form action="{{ route('admin.rubbers.update', ['id' => $rubbers->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> <strong>สูตรยาง </strong></h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <Label>ชื่อสูตรยาง</Label>
                                    <input type="text" class="form-control" value="{{ old('name_formula', $rubbers->name_formula) }}" name="name_formula" id="name_formula" required="">
                                </div>
                            </div>
                            {{-- @foreach ($products as $product)
                                        @if ($rubbers->product_id == $product->id)
                                            <input type="text" class="form-control" value="{{ $product->name }}" name="product_id" id="product_id" required="">
                                        @endif
                                    @endforeach --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อสินค้า</label>
                                    <select class="form-control select2-example" id="customer_name" name="customer_name">
                                        <option value="">Select</option>
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->code }}" {{ $customer->code == $customer->code ? 'selected' : '' }}>
                                            {{ $customer->code}}  {{ $customer->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ความแข็ง (A)</label>
                                    <font color="red"> *</font>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" value="{{ isset($rubbers) ? $rubbers->hardness_s : '' }}"
                                            name="hardness_s" id="hardness_s" required="">
                                        <div class="input-group-append">
                                            <span class="input-group-text">ถึง</span>
                                        </div>
                                        <input type="number" class="form-control" value="{{ isset($rubbers) ? $rubbers->hardness_e : '' }}"
                                            name="hardness_e" id="hardness_e" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <Label>วันที่สร้างสูตร</Label>
                                    <input type="text" value="{{ \Carbon\Carbon::parse($rubbers->start_date)->format('d-m-Y') }}" name="start_date" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <Label>REV.</Label>
                                    <input type="number" value="{{ isset($rubbers) ? $rubbers->ref : '' }}" class="form-control" id="rev"
                                        name="ref" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">รายละเอียดเพิ่มเติม</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        value="ไม่มีรายละเอียด">
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary style="text-align: left; type="submit"> SAVE </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            let nickname_comp2 = "";
            $('#record_id2').on('change', function() {
                // Use # to reference the ID in the selector
                nickname_comp2 = $('#record_id2').val();
                $('#otherIdInput2').val(nickname_comp2);

                // Check if material record_id matches the selected record_id
                @foreach ($materials as $material)
                    if ("{{ $material->record_id }}" == nickname_comp2) {
                        // If there is a match, update the otherIdInput with the corresponding other_id
                        $('#otherIdInput2').val("{{ $material->other_id }}");
                    }
                @endforeach
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var i = 0;

            $("#add-btn").click(function () {
                ++i;

                var newRow = '<tr>' +
                    '<td>' +
                    '<select class="form-control select2-example" name="moreFields[' + i + '][record_id]">' +
                    '<option>Select</option>' +
                    generateMaterialOptions() +
                    '</select>' +
                    '</td>' +
                    '<td>' +
                    '<input type="number" name="moreFields[' + i + '][weights]" placeholder="Enter weights" class="form-control" />' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="moreFields[' + i + '][other_id]" class="form-control other-id-input" />' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-danger remove-tr">Remove</button>' +
                    '</td>' +
                    '</tr>';

                $("#dynamicAddRemove").append(newRow);
            });

            $(document).on('click', '.remove-tr', function () {
                $(this).closest('tr').remove();
            });

            function generateMaterialOptions() {
                var options = '';
                @foreach ($materials as $material)
                    options += '<option value="{{ $material->record_id }}">{{ $material->record_id }}.{{ $material->name }}</option>';
                @endforeach
                return options;
            }
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
@endsection







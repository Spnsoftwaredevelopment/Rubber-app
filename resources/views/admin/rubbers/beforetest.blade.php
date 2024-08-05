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
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> <strong>สูตรยาง </strong></h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <Label>ชื่อสูตรยาง</Label>
                                    <input type="text" class="form-control" value="{{ $rub->name_formula }}"
                                        name="name_formula" id="name_formula" required="" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> <strong>สูตรยาง </strong></h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <Label>ชื่อสูตรยาง</Label>
                                        <select class="form-control select2-example" id="customer_name" name="customer_id">
                                            <option value="">Select</option>
                                            @foreach ($rubbers as $rubber)
                                                <option value="{{ $rub->id }}">{{ $rub->name_formula }} </option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <form action="{{ route('storetest') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">วัตถุดิบของสูตรยาง</h6>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 60%;">วัตถุดิบ</th>
                                                <th style="width: 20%;">weights</th>
                                                <th style="width: 20%;">other_id</th>
                                                <th style="width: 20%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <tbody id="dynamicAddRemove">
                                                <td>
                                                    <select class="form-control select2-example "
                                                        name="moreFields[0][record_id]" id="record_id">
                                                        <option>Select</option>
                                                        @foreach ($materials as $material)
                                                            <option value="{{ $material->record_id }}">
                                                                {{ $material->record_id }}.{{ $material->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="moreFields[0][weights]"
                                                        placeholder="Enter weights" class="form-control" />
                                                </td>
                                                <td>
                                                    <input type="text" name="moreFields[0][other_id]" id="otherIdInput"
                                                        class="form-control" />
                                                </td>
                                                <td>
                                                    <button type="button" name="add-btn" id="add-btn"
                                                        class="btn btn-success">Add More</button>
                                                </td>
                                            </tbody>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"> บันทึกขั้นตอนการทดลอง</h6>
                            <section class="card card-body border mb-0">
                                <h6 class="card-title">การทดสอบ <strong>MDR</strong></h6>
                                <h6 class="card-title"> <strong>AVG</strong></h6>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>ML</Label>
                                            <input type="text" class="form-control" name="ml" id="ml"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>MH</Label>
                                            <input type="text" class="form-control" name="mh" id="mh"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>TS1</Label>
                                            <input type="text" class="form-control" name="ts1" id="ts1"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>TS2</Label>
                                            <input type="text" class="form-control" name="ts2" id="ts2"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>TC50</Label>
                                            <input type="text" class="form-control" name="tc50" id="tc50"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>TC90</Label>
                                            <input type="text" class="form-control" name="tc90" id="tc90"
                                                value="1" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">รายละเอียดเพิ่มเติม</label>
                                            <input type="text" class="form-control" name="mdrs_description"
                                                value="ไม่มีรายละเอียด" id="mdrs_description">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Uploads File (เพิ่มเอกสาร)</label><br>
                                            <input type="file" name="filemdr" class="form-control cate-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group visible">
                                        <!-- Add type="hidden" to hide the input -->
                                        <input type="hidden" class="form-control" value="{{ $rub->id }}"
                                            name="rubber_id" id="rubber_id">
                                    </div>
                                </div>
                            </section>
                            <br>
                            <section class="card card-body border mb-0">
                                <h6 class="card-title">การทดสอบ <strong>Tensile</strong></h6>
                                <h6 class="card-title"> <strong>AVG</strong></h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <Label>Thicknees</Label>
                                            <input type="text" class="form-control" name="thicknees" value="1"
                                                id="thicknees" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <Label>Width</Label>
                                            <input type="text" class="form-control" name="width" id="width"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <Label>Length</Label>
                                            <input type="text" class="form-control" name="length" id="length"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>Max_Force</Label>
                                            <input type="text" class="form-control" name="max_force" value="1"
                                                id="max_force" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>Max_Stress</Label>
                                            <input type="text" class="form-control" name="max_stress" value="1"
                                                id="max_stress" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>Modules</Label>
                                            <input type="text" class="form-control" name="modules" id="modules"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>E.Break</Label>
                                            <input type="text" class="form-control" name="break" id="break"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">รายละเอียดเพิ่มเติม</label>
                                            <input type="text" class="form-control" name="tensiles_description"
                                                id="tensiles_description" value="ไม่มีรายละเอียด">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Uploads File (เพิ่มเอกสาร)</label><br>
                                            <input type="file" name="filetensile" class="form-control cate-img">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group visible">
                                            <!-- Add type="hidden" to hide the input -->
                                            <input type="hidden" class="form-control" value="{{ $rub->id }}"
                                                name="rubber_id" id="rubber_id">
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <br>
                            <section class="card card-body border mb-0">
                                <h6 class="card-title">การทดสอบ <strong>Hardness</strong></h6>
                                <h6 class="card-title"> <strong>AVG</strong></h6>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>ครั้งที่ 1</Label>
                                            <input type="text" class="form-control" name="hts1" id="hts1"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>ครั้งที่ 2</Label>
                                            <input type="text" class="form-control" name="hts2" id="hts2"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>ครั้งที่ 3</Label>
                                            <input type="text" class="form-control" name="hts3" id="hts3"
                                                value="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Type</label>
                                            <select class="form-control" id="Type" name="type">
                                                <option>None</option>
                                                <option>Shore A</option>
                                                <option>Shore D</option>
                                                <option>Shore O</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">รายละเอียดเพิ่มเติม</label>
                                            <input type="text" class="form-control" name="hardnesses_description"
                                                id="hardnesses_description" value="ไม่มีรายละเอียด">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group visible">
                                            <input type="hidden" class="form-control" value="{{ $rub->id }}"
                                                name="rubber_id" id="rubber_id">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="material_id"
                                            value="{{ !empty($createdMaterialIds) ? end($createdMaterialIds) : '' }}">
                                        <input type="hidden" name="mdrs_id"
                                            value="{{ !empty($createdMdrsIds) ? end($createdMdrsIds) : '' }}">
                                        <input type="hidden" name="tensiles_id"
                                            value="{{ !empty($createdTensilesIds) ? end($createdTensilesIds) : '' }}">
                                        <input type="hidden" name="hardness_id"
                                            value="{{ !empty($createdHardnessesIds) ? end($createdHardnessesIds) : '' }}">
                                        <input type="hidden" name="rubber_id" value="{{ $rub->id }}">

                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit"> SAVE </button>
                                    </div>

                                </div>

                            </section>

                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="card">

                    </div>
            </form>
        </div>
    </div>
    </div>

@endsection

@section('js-content')

<script type="text/javascript">
    $(document).ready(function() {
        var i = 0;
        let nickname_comp = "";

        $(document).off('change').on('change', '.st-select2', function(e) {
            // console.log($(this).data('rowid'));
            let rowid = $(this).data('rowid');
            let material_id = $(this).val()
            
            @foreach ($materials as $material)
                if ("{{ $material->record_id }}" == material_id) {
                    // If there is a match, update the otherIdInput with the corresponding other_id
                    $('#otherIdInput_'+rowid).val("{{ $material->other_id }}")
                }
            @endforeach
            
        });

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

        $('#dynamicAddRemove').on('change', '.select2-example', function() {
            var selectedRecordId = $(this).val();
            var otherIdInput = $(this).closest('tr').find('.other-id-input');

            @foreach ($materials as $material)
                if ("{{ $material->record_id }}" == selectedRecordId) {
                    otherIdInput.val("{{ $material->other_id }}");
                }
            @endforeach
        });

        // $('.st-select2').click(function (e) { 
        //     e.preventDefault();
        //     console.log('ddd');
        // });

        $("#add-btn").click(function() {
            ++i;

            
            var newRow = '<tr>' +
                '<td>' +
                '<select onch class="form-control select2 st-select2" data-rowid="'+i+'" name="moreFields[' + i + '][record_id]">' +
                '<option>Select</option>' +
                generateMaterialOptions() +
                '</select>' +
                '</td>' +
                '<td>' +
                '<input type="number" name="moreFields[' + i +
                '][weights]" placeholder="Enter weights" class="form-control" />' +
                '</td>' +
                '<td>' +
                '<input type="text" name="moreFields[' + i + '][other_id]" id="otherIdInput_' + i + '" class="form-control other-id-input" />' +
                '<td>' +
                '<button type="button" class="btn btn-danger remove-tr">Remove</button>' +
                '</td>' +
                '</tr>';
            $("#dynamicAddRemove").append(newRow);
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).closest('tr').remove();
        });

        function generateMaterialOptions() {
            var options = '';
            @foreach ($materials as $material)
                options +=
                    '<option value="{{ $material->record_id }}">{{ $material->record_id }}.{{ $material->name }}</option>';
            @endforeach
            return options;
        }
    });
</script>



@endsection
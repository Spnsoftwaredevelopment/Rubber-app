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
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <Label>ชื่อสูตรยาง</Label>
                                    <input type="text" value="{{ isset($rubbers) ? $rubbers->name_formula : '' }}"
                                        class="form-control" id="rev" name="ref" readonly>
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
                                    <div>
                                        @foreach ($customers as $customer)
                                            @if ($customer->code == $customer->code)
                                                <input type="text" value=" {{ $customer->code }} {{ $customer->name }}"
                                                    class="form-control" id="rev" name="ref" readonly>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ความแข็ง (A)</label>
                                    <font color="red"> *</font>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control"
                                            value="{{ isset($rubbers) ? $rubbers->hardness_s : '' }}" name="hardness_s"
                                            id="hardness_s" required="" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">ถึง</span>
                                        </div>
                                        <input type="number" class="form-control"
                                            value="{{ isset($rubbers) ? $rubbers->hardness_e : '' }}" name="hardness_e"
                                            id="hardness_e" required="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <Label>วันที่เปิดใช้งาน</Label>
                                    <input type="text"
                                        value="{{ \Carbon\Carbon::parse($rubbers->start_date)->format('d-m-Y H:i') }} - อนุมัติโดย: {{ $rubbers->approve_by }}"
                                        name="start_date" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <Label>REV.</Label>
                                    <input type="number" value="{{ isset($rubbers) ? $rubbers->ref : '' }}"
                                        class="form-control" id="rev" name="ref" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <Label>Grade</Label>
                                    <input type="text" value="{{ isset($rubbers) ? $rubbers->grade : '' }}"
                                        class="form-control" id="grade" name="grade" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">รายละเอียดเพิ่มเติม</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        value="ไม่มีรายละเอียด" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> <strong>ส่วนผสมยาง</strong></h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 40%;">วัตถุดิบ</th>
                                        <th style="width: 15%;">น้ำหนัก (กรัม)</th>
                                        <th style="width: 15%;">other_id</th>
                                        <th style="width: 15%;">ต่อหน่วย</th>
                                        <th style="width: 15%;">รวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($weight as $arr)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{-- <select class="form-control select2-example" name="moreFields[0][record_id]" id="record_id">
                                                <option>Select</option>
                                                @foreach ($mat as $item)
                                                    <option value="{{ $item->record_id }}" {{ $arr->record_id === $item->record_id ? 'selected' : '' }}>
                                                        {{ $item->other_id }}.{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select> --}}
                                                @foreach ($mat as $item)
                                                    @if ($arr->record_id === $item->record_id)
                                                        {{ $item->other_id }}.{{ $item->name }}
                                                    @endif
                                                @endforeach

                                            </td>
                                            <td>
                                                {{ $arr->weights }}
                                            </td>
                                            <td>
                                                {{ $arr->other_id }}
                                            </td>
                                            <td>test</td>
                                            <td>test</td>


                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 40%;">วัตถุดิบ</th>
                                        <th style="width: 15%;">น้ำหนัก (กรัม)</th>
                                        <th style="width: 15%;">other_id</th>
                                        <th style="width: 15%;">ต่อหน่วย</th>
                                        <th style="width: 15%;">รวม</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> บันทึกขั้นตอนการทดลอง</h6>
                        <h6 class="card-title">การทดสอบ <strong>MDR</strong></h6>
                        <h6 class="card-title"> <strong>AVG</strong></h6>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <Label>ML</Label>
                                    <input type="number" step="0.01" class="form-control" name="ml"
                                        value="{{ $mdrs->ml }}" required="" readonly>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <Label>MH</Label>
                                    <input type="number" step="0.01" class="form-control" name="mh"
                                        value="{{ $mdrs->mh }}" required="" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>TS1</label>
                                    <input type="number" step="0.01" class="form-control" name="ts1"
                                        id="ts1" value="{{ $mdrs->ts1 }}" required readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>TS2</label>
                                    <input type="number" step="0.01" class="form-control" name="ts2"
                                        id="ts2" value="{{ $mdrs->ts2 }}" required readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <Label>TC50</Label>
                                    <input type="number" step="0.01" class="form-control" name="tc50"
                                        value="{{ $mdrs->tc50 }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <Label>TC90</Label>
                                    <input type="number" step="0.01" class="form-control" name="tc90"
                                        value="{{ $mdrs->tc90 }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">รายละเอียดเพิ่มเติม</label>
                                    <input type="text" class="form-control" name="mdrs_description"
                                        value="{{ $mdrs->mdrs_description }}" id="mdrs_description"
                                        value="ไม่มีรายละเอียด" readonly>
                                </div>
                            </div>
                            @if ($mdrs->filemdr)
                                @php
                                    $extension = pathinfo($mdrs->filemdr, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                        <div class="card app-file-list" style="width: 230px">
                                            <img src="{{ asset('assets/uploads/mdrs/file/' . $mdrs->filemdr) }}"
                                                alt="">
                                            <div class="dropdown position-absolute top-0 right-0 mr-3">
                                                <a href="#" class="font-size-14" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v"
                                                        style="color: rgb(0, 255, 98);padding-top: 15px;font-size:24px"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ asset('assets/uploads/mdrs/file/' . $mdrs->filemdr) }}"
                                                        class="dropdown-item" target="_blank">View Details</a>
                                                    <a href="{{ asset('assets/uploads/mdrs/file/' . $mdrs->filemdr) }}"
                                                        class="dropdown-item" download>Download</a>
                                                </div>
                                            </div>
                                            <div class="p-2 small">
                                                <div>{{ $mdrs->filemdr }}</div>
                                                @php
                                                    $filePath = 'assets/uploads/mdrs/file/' . $mdrs->filemdr;
                                                    $fileSize = filesize(public_path($filePath));

                                                    // Define an array of human-readable file size units
                                                    $units = ['B', 'KB', 'MB', 'GB', 'TB'];

                                                    // Calculate the file size in human-readable format
                                                    $humanSize = $fileSize > 0 ? round($fileSize / pow(1024, $exp = floor(log($fileSize, 1024))), 2) . ' ' . $units[$exp] : '0 B';
                                                @endphp
                                                <div class="text-muted">File Size: {{ $humanSize }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif (strtolower($extension) === 'pdf')
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                        <div class="card app-file-list">
                                            <div class="app-file-icon">
                                                <i class="fa fa-file-pdf-o text-danger"></i>
                                                <div class="dropdown position-absolute top-0 right-0 mr-3">
                                                    <a href="#" class="font-size-14" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-v"
                                                            style="color: rgb(0, 255, 98);padding-top: 15px;font-size:24px"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{ asset('assets/uploads/mdrs/file/' . $mdrs->filemdr) }}"
                                                            class="dropdown-item" target="_blank">View Details</a>
                                                        <a href="{{ asset('assets/uploads/mdrs/file/' . $mdrs->filemdr) }}"
                                                            class="dropdown-item" download>Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 small">
                                                <div>{{ $mdrs->filemdr }}</div>
                                                @php
                                                    $filePath = 'assets/uploads/mdrs/file/' . $mdrs->filemdr;
                                                    $fileSize = filesize(public_path($filePath));

                                                    // Define an array of human-readable file size units
                                                    $units = ['B', 'KB', 'MB', 'GB', 'TB'];

                                                    // Calculate the file size in human-readable format
                                                    $humanSize = $fileSize > 0 ? round($fileSize / pow(1024, $exp = floor(log($fileSize, 1024))), 2) . ' ' . $units[$exp] : '0 B';
                                                @endphp
                                                <div class="text-muted">File Size: {{ $humanSize }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <br>
                        <section class="card card-body border mb-0">
                            <h6 class="card-title">การทดสอบ <strong>Tensile</strong></h6>
                            <h6 class="card-title"> <strong>AVG</strong></h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <Label>Thicknees</Label>
                                        <input type="number" class="form-control" name="thicknees" id="thicknees"
                                            value="{{ old('thicknees', $tensiles->thicknees) }}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <Label>Width</Label>
                                        <input type="number" class="form-control" name="width" id="width"
                                            value="{{ old('width', $tensiles->width) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <Label>Length</Label>
                                        <input type="number" class="form-control" name="length" id="length"
                                            value="{{ old('length', $tensiles->length) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <Label>Max_Force</Label>
                                        <input type="number" class="form-control" name="max_force"
                                            value="{{ old('max_force', $tensiles->max_force) }}" id="max_force" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <Label>Max_Stress</Label>
                                        <input type="number" class="form-control" name="max_stress"
                                            value="{{ old('max_stress', $tensiles->max_stress) }}" id="max_stress"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <Label>Modules</Label>
                                        <input type="number" class="form-control" name="modules" id="modules"
                                            value="{{ old('modules', $tensiles->modules) }}"readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <Label>E.Break</Label>
                                        <input type="number" class="form-control" name="break" id="break"
                                            value="{{ old('break', $tensiles->break) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">รายละเอียดเพิ่มเติม</label>
                                        <input type="text" class="form-control" name="tensiles_description"
                                            value="{{ old('tensiles_description', $tensiles->tensiles_description) }}"
                                            id="tensiles_description" value="ไม่มีรายละเอียด" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @if ($tensiles->filetensile)
                                        @php
                                            $extension = pathinfo($tensiles->filetensile, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                                <div class="card app-file-list" style="width: 230px">
                                                    <img src="{{ asset('assets/uploads/filetensiles/file/' . $tensiles->filetensile) }}"
                                                        alt="">
                                                    <div class="dropdown position-absolute top-0 right-0 mr-3">
                                                        <a href="#" class="font-size-14" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"
                                                                style="color: rgb(0, 255, 98);padding-top: 15px;font-size:24px"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{ asset('assets/uploads/filetensiles/file/' . $tensiles->filetensile) }}"
                                                                class="dropdown-item" target="_blank">View Details</a>
                                                            <a href="{{ asset('assets/uploads/filetensiles/file/' . $tensiles->filetensile) }}"
                                                                class="dropdown-item" download>Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="p-2 small">
                                                        <div>{{ $tensiles->filetensile }}</div>
                                                        @php
                                                            $filePath = 'assets/uploads/filetensiles/file/' . $tensiles->filetensile;
                                                            $fileSize = filesize(public_path($filePath));

                                                            // Define an array of human-readable file size units
                                                            $units = ['B', 'KB', 'MB', 'GB', 'TB'];

                                                            // Calculate the file size in human-readable format
                                                            $humanSize = $fileSize > 0 ? round($fileSize / pow(1024, $exp = floor(log($fileSize, 1024))), 2) . ' ' . $units[$exp] : '0 B';
                                                        @endphp
                                                        <div class="text-muted">File Size: {{ $humanSize }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif (strtolower($extension) === 'pdf')
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                                <div class="card app-file-list">
                                                    <div class="app-file-icon">
                                                        <i class="fa fa-file-pdf-o text-danger"></i>
                                                        <div class="dropdown position-absolute top-0 right-0 mr-3">
                                                            <a href="#" class="font-size-14"
                                                                data-toggle="dropdown">
                                                                <i class="fa fa-ellipsis-v"
                                                                    style="color: rgb(0, 255, 98);padding-top: 15px;font-size:24px"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="{{ asset('assets/uploads/filetensiles/file/' . $tensiles->filetensile) }}"
                                                                    class="dropdown-item" target="_blank">View Details</a>
                                                                <a href="{{ asset('assets/uploads/filetensiles/file/' . $tensiles->filetensile) }}"
                                                                    class="dropdown-item" download>Download</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-2 small">
                                                        <div>{{ $tensiles->filetensile }}</div>
                                                        @php
                                                            $filePath = 'assets/uploads/filetensiles/file/' . $tensiles->filetensile;
                                                            $fileSize = filesize(public_path($filePath));

                                                            // Define an array of human-readable file size units
                                                            $units = ['B', 'KB', 'MB', 'GB', 'TB'];

                                                            // Calculate the file size in human-readable format
                                                            $humanSize = $fileSize > 0 ? round($fileSize / pow(1024, $exp = floor(log($fileSize, 1024))), 2) . ' ' . $units[$exp] : '0 B';
                                                        @endphp
                                                        <div class="text-muted">File Size: {{ $humanSize }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <br>
                            <section class="card card-body border mb-0">
                                <h6 class="card-title">การทดสอบ <strong>Hardness</strong></h6>
                                <h6 class="card-title"> <strong>AVG</strong></h6>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>ครั้งที่ 1</Label>
                                            <input type="number" class="form-control" name="hts1" id="hts1"
                                                value="{{ $hardnesses->hts1 }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>ครั้งที่ 2</Label>
                                            <input type="number" class="form-control" name="hts2" id="hts2"
                                                value="{{ $hardnesses->hts2 }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>ครั้งที่ 3</Label>
                                            <input type="number" class="form-control" name="hts3" id="hts3"
                                                value="{{ $hardnesses->hts3 }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Type</label>
                                            <input type="text" class="form-control" name="hts3" id="hts3"
                                                value="{{ $hardnesses->type }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">รายละเอียดเพิ่มเติม</label>
                                            <input type="text" class="form-control" name="hardnesses_description"
                                                id="hardnesses_description"
                                                value="{{ $hardnesses->hardnesses_description }}" readonly>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                @php
                    $isAdministrator = auth()->check() && auth()->user()->role_as == 0;
                @endphp
                @if (!$isAdministrator)
                    <form action="{{ route('admin.rubbers.updateStatusAndInspection', ['id' => $rubbers->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">สถานะการใช้งาน</h6>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>เปิด - ปิด กาารใช้งาน</label>
                                                <select name="status" class="form-control" id="status">
                                                    <option value="Enabled"
                                                        @if ($rubbers->status == 'Enabled') selected @endif>เปิดใช้งาน
                                                    </option>
                                                    <option value="Disabled"
                                                        @if ($rubbers->status == 'Disabled') selected @endif> ปิดใช้งาน
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <Label>ตรวจ LAB</Label>
                                                <select name="inspection" class="form-control" id="inspection">
                                                    <option value="Approve"
                                                        @if ($rubbers->inspection == 'Approve') selected @endif>ผ่านแล้ว</option>
                                                    <option value="Disapproved"
                                                        @if ($rubbers->inspection == 'Disapproved') selected @endif>ยังไม่ผ่าน
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit"> SAVE </button>
                                        </div>
                    </form>
                @endif
            </div>
        </div>
    @endsection

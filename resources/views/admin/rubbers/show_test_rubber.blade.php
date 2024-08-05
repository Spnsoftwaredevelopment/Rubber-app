@extends('admin.layouts.master')

@section('main')

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>รวมสูตรยาง</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">สูตรยาง</li>
                        <li class="breadcrumb-item" aria-current="page">{{ $rubbers->name_formula }}</li>
                        <li class="breadcrumb-item active" aria-current="page">รายละเอียดสูตรยาง</li>
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
                            <h6 class="card-title"> <strong>สูตรยาง </strong></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <Label>ชื่อสูตรยาง</Label>
                                        <input type="text" class="form-control" value="{{ $rubbers->name_formula }}"
                                            name="name_formula" required="" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
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
                                        <th style="width: 15%;">ACTION</th>
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
                                        <td>
                                            <a type="button" class="btn btn-danger" href="{{ url('admin/material/delete' . $arr->id) }}" onclick="return confirm('คุณต้องการลบข้อมูลนี้จริงหรือไม่?');" style="color: white" ><i data-feather="trash-2"></i>Remove<span class="flaticon-next"></span></a>
                                        </td>
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
                                        <th style="width: 15%;">ACTION</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"> บันทึกขั้นตอนการทดลอง</h6>
                            <section class="card card-body border mb-0">
                                <h6 class="card-title">การทดสอบ <strong>MDR</strong></h6>
                                <h6 class="card-title"> <strong>AVG</strong></h6>
                                <div class="row">
                                @foreach ($test as $item)
                                    @foreach ($mdrs as $arr)
                                        @if ($item->mdrs_id == $arr->id)
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>ML</label>
                                            <input type="text" class="form-control" name="ml" id="ml" value="{{ $arr->ml }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>MH</Label>
                                            <input type="text" class="form-control" name="mh" id="mh" value="{{ $arr->mh }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>TS1</Label>
                                            <input type="text" class="form-control" name="ts1" id="ts1" value="{{ $arr->ts1 }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>TS2</Label>
                                            <input type="text" class="form-control" name="ts2" id="ts2" value="{{ $arr->ts2 }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>TC50</Label>
                                            <input type="text" class="form-control" name="tc50" id="tc50" value="{{ $arr->tc50 }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <Label>TC90</Label>
                                            <input type="text" class="form-control" name="tc90" id="tc90" value="{{ $arr->tc90 }}"
                                                required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">รายละเอียดเพิ่มเติม</label>
                                            <input type="text" class="form-control" name="mdrs_description"  value="{{ $arr->mdrs_description }}"
                                                id="mdrs_description">
                                        </div>
                                    </div>
                                @if ($arr->filemdr)
                                @php
                                    $extension = pathinfo($arr->filemdr, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                        <div class="card app-file-list" style="width: 230px">
                                            <img src="{{ asset('assets/uploads/mdrs/file/' . $arr->filemdr) }}"
                                                alt="">
                                            <div class="dropdown position-absolute top-0 right-0 mr-3">
                                                <a href="#" class="font-size-14" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v"
                                                        style="color: rgb(0, 255, 98);padding-top: 15px;font-size:24px"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ asset('assets/uploads/mdrs/file/' . $arr->filemdr) }}"
                                                        class="dropdown-item" target="_blank">View Details</a>
                                                    <a href="{{ asset('assets/uploads/mdrs/file/' . $arr->filemdr) }}"
                                                        class="dropdown-item" download>Download</a>
                                                </div>
                                            </div>
                                            <div class="p-2 small">
                                                <div>{{ $arr->filemdr }}</div>
                                                @php
                                                    $filePath = 'assets/uploads/mdrs/file/' . $arr->filemdr;
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
                                                            <a href="{{ asset('assets/uploads/mdrs/file/' . $arr->filemdr) }}"
                                                                class="dropdown-item" target="_blank">View Details</a>
                                                            <a href="{{ asset('assets/uploads/mdrs/file/' . $arr->filemdr) }}"
                                                                class="dropdown-item" download>Download</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-2 small">
                                                    <div>{{ $arr->filemdr }}</div>
                                                    @php
                                                        $filePath = 'assets/uploads/mdrs/file/' . $arr->filemdr;
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
                                    @endif
                                @endforeach
                            @endforeach
                                </div>
                            </section>
                            <br>
                            <section class="card card-body border mb-0">
                                <h6 class="card-title">การทดสอบ <strong>Tensile</strong></h6>
                                <h6 class="card-title"> <strong>AVG</strong></h6>
                                <div class="row">
                                @foreach ($test as $item)
                                    @foreach ($tensiles as $arr)
                                        @if ($item->tensiles_id == $arr->id)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <Label>Thicknees</Label>
                                            <input type="text" class="form-control" name="thicknees" value="{{ $arr->thicknees }}"
                                                id="thicknees" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <Label>Width</Label>
                                            <input type="text" class="form-control" name="width" id="width" value="{{ $arr->width }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <Label>Length</Label>
                                            <input type="text" class="form-control" name="length" id="length" value="{{ $arr->length }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>Max_Force</Label>
                                            <input type="text" class="form-control" name="max_force" value="{{ $arr->max_force }}"
                                                id="max_force" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>Max_Stress</Label>
                                            <input type="text" class="form-control" name="max_stress" value="{{ $arr->max_stress }}"
                                                id="max_stress" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>Modules</Label>
                                            <input type="text" class="form-control" name="modules" id="modules" value="{{ $arr->modules }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>E.Break</Label>
                                            <input type="text" class="form-control" name="break" id="break" value="{{ $arr->break }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">รายละเอียดเพิ่มเติม</label>
                                            <input type="text" class="form-control" name="tensiles_description"
                                                id="tensiles_description" value="{{ $arr->tensiles_description }}">
                                        </div>
                                    </div>
                                    @if ($arr->filetensile)
                                        @php
                                            $extension = pathinfo($arr->filetensile, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                                <div class="card app-file-list" style="width: 230px">
                                                    <img src="{{ asset('assets/uploads/filetensiles/file/' . $arr->filetensile) }}"
                                                        alt="">
                                                    <div class="dropdown position-absolute top-0 right-0 mr-3">
                                                        <a href="#" class="font-size-14" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"
                                                                style="color: rgb(0, 255, 98);padding-top: 15px;font-size:24px"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{ asset('assets/uploads/filetensiles/file/' . $arr->filetensile) }}"
                                                                class="dropdown-item" target="_blank">View Details</a>
                                                            <a href="{{ asset('assets/uploads/filetensiles/file/' . $arr->filetensile) }}"
                                                                class="dropdown-item" download>Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="p-2 small">
                                                        <div>{{ $arr->filetensile }}</div>
                                                        @php
                                                            $filePath = 'assets/uploads/filetensiles/file/' . $arr->filetensile;
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
                                                                <a href="{{ asset('assets/uploads/filetensiles/file/' . $arr->filetensile) }}"
                                                                    class="dropdown-item" target="_blank">View Details</a>
                                                                <a href="{{ asset('assets/uploads/filetensiles/file/' . $arr->filetensile) }}"
                                                                    class="dropdown-item" download>Download</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-2 small">
                                                        <div>{{ $arr->filetensile }}</div>
                                                        @php
                                                            $filePath = 'assets/uploads/filetensiles/file/' . $arr->filetensile;
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
                                    @endif
                                @endforeach
                            @endforeach
                            </section>
                            <br>
                            <section class="card card-body border mb-0">
                                <h6 class="card-title">การทดสอบ <strong>Hardness</strong></h6>
                                <h6 class="card-title"> <strong>AVG</strong></h6>
                                <div class="row">
                                @foreach ($test as $item)
                                    @foreach ($hardnesses as $arr)
                                        @if ($item->hardness_id == $arr->id)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>A</Label>
                                            <input type="text" class="form-control" name="hts1" id="hts1" value="{{ $arr->hts1 }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>B</Label>
                                            <input type="text" class="form-control" name="hts2" id="hts2" value="{{ $arr->hts2 }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <Label>C</Label>
                                            <input type="text" class="form-control" name="hts3" id="hts3" value="{{ $arr->hts3 }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Type</label>
                                            <select class="form-control" id="type" name="type">
                                            <option value="{{ $arr->type }}" @if ($arr->type == "None") selected @endif>None</option>
                                            <option value="{{ $arr->type }}" @if ($arr->type == "Shore A") selected @endif>Shore A</option>
                                            <option value="{{ $arr->type }}" @if ($arr->type == "Shore D") selected @endif>Shore D</option>
                                            <option value="{{ $arr->type }}" @if ($arr->type == "Shore O") selected @endif>Shore O</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">รายละเอียดเพิ่มเติม</label>
                                            <input type="text" class="form-control" name="hardnesses_description"
                                                id="hardnesses_description" value="{{ $arr->hardnesses_description }}">
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="form-group visible">
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection

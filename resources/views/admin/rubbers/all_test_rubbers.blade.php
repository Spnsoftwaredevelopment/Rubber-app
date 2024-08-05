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
                    <li class="breadcrumb-item" aria-current="page">Testlab</li>
                    <li class="breadcrumb-item active" aria-current="page">รวมการทดสอบ</li>
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
                                    <input type="text" class="form-control" value="{{ $rub->name_formula }}"
                                        name="name_formula" required="" readonly="">
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('all_test_update', ['id' => $rub->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>เลือกสูตรที่ใช้งาน</label>
                                        <select class="form-control" name="testlab_id" id="testlab_id">
                                            <option>None</option>
                                            @foreach ($testlab as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($item->id == $rub->testlab_id) selected @endif>
                                                    การทดสอบที่ {{ $item->id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ความแข็ง (A)</label>
                                        <font color="red"> *</font>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="hardness_s" id="hardness_s"
                                                value="{{ $rub->hardness_s }}" required="">
                                            <div class="input-group-append">
                                                <span class="input-group-text">ถึง</span>
                                            </div>
                                            <input type="number" class="form-control" name="hardness_e" id="hardness_e"
                                                value="{{ $rub->hardness_e }}" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <Label>ชื่อสูตรยางใหม่</Label>
                                        <input type="text" class="form-control" value="{{ $rub->name_formula }}"
                                            name="name_formula" id="" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" style="text-align: left;" type="submit"> SAVE </button>
                                </div>
                            </div>
                        </form>
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
                        <h6 class="card-title"> <strong>กราฟ </strong></h6>
                        <div class="row">
                            <?php
                            
                            // $chart_arr = [];
                            // foreach ($mdrs as $key => $mdr) {
                            //     //dd ($mdr);
                            //     $array = [$mdr->ml, $mdr->mh, $mdr->ts1, $mdr->ts2, $mdr->tc50, $mdr->tc90];
                            //     // dd ($array);
                            //     array_push($chart_arr, $array);
                            // }
                            
                            // dd ($chart_arr);
                            ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="select2-example" id="test_compare" multiple>
                                        <option>Select</option>
                                        @foreach ($mdrs as $mdr)
                                            <option value="{{ $mdr->id }}">{{ $mdr->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button  id="fetch_report" class="btn btn-primary" style="text-align: left;" type="submit"> Create Char </button>
                            </div>
                            <div class="col-md-12">
                                <canvas id="comparisonChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- ------------------------------------------------------------------------------------------------------- --}}
    </div>
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
                                        <th class="text-center tb-w-100 ">สูตรที่ใช้งาน</th>
                                        <th class="tb-w-120 ">การทดสอบที่</th>
                                        {{-- <th>ID</th> --}}
                                        <th>วันที่ทดสอบ</th>
                                        <th class="text-right tb-w-100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach ($testlab as $item)
                                        <tr>
                                            <td class="text-center">
                                                <?php if ($item->id ==  $rub->testlab_id): ?>
                                                <span class="badge badge-success"> <i class="ti-check"></i></span>
                                                <?php else: ?>
                                                {{-- <span class="badge badge-danger">Passive</span> --}}
                                                <?php endif; ?>
                                            </td>
                                            <td class=""> {{ $i }} </td>
                                            {{-- <td> {{ $item->id }} </td> --}}
                                            <td class="">
                                                {{ date('d:m:Y', strtotime($item->created_at)) }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-sm" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">
                                                            <a class="btn-one"
                                                                href="{{ url('/admin/rubbers/show_test_rubbers/' . $item->id) }}">รายละเอียดการทดสอบ<span
                                                                    class="flaticon-next"></span></a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $i++ @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>การทดสอบที่</th>
                                        {{-- <th>ID</th> --}}
                                        <th>วันที่ทดสอบ</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js-content')


    <script type="text/javascript">
        // Replace 'your_csrf_token_value' with your actual CSRF token
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var myLineChart;
        $(document).ready(function() {
            $('#fetch_report').click(function(e) {
                e.preventDefault();

                if ($('.select2-selection__choice').length == 2) {
                    $.ajax({
                        type: "post",
                        url: "/rubber-data/public/admin/rubbers/fecth_report",
                        data: {
                            testCompare: $('#test_compare').val()
                        },
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(response) {
                            if (response.success) {
                                
                                // console.log(response.data[0]); // Log the response to the console
                                // console.log(chartData.dataset1);
                                var chartData = response.data;

                                var options = {
                                    type: 'line',
                                    data: {
                                        labels: ["ML", "MH", "TS1", "TS2","tc50","tc90"],
                                        datasets: [{
                                                label: '1',
                                                data:  response.data[0],
                                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                borderColor: 'rgba(255, 99, 132, 1)',
                                                borderWidth: 1
                                            },
                                            {
                                                label: '2',
                                                data:   response.data[1],
                                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                borderColor: 'rgba(54, 162, 235, 1)',
                                                borderWidth: 1
                                            }
                                        ]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                };
                                var ctx = document.getElementById('comparisonChart').getContext('2d');
                                if (myLineChart) {
                                    myLineChart.destroy();
                                }
    
                                myLineChart = new Chart(ctx, options);

                                
                            }

                        }
                    });
                }
            });
        });
    </script>
@endsection

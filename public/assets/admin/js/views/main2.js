           $(function(){

                toastr.info('Bootstrap 4 on steroids', 'Welcome to ROOT Admin', {
                    closeButton: true,
                    progressBar: true,
                });

                $('input[name="daterange"]').daterangepicker({
                    opens: 'left',
                    ranges: {
                       'Today': [moment(), moment()],
                       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                       'This Month': [moment().startOf('month'), moment().endOf('month')],
                       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                });

                //convert Hex to RGBA
                function convertHex(hex,opacity){
                    hex = hex.replace('#','');
                    r = parseInt(hex.substring(0,2), 16);
                    g = parseInt(hex.substring(2,4), 16);
                    b = parseInt(hex.substring(4,6), 16);

                    result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
                    return result;
                }

                //Random Numbers
                function random(min,max) {
                    return Math.floor(Math.random()*(max-min+1)+min);
                }

                //Main Chart
                var elements = 11;
                var data1 = [];
                var summary=['{{ $jan_grand_total }}','{{ $feb_grand_total }}','{{ $mar_grand_total }}','{{ $apr_grand_total }}','{{ $may_grand_total }}','{{ $jun_grand_total }}','{{ $jul_grand_total }}','{{ $aug_grand_total }}','{{ $sep_grand_total }}','{{ $oct_grand_total }}','{{ $nov_grand_total }}','{{ $dec_grand_total }}'];

                for (var i = 0; i <= elements; i++) {
                    data1.push(summary[i]);
                }

                var data = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: 'My Revenue',
                            backgroundColor: convertHex($.brandInfo,10),
                            borderColor: $.brandInfo,
                            pointHoverBackgroundColor: '#fff',
                            borderWidth: 2,
                            data: data1
                        }
                    ]
                };

                var options = {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                drawOnChartArea: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                maxTicksLimit: 10,
                                stepSize: Math.ceil(50000 / 5),
                                max: 50000
                            }
                        }]
                    },
                    elements: {
                        point: {
                            radius: 0,
                            hitRadius: 10,
                            hoverRadius: 4,
                            hoverBorderWidth: 3,
                        }
                    },
                };
                var ctx = $('#main-chart');
                var mainChart = new Chart(ctx, {
                    type: 'line',
                    data: data,
                    options: options
                });

            });
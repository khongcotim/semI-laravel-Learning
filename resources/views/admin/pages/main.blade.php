@extends('admin.master.master')
@section('main')
@section('dashboard','active')
@section('title','Admin')
<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Dashboard</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                            <li>Pages</li>
                            <li>Dashboard</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
            <div class="row mt-4">
                <div class="col-lg-3 responsive-column-1">
                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                        <div class="d-flex pb-3 justify-content-between">
                            <div class="info-content">
                                <p class="info__desc">Customer Account</p>
                                <h4 class="info__title">{{count($customer_account)}}</h4>
                            </div><!-- end info-content -->
                            <div class="info-icon icon-element bg-5">
                                <i class="las la-user"></i>
                            </div><!-- end info-icon-->
                        </div>
                        <div class="section-block"></div>
                        <a href="{{route('accountCustomer.index')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-1">
                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                        <div class="d-flex pb-3 justify-content-between">
                            <div class="info-content">
                                <p class="info__desc">Tour Guide</p>
                                <h4 class="info__title">{{count($tour_guild)}}</h4>
                            </div><!-- end info-content -->
                            <div class="info-icon icon-element bg-10">
                                <i class="las la-user-alt"></i>
                            </div><!-- end info-icon-->
                        </div>
                        <div class="section-block"></div>
                        <a href="{{route('tour_guide.index')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-l">
                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                        <div class="d-flex pb-3 justify-content-between">
                            <div class="info-content">
                                <p class="info__desc">Total Booking!</p>
                                <h4 class="info__title">{{count($total_booking)}}</h4>
                            </div><!-- end info-content -->
                            <div class="info-icon icon-element bg-4">
                                <i class="la la-shopping-cart"></i>
                            </div><!-- end info-icon-->
                        </div>
                        <div class="section-block"></div>
                        <a href="{{route('order.index')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column-l">
                    <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                        <div class="d-flex pb-3 justify-content-between">
                            <div class="info-content">
                                <p class="info__desc">New Reviews!</p>
                                <h4 class="info__title">{{count($new_reviews)}}</h4>
                            </div><!-- end info-content -->
                            <div class="info-icon icon-element bg-3">
                                <i class="la la-star"></i>
                            </div><!-- end info-icon-->
                        </div>
                        <div class="section-block"></div>
                            @if (count($new_reviews)>0)
                                <a href="{{route('admin.reviews')}}" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
                            @else
                                <a class="d-flex align-items-center justify-content-between view-all">Nothing to see</a>
                            @endif
                        </div>
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div>
    </div><!-- end dashboard-bread -->
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 responsive-column--m">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <div class="d-flex align-items-center justify-content-between">
                                <ul class="chart-pagination d-flex">

                                </ul>
                                <div class="select-contain">
                                    <select class="select-contain-select" onchange="see_chart_income()" id="chart_income">
                                        <option value="All">All</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-content">
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-7-->
                <div class="col-lg-5 responsive-column--m">
                    <div class="form-box dashboard-card">
                        <div class="form-title-wrap">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="title">Notifications</h3>
                                <button type="button" class="icon-element mark-as-read-btn ml-auto mr-0" data-toggle="tooltip" data-placement="left" title="Mark all as read">
                                    <i class="la la-check-square"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-content p-0">
                            <div class="list-group drop-reveal-list">

                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="msg-body d-flex align-items-center">
                                        <div class="icon-element bg-2 flex-shrink-0 mr-3 ml-0"><i class="la la-check"></i></div>
                                        <div class="msg-content w-100">
                                            <h3 class="title pb-1">Your account has been created</h3>
                                            <p class="msg-text">{{\Carbon\Carbon::parse(Auth::user()->created_at)->diffForHumans()}}</p>
                                        </div>
                                        <span class="icon-element mark-as-read-btn flex-shrink-0 ml-auto mr-0" data-toggle="tooltip" data-placement="left" title="Mark as read">
                                            <i class="la la-check-square"></i>
                                        </span>
                                    </div><!-- end msg-body -->
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="msg-body d-flex align-items-center">
                                        <div class="icon-element bg-3 flex-shrink-0 mr-3 ml-0"><i class="la la-user"></i></div>
                                        <div class="msg-content w-100">
                                            <h3 class="title pb-1">Your account updated</h3>
                                            <p class="msg-text">{{\Carbon\Carbon::parse(Auth::user()->updated_at)->diffForHumans()}}</p>
                                        </div>
                                        <span class="icon-element mark-as-read-btn flex-shrink-0 ml-auto mr-0" data-toggle="tooltip" data-placement="left" title="Mark as read">
                                            <i class="la la-check-square"></i>
                                        </span>
                                    </div><!-- end msg-body -->
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="msg-body d-flex align-items-center">
                                        <div class="icon-element bg-4 flex-shrink-0 mr-3 ml-0"><i class="la la-lock"></i></div>
                                        <div class="msg-content w-100">
                                            <h3 class="title pb-1">Your password changed</h3>
                                            <p class="msg-text">{{\Carbon\Carbon::parse(Auth::user()->updated_at)->diffForHumans()}}</p>
                                        </div>
                                        <span class="icon-element mark-as-read-btn flex-shrink-0 ml-auto mr-0" data-toggle="tooltip" data-placement="left" title="Mark as read">
                                            <i class="la la-check-square"></i>
                                        </span>
                                    </div><!-- end msg-body -->
                                </a>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-5 -->
                <div class="col-lg-12">
                    <div class="form-box dashboard-card">
                        <div class="form-title-wrap">
                            <h3 class="title">Sales earning this month for each service</h3>
                        </div>
                        <div class="form-content">
                            <div class="row">
                                <div class="col-lg-3 responsive-column-l">
                                    <div class="icon-box icon-layout-2 dashboard-icon-box dashboard--icon-box bg-1 pb-0">
                                        <div class="d-flex pb-3 justify-content-between">
                                            <div class="info-content">
                                                <p class="info__desc">Tour</p>
                                                <h4 class="info__title">${{number_format($money_earn_this_month_for_tour)}}</h4>
                                            </div><!-- end info-content -->
                                            <div class="info-icon icon-element bg-white text-color-2">
                                                <i class="la la-hotel"></i>
                                            </div><!-- end info-icon-->
                                        </div>
                                        <div class="section-block"></div>
                                        <a href="{{route('payment.index')}}" class="d-flex align-items-center justify-content-between view-all">View Details <i class="la la-arrow-right"></i></a>
                                    </div>
                                </div><!-- end col-lg-3 -->
                                <div class="col-lg-3 responsive-column-l">
                                    <div class="icon-box icon-layout-2 dashboard-icon-box dashboard--icon-box bg-2 pb-0">
                                        <div class="d-flex pb-3 justify-content-between">
                                            <div class="info-content">
                                                <p class="info__desc">Service</p>
                                                <h4 class="info__title">${{number_format($money_earn_this_month_for_service)}}</h4>
                                            </div><!-- end info-content -->
                                            <div class="info-icon icon-element bg-white text-color-3">
                                                <i class="lab la-servicestack"></i>
                                            </div><!-- end info-icon-->
                                        </div>
                                        <div class="section-block"></div>
                                        <a data-toggle="modal"
                                        data-target="#view_service" class="d-flex align-items-center justify-content-between view-all">View Details <i class="la la-arrow-right"></i></a>
                                    </div>
                                </div><!-- end col-lg-3 -->
                            </div><!-- end row -->
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
                <div class="col-lg-6 responsive-column--m">
                    <div class="form-box dashboard-card">
                        <div class="form-title-wrap">
                            <h3 class="title">Total Orders</h3>
                        </div>
                        <div class="form-content">
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6 responsive-column--m">
                    <div class="form-box dashboard-card">
                        <div class="form-title-wrap">
                            <h3 class="title">Employee Statistics</h3>
                        </div>
                        <div class="form-content">
                            <canvas id="tour_guild_chart"></canvas>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
</div>
@stop
@section('send_feedback')
    <div class="modal-popup">
            <div class="modal fade" id="view_service" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title title" id="exampleModalLongTitle3">Service Income</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="la la-close"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form-action">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Time Booked</th>
                                            <th scope="col">Total Earned</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_service as $value)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{number_format($value->price) }}</td>
                                                <td>{{array_key_exists($value->id,$count_service_used)?$count_service_used[$value->id]:0 }}</td>
                                                <td>${{array_key_exists($value->id,$service_earned)?$service_earned[$value->id]:0 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="color: rgb(148, 141, 141);font-size: 24px;font-weight: bold">Total:</td>
                                            <td>${{number_format($money_earn_this_month_for_service)}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- end contact-form-action -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
<script>
    ///Line Chart
    function see_chart_income(){
        var value = $('#chart_income').val();
        $.ajax({
            type: "GET",
            url: "{{route('admin.home')}}",
            data: {
                month_income_selected:value
            },
            success: function (response) {
                if (response != 'all') {
                    var ctx = document.getElementById("line-chart");
        Chart.defaults.global.defaultFontFamily = "Cabin",
            Chart.defaults.global.defaultFontSize = 14,
            Chart.defaults.global.defaultFontStyle = "500",
            Chart.defaults.global.defaultFontColor = "#808996";
        var chart = new Chart(ctx, {
            type: "line",
            data: {
                labels: ["Week 1", "Week 2", "Week 3", "Week4"],
                datasets: [{
                    label: "Income (Unit: $)",
                    data: [response[0], response[1],response[2],response[3],response[4]],
                    backgroundColor: "transparent",
                    borderColor: "#287dfa",
                    pointBorderColor: "#ffffff",
                    pointBackgroundColor: "#287dfa",
                    pointBorderWidth: 2,
                    pointRadius: 4
                }, ]
            },

            options: {
                tooltips: {
                    backgroundColor: "#1c2540"
                },
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                        display: !0,
                        gridLines: {
                            offsetGridLines: !1,
                            display: !1
                        }
                    }],
                    yAxes: [{
                        display: !0,
                        gridLines: {
                            color: "#eee"
                        },
                        ticks: {
                            fontSize: 14
                        }
                    }]
                },
                title: {
                    display: true,
                    font: {weight: 'bold'},
                    text: "Statistics of income for " + value +" of "+ new Date().getFullYear()
                    }
                }
        });



                }else{
                    var ctx = document.getElementById("line-chart");
        Chart.defaults.global.defaultFontFamily = "Cabin",
            Chart.defaults.global.defaultFontSize = 14,
            Chart.defaults.global.defaultFontStyle = "500",
            Chart.defaults.global.defaultFontColor = "#808996";
        var chart = new Chart(ctx, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "March", "April", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Income (Unit: $)",
                    data: ["{{$total_order_in_jan}}", "{{$total_price_in_feb}}", "{{$total_price_in_march}}", "{{$total_price_in_april}}", "{{$total_price_in_may}}", "{{$total_price_in_jun}}", "{{$total_price_in_jul}}", "{{$total_price_in_aug}}", "{{$total_price_in_sep}}", "{{$total_price_in_oct}}", "{{$total_price_in_nov}}", "{{$total_price_in_dec}}"],
                    backgroundColor: "transparent",
                    borderColor: "#287dfa",
                    pointBorderColor: "#ffffff",
                    pointBackgroundColor: "#287dfa",
                    pointBorderWidth: 2,
                    pointRadius: 4
                }, ]
            },

            options: {
                tooltips: {
                    backgroundColor: "#1c2540"
                },
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                        display: !0,
                        gridLines: {
                            offsetGridLines: !1,
                            display: !1
                        }
                    }],
                    yAxes: [{
                        display: !0,
                        gridLines: {
                            color: "#eee"
                        },
                        ticks: {
                            fontSize: 14
                        }
                    }]
                },
                title: {
                    display: true,
                    font: {weight: 'bold'},
                    text: "Statistics of income for the year "+ new Date().getFullYear()
                    }
                }
        });
                }

            }
        });
    }
</script>
<script>
    var ctx = document.getElementById("line-chart");
    Chart.defaults.global.defaultFontFamily = "Cabin",
        Chart.defaults.global.defaultFontSize = 14,
        Chart.defaults.global.defaultFontStyle = "500",
        Chart.defaults.global.defaultFontColor = "#808996";
    var chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "March", "April", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Income (Unit: $)",
                data: ["{{$total_price_in_jan}}", "{{$total_price_in_feb}}", "{{$total_price_in_march}}", "{{$total_price_in_april}}", "{{$total_price_in_may}}", "{{$total_price_in_jun}}", "{{$total_price_in_jul}}", "{{$total_price_in_aug}}", "{{$total_price_in_sep}}", "{{$total_price_in_oct}}", "{{$total_price_in_nov}}", "{{$total_price_in_dec}}"],
                backgroundColor: "transparent",
                borderColor: "#287dfa",
                pointBorderColor: "#ffffff",
                pointBackgroundColor: "#287dfa",
                pointBorderWidth: 2,
                pointRadius: 4
            }, ]
        },

        options: {
            tooltips: {
                backgroundColor: "#1c2540"
            },
            legend: {
                display: true
            },
            scales: {
                xAxes: [{
                    display: !0,
                    gridLines: {
                        offsetGridLines: !1,
                        display: !1
                    }
                }],
                yAxes: [{
                    display: !0,
                    gridLines: {
                        color: "#eee"
                    },
                    ticks: {
                        fontSize: 14
                    }
                }]
            },
            title: {
                display: true,
                font: {weight: 'bold'},
                text: "Statistics of income for the year "+ new Date().getFullYear()
                }
            }
    });
</script>
{{-- Bar Chat --}}
<script>
    var ctx=document.getElementById("bar-chart");
    Chart.defaults.global.defaultFontFamily="Cabin",
    Chart.defaults.global.defaultFontSize=14,
    Chart.defaults.global.defaultFontStyle="500",
    Chart.defaults.global.defaultFontColor="#808996";
    var chart=new Chart(ctx,{
        type:"bar",
        data:{
            labels: ["Jan", "Feb", "March", "April", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets:[{label:"One",data:["{{$total_order_in_jan}}", "{{$total_order_in_feb}}", "{{$total_order_in_march}}", "{{$total_order_in_april}}", "{{$total_order_in_may}}", "{{$total_order_in_jun}}", "{{$total_order_in_jul}}", "{{$total_order_in_aug}}", "{{$total_order_in_sep}}", "{{$total_order_in_oct}}", "{{$total_order_in_nov}}", "{{$total_order_in_dec}}"],
            backgroundColor:"#287dfa",
            hoverBackgroundColor:"#2273e5",
            pointBackgroundColor:"#fff",
            borderWidth:0,
            pointRadius:4
            }]}
            ,options:
                {tooltips:{backgroundColor:"#1c2540"},
                legend:{display:!1},
                scales:{xAxes:[{barPercentage:.4,barThickness:15,display:!0,gridLines:{offsetGridLines:!1,display:!1}}],
                yAxes:[{display:!0,gridLines:{color:"#eee"},
                ticks:{fontSize:14}}]}}
    });
</script>
{{-- Tour Guild Chart --}}
<script>
    var ctx = document.getElementById("tour_guild_chart");
    Chart.defaults.global.defaultFontFamily = "Cabin",
        Chart.defaults.global.defaultFontSize = 14,
        Chart.defaults.global.defaultFontStyle = "500",
        Chart.defaults.global.defaultFontColor = "#808996";
    var chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "March", "April", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Tour Guild",
                data: ["{{$total_tour_guild_in_jan}}", "{{$total_tour_guild_in_feb}}", "{{$total_tour_guild_in_march}}", "{{$total_tour_guild_in_april}}", "{{$total_tour_guild_in_may}}", "{{$total_tour_guild_in_jun}}", "{{$total_tour_guild_in_jul}}", "{{$total_tour_guild_in_aug}}", "{{$total_tour_guild_in_sep}}", "{{$total_tour_guild_in_oct}}", "{{$total_tour_guild_in_nov}}", "{{$total_tour_guild_in_dec}}"],
                backgroundColor:"transparent",
                borderColor:"#28d5a7",
                pointBorderColor:"#ffffff",
                pointBackgroundColor:"#28d5a7",
                pointBorderWidth:2,
                pointRadius:4
            }, ]
        },

        options: {
            tooltips: {
                backgroundColor: "#1c2540"
            },
            legend: {
                display: true
            },
            scales: {
                xAxes: [{
                    display: !0,
                    gridLines: {
                        offsetGridLines: !1,
                        display: !1
                    }
                }],
                yAxes: [{
                    display: !0,
                    gridLines: {
                        color: "#eee"
                    },
                    ticks: {
                        fontSize: 14
                    }
                }]
            },
            title: {
                display: true,
                font: {weight: 'bold'},
                text: "Employee Statistics for the year "+ new Date().getFullYear()
                }
            }
    });
</script>
@stop

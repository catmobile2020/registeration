@extends('admin.layouts.master')

@section('title','analysis')

@section('css')
    <link href="{{asset('assets/admin/css/plugins/chartist/chartist.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <h1 class="page-title">{{$event->name}} analysis</h1>
        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-2">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
            <li class="active"><strong>{{$event->name}} analysis</strong></li>
        </ol>
        <div class="row">
            <div class="col-lg-6">
                <!-- panel-->
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="panel-title">Event Users Chart</div>
                        <ul class="panel-tool-options">
                            <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                            <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                            <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                        </ul>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div id="flot-bar-chart" class="flot-chart-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="panel-title">Event Features</div>
                        <ul class="panel-tool-options">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
                                    <li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
                                    <li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
                                </ul>
                            </li>
                            <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                            <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                            <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                        </ul>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div id="flot-line-chart" class="flot-chart-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/admin/js/plugins/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/chartist/chartist-script.js')}}"></script>

    <script src="{{asset('assets/admin/js/plugins/flot/jquery.flot.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/flot/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/flot/jquery.flot.pie.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins/flot/jquery.flot.time.min.js')}}"></script>
{{--    <script src="{{asset('assets/admin/js/plugins/flot/flot-script.js')}}"></script>--}}
    <script>
        //Flot Bar Chart
        $(function () {
            var ticks = [
                [1, "attendees"], [2, "speakers"], [3, "activeSpeakers"], [4, "talks"], [5, "sponsors"],[6, "partnerships"]
            ];
            var barOptions = {
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.6,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.8
                            }, {
                                opacity: 0.8
                            }]
                        }
                    }
                },
                xaxis: {
                    ticks:  ticks,
                },
                colors: ["#00B8CE"],
                grid: {
                    color: "#999999",
                    hoverable: true,
                    clickable: true,
                    tickColor: "#D4D4D4",
                    borderWidth: 0
                },
                legend: {
                    show: false
                },
                tooltip: true,
                tooltipOpts: {
                    content: "x: %x, y: %y"
                }
            };
            var barData = {
                label: "bar",
                data: [
                    [1, {{$num_attendees}}],
                    [2, {{$num_speakers}}],
                    [3, {{$num_active_speakers}}],
                    [4, {{$num_talks}}],
                    [5, {{$num_sponsors}}],
                    [6, {{$num_partnerships}}]
                ]
            };
            $.plot($("#flot-bar-chart"), [barData], barOptions);

        });

        //Flot Line Chart
        $(function () {
            var ticks = [
                [1, "posts"], [2, "comments"], [3, "feedback"], [4, "testimonials"], [5, "polls"],[6, "questions"],
            ];
            var barOptions = {
                series: {
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.0
                            }, {
                                opacity: 0.0
                            }]
                        }
                    }
                },
                xaxis: {
                    ticks:  ticks,
                },
                colors: ["#00b8ce"],
                grid: {
                    color: "#999999",
                    hoverable: true,
                    clickable: true,
                    tickColor: "#D4D4D4",
                    borderWidth: 0
                },
                legend: {
                    show: false
                },
                tooltip: true,
                tooltipOpts: {
                    content: "x: %x, y: %y"
                }
            };
            var barData = {
                label: "bar",
                data: [
                    [1, {{$num_posts}}],
                    [2, {{$num_comments}}],
                    [3, {{$num_feedback}}],
                    [4, {{$num_testimonials}}],
                    [5, {{$num_polls}}],
                    [6, {{$num_questions}}],
                ]
            };
            $.plot($("#flot-line-chart"), [barData], barOptions);

        });
    </script>
@endsection

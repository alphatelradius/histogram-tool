<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Add New Automation Process - Histogram Automation Tool</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!--<meta charset="utf-8">-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!--        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">-->
        <link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css')}}">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="{{ URL::to('assets/js/plugins/icheck/skins/minimal/blue.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/js/plugins/datepicker/datepicker.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/js/plugins/select2/select2.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/js/plugins/simplecolorpicker/jquery.simplecolorpicker.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/js/plugins/timepicker/bootstrap-timepicker.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/js/plugins/fileupload/bootstrap-fileupload.css')}}">

        <!-- App CSS -->
        <link rel="stylesheet" href="{{ URL::to('assets/css/target-admin.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/css/custom.css')}}">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
            .clearfix{
                height: 30px!important;
                width: 100%;
            }
        </style>
    </head>

    <body>
        <!-- nav bar start -->
        @include('master.nav-top')
        <!-- nav bar end -->

        <!-- main nav start -->
        @include('master.nav-main')
        <!-- main nav end -->

        <div class="container">

            <div class="content">
                <div class="content-container">
                    <div class="content-header">
                        <h2 class="content-headeindex-2.htmlr-title">Automation Process</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ URL::to('')}}">Home</a></li>
                            <li><a href="{{ URL::to('/automate')}}"> Complete Process</a></li>
                            <li class="active" >Add New Process</li>
                        </ol>
                    </div> <!-- /.content-header -->



                    <div class="row">

                        <div class="col-sm-12">

                            <div class="portlet">

                                <div class="portlet-header">

                                    <h3>
                                        <i class="fa fa-tasks"></i>
                                        Result of Automate Process
                                    </h3>

                                </div> <!-- /.portlet-header -->

                                <div class="portlet-content">
                                    @if(Session::has('message'))	  
                                    {{ Session::get('message') }}
                                    @endif
                                    <form action="{{URL::to('manual/finalpresentation')}}" method="POST" id="ppt">
                                        <input type="hidden" name="id_result" value="{{$res}}"/>
                                    </form>
                                    <button class="btn btn-info" id="save_img"><i class="fa fa-desktop"></i> Create Presentation</button>
                                    <!--<input type="button" id="save_img" valuesave_img="Create Presentation" class="btn btn-info"/>-->
                                    <div class="clearfix"></div>

                                    <!-- Highchart container -->
                                    <?php
                                    $count = count($charts_data['x']);
                                    for ($i = 0; $i < $count; $i++) {
                                        ?>
                                        <div id="container{{$i}}" style="min-width: 310px; height: 400px; margin: 0 auto; margin-bottom: 30px; "></div>

                                        <!-- canvas tag to convert SVG -->
                                        <canvas id="canvas{{$i}}" style="display:none;"></canvas>
                                        <div class='clearfix'></div>
                                    <?php } ?>



                                </div> <!-- /.portlet-content -->
                            </div> <!-- /.portlet -->
                        </div> <!-- /.col -->
                    </div> <!-- /.row -->




                </div> <!-- /.content-container -->

            </div> <!-- /.content -->

        </div> <!-- /.container -->


        <footer class="footer">
            @include('master.nav-footer')

        </footer>

        <script src="{{ URL::to('assets/js/libs/jquery-1.10.1.min.js')}}"></script>
        <script src="{{ URL::to('assets/js/libs/jquery-ui-1.9.2.custom.min.js')}}"></script>
        <script src="{{ URL::to('assets/js/libs/bootstrap.min.js')}}"></script>

        <!--[if lt IE 9]>
        <script src="{{ URL::to('assets/js/libs/excanvas.compiled.js')}}"></script>
        <![endif]-->

        <!-- Plugin JS -->
        <script src="{{ URL::to('assets/js/plugins/parsley/parsley.js')}}"></script>
        <script src="{{ URL::to('assets/js/plugins/icheck/jquery.icheck.js')}}"></script>
        <script src="{{ URL::to('assets/js/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
        <script src="{{ URL::to('assets/js/plugins/timepicker/bootstrap-timepicker.js')}}"></script>
        <script src="{{ URL::to('assets/js/plugins/simplecolorpicker/jquery.simplecolorpicker.js')}}"></script>
        <script src="{{ URL::to('assets/js/plugins/select2/select2.js')}}"></script>

        <!-- App JS -->
        <script src="{{ URL::to('assets/js/target-admin.js')}}"></script>

        <!-- Plugin JS -->
        <script src="{{ URL::to('assets/js/demos/form-validation.js')}}"></script>

        <script src="{{ URL::to('highchart/highcharts.js')}}"></script>

        <script type="text/javascript" src="{{URL::to('cvg/rgbcolor.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('cvg/StackBlur.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('cvg/canvg.js')}}"></script>
        <script type = "text/javascript">
        $("#save_img").click(function () {
save_image();
        });
        function make_chart() {
<?php
for ($i = 0; $i < $count; $i++) {
    $y = json_encode($charts_data['y'][$i]);
    $yy = json_encode($charts_data['yy'][$i]);
    $x = json_encode($charts_data['x'][$i]);
    $plot_name = PlotModel::where('id', $charts_data['plot'][$i])->first();
    ?>
            $('#container{{$i}}').highcharts({
                 credits: {
            enabled: false
        },
            chart: {
            borderWidth: 1,
                    plotBorderWidth: 1,
                    spacingRight: 10,
                    spacingLeft: 10,
                    spacingTop: 10,
                    spacingBottom: 20,
                    zoomType: 'xy',
                    height: 448,
                    width: 653,
                    backgroundColor: {
                    
                    <?php if($charts_data['tech'][$i]=='UMTS') {?>
                                    linearGradient: { x1: 1, y1: 1, x2: 0, y2: 0 },
                            stops: [
                                    [0, '#EDEDED'],
                                    [1, '#9A9B9D']
                            ]
                    <?php }else {?>
                        radialGradient: { cx: 0.4, cy: 0.6, r: 0.7 },
                         stops: [
                                    
                                    [0, '#CEFFFF'],
                                    [1, '#FDFFFF']
                                    
                                    
                            ]
                    <?php } ?>
                    },
            },
                    title: {
                    text: "Dominant {{$plot_name->name}}",
                            style: {
                            color: '#003366',
                                    fontSize: 13
                            }
                    },
                    subtitle: {
                    text: ''
                    },
                    xAxis: [{
                            tickColor: '#000000',
            tickWidth: 1,
                    labels: {
                    rotation: - 45
                    },
                            categories: {{$x}},
                            crosshair: false,
                            gridLineColor: 'black',
                            gridLineWidth: 0,
                            lineWidth:2,
                            title: {
                            text: '',
                                    style: {
                                    color: '#21466C'//label of x axis bottom
                                    }
                            },
                    },
                    ],
                    yAxis: [{
                    tickColor: '#000000',
                            tickWidth: 1,
                            plotLines: [{
                            color: 'red', // Color value

                                    value: 0, // Value of where the line will appear
                                    width: 2 // Width of the line    
                            }],
                            gridLineColor: '#00000',
                            gridLineWidth: 0,
                            lineWidth:2,
                            min: 0,
                            tickInterval: 1,
                            tickPositions: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                            title: {
                            text: '',
                                    style: {
                                    color: '#21466C'//label of y axis left
                                    }
                            },
                            labels: {
                            format: '{value}.00 %',
                                    style: {
                                    color: '#21466C'//label of y axis right
                                    }
                            }
                    }, {// Secondary 
                    tickColor: '#000000',
                            tickWidth: 1,
                            gridLineColor: '#00000',
                            gridLineWidth: 0,
                            lineWidth:2,
                            plotLines: [{
                            color: '#00000',
                                    width: 10,
                                    value: 0
                            }],
                            min: 0,
                            tickInterval: 1,
                            tickPositions: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                            title: {
                            text: '',
                                    style: {
                                    color: '#21466C'//label of y axis left
                                    }
                            },
                            labels: {
                            format: '{value}.00 %',
                                    style: {
                                    color: '#21466C'//label of y axis right
                                    }
                            },
                            opposite: true
                    }],
                    tooltip: {
                    shared: true
                    },
                    series: [{
                    borderColor: '#303030',
                            showInLegend:false,
                            name: '',
                            type: 'column',
                            yAxis: 1,
                            data: {{$y}},
                            color:{ linearGradient: { x1: 1, y1: 1, x2: 1, y2: 0 },
                                <?php if($charts_data['tech'][$i]=='UMTS') {?>
                                    stops: [
                                            [0, '#91AED5'],
                                            [1, '#36389C']
                                    ]
                                <?php } else{?>
                                    stops: [
                                            [0, '#3A3298'],
                                            [1, '#FB0B20']
                                    ]
                                <?php }?>
                                }
                    }, {
                    showInLegend:false,
                            color: 'blue',
                            name: '',
                            type: 'line',
                            data: {{$yy}},
                    }],
            });
                    console.log({{$y}});
                    console.log({{$yy}});
<?php } ?>
        }

function save_image() {
// Handler for .ready() called.
<?php for ($i = 0; $i < $count; $i++) { 
    $encode=  urlencode($charts_data['title'][$i]);
    ?>
    var svg = document.getElementById('container{{$i}}').children[0].innerHTML;
            canvg(document.getElementById('canvas{{$i}}'), svg);
            var img = canvas{{$i}}.toDataURL("image/png"); //img is data:image/png;base64
            img = img.replace('data:image/png;base64,', '');
            var data = "bin_data=" + img + '&id_res=' + {{$res}} + '&plot=' + {{$charts_data['plot'][$i]}}+ '&title=' + '{{$encode}}';
            
            $.ajax({
            type: "POST",
                    url: 'savecharts',
                    data: data,
                    success: function (data) {
                    <?php if ($i==$count-1) {?>
                            var form = document.getElementById("ppt");
                            form.submit();
                    <?php }?>
                    }
            });
<?php } ?>

        }
//$(function () {
//Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
//return {
//radialGradient: {cx: 0.5, cy: 0.3, r: 0.7},
//        stops: [
//                [0, color],
//                [1, Highcharts.Color(color).brighten( - 0.3).get('rgb')] // darken
//        ]
//        };
//        });
//});
$(document).ready(function () {
make_chart();
        });
        </script>

    </body>
</html>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Homepage - Histogram Automation Tool - Alphatelradius.net</title>

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="icon" sizes="192x192" href="{{URL::to('images/favicon.png')}}" /> 


        <!--        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">-->
        <link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css')}}">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="{{ URL::to('assets/js/plugins/icheck/skins/minimal/blue.css')}}">

        <!-- App CSS -->
        <link rel="stylesheet" href="{{ URL::to('assets/css/target-admin.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/css/custom.css')}}">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
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
                        <h2 class="content-headeindex-2.htmlr-title">Welcome to Application ...</h2>

                    </div> <!-- /.content-header -->


                    <div class="row">

                        <div class="col-md-12">

                            <div class="portlet">

                                <div class="portlet-header">

                                    <h3>
                                        <i class="fa fa-table"></i>
                                        Developer's Note
                                    </h3>
                                </div> <!-- /.portlet-header -->

                                <div class="portlet-content">           
                                    @if(Session::has('message'))	  
                                    {{ Session::get('message') }}
                                    @endif
                                    <div class="table-responsive">



                                        <p class="lead">Guide to use application</p>

                                        <p>This application was built as web-based application, so you can use this application without any installation before</p>

                                        <p>This application can read your input from several xls files that contained by data you want to make histogram. Bellow, developer wrote some feature you can use</p>

                                        <br>
                                        <ul class="icons-list">
                                            <li>
                                                <i class="icon-li fa fa-cloud"></i>
                                                <b class="text-danger">Store your file on server !</b><br>
                                                Upload your file (xls/xlsx) want to make histogram.This file will stored on server. So when you uploaded your file today, you can use your file whenever as long as you're not delete it
                                            </li>
                                            <li>
                                                <i class="icon-li fa fa-tasks"></i>
                                                <b class="text-danger">Set your own range! </b><br>The core range will be used will stored as <b>Range Name</b>, the range name contained some range and data you will use as based to build your histogram.<br> You can set your own range to build your histogram presentation. Each range will grouped into <b>Range Type</b> to easier you identifying it, just group it as you want. Or if you think that you don't need group it, you just can use default range type 'Default'.<br>

                                            </li>
                                            <li>
                                                <i class="icon-li fa fa-tasks"></i>
                                                <b class="text-danger">Process your file and get powerpoint presentation result! </b>
                                                <br>Just go to menu 'Process' and select <b>Range Name</b> you will use, write your process note as your own identifier and select <b>some</b> file you will process. System will working for you to generate some histogram that will automatically inserted into powerpoint presentation file.<br>The page will redirect to list of result and download it.<br>

                                            </li>
                                        </ul>
                                        <br>
                                        <div class="well">
                                            <h4>Info</h4>
                                            If any question about this application, just mail me on dewi@alphatelradius.net
                                        </div>
                                    </div> <!-- /.table-responsive -->


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
        <script src="./js/libs/excanvas.compiled.js"></script>
        <![endif]-->

        <!-- Plugin JS -->
        <script src="{{ URL::to('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ URL::to('assets/js/plugins/datatables/DT_bootstrap.js')}}"></script>
        <script src="{{ URL::to('assets/js/plugins/tableCheckable/jquery.tableCheckable.js')}}"></script>
        <script src="{{ URL::to('assets/js/plugins/icheck/jquery.icheck.min.js')}}"></script>

        <!-- App JS -->
        <script src="{{ URL::to('assets/js/target-admin.js')}}"></script>




    </body>
</html>
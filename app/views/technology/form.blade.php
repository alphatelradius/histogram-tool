<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
         <title>Technology Add - Histogram Automation Tool</title>

        <meta charset="utf-8">
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
                        <h2 class="content-headeindex-2.htmlr-title">Technology</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ URL::to('')}}">Home</a></li>
                            <li><a href="{{ URL::to('/technology')}}">Available Technology </a></li>
                            <li class="active" >Add New Technology</li>
                        </ol>
                    </div> <!-- /.content-header -->



                    <div class="row">

                        <div class="col-sm-8">

                            <div class="portlet">

                                <div class="portlet-header">

                                    <h3>
                                        <i class="fa fa-tasks"></i>
                                        Add New Technology Bellow
                                    </h3>

                                </div> <!-- /.portlet-header -->

                                <div class="portlet-content">
                                    @if(Session::has('message'))	  
                                    {{ Session::get('message') }}
                                    @endif
                                    <form id="validate-basic" action="{{ URL::to('/technology/save') }}" data-validate="parsley" class="form parsley-form" method="POST">

                                        <div class="form-group">
                                            <label for="name">Technology Name</label>
                                            <input type="text" id="name" name="name" class="form-control" data-required="true" value="{{ empty($row['name'])?Input::old('name'):$row['name'] }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="textarea-input">Description</label>
                                            <textarea data-required="true" data-minlength="5" name="info" id="textarea-input" cols="10" rows="2" class="form-control">{{ empty($row['info'])?Input::old('info'):$row['info'] }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>

                                    </form>

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





    </body>
</html>
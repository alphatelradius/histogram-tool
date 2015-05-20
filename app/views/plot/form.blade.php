<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Plot Type - Histogram Automation Tool</title>

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
        <style>
            .fieldwrapper{
                margin:auto; margin-top:15px;height:auto; overflow:hidden;
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
                        <h2 class="content-headeindex-2.htmlr-title">Plot Type</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ URL::to('')}}">Home</a></li>
                            <li><a href="{{ URL::to('/plot')}}">Available Plot Type</a></li>
                            <li class="active" >Add New Plot Type</li>
                        </ol>
                    </div> <!-- /.content-header -->



                    <div class="row">

                        <div class="col-sm-8">

                            <div class="portlet">

                                <div class="portlet-header">

                                    <h3>
                                        <i class="fa fa-tasks"></i>
                                        Add New Plot Type Bellow
                                    </h3>

                                </div> <!-- /.portlet-header -->

                                <div class="portlet-content">
                                    @if(Session::has('message'))	  
                                    {{ Session::get('message') }}
                                    @endif
                                    <form id="validate-basic" action="{{ URL::to('/plot/save') }}" data-validate="parsley" class="form parsley-form" method="POST">

                                        <div class="form-group">  
                                            <label for="validateSelect">Technology</label>
                                            <select id="validateSelect" class="form-control" data-required="true" name="id_tech">
                                                <option value="">Please Select</option>

                                                @foreach($technology as $rows)
                                                <option {{ ($row['id_tech']==$rows->id)? 'selected':'' }} value="{{ $rows->id }}">{{ $rows->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Plot Name</label>
                                            <input type="hidden" id="id" name="id" class="form-control" data-required="true" value="{{ empty($row['id'])?Input::old('id'):$row['id'] }}">
                                            <input type="text" id="name" name="name" class="form-control" data-required="true" value="{{ empty($row['name'])?Input::old('name'):$row['name'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Info</label>
                                            <textarea name="info" class="form-control">{{ empty($row['info'])?Input::old('info'):$row['info'] }}</textarea>

                                        </div>
                                        <div class="form-group" id="buildyourform">
                                            
                                                @if(count(@$plot)==0)
                                                <div class="fieldwrapper" id="field0">
                                                <div class="col-md-3" style="padding-left: 0px">
                                                    <label for="name">Start</label>
                                                    <input type="number" id="name" name="start[]" class="form-control" data-required="true" >
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="name">End</label>
                                                    <input type="number" id="name" name="end[]" class="form-control" data-required="true" >
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="name" style="color: #FFFFFF;">act</label>
                                                    <input type="button" value="add data" class="btn btn-xs btn-success" id="add" style="margin-top: 5px;">
                                                </div>
                                                <div class="clearfix"></div>
                                                </div>
                                                @else
                                                <?php $i=0; ?>
                                                    @foreach($plot as $k=>$v)
                                                        @if($i==0)
                                                        <div class="fieldwrapper" id="field0">
                                                            <div class="col-md-3" style="padding-left: 0px">
                                                                <label for="name">Start</label>
                                                                <input type="number" id="name" name="start[]" class="form-control" data-required="true" value="{{ $v->start}}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="name">End</label>
                                                                <input type="number" id="name" name="end[]" class="form-control" data-required="true" value="{{ $v->end}}">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="name" style="color: #FFFFFF;">act</label>
                                                                <input type="button" value="add data" class="btn btn-xs btn-success" id="add" style="margin-top: 5px;">
                                                            </div>
                                                        <div class="clearfix"></div>
                                                        </div>
                                                        @else
                                                        <div class="fieldwrapper" id="field0">
                                                            <div class="col-md-3" style="padding-left: 0px">
                                                                <input type="number" id="name" name="start[]" class="form-control" data-required="true" value="{{ $v->start}}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="number" id="name" name="end[]" class="form-control" data-required="true" value="{{ $v->end }}" >
                                                            </div>
                                                            <div class="col-md-2 btn-remove">
                                                                <input type="button" class="btn  btn-xs btn-danger" style="margin:auto; margin-top:5px;" value=" X " />
                                                            </div>
                                                        <div class="clearfix"></div>
                                                        </div>
                                                        @endif
                                                        <?php $i++; ?>
                                                    @endforeach
                                                @endif
                                            

                                            


                                        </div>
                                        <!--                                        <div class="form-group">
                                                                                    <label for="textarea-input">Rule of Plot</label> <small>sample: -50,-30;-20,-10</small>
                                                                                    <textarea name="range" data-required="true" data-minlength="5" id="textarea-input" cols="10" rows="2" class="form-control"></textarea>
                                                                                </div>-->
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




        <script>
$(".btn-remove").click(function () {
    $(this).parent().remove();
});

$("#add").click(function () {
    var intId = $("#buildyourform div").length + 1;
    var fieldWrapper = $("<div  class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
    var fName = $('<div class="col-md-3" style="padding-left: 0px"><input type="number" id="name" name="start[]" class="form-control" data-required="true" ></div><div class="col-md-3"><input type="number" id="name" name="end[]" class="form-control" data-required="true" ></div>');

    var removeButton = $("<div class=\"col-md-2\"><input type=\"button\" class=\"btn btn-xs btn-danger\" style=\"margin:auto; margin-top:5px;\" value=\" X \" /></div>");
    removeButton.click(function () {
        $(this).parent().remove();
    });


    fieldWrapper.append(fName);
    fieldWrapper.append(removeButton);
    $("#buildyourform").append(fieldWrapper);
});
        </script>
    </body>
</html>
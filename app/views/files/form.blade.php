<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Upload File - Histogram Automation Tool</title>

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!--  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
          <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">-->
        <link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css')}}">

        <!-- App CSS -->
        <link rel="stylesheet" href="{{ URL::to('assets/css/target-admin.css')}}">
        <link rel="stylesheet" href="{{ URL::to('assets/css/custom.css')}}">

        {{ HTML::style('dropzone/css/basic.css') }}
        {{ HTML::style('dropzone/css/dropzone.css') }}
        {{ HTML::script('assets/js/jquery.js') }}
        {{ HTML::script('dropzone/dropzone.js') }} 
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
                        <h2 class="content-header-title">File</h2>
                        <ol class="breadcrumb">
                            <li><a href="index-2.html">Home</a></li>
                            <li><a href="{{ URL::to('/files')}}">Available Files</a></li>
                            <li class="active">Add New Files</li>
                        </ol>
                    </div> <!-- /.content-header -->


                    <div class="row">

                        <div class="col-md-12">

                            <div class="portlet">

                                <div class="portlet-header">

                                    <h3>
                                        Add Files Bellow
                                    </h3>

                                </div> <!-- /.portlet-header -->

                                <div class="portlet-content">   
                                    
                                    <div id="dropzone">
                                        {{ Form::open(array('url' => 'files/upload', 'class'=>'dropzone', 'id'=>'my-dropzone')) }}
                                        <!-- Single file upload 
                                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                        -->
                                        <!-- Multiple file upload-->
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>

                                        {{ Form::close() }}
                                    </div>


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
        <!-- App JS -->
        <script src="{{ URL::to('assets/js/target-admin.js')}}"></script>
        <script language="javascript">


// myDropzone is the configuration for the element that has an id attribute
// with the value my-dropzone (or myDropzone)
Dropzone.options.myDropzone = {
    init: function () {
        this.on("addedfile", function (file) {

            var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
            var _this = this;

            removeButton.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();

                var fileInfo = new Array();
                fileInfo['name'] = file.name;

                $.ajax({
                    type: "POST",
                    url: "{{ url('/delete-image') }}",
                    data: {file: file.name},
                    beforeSend: function () {
                        // before send
                    },
                    success: function (response) {

                        if (response == 'success')
                            alert('deleted');
                    },
                    error: function () {
                        alert("error");
                    }
                });


                _this.removeFile(file);

                // If you want to the delete the file on the server as well,
                // you can do the AJAX request here.
            });


            // Add the button to the file preview element.
            file.previewElement.appendChild(removeButton);
        });
    }
};

        </script>



    </body>
</html>
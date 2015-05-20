<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>List of Available file - Histogram Automation Tool</title>

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
                        <h2 class="content-headeindex-2.htmlr-title">File</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ URL::to('')}}">Home</a></li>
                            <li class="active">Available File</li>
                            <li ><a href="{{ URL::to('files/add')}}">Add New Files</a></li>
                        </ol>
                    </div> <!-- /.content-header -->


                    <div class="row">

                        <div class="col-md-12">

                            <div class="portlet">

                                <div class="portlet-header">

                                    <h3>
                                        <i class="fa fa-table"></i>
                                        Available File Bellow
                                    </h3>
					
                                </div> <!-- /.portlet-header -->

                                <div class="portlet-content">           
					@if(Session::has('message'))	  
                                    {{ Session::get('message') }}
                                    @endif
<div class="col-md-12" style="margin-bottom:20px;"><div class="pull-right"><button class="btn btn-danger" id="submit"><i class="fa fa-trash"></i> Delete Selected</button></div></div>
                                    <div class="table-responsive">
					<form action="{{URL::to('files/destroy')}}" id="submform">
					
                                        <table 
                                            class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                                            data-provide="datatable" 
                                            data-display-rows="10"
                                            data-info="true"
                                            data-search="true"
                                            data-length-change="true"
                                            data-paginate="true"
                                            >
                                            <thead>
                                                <tr>
                                                    <th class="checkbox-column">
                                                        <input type="checkbox" class="icheck-input">
                                                    </th>
                                                    <th data-filterable="true" data-sortable="true" data-direction="desc">Filename</th>
                                                    <th data-direction="asc" data-filterable="true" data-sortable="true">Uploaded Date</th>
                                                    <th data-filterable="false" class="hidden-xs hidden-sm"style="width:250px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($file as $key => $value)
                                                <?php if (file_exists(public_path('uploads/'.$value->filename))) {?>
                                                <tr>
                                                    <td class="checkbox-column">
                                                        <input type="checkbox" class="icheck-input" name="del[]" value="{{$value->id}}"/>
                                                    </td>
                                                    <td>{{ $value->filename }}</td>
                                                    <td>{{ $value->uploaded_at }}
                                                    </td>
                                                   
                                                    <td class="text-center">
                                                        <a href="{{URL::to('files/delete/'.SiteHelpers::encryptID($value->id))}}" class="btn btn-xs btn-primary" data-original-title="Approve">
                                                            <i data-toggle="tooltip" data-placement="top" title="delete" data-original-title="" class="fa fa-trash-o ui-tooltip"></i> delete
                                                        </a> 
                                                         <a href="{{URL::to('uploads/'.$value->filename)}}" class="btn btn-xs btn-success" data-original-title="Approve">
                                                            <i data-toggle="tooltip" data-placement="top" title="download" data-original-title="" class="fa fa-download ui-tooltip"></i> download
                                                        </a> 

                                                    </td>
                                                </tr>
                                                <?php }?>
                                                @endforeach
                                            </tbody>
                                        </table>
</form>
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


<script>
$("#submit").click(function () {
if(confirm("Are you sure to delete some files?")){
var form = document.getElementById("submform");
                            form.submit();
}
        });
</script>

    </body>
</html>

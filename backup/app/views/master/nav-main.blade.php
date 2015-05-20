<div class="mainbar">

    <div class="container">

        <button type="button" class="btn mainbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
            <i class="fa fa-bars"></i>
        </button>

        <div class="mainbar-collapse collapse">

            <ul class="nav navbar-nav mainbar-nav">

                <li class="active">
                    <a href="{{ URL::to('')}}">
                        <i class="fa fa-home"></i>
                        Dashboard
                    </a>
                </li>

                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-bars"></i>
                        Technology
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">   
                        <li><a href="{{ URL::to('/technology')}}"><i class="fa fa-user nav-icon"></i> Technology </a></li>
                        <li><a href="{{ URL::to('/plot')}}"><i class="fa fa-bars nav-icon"></i> Available Plot</a></li>

<!--                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">
                                <i class="fa fa-bar-chart-o"></i> 
                                &nbsp;&nbsp;Charts & Graphs
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="ui-chart-flot.html">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        &nbsp;&nbsp;jQuery Flot
                                    </a>
                                </li>

                                <li>
                                    <a href="ui-chart-morris.html">
                                        <i class="fa fa-bar-chart-o"></i> 
                                        &nbsp;&nbsp;Morris.js
                                    </a>
                                </li> 
                            </ul>
                        </li>-->

                    </ul>
                </li>

                <li class="">
                    <a href="{{ URL::to('/files')}}">
                        <i class="fa fa-files-o"></i>
                        Files
                    </a>
                </li>

                <li class="">
                    <a href="{{ URL::to('/automate')}}" class="">
                        <i class="fa fa-dashboard"></i>
                        Process
                    </a>
                </li>  
<!--                <li class="">
                    <a href="{{ URL::to('/operate/result')}}" class="">
                        <i class="fa fa-archive"></i>
                        Result
                    </a>
                </li>  -->


            </ul>

        </div> <!-- /.navbar-collapse -->   

    </div> <!-- /.container --> 

</div> <!-- /.mainbar -->
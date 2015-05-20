<div class="navbar" style="height: 70px;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-cogs"></i>
                    </button>

                    <a class="navbar-brand navbar-brand-image" href="{{ URL::to('') }}">
                        <img style="height: 65px; margin-left: 20px;" src="{{ URL::to('images/logo-histogram.png')}}" alt="Site Logo">
                    </a>

                </div> <!-- /.navbar-header -->

                <div class="navbar-collapse collapse">
                    

                    <ul class="nav navbar-nav navbar-right">   

                        <li>
                            <a href="{{ URL::to('')}}">Knowledge Base</a>
                        </li>    

                        <li>
                            <a href="{{ URL::to('')}}">About</a>
                        </li>    

                        <li class="dropdown navbar-profile">
                            

                           

                        </li>

                    </ul>







                </div> <!--/.navbar-collapse -->

            </div> <!-- /.container -->

        </div> <!-- /.navbar -->
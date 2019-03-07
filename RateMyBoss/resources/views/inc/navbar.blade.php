<!-- Header Navbar -->
<nav class="navbar navbar-static-top">
    <div class="container">
        <div class="navbar-header">
        <a href="../../index2.html" class="navbar-brand"><b>Rate</b>MyBoss</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
        </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>                        
        </ul>
        
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                        </div>
                    </form>                
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{auth()->user()->photo}}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                <img src="{{auth()->user()->photo}}" class="img-circle" alt="User Image">

                <p>
                    {{auth()->user()->name}}
                    <small>Membro desde {{date("d/m/Y", strtotime(auth()->user()->created_at))}}</small>
                </p>
                </li>
                
                <!-- Menu Footer-->
                <li class="user-footer">
                <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                </li>
            </ul>
            </li>
        </ul>
        </div>
        <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
    </nav>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('tampilanuser/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('tampilanuser/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<style>
    .margin {
        margin-left: 200px;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" >
                
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
                        <div class="sidebar-brand-icon">
                            <img src="{{asset('tampilanuser/img/logo-wk.png')}}" height="50px" width="50px"></img>
                        </div>
                        <div class="sidebar-brand-text mx-3">Perpustakaan<sup></sup></div>
                    </a>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size: 16px;">{{Auth::user()->name}}</span>
                                @if(Auth::user()->gambar == '')
                                <img class="img-profile rounded-circle"  src="{{asset('images/user/default.png')}}" alt="profile image">
                                @else
                                <img class="img-profile rounded-circle"  src="{{asset('images/user/'.Auth::user()->gambar)}}" alt="profile image">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('profile', Auth::user()->id)}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                
                    <!-- partial -->
    <div class="container">
        <div class="" style="margin-left: 130px; margin-bottom: 20px;" >
          <div class="">
              <form action="{{ route('user.update', $data->id) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('put') }}
                  <div class="row">
                      <div class="col-md-12 d-flex align-items-stretch grid-margin">
                        <div class="row flex-grow">
                          <div class="col-12">
                            <div class="card" style="margin-bottom: 20px;">
                              <div class="card-body">
                                <h4 class="card-title margin">Edit profile</h4>
                                
                                  <div class="form-group margin{{ $errors->has('name') ? ' has-error' : '' }}">
                                      <label for="name" class="col-md-4 control-label">Name</label>
                                      <div class="col-md-6">
                                          <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus>
                                          @if ($errors->has('name'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group margin{{ $errors->has('username') ? ' has-error' : '' }}">
                                      <label for="username" class="col-md-4 control-label">Username</label>
                                      <div class="col-md-6">
                                          <input id="username" type="text" class="form-control" name="username" value="{{ $data->username }}" required readonly="">
                                          @if ($errors->has('username'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('username') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>
          
                                  <div class="form-group margin{{ $errors->has('email') ? ' has-error' : '' }}">
                                      <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                      <div class="col-md-6">
                                          <input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}" required readonly="">
                                          @if ($errors->has('email'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>
          
                                  <div class="form-group margin">
                                      <label for="email" class="col-md-4 control-label">Gambar</label>
                                      <div class="col-md-6">
                                          <img class="product" width="200" height="200" @if($data->gambar) src="{{ asset('images/user/'.$data->gambar) }}" @endif />
                                          <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                                      </div>
                                  </div>
                                  @if(Auth::user()->level == 'admin')
                                   <div class="form-group margin{{ $errors->has('level') ? ' has-error' : '' }}">
                                      <label for="level" class="col-md-4 control-label">Level</label>
                                      <div class="col-md-6">
                                      <select class="form-control" name="level" required="">
                                          <option value="admin" @if($data->level == 'admin') selected @endif>Admin</option>
                                          <option value="user" @if($data->level == 'user') selected @endif>User</option>
                                      </select>
                                      </div>
                                  </div>
                                  @endif
          
          
                                  <div class="form-group margin{{ $errors->has('password') ? ' has-error' : '' }}">
                                      <label for="password" class="col-md-4 control-label">Password</label>
                                      <div class="col-md-6">
                                          <input id="password" type="password" class="form-control" onkeyup='check();' name="password">
                                          @if ($errors->has('password'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group margin">
                                      <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                      <div class="col-md-6">
                                          <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation">
                                          <span id='message'></span>
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary margin" id="submit">
                                              Update
                                  </button>
                                  <a href="{{route('home')}}" class="btn btn-danger pull-right margin">Back</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
          <footer class="footer" style="position: absolute; bottom: 0;width: 100%;height: 50px;">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; SMK Wikrama Bogor 2021</span>
                </div>
            </div>
          </footer>
          <!-- partial -->
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('tampilanuser/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('tampilanuser/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('tampilanuser/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('tampilanuser/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('tampilanuser/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('tampilanuser/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('tampilanuser/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
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
    <link href="{{asset('tampilanuser/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<style>
    @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700");
    body{
        font-family: Poppins;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
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
                                <a class="dropdown-item" href="#">
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
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                    <div class="card-body">
                                    	<img @if($data->cover) src="{{ asset('images/buku/'.$data->cover) }}" @endif width="400px" height="500px" alt="">
                                        </div>
                                    </div>
                                    <div style="float: right; padding-left: 100px; padding-top:50px; width:50%; color: black;">
                                        <h3 class="card-title" style="margin-top:10px;">{{$data->judul}}</h3>
    									<p>Penulis <b>{{$data->pengarang}}</b></p>
                                        <p>Penerbit <b>{{$data->penerbit}}</b></p>
                                        <p>Tahun Terbit <b>{{$data->tahun_terbit}}</b></p>
                                        <p style="color:blue;">Sinopsis</p>
                                        <p>{{$data->ringkasan}}</p>
                                        @if ($data->status_pinjam=="tidak")
                                            <a href="#" class="btn btn-warning btn-icon-split" style="margin-bottom: 20px;">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">Buku tidak untuk dipinjamkan</span>
                                            </a>
                                            <br>
                                        @endif
                                        @if ($data->file_buku != NULL && $data->status_pinjam=="boleh")
                                            <a href="{{ asset('uploads/'.$data->file_buku) }}" class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">Baca Bukunya</span>
                                            </a>
                                            {{-- <iframe src="{{asset('uploads/'.$data->file_buku)}}" width="600" height="400"></iframe> --}}
                                        @endif
                                        <a href="{{route('home')}}"><button class="btn btn-danger">Kembali</button></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <footer class="sticky-footer" style="position: absolute; bottom: 0; align: center;width: 100%;height: 50px;">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; SMK Wikrama Bogor 2021</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('tampilanuser/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('tampilanuser/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('tampilanuser/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('tampilanuser/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('tampilanuser/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('tampilanuser/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div class="sidebar-brand-icon">
                    <img  style="width: 40px" src="{{asset('img/logo.png')}}" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">SMAN 87</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU
            </div>



            <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">

                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-house"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item {{ (request()->is('siswa')) ? 'active' : '' }}">

                <a class="nav-link " href="{{route('siswa.index')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Siswa</span></a>
            </li>

            <li class="nav-item {{ (request()->is('matpel')) ? 'active' : '' }}">
                <a class="nav-link " href="{{route('matpel.index')}}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Mata Pelajaran</span></a>
            </li>
            <li class="nav-item {{ (request()->is('admin/tahun-ajaran')) ? 'active' : '' }}">
                <a class="nav-link " href="{{route('tahun-ajaran.index')}}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Tahun Ajaran</span></a>
            </li>

            <li class="nav-item {{ (request()->is('admin/rapor')) ? 'active' : '' }}">
                <a class="nav-link " href="{{route('rapor.index')}}">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Rapor</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



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




                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session('nama')}}</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Nilai</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                               
                                
                                <div class="card-body">
                                    <table width="100%">
                                        <tr>
                                            <th  width = "12%">Nama</th>
                                            <th>: {{$data_siswa->nama}}</th>
                                        </tr>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>: {{$data_siswa->kelas}}</th>
                                        </tr>
                                        <tr>
                                            <th>Tahun Ajaran</th>
                                            <th>: {{$data_tahun->tahun}}</th>
                                        </tr>
                                        <tr>
                                            <th>Semester</th>
                                            <th>: {{$data_sem}}</th>
                                        </tr>
                                    </table>
                                    <div class="table-responsive mt-3">
                                        <table id="datatablesSimple" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Matpel</th>
                                                    <th>Nilai</th>
                                                    <th>Ket</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>       
                                                @foreach ($data_matpel as $dm)
                                                <tr>
                                                    @php
                                                    $nilai = "kosong";
                                                    $ket = "kosong";
                                                     @endphp
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$dm->nama}}</td> 
                                                    
                                                    @foreach ($data_nilai as $dn)
                                                    @if ($dn->matpel->nama == $dm->nama)
                                                        @php
                                                            $nilai = $dn->nilai;
                                                            $ket = $dn->ket;
                                                        @endphp
                                                        {{-- <td>{{$dn->nil   --}}
                                                    @endif
                                                    @endforeach
                                                        <td>{{$nilai}}</td>        
                                                    <td>{{$ket}}</td> 
                                                    
                                                    @if ($nilai == "kosong")
                                                   
                                                    <td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah{{$dm->kode}}"><i class="fa-solid fa-plus"></i> Input</button></td>
                                                    @else
                                                    
                                                    <td><div class="d-flex">
                                                        <button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#ubah{{$dm->kode}}"><i class="fa-solid fa-pen to-square mr-1"></i>Ubah</button> <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#hapus{{$dm->kode}}"><i class="fa-solid fa-trash to-square mr-1"></i>Hapus</button>
                                                    </div></td>
                                                    @endif
                                                   
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    @foreach ($data_matpel as $dm)
                                            <div class="modal fade" id="tambah{{$dm->kode}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Input Nilai</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('rapor.store')}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" id="nisn_siswa" name="nisn_siswa" value="{{$data_siswa->nisn}}">
                                                            <input type="hidden" id="kode_matpel" name="kode_matpel" value="{{$dm->kode}}">
                                                            <input type="hidden" id="tahun" name="tahun" value="{{$data_tahun->id}}">
                                                            <input type="hidden" id="sem" name="sem" value="{{$data_sem}}">
                                                            <div class="form-group">
                                                                <input type="text" id="nama" name="nama"  class="form-control"  value="{{$dm->nama}}" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" id="nilai" name="nilai" placeholder="Masukkan Nilai" class="form-control" max="100" min="0" required autocomplete="off">
                                                            </div>
                                                            <div class="form-group">
                                                                
                                                                <textarea class="form-control" id="ket" name="ket" placeholder="Masukkan Keterangan"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                
                                                                <button class="btn btn-primary" type="submit">Tambah</button>
                                                        </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>

                                                <div class="modal fade" id="ubah{{$dm->kode}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Nilai</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{url('admin/rapor-detail')}}/{{$dm->kode}}/{{$data_siswa->nisn}}/{{$data_tahun->id}}/{{$data_sem}}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="hidden" id="nisn_siswa" name="nisn_siswa" value="{{$data_siswa->nisn}}">
                                                                <input type="hidden" id="kode_matpel" name="kode_matpel" value="{{$dm->kode}}">
                                                                <div class="form-group">
                                                                    <input type="text" id="nama" name="nama"  class="form-control"  value="{{$dm->nama}}" disabled>
                                                                </div>
                                                                @foreach ($data_nilai as $dn)
                                                                @if ($dn->matpel->nama == $dm->nama)
                                                                <div class="form-group">
                                                                    <input type="number" id="nilai" name="nilai" placeholder="Masukkan Nilai" class="form-control" max="100" min="0" required autocomplete="off" value="{{$dn->nilai}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    
                                                                    <textarea class="form-control" id="ket" name="ket" placeholder="Masukkan Keterangan">{{$dn->ket}}</textarea>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn btn-warning" type="submit">Ubah</button>
                                                            </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>

                                                <div class="modal fade" id="hapus{{$dm->kode}}" tabindex="-1" role="dialog" aria-labelledby="hapus-siswa" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus data?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda yakin ingin menghapus data?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                            <form action="{{url('admin/rapor-detail')}}/{{$dm->kode}}/{{$data_siswa->nisn}}/{{$data_tahun->id}}/{{$data_sem}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button class="btn btn-danger" type="submit">hapus</button>
                                                            </form>

                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                    {{-- @foreach ($data_matpel as $dm)
                                    @if ($dm->nilai->isEmpty())
                                        <p>kosong</p>
                                    @else
                                    <p>{{$dm->nilai}}</p>
                                        @foreach ($dm->nilai as $item)
                                            <h1>{{$item->nilai}}</h1>
                                        @endforeach
                                    @endif
                                    
                                        
                                    @endforeach --}}
                                    
                                </div>
                                <!-- Card Header - Dropdown -->
                                
                               
                            </div>
                        </div>
                    </div>

                   

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Muhammad Eri Setyawan</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda Yakin untuk logout?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

    @include('sweetalert::alert')
</body>

</html>


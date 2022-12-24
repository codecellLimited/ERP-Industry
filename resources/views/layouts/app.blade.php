<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MN Packaging & Printing Accessories</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


    @stack('css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ auth()->user()->name }} Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            @if(auth()->user()->role == 3 || auth()->user()->role == 1 || auth()->user()->role == 2)
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Sales
            </div>

            <!-- Nav Item - Suppliers Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#supplier"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Suppliers</span>
                </a>
                <div id="supplier" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{ route('suppliers') }}">Profile</a>
                        <a class="collapse-item" href="{{ route('materialForSupplier') }}">Materials</a>
                        <a class="collapse-item" href="{{ route('purchase') }}">Material Purchase</a>
                        <a class="collapse-item" href="javascript::">Requisition</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Party Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#party"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Party</span>
                </a>
                <div id="party" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                        <a class="collapse-item" href="{{ route('party') }}">Profile</a>
                        <a class="collapse-item" href="{{ route('order') }}">Orders</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Products Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Products</span>
                </a>
                <div id="product" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{route('product')}}">Products</a>
                        <a class="collapse-item" href="{{route('Brand')}}">Brand</a>
                        <a class="collapse-item" href="{{route('Unit')}}">Unit</a>
                        <a class="collapse-item" href="{{route('catagory')}}">Catagories</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('quotation')}}" >
                <i class="fas fa-fw fa-user-tie"></i>
                    <span>Quotations</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('sanction')}}" >
                <i class="fas fa-fw fa-user-tie"></i>
                    <span>Sanction Payment</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('completed')}}" >
                <i class="fas fa-fw fa-user-tie"></i>
                    <span>Delivered order</span>
                </a>
                
            </li>

            @endif


            @if(auth()->user()->role == 4 || auth()->user()->role == 1 || auth()->user()->role == 2)
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                HR
            </div>

            <!-- Nav Item - Suppliers Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('department')}}" >
                <i class="fas fa-fw fa-briefcase"></i>
                    <span>Departments</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('designation')}}" >
                <i class="fas fa-fw fa-briefcase"></i>
                    <span>Designations</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('employee') }}" >
                <i class="fas fa-fw fa-user-tie"></i>
                    <span>Employee Management</span>
                </a>
                
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('salary') }}" >
                <i class="fas fa-fw fa-user-tie"></i>
                    <span>Employee Salary</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('attendance') }}" >
                <i class="fas fa-fw fa-user-tie"></i>
                    <span>Employee Attendance</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('leave') }}" >
                <i class="fas fa-fw fa-user-tie"></i>
                    <span>Leave Management</span>
                </a>
                
            </li>
            @endif


            @if(auth()->user()->role == 5 || auth()->user()->role == 1 || auth()->user()->role == 2)
            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <!-- Heading -->
            <div class="sidebar-heading">
                Accounts
            </div>

            <!-- Nav Item - bank/cash Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bank"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-money-bill-alt	"></i>
                    <span>Bank/ Cash</span>
                </a>
                <div id="bank" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{route('transection')}}">Bank transections</a>
                        <a class="collapse-item" href="{{route('expense')}}">Expenses</a>
                        <a class="collapse-item" href="{{route('partyreceive')}}">Party Receive</a>
                        <a class="collapse-item" href="{{route('supplierpayment')}}">Supplier Payment</a>
                        <a class="collapse-item" href="{{route('lc')}}">LC</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Financial Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#financial"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="far fa-money-bill-alt	"></i>
                    <span>Financial</span>
                </a>
                <div id="financial" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                        <a class="collapse-item" href="{{ route('bankadd') }}">Bank Accounts</a>
                        
                        <a class="collapse-item" href="{{ route('debit') }}">Debit Balance</a>
                        <a class="collapse-item" href="{{ route('credit') }}">Credit Balance</a>
                        <a class="collapse-item" href="{{ route('loan') }}">Loan Applocation</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('sanctionaccount')}}" >
                <i class="fas fa-fw fa-user-tie"></i>
                    <span>Sanction Payment</span>
                </a>
                
            </li>

            @endif

            @if(auth()->user()->role == 4 || auth()->user()->role == 1 || auth()->user()->role == 2  )
            <!-- devider -->
            <hr class="sidebar-devider">

            <div class="sidebar-heading">
                Stock & Inventories
            </div>

            <!-- Nav Item For Stock & Inventories  -->
            <li class="nav-item">
                <a href="{{route('asset')}}" class="nav-link collapsed">
                <i class="fa fa-cog"></i>
                <span>assets</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('Material')}}" class="nav-link collapsed">
                <i class="fa fa-cog"></i>
                <span>Materials</span>
                </a>
            </li>
            <li class="nav-item"> 
                <a href="{{route('MaterialProduction')}}" class="nav-link collapsed">    
                    <i class="fa fa-cog"></i>
                    <span>Material Production</span>
                </a>
            </li>

            <li class="nav-item"> 
                <a href="{{route('totalProduction')}}" class="nav-link collapsed">
                    <i class="fa fa-industry"></i>
                    <span>Total Production</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('ProductionPerDay')}}" class="nav-link collapsed">
                <i class="fa fa-industry"></i>
                <span>Production Per Day</span>
                </a>
            </li>
            <li class="nav-item"> 
                <a href="{{route('ProductionPerParty')}}" class="nav-link collapsed">    
                    <i class="fa fa-industry"></i>
                    <span>Production Per Order</span>
                </a>
            </li>
            @endif
            

            <br><br><br>

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

                    <div class="mr-auto w-100 text-center" style="color:#142983;">
                        <h2 class="m-0"><b>Codecell ERP Solution For Industry</b></h2>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size:16px">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{Route('logout')}}">
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

                    @yield('web-content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; codecell.com.bd</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>


    @stack('js')

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session()->has('success'))
    <script>
        swal("", "{{session('success')}}", "success");
    </script>
    @elseif (session()->has('error'))
    <script>
        swal("", "{{session('error')}}", "error");
    </script>
    @elseif (session()->has('info'))
    <script>
        swal("", "{{session('info')}}", "info");
    </script>
    @endif
</body>

</html>
@extends('layouts.backend')
@section('page_body')

@php
$prefix = Request::route()->getprefix();
$route = Route::current()->getName();
@endphp

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin-dashboard') }}">
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ ($route == 'admin-dashboard')? 'active':'' }}">
            <a class="nav-link" href="{{ route('admin-dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <!-- <li class="nav-item {{ ($route == 'page.index')? 'active':'' }}">
            <a class="nav-link" href="{{ route('page.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Pages</span></a>
        </li> -->

        <!-- Nav Item - Tables -->
        <li class="nav-item {{ ($route == 'package.index')? 'active':'' }}">
            <a class="nav-link" href="{{route('package.index')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Packages</span></a>
        </li>
        <!-- Nav Item - Tables -->
        <!-- <li class="nav-item {{ ($route == 'all-contact')? 'active':'' }}">
            <a class="nav-link" href="{{ route('all-contact') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Contacts</span></a>
        </li> -->
        <!-- Nav Item - Tables -->
        <li class="nav-item {{ ($route == 'site-info.index')? 'active':'' }}">
            <a class="nav-link" href="{{ route('site-info.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Site Info</span></a>
        </li>
        <!-- Nav Item - Tables -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-table"></i>
                <span>SEO Content</span></a>
        </li> -->
        <!-- Nav Item - Tables -->
        <li class="nav-item {{ ($route == 'users-list')? 'active':'' }}">
            <a class="nav-link" href="{{ route('users-list') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Users</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item {{ ($route == 'payment')? 'active':'' }}">
            <a class="nav-link" href="{{ route('payment') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Payments</span></a>
        </li>
        <!-- Nav Item - Tables -->
        <li class="nav-item {{ ($route == 'website')? 'active':'' }}">
            <a class="nav-link" href="{{ route('website') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Websites</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Settings
        </div>
        <!-- Nav Item - Tables -->
        <li class="nav-item {{ ($route == 'site-info.index')? 'active':'' }}">
            <a class="nav-link" href="{{ route('site-info.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>API Key</span>
            </a>

        </li>
        <li class="nav-item {{ ($route == 'changed-password-form')? 'active':'' }}">
            <a class="nav-link" href="{{ route('changed-password-form') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Update Password</span>
            </a>
        </li>

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

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="https://ui-avatars.com/api/">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('changed-password-form') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Password Change
                            </a>
                            <div class="dropdown-divider"></div>
                            
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
                <!--
                {{-- change main content here --}}
                {{-- change main content here --}} -->

                @yield('main_content')


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <a href="http://blogen.net" target="_blank"> Blogen </a></span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>
@endsection
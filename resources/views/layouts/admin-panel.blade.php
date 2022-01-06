<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Grand-Shanghai | Admin Panel</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
        <script src="https://kit.fontawesome.com/942785f6e0.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>
        @livewireStyles
        @powerGridStyles
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Grand-Shanghai</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 border-white text-white" id="sidebarToggle" href="#!"><i class="fas fa-bars fa-lg"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('admin.logout') }}" id="logout-form" method="POST">
                            @csrf

                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="{{ route('admin.home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Back-office</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.user-list') }}">User List</a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.admin-list') }}">Admin List</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Market & Games
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="{{ route('admin.market.index') }}" >
                                        Market
{{--                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
                                    </a>
                                    <a class="nav-link" href="{{ route('admin.results.index') }}">
                                        Result
                                    </a>
{{--                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">--}}
{{--                                        <nav class="sb-sidenav-menu-nested nav">--}}
{{--                                            <a class="nav-link" href="login.html">Login</a>--}}
{{--                                            <a class="nav-link" href="register.html">Register</a>--}}
{{--                                            <a class="nav-link" href="password.html">Forgot Password</a>--}}
{{--                                        </nav>--}}
{{--                                    </div>--}}
                                    <a class="nav-link collapsed" href="{{ route('admin.games.index') }}"  >
                                        Games
{{--                                        <div class="sb-sidenav-collapse-arrow"></div>--}}
                                    </a>
{{--                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">--}}
{{--                                        <nav class="sb-sidenav-menu-nested nav">--}}
{{--                                            <a class="nav-link" href="401.html">401 Page</a>--}}
{{--                                            <a class="nav-link" href="404.html">404 Page</a>--}}
{{--                                            <a class="nav-link" href="500.html">500 Page</a>--}}
{{--                                        </nav>--}}
{{--                                    </div>--}}
                                 </nav>

                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTransaksi" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseTransaksi" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <a class="nav-link collapsed" href="{{ route('admin.admintransaksi') }}"  >
                                    Kredit-Depo-WD
                                    {{--                                        <div class="sb-sidenav-collapse-arrow"></div>--}}
                                </a>
                                <a class="nav-link collapsed" href="{{ route('admin.hitungan') }}"  >
                                    Hitungan
                                    {{--                                        <div class="sb-sidenav-collapse-arrow"></div>--}}
                                </a>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapselaporan" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapselaporan" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <a class="nav-link collapsed" href="{{ route('admin.laporanOmset') }}"  >
                                    Laporan Omset
                                </a>
                                <a class="nav-link collapsed" href="{{ route('admin.winloseagen') }}" >
                                    Laporan Win - Lose
                                </a>
                                <a class="nav-link collapsed" href="{{ route('admin.tagihanmember') }}" >
                                    Laporan Tagihan Member
                                </a>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseShio" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Dan Lain - Lain
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseShio" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <a class="nav-link collapsed" href="{{ route('admin.tabelshio') }}"  >
                                    Tabel Shio
                                    {{--                                        <div class="sb-sidenav-collapse-arrow"></div>--}}
                                </a>
                                <a class="nav-link collapsed" href="{{ route('admin.inputhasil') }}"  >
                                    Input Hasil
                                    {{--                                        <div class="sb-sidenav-collapse-arrow"></div>--}}
                                </a>
                                <a class="nav-link collapsed" href="{{ route('admin.inputtogel') }}"  >
                                    Input Hasil Togel
                                    {{--                                        <div class="sb-sidenav-collapse-arrow"></div>--}}
                                </a>
                                <a class="nav-link collapsed" href="{{ route('admin.bank') }}"  >
                                    Bank
                                    {{--                                        <div class="sb-sidenav-collapse-arrow"></div>--}}
                                </a>
                                <a class="nav-link collapsed" href="{{ route('admin.liveresult') }}"  >
                                    Live Togel {{--                                        <div class="sb-sidenav-collapse-arrow"></div>--}}
                                </a>

                            </div>

                            <div class="sb-sidenav-menu-heading">Front</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsewebsetting" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                               Setting
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsewebsetting" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <a class="nav-link collapsed" href="{{ route('admin.websetting') }}"  >
                                    Website
                                    {{--                                        <div class="sb-sidenav-collapse-arrow"></div>--}}
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Username : {{ Auth::guard('admin')->user()->username }}
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">

                  @yield('members')
                  @yield('users')
                  @yield('users.edit')
                  @yield('games')
                  @yield('markets')
                  @yield('results')
                  @yield('limits')
                  @yield('transaksi')
                  @yield('websetting')
                  @yield('dashboard')
                  @yield('laporanOmset')
                  @yield('useradmin')
                  @yield('tabelshio')
                  @yield('inputhasil')
                  @yield('bank')
                  @yield('hasiltogel')
                  @yield('liveresult')
                  @yield('hitungan')
                  @yield('winloseagen')
                  @yield('winloseagendetail')
                  @yield('winloseinvoicedetail')
                  @yield('invoicedetailuser')
                  @yield('tagihanmember')
                  @yield('tagihanmemberdetail')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted text-center">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        @livewireScripts
        @powerGridScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/script.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

{{--        <script>--}}
{{--                $(document).ready(function(){--}}
{{--                $(".alert").delay(3000).slideUp(500);--}}
{{--            });--}}
{{--        </script>--}}

        <script>
            $(document).ready(function(){
                window.livewire.on('alert_remove',()=>{
                    setTimeout(function(){ $(".alert").slideUp(500);
                    }, 3000); // 3 secs
                });
            });
        </script>

{{--        @stack('users')--}}
{{--        <script>--}}
{{--            $(document).ready( function () {--}}

{{--                $('#members').DataTable();--}}

{{--            });--}}
{{--        </script>--}}
    </body>
</html>

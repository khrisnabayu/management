<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                @if(  auth()->user()->role  == 'marketing' )
                    <div class="sidenav-menu-heading">Dashboard</div>
                    <a class="nav-link" href="{{ route('dashboardmarketings') }}">
                        <div class="nav-link-icon"><i data-feather="home"></i></div>
                        Data Report
                    </a>


                @elseif(  auth()->user()->role  == 'operation' )
                    <div class="sidenav-menu-heading">Dashboard</div>
                    <a class="nav-link" href="{{ route('dashboardoperations') }}">
                        <div class="nav-link-icon"><i data-feather="home"></i></div>
                        Data Report
                    </a>

                @elseif( auth()->user()->role  == 'finance' )
                    <div class="sidenav-menu-heading">Dashboard</div>
                    <a class="nav-link" href="{{ route('dashboardfinances') }}">
                        <div class="nav-link-icon"><i data-feather="home"></i></div>
                        Data Report
                    </a>                     
   
                @elseif( auth()->user()->role  == 'admin' )
                    <div class="sidenav-menu-heading">Dashboard</div>
                    <a class="nav-link" href="{{ route('dashboardadmins') }}">
                        <div class="nav-link-icon"><i data-feather="home"></i></div>
                        Data Report
                    </a>

                    <div class="sidenav-menu-heading">Management</div>
                    <a class="nav-link" href="{{ route('suppliers') }}">
                        <div class="nav-link-icon"><i data-feather="user"></i></div>
                        Data Supplier
                    </a>

                    <a class="nav-link" href="#">
                        <div class="nav-link-icon"><i data-feather="file"></i></div>
                        Data Export List
                    </a>

                @elseif( auth()->user()->role  == 'executive')
                    <div class="sidenav-menu-heading">Dashboard</div>
                    <a class="nav-link" href="{{ route('dashboardexecutives') }}">
                        <div class="nav-link-icon"><i data-feather="home"></i></div>
                        Data Report
                    </a>
                    <a class="nav-link" href="{{ route('companydatas.edit', auth()->user()->company_id )}}">
                        <div class="nav-link-icon"><i data-feather="globe"></i></div>
                        Data Company
                    </a>
                    @if($service_id == 3)
                    <a class="nav-link" href="{{ route('employees') }}">
                        <div class="nav-link-icon"><i data-feather="user"></i></div>
                        Data Employee
                    </a>
                    @endif


                    <div class="sidenav-menu-heading">Master Data</div>

                    <div class="sidenav-menu-heading">Management</div>
                    <a class="nav-link" href="{{ route('suppliers') }}">
                        <div class="nav-link-icon"><i data-feather="user"></i></div>
                        Data Supplier
                    </a>

                    <a class="nav-link" href="#">
                        <div class="nav-link-icon"><i data-feather="file"></i></div>
                        Data Export List
                    </a>

                    <a class="nav-link" href="{{ route('medicinestocks') }}">
                        <div class="nav-link-icon"><i data-feather="box"></i></div>
                        Data Medicine Stock
                    </a>
                       
                @else
                    <div class="sidenav-menu-heading">Management</div>
                    <a class="nav-link" href="{{ route('superusers') }}">
                        <div class="nav-link-icon"><i data-feather="user"></i></div>
                        User Account
                    </a>

                    <a class="nav-link" href="{{ route('companyusers') }}">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        Company Account
                    </a>

                    <a class="nav-link" href="{{ route('userroles') }}">
                        <div class="nav-link-icon"><i data-feather="hexagon"></i></div>
                        User Role Data
                    </a>
                    <a class="nav-link" href="{{ route('emails') }}">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Email Company
                    </a>

                @endif                
            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ auth()->user()->name }}</div>
            </div>
        </div>
    </nav>
</div>
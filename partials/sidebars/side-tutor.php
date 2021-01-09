<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3"><span id="jd1">Cari</span><span id="jd2">Privat</span><span
                id="jd3">Yuk!</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if(strcmp($_SERVER['REQUEST_URI'],"/CariPrivatYuk-PWEB/tutor/dashboard/")==0)echo "active";?>">
        <a class="nav-link" href="/CariPrivatYuk-PWEB/tutor/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Privat -->
    <div class="sidebar-heading">
        Privat
    </div>

    <!-- Nav Item - Privat -->
    <li class="nav-item <?php if(strcmp($_SERVER['REQUEST_URI'],"/CariPrivatYuk-PWEB/tutor/dashboard/privat-request/")==0)echo "active";?>">
        <a class="nav-link" href="/CariPrivatYuk-PWEB/tutor/dashboard/privat-request">
            <i class="fas fa-fw fa-table"></i>
            <span>Permintaan Privat</span></a>
    </li>

    <!-- Nav Item - Privat -->
    <li class="nav-item <?php if(strcmp($_SERVER['REQUEST_URI'],"/CariPrivatYuk-PWEB/tutor/tutor/dashboard/my-privat/")==0||strcmp($_SERVER['REQUEST_URI'],"/CariPrivatYuk-PWEB/tutor/dashboard/my-students/")==0)echo "active";?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePrivat" aria-expanded="true"
            aria-controls="collapsePrivat">
            <i class="fas fa-fw fa-table"></i>
            <span>Privat Saya</span>
        </a>
        <div id="collapsePrivat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Privat</h6>
                <a class="collapse-item <?php if(strcmp($_SERVER['REQUEST_URI'],"/CariPrivatYuk-PWEB/tutor/tutor/dashboard/my-privat/")==0)echo "active";?>" href="/CariPrivatYuk-PWEB/tutor/dashboard/my-privat">Privat Saya</a>

                <h6 class="collapse-header">Murid</h6>
                <a class="collapse-item <?php if(strcmp($_SERVER['REQUEST_URI'],"/CariPrivatYuk-PWEB/tutor/dashboard/my-students/")==0)echo "active";?>" href="/CariPrivatYuk-PWEB/tutor/dashboard/my-students">Murid saya</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Privat -->
    <li class="nav-item <?php if(strcmp($_SERVER['REQUEST_URI'],"/CariPrivatYuk-PWEB/tutor/dashboard/create-privat/")==0)echo "active";?>">
        <a class="nav-link" href="/CariPrivatYuk-PWEB/tutor/dashboard/create-privat">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Buat Privat</span></a>
    </li>

    



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('admin-lte') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="{{ Request::is('home') ? 'active' : '' }}">
            <a href="{{ url('home') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ Request::is('divisi*') ? 'active' : '' }}">
            <a href="{{ url('/divisi') }}">
                <i class="fa fa-sitemap"></i> <span>Divisi</span>
            </a>
        </li>

        <li class="{{ Request::is('jeniscuti') ? 'active' : '' }}">
            <a href="{{ url('/jeniscuti') }}">
                <i class="fa fa-calendar-times-o"></i> <span>Jenis Cuti</span>
            </a>
        </li>

        <li class="{{ Request::is('karyawan') ? 'active' : '' }}">
            <a href="{{ url('/karyawan') }}">
                <i class="fa fa-users"></i> <span>Data Karyawan</span>
            </a>
        </li>

        <li class="{{ Request::is('pengajuancuti') ? 'active' : '' }}">
            <a href="{{ url('/pengajuancuti') }}">
                <i class="fa fa-clipboard"></i> <span>Pengajuan cuti</span>
            </a>
        </li>


        <li class="">
            <a href="{{ url('/laporan') }}">
                <i class="fa fa-file"></i> <span>Laporan</span>
            </a>
        </li>

    </ul>
</section>
<!-- /.sidebar -->

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>User Kocak</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>

      <li class="active">
        <a href="{{ url('home') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="">
          <a href="{{ url('/divisi') }}">
            <i class="fa fa-industry"></i> <span>Data Divisi</span>
          </a>
      </li>
      <li class="">
        <a href="{{ url('/karyawan') }}">
          <i class="fa fa-industry"></i> <span>Data Karyawan</span>
        </a>
    </li>

    <li class="">
      <a href="{{ url('/pengajuancuti') }}">
        <i class="fa fa-industry"></i> <span>Data pengajuan cuti</span>
      </a>
  </li>

  <li class="">
    <a href="{{ url('/jeniscuti') }}">
      <i class="fa fa-industry"></i> <span>Data jenis cuti</span>
    </a>
</li>

<li class="">
  <a href="{{ url('/laporan') }}">
    <i class="fa fa-industry"></i> <span>Data laporan</span>
  </a>
</li>

    </ul>
  </section>
  <!-- /.sidebar -->
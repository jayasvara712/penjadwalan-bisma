 <!-- Page Wrapper -->
 <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
             <img class="" src="<?= base_url() ?>/assets/img/logo.png" width="62px">
             <div class="sidebar-brand-text p-2">PENJADWALAN MATA PELAJARAN</div>
         </a>

         <!-- Nav Item - Dashboard -->
         <br>
         <li class="nav-item" id="m-dashboard">
             <a class="nav-link" href="/dashboard">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <!-- <hr class="sidebar-divider d-none d-md-block"> -->

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item" id="m-page" id="m-data">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-briefcase"></i>
                 <span>Data</span>
             </a>
             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href="/tahunajaran" id="m-tahunajaran">Tahun Ajaran</a>
                     <a class="collapse-item" href="/kelas" id="m-kelas">Kelas</a>
                     <a class="collapse-item" href="/hari" id="m-hari">Hari</a>
                     <a class="collapse-item" href="/jampel" id="m-jampel">Jam Pelajaran</a>
                     <a class="collapse-item" href="/mapel" id="m-mapel">Mata Pelajaran</a>
                     <a class="collapse-item" href="/guru" id="m-guru">Guru</a>
                 </div>
             </div>
         </li>

         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item" id="m-jadpel">
             <a class="nav-link" href="/jadpel">
                 <i class="fas fa-calendar"></i>
                 <span>Jadwal Pelajaran</span></a>
         </li>

         <!-- Divider -->
         <!-- <hr class="sidebar-divider d-none d-md-block"> -->

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item" id="m-kegiatan">
             <a class="nav-link" href="/kegiatan">
                 <i class="fas fa-newspaper"></i>
                 <span>Kegiatan</span></a>
         </li>

         <li class="nav-item" id="m-cetak">
             <a class="nav-link" href="/cetak">
                 <i class="fas fa-print"></i>
                 <span>Cetak Jadwal</span></a>
         </li>

         <!-- Divider -->
         <!-- <hr class="sidebar-divider d-none d-md-block"> -->

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>

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

                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
                         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= ucwords($session->username) ?></span>
                             <i class="fas fa-user mr-2"></i>
                         </a>
                         <!-- Dropdown - User Information -->
                         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                             <a class="dropdown-item" href="<?= site_url('setting/edit/' . $session->id_user) ?>">
                                 <i class="fas fa-wrench fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Change Password
                             </a>
                             <a href="#" class="dropdown-item btn-logout" data-id="<?= $session->id_user; ?>">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Logout
                             </a>
                         </div>
                     </li>

                 </ul>

             </nav>
             <!-- End of Topbar -->

             <!-- Modal Logout-->
             <form action="<?= site_url('auth/logout') ?>" method="post">
                 <?= csrf_field() ?>
                 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">

                                 <h4>Apakah Anda yakin ingin keluar ?</h4>

                             </div>
                             <div class="modal-footer">
                                 <input type="hidden" name="id" class="uniqueID">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                 <button type="submit" class="btn btn-success">Yes</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </form>
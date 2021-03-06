 <!-- Sidebar -->
 <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">

         </div>
         <div class="info">
             <a href="#" class="d-block"><?= session()->get('username'); ?></a>
         </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
             <li class="nav-item has-treeview">
                 <a href="#" class="nav-link active">
                     <i class="nav-icon fas fa-users"></i>
                     <p>
                         Management User
                         <i class="right fas fa-angle-left"></i>
                     </p>
                 </a>
                 <ul class="nav nav-treeview">
                     <li class="nav-item">
                         <a href="<?= base_url(); ?>/admin/vadduser" class="nav-link ">
                             <i class="far fa-circle nav-icon"></i>
                             <p>AddUser</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url(); ?>/admin/vuser" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>List User</p>
                         </a>
                     </li>

                 </ul>
             </li>
         </ul>
     </nav>



     <!-- Sidebar Menu -->
     <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
                     <i class="fa fa-sign-out"></i>
                     <p class="text" id="logout">logout</p>
                 </a>
             </li>


         </ul>
     </nav>
     <!-- /.sidebar-menu -->
 </div>
 <!-- /.sidebar -->
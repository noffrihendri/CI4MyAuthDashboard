<?php helper(['my']);  ?>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info" style="color: white;">
            <a href="#" class="d-block" style="color: white;"><?= user()->username ?></a>
            <a href="#" class="d-block" style="color: white;"><?= loggin_role()->name ?></a>

        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <?php

            $request = \Config\Services::request();

            $uri = $request->uri->getSegments();
           // dd($uri);

            foreach ($lstModule as $parent) {
                $menuopen = '';
                $activeparent = '';
                foreach ($parent['Child'] as $Child) {
                    //dump()
                   //var_dump(in_array($Child['PermaLink'],$uri));
                    if (in_array($Child['PermaLink'], $uri)) {
                        //var_dump($Child['PermaLink']);
                      //  dd(strpos($uri, $Child['PermaLink']));
                        $menuopen = 'menu-open';
                        $activeparent = 'active';
                    }
                }



            ?>

                <li class="nav-item has-treeview <?= $menuopen ?>">
                    <a href="#" class="nav-link <?= $activeparent ?>">
                        <i class="nav-icon "></i>
                        <p>
                            <?= $parent['ModuleName'] ?>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php
                        $selected = '';
                        foreach ($parent['Child'] as $Child) {

                            $selected = (in_array($Child['PermaLink'], $uri)) ? 'active' : '';

                        ?>

                            <li class="nav-item">
                                <a href="<?= base_url("/" . $Child['PermaLink']); ?>" class="nav-link <?= $selected ?>">
                                    <i class="far fa-circle nav-icon  "></i>
                                    <p><?= $Child['ModuleName'] ?></p>
                                </a>
                            </li>

                        <?php } ?>
                    </ul>
                </li>

            <?php } ?>

        </ul>
    </nav>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fa fa-sign-out"></i>
                    <p class="text" id="logout">logout</p>
                </a>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #212529;">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?= base_url('assets/bootstrap-agency/assets/img/navbar-logo.svg') ?>" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">

                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>">Services</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>">Team</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>">Contact</a></li>


                    <?php if (logged_in()) { ?>
                        <li class="nav-item"><a class="nav-link " href="<?= base_url('livecomment'); ?>">Live Streaming</a></li>
                   
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= user()->username ?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li class="nav-item "><a class="dropdown-item" href="<?= base_url('logout'); ?>">logout</a></li>
                            </div>
                        </div>

                    <?php } else { ?>

                        <li class="nav-item"><a class="nav-link " href="<?= base_url('login'); ?>">login</a></li>

                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
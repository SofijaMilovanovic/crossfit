<div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
        <div class="site-navbar bg-light">
            <div class="py-1">
                <div class="row align-items-center">
                    <div class="col-2">
                        <h2 class="mb-0 site-logo"><a href="index.php">District<strong> 11010</strong></a></h2>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">
                            <div class="container">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="wods.php">WODs</a></li>
                                    <?php
                                        if(empty($_SESSION['user'])){
                                            ?>
                                            <li><a href="login.php">Uloguj se</a></li>
                                            <li><a href="register.php">Registracija</a></li>
                                    <?php
                                        }else{
                                            ?>
                                            <li><a href="rezultati.php">Rezultati</a></li>
                                    <?php
                                            /** @var User $ulogovaniUser */
                                            $ulogovaniUser = $_SESSION['user'];
                                            if($ulogovaniUser->daLiJeUserAdministrator()){
                                                ?>
                                                <li><a href="adminStrane.php">Admin strane</a></li>
                                    <?php
                                            }
                                            ?>
                                            <li><a href="odjava.php">Odjavi se</a></li>
                                    <?php
                                        }
                                    ?>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
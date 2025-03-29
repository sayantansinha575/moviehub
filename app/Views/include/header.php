<header>
    <!--navbar section start   -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand nav-logo" href="<?= site_url('/') ?>"><img async src="<?= site_url('assest/sitelogo/') . config('siteConfig')->general['SITE_LOGO']; ?>" alt="site logo" width="32"></a>
            <span class="site-title">Movie Hub</span>
            <span><label class="burger" for="burger" class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <input type="checkbox" id="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </label></span>
            <div class="collapse navbar-collapse">
                <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Anime</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">HollyWood</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">K-Drama && More</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Tv Shows</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Netflix</a>
                        </li>
                        <li class="nav-item has-dropdown">
                            <a class="nav-link active" aria-current="page" href="#">Genre
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="sub-menu justify-content-center">
                                <li>
                                    <a href="#">Anime Subtitle</a>
                                </li>
                                <li>
                                    <a href="#">HollyWood Dubbed</a>
                                </li>
                                <li>
                                    <a href="#">K-Darams Dubbed</a>
                                </li>
                                <li>
                                    <a href="#">Netflix Hindi</a>
                                </li>
                            </ul>
                        </li>
                    </ul> -->

            </div>
            <!--responsive slide menu  statrt-->
            <div id="slide-menu" class="slide-menu">
                <!--searchbar start  -->
                <form class="d-flex">
                    <input class="form-control me-2 movie-search-mobile" type="search" style="width: 102%;" placeholder="Search" id="" aria-label="Search">
                    <ul class="list-group" id="mobile-search-result" style="position: absolute; margin-right: 7px; margin-top: 41px;">
                    </ul>
                </form>
                <!--searchbar end  -->
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Anime <iframe src="https://giphy.com/embed/FNqoTH4S3ZBheBVYlN" width="100" height="9" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">HollyWood</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">K-Drama && More</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tv Shows</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Netflix <iframe src="https://giphy.com/embed/FNqoTH4S3ZBheBVYlN" width="100" height="9" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Genere
                        </a>
                        <ul class="dropdown-menu" id="genere-submenu">
                            <li>
                                <a class="dropdown-item" href="single.html">Action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Drama</a>
                            </li>
                            <!-- Add more sub-menu items as needed -->
                        </ul>
                    </li>
                </ul>
            </div>
            <!--responsive slide menu  end-->
            <!--searchbar start  -->
            <form class="hide-search-bar">
                <input class="form-control me-2 movie-search" type="text" style="width: 102%;" placeholder="Search" id="search" aria-label="Search">
                <ul class="list-group" id="items-to-search" style="position: absolute; margin-right: 7px;">
                </ul>
            </form>
            <!--searchbar end  -->
        </div>
    </nav>
    <!-- navbar section section end  -->
</header>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="title" content="<?= config('SiteConfig')->meta['TITLE']; ?>">
    <meta name="description" content="<?= config('SiteConfig')->meta['DESCRIPTION']; ?>">
    <title><?= config('SiteConfig')->general['PAGE_TITLE'] ?></title>
    <link href="<?= site_url('css/') ?>style.css" rel="stylesheet" type="text/css" onload="if(media!='all')media='all'">
    <link href="<?= site_url('css/') ?>navslider.css" rel="stylesheet" type="text/css" onload="if(media!='all')media='all'">
    <link href="<?= site_url('css/') ?>seArchbar.css" rel="stylesheet" type="text/css" onload="if(media!='all')media='all'">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .img-thumbnail {
            height: 266px;
        }


        @media screen and (max-width: 900px) {
            .hide-search-bar {
                display: none !important;
            }
        }

        /* loader css start */
        @-webkit-keyframes honeycomb {

            0%,
            20%,
            80%,
            100% {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            30%,
            70% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes honeycomb {

            0%,
            20%,
            80%,
            100% {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            30%,
            70% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        .honeycomb {
            height: 24px;
            position: relative;
            width: 24px;
        }

        .honeycomb div {
            -webkit-animation: honeycomb 2.1s infinite backwards;
            animation: honeycomb 2.1s infinite backwards;
            background: #f3f3f3;
            height: 12px;
            margin-top: 6px;
            position: absolute;
            width: 24px;
        }

        .honeycomb div:after,
        .honeycomb div:before {
            content: '';
            border-left: 12px solid transparent;
            border-right: 12px solid transparent;
            position: absolute;
            left: 0;
            right: 0;
        }

        .honeycomb div:after {
            top: -6px;
            border-bottom: 6px solid #f3f3f3;
        }

        .honeycomb div:before {
            bottom: -6px;
            border-top: 6px solid #f3f3f3;
        }

        .honeycomb div:nth-child(1) {
            -webkit-animation-delay: 0s;
            animation-delay: 0s;
            left: -28px;
            top: 0;
        }

        .honeycomb div:nth-child(2) {
            -webkit-animation-delay: 0.1s;
            animation-delay: 0.1s;
            left: -14px;
            top: 22px;
        }

        .honeycomb div:nth-child(3) {
            -webkit-animation-delay: 0.2s;
            animation-delay: 0.2s;
            left: 14px;
            top: 22px;
        }

        .honeycomb div:nth-child(4) {
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
            left: 28px;
            top: 0;
        }

        .honeycomb div:nth-child(5) {
            -webkit-animation-delay: 0.4s;
            animation-delay: 0.4s;
            left: 14px;
            top: -22px;
        }

        .honeycomb div:nth-child(6) {
            -webkit-animation-delay: 0.5s;
            animation-delay: 0.5s;
            left: -14px;
            top: -22px;
        }

        .honeycomb div:nth-child(7) {
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
            left: 0;
            top: 0;
        }

        /* loader css end */
    </style>
</head>

<body>
    <div id="loader" style="display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    top: 10rem;">
        <div class="honeycomb">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <section id="page_section">
        <header>
            <!--navbar section start   -->
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand nav-logo" href="<?= site_url('/') ?>"><img async src="<?= site_url('assest/sitelogo/') ?>naruto_logo.png" alt="site logo" width="32"></a>
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
                            <iframe src="https://giphy.com/embed/FNqoTH4S3ZBheBVYlN" width="80" height="20" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
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
                            <iframe src="https://giphy.com/embed/FNqoTH4S3ZBheBVYlN" width="80" height="20" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                        </li>
                        <li class="nav-item has-dropdown">
                            <a class="nav-link active" aria-current="page" href="#">Genre
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="sub-menu justify-content-center">
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Partners</a>
                                </li>
                                <li>
                                    <a href="#">Success Stories</a>
                                </li>
                                <li>
                                    <a href="#">Testimonials</a>
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
        <main>
            <!-- main -->
            <?= $this->renderSection('main') ?>
            <!-- main -->
        </main>
        <!-- footer -->
        <?= view('include/footer.php') ?>
        <!-- footer -->
        <!-- js -->
        <?= view('include/js.php') ?>
        <!-- js -->
    </section>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Movie Hub || Movie site</title>
    <link href="<?= site_url('css/') ?>style.css" rel="stylesheet" type="text/css" onload="if(media!='all')media='all'">
    <link href="<?= site_url('css/') ?>navslider.css" rel="stylesheet" type="text/css" onload="if(media!='all')media='all'">
    <link href="<?= site_url('css/') ?>seArchbar.css" rel="stylesheet" type="text/css" onload="if(media!='all')media='all'">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= site_url('admin/simple-notify-master/dist/simple-notify.min.css') ?>">
    <style>
        body {
            color: white;
        }

        .img-thumbnail {
            height: 266px;
        }

        .dataTables_wrapper .dataTables_filter input {
            background-color: none;
        }

        label {
            color: #a6a6a6;
        }

        #movie-table_info {
            color: whitesmoke;
        }

        #ajax-movie-table_wrapper {
            margin-top: 12px;
        }

        .modal-body {
            color: black;
        }
    </style>
</head>

<body>
    <header>
        <!--navbar section start   -->
        <nav class="navbar navbar-expand-lg">
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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                    </ul>
                </div>
                <!--responsive slide menu  statrt-->
                <div id="slide-menu" class="slide-menu">
                    <!--searchbar start  -->
                    <!-- <form class="input-container d-flex">
                        <input type="text" name="s" value="<?= isset($_GET['s']) ? $_GET['s'] : ''; ?>" id="search" class="input" placeholder="Search something...">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" class="icon">
                            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                            <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                            <g id="SVGRepo_iconCarrier">
                                <rect fill="white" height="24" width="24"></rect>
                                <path fill="" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </g>
                        </svg>
                    </form> -->
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
                <!-- <form class="input-container">
                    <input type="text" name="s" value="<?= isset($_GET['s']) ? $_GET['s'] : ''; ?>" id="search" class="input" placeholder="Search something...">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" class="icon">
                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                        <g id="SVGRepo_iconCarrier">
                            <rect fill="white" height="24" width="24"></rect>
                            <path fill="" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </g>
                    </svg>
                </form> -->
                <!--searchbar end  -->
            </div>
        </nav>
        <!-- navbar section section end  -->
    </header>
    <main>
        <!-- main -->
        <?= $this->renderSection('content') ?>
        <!-- main -->
    </main>
    <!-- footer -->
    <?= view('admin/footer.php') ?>
    <!-- footer -->
    <!-- js -->
    <?= view('admin/js.php') ?>
    <!-- js -->
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= site_url('favicon/' . config('siteConfig')->general['FAVICON_LOGO_32X32']); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= site_url('favicon/' . config('siteConfig')->general['FAVICON_LOGO_16X16']); ?>">
    <meta name="title" content="<?= config('SiteConfig')->meta['TITLE']; ?>">
    <meta name="description" content="<?= config('SiteConfig')->meta['DESCRIPTION']; ?>">
    <title><?= config('SiteConfig')->general['PAGE_TITLE']; ?></title>
    <link href="<?= site_url('css/') ?>style.css" rel="stylesheet" type="text/css" onload="if(media!='all')media='all'">
    <link href="<?= site_url('css/') ?>navslider.css" rel="stylesheet" type="text/css" onload="if(media!='all')media='all'">
    <link href="<?= site_url('css/') ?>seArchbar.css" rel="stylesheet" type="text/css" onload="if(media!='all')media='all'">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .img-thumbnail {
            height: 266px;
        }

        .current {
            background-color: #dee2e6;
        }

        .disable {
            pointer-events: none;
        }

        @media screen and (max-width: 900px) {
            .hide-search-bar {
                display: none !important;
            }
        }

        .page-link {
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        .page-item {
            font-size: 10px;
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
        <?= view('include/header.php'); ?>
        <main>
            <!-- main -->
            <?= $this->renderSection('main') ?>
            <!-- main -->
            <!-- pagination -->
            <?= view('include/pagination.php') ?>
            <!-- pagination -->
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
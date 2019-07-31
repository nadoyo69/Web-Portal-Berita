<!-- =================================================================================================================================================================================
================================================================================== Halooo !!! ngapain bro? ===========================================================================
======================================================================================================================================================================================
==================================================================================== Mau lihat Script ya? ============================================================================
======================================================================================================================================================================================
================================================================================ wkwkwkkwkwkwkwkwkkwkwkwk ============================================================================
======================================================================================================================================================================================
============================================================================ BANYAK-BANYAKLAH BELAJAR BRO !!! ========================================================================
======================================================================================================================================================================================
===================================================================================================================================================================================-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $judul; ?></title>
    <link rel="shortcut icon" href="">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="FCK || Website Berita dan informasi Tentang Teknologi Jaman Sekarang">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link itemprop="thumbnailUrl" href="">

    <!-- Primary Meta Tags -->

    <meta name="title" content="FCK">
    <meta name="description" content="FCK || Website Berita dan informasi Tentang Teknologi Jaman Sekarang">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="fb:pages" content="780968858935414" />
    <meta property="og:url" content="">
    <meta property="og:title" content="FCK || Website Berita dan informasi Tentang Teknologi Jaman Sekarang">
    <meta property="og:description" content="FCK || Website Berita dan informasi Tentang Teknologi Jaman Sekarang">
    <meta property="og:image" content="">
    <meta property="og:image" itemprop="image" content="">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="300">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:url" content="">
    <meta name="twitter:site" content="" />
    <meta property="twitter:title" content="FCK || Website Berita dan informasi Tentang Teknologi Jaman Sekarang">
    <meta property="twitter:description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">
    <meta property="twitter:image" content="">
    <meta property="twitter:image" itemprop="image" content="">
    <meta property="twitter:image:width" content="640">
    <meta property="twitter:image:height" content="300">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="<?php echo base_url() ?>assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/responsive.css">
</head>

<body>
    <div class="super_container">
        <header class="header">
            <div class="header_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <div class="logo_container">
                                    <a href="<?= base_url() ?>">
                                        <div class="logo_text">LOGO</div>
                                    </a>
                                </div>
                                <nav class="main_nav_contaner ml-auto">
                                    <ul class="main_nav">
                                        <li><a href="<?php echo base_url() ?>">HOME</a></li>
                                        <li><a href="<?php echo base_url() ?>blog">BLOG</a></li>
                                    </ul>
                                    <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>
                                    <div class="hamburger menu_mm">
                                        <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header_search_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                                <form class="header_search_form" action="<?php echo base_url() ?>Home/cariberita" method="get">
                                    <input type="search" class="search_input" placeholder="Search" required="required" name="cari">
                                    <button type="submit" class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
            <div class="menu_close_container">
                <div class="menu_close">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="search">
                <form action="<?php echo base_url() ?>Home/cariberita" method="get" class="header_search_form menu_mm">
                    <input type="search" class="search_input menu_mm" placeholder="Search" required="required" name="cari">
                    <button type="submit" class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                        <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <nav class="menu_nav">
                <ul class="menu_mm">
                    <li class="menu_mm"><a href="<?php echo base_url() ?>">HOME</a></li>
                    <li class="menu_mm"><a href="<?php echo base_url() ?>blog">BLOG</a></li>
                </ul>
            </nav>
        </div>
    </div>
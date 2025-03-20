<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

    <!-- Google Font -->
    <link href="<?= base_url() ?>assets2/https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>assets2/https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/style.css" type="text/css">
</head>



<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./index.html">Homepage</a></li>
                                        <li>
                                            <a href="#">Genre <span class="arrow_carrot-down"></span></a>
                                            <ul class="dropdown">
                                                <?php foreach ($genre as $g): ?>
                                                    <li>
                                                        <a href="<?= base_url('list_film?genre=' . $g->id_genre) ?>">
                                                            <?= htmlspecialchars($g->nama_genre) ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Negara <span class="arrow_carrot-down"></span></a>
                                            <ul class="dropdown">
                                                <?php foreach ($negara as $n): ?>
                                                    <li>
                                                        <a href="<?= base_url('film_list?negara=' . $n->id_negara) ?>">
                                                            <?= htmlspecialchars($n->nama_negara) ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>


                               
                                <!-- <li><a href="">Profile</span></a> -->

                                <!-- <li><a href="./blog.html">Our Blog</a></li> -->
                                <!-- <li><a href="">Contact</a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">

                        <a href="#" class="search-switch"><span class="icon_search"></span></a>


                        <?php if ($this->session->userdata('id_user')): ?>
                            <!-- Logout dengan konfirmasi -->
                            <a href="#" onclick="confirmLogout()">LOGOUT</a>
                        <?php else: ?>
                            <a href="<?= base_url('auth') ?>">LOGIN</a>
                        <?php endif; ?>
                    </div>
                    <script>
                        function confirmLogout() {
                            let confirmAction = confirm("Apakah Anda yakin ingin logout?");
                            if (confirmAction) {
                                window.location.href = "<?= base_url('auth/logout') ?>";
                            }
                        }
                    </script>

                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
<?php
include "./api/base.php"
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mySQL</title>
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- css -->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/main.css">

    <!-- jq -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <nav>
        <div class="sidebar-top">
            <span class="shrink-btn">
                <i class='bx bx-chevron-left'></i>
            </span>
            <i class='bx bxs-customize logo'></i>
            <h3 class="hide">mySQL</h3>
        </div>
        <div class="sidebar-links">
            <ul>
                <div class="active-tab"></div>
                <li class="tooltip-element" data-tooltip="0">
                    <a href="?do=news" data-active="0" class="active">
                        <div class="icon">
                            <i class='bx bx-news'></i>
                            <i class='bx bxs-news'></i>
                        </div>
                        <span class="link hide">最新消息管理</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="?do=que" data-active="1">
                        <div class="icon">
                            <i class='bx bx-comment-dots'></i>
                            <i class='bx bxs-comment-dots'></i>
                        </div>
                        <span class="link hide">問巻管理</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="2">
                    <a href="?do=user" data-active="2">
                        <div class="icon">
                            <i class='bx bx-user-plus'></i>
                            <i class='bx bxs-user-plus'></i>
                        </div>
                        <span class="link hide">帳號管理</span>
                    </a>
                </li>
                <div class="tooltip">
                    <span class="show">最新消息管理</span>
                    <span>問巻管理</span>
                    <span>帳號管理</span>
                </div>
            </ul>

            <h4 class="hide">Shortcuts</h4>
            <ul>
                <li class="tooltip-element" data-tooltip="0">
                    <a href="#" data-active="3">
                        <div class="icon">
                            <i class='bx bx-cog'></i>
                            <i class='bx bxs-cog'></i>
                        </div>
                        <span class="link hide">Settings</span>
                    </a>
                </li>
                <div class="tooltip">
                    <span class="show">Settings</span>
                </div>
            </ul>
        </div>
        <div class="sidebar-footer">
            <i class="bx bx-calendar cal tooltip-element" data-tooltip="0">
                <span class="hide">
                    <?= date("Y-m-d (D)"); ?>
                </span>
            </i>
            <?php
            if (isset($_SESSION['login'])) {
                # code...
                //如果是管理者
                // echo $_SESSION['login'];
            
                if ($_SESSION['login'] == 'admin') {
                    # code...
            
                    ?>
                    <a href="#" class="account tooltip-element" data-tooltip="1">
                        <i class='bx bx-user'></i>
                    </a>
                    <div class="admin-user tooltip-element" data-tooltip="2">
                        <div class="admin-profile hide">
                            <img src="./img/me.jpg" alt="">
                            <div class="admin-info">
                                <h3>
                                    <?= $_SESSION['login']; ?>
                                </h3>
                                <?php
                                $current_page = basename($_SERVER['PHP_SELF']);
                                if ($current_page == "index.php") {
                                    echo '<a href="./back.php?do=news"><h5>admin</h5></a>';
                                } else {
                                    echo '<a href="./index.php?do=news"><h5>回首頁</h5></a>';
                                }
                                ?>
                            </div>
                        </div>
                        <a href="./api/logout.php" class="log-out">
                            <i class='bx bx-log-out'></i>
                        </a>
                    </div>
                    <?php
                } else {
                    ?>
                    <a href="#" class="account tooltip-element" data-tooltip="1">
                        <i class='bx bx-user'></i>
                    </a>
                    <div class="admin-user tooltip-element" data-tooltip="2">
                        <div class="admin-profile hide">
                            <img src="./img/me.jpg" alt="">
                            <div class="admin-info">
                                <h3>
                                    <?= $_SESSION['login']; ?>
                                </h3>
                            </div>
                        </div>
                        <a href="./api/logout.php" class="log-out">
                            <i class='bx bx-log-out'></i>
                        </a>
                    </div>
                    <?php
                }
            } else {
                ?>
                <a href="#" class="account tooltip-element" data-tooltip="1">
                    <i class='bx bx-user'></i>
                </a>
                <div class="admin-user tooltip-element" data-tooltip="2">
                    <a href="?do=login" class="log-out"><i class='bx bx-log-in'></i></a>
                </div>
                <?php
            }
            ;
            ?>
            <div class="tooltip">
                <span class="show">
                    <?= date("Y-m-d (D)"); ?>
                </span>
                <span><?= $_SESSION['login']; ?></span>
                <span>exit</span>
            </div>
        </div>
    </nav>
    <main>
        <div class="">
            <?php
            $do = $_GET['do'] ?? 'news';

            $file = "./back/" . $do . ".php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "./back/news.php";
            }

            ?>
        </div>
    </main>

    <script src="./js/nav.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>
<?php
session_start();
if ($_SESSION['is_login']){
    $login =  $_SESSION['login'];
}else{
    $login =  'guest';
}
?>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li role="presentation" class="active"><a href="index.php?page=1">Home</a></li>
                <li role="presentation"><a href="index.php?page=2">Upload</a></li>
                <li role="presentation"><a href="index.php?page=3">Gallery</a></li>
                <li role="presentation"><a href="index.php?page=4">Registration</a></li>
                <?php
                if (!$_SESSION['is_login'] || $_GET['logout'] == 1){
                    if (isset($_SESSION['is_login'])) {
                        session_destroy();
                    }
                    echo "<li role=\"presentation\"><a href=\"index.php?page=5\">Log in</a></li>";
                } else{

                    echo "<li role=\"presentation\"><a href='index.php?page=5&logout=1'>Log out</a></li>";
                }
                ?>
            </ul>
            <form class="navbar-form navbar-left">
                <label for="name" style="color: blue;"><?='Welcome, '.$login?></label>
                <button type="submit" class="btn btn-default">Выйти</button>
            </form>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--<ul class="nav nav-pills">-->
<!--    <li role="presentation" class="active"><a href="index.php?page=1">Home</a></li>-->
<!--    <li role="presentation"><a href="index.php?page=2">Upload</a></li>-->
<!--    <li role="presentation"><a href="index.php?page=3">Gallery</a></li>-->
<!--    <li role="presentation"><a href="index.php?page=4">Registration</a></li>-->
<!--    --><?php
//        if (!$_SESSION['is_login'] || $_GET['logout'] == 1){
//            if (isset($_SESSION['is_login'])) {
//                session_destroy();
//            }
//            echo "<li role=\"presentation\"><a href=\"index.php?page=5\">Log in</a></li>";
//        } else{
//            $login = $_SESSION['login'];
//            echo "Welcome, $login. <li role=\"presentation\"><a href='index.php?page=5&logout=1'>Log out</a></li>";
//        }
//    ?>
<!--</ul>-->
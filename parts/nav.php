<?php
include_once "functions.php";

$menu = getMenuData("header");
   getCSS();

?>
<header  class="container main-header">
    <div  class="logo-holder">
        <a href="<?php echo $menu['home']; ?>">
            <img alt="img" src="img/logo.jpg" height="65">
        </a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu container">
            <?php printMenu($menu); ?>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>

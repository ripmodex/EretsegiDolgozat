<?php

global $isLoggedIn;
global $userName;
global $isAdmin;

$path = dirname(__DIR__) . '/Server/profile.php';

if (file_exists($path)) {
    require $path;
} else {
    die("A server error occured. Please try again later");
}
?>

<nav id="menu">
    <img src="../Kepek/icon.jpg" alt="logo" id="menu-logo">
    <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
    <ul>
        <li><a href="../Main/main.php" class="<?= ($currentPage == 'main.php') ? 'active' : '' ?>">Home</a></li>
        <li><a href="#" onclick="openMap()">Map</a></li>
        <li><a href="../Charms/charms.php" class="<?= ($currentPage == 'charms.php') ? 'active' : '' ?>">Charms</a></li>
        <li><a href="../Screenshots/screenshots.php" class="<?= ($currentPage == 'screenshots.php') ? 'active' : '' ?>">Screenshots</a></li>
        <?php if($isAdmin): ?>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropBtn
                <?= ($currentPage == 'addCharm.php' || $currentPage == 'addScreenshot.php') ? 'active' : '' ?>">Admin Panel</a>
                <div class="dropdownContent">
                    <a href="../Charms/addCharm.php">Charms</a>
                    <a href="../Screenshots/addScreenshot.php">Screenshots</a>
                </div>
            </li>
        <?php endif; ?>
    </ul>
    <?php if($currentPage === 'main.php'): ?>
        <div class="searchBox">
            <input type="search" placeholder="Search.." name="search" data-search-area autocomplete="off">
            <div id="searchResults" class="searchResultDropdown"></div>
        </div>
    <?php endif; ?>
    <div class="profile">
        <?php if($isLoggedIn):?>
            <button onclick="window.open('../Server/index.php', '_self')"><?= htmlspecialchars($userName) ?></button>
        <?php else: ?>
            <button onclick="window.open('../Login/login.php','_self')">Log In</button>
            <button onclick="window.open('../Signup/signup.php', '_self')">Sign Up</button>
        <?php endif; ?>
    </div>
</nav>

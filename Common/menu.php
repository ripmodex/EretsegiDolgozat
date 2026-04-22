<?php

global $isLoggedIn;
global $userName;
global $isAdmin;

$path = dirname(__DIR__) . '/Server/profile.php';

if (file_exists($path)) {
    require $path;
} else {
    echo "Current Directory: " . __DIR__ . "<br>";
    die("Fatal Error: Could not find the file at: " . $path);
}
?>

<nav id="menu">
    <img src="../Kepek/icon.jpg" alt="logo" id="menu-logo">
    <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
    <ul>
        <li><a onclick="window.open('../Main/main.php', '_self')"
               class="<?= ($currentPage == 'main.php') ? 'active' : '' ?>">Home</a></li>
        <li><a href="javascript:void(0)" onclick="openMap()">Map</a></li>
        <li><a onclick="window.open('../Charms/charms.php', '_self')"
                class="<?= ($currentPage == 'charms.php') ? 'active' : '' ?>">Charms</a></li>
        <li><a onclick="window.open('../Screenshots/screenshots.php', '_self')"
                class="<?= ($currentPage == 'screenshots.php') ? 'active' : '' ?>">Screenshots</a></li>
        <?php if($isAdmin): ?>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropBtn
                <?= ($currentPage == 'addCharm.php' || $currentPage == 'addScreenshot.php') ? 'active' : '' ?>">Admin Panel</a>
                <div class="dropdownContent">
                    <a onclick="window.open('../Charms/addCharm.php', '_self')">Charms</a>
                    <a onclick="window.open('../Screenshots/addScreenshot.php', '_self')">Screenshots</a>
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
            <button onclick="window.open('../Server/index.php', '_self')"><?= htmlspecialchars($userName)?></button>
        <?php else: ?>
            <button onclick="window.open('../Login/login.php','_self')">Log In</button>
            <button onclick="window.open('../Signup/signup.php', '_self')">Sign Up</button>
        <?php endif; ?>
    </div>
</nav>

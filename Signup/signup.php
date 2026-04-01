<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="icon" href="../Kepek/icon.jpg" type="image/jpg">
    <link rel="stylesheet" href="../Common/menuStyle.css">
    <link rel="stylesheet" href="../Common/mapStyle.css">
    <link rel="stylesheet" href="signupStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="signupScript.js" defer></script>
</head>
<body>
    <?php include '../Common/menu.php'; ?>
    <?php include '../Common/map.php'; ?>
    <div id="bg"></div>
<!--    <nav id="menu">-->
<!--        <img src="../Kepek/icon.jpg" alt="logo" id="menu-logo">-->
<!--        <ul>-->
<!--            <li><a>Charms</a></li>-->
<!--            <li><a>Screenshots</a></li>-->
<!--            <li><a>Negyedik</a></li>-->
<!--        </ul>-->
<!--        <div class="searchBox">-->
<!--            <input type="text" placeholder="Search.." name="search">-->
<!--        </div>-->
<!--        <button onclick="window.open('../Main/main.php','_self')">Home page</button>-->
<!--    </nav>-->
    <div id="content">
        <h1>Sign Up</h1>
        <h3>If you want to make an account, here is the right place for it!</h3>
        <form action="processSignUp.php" method="post" id="signup" novalidate>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username...">
                <span id="usernameError" class="errorText"></span>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="E-mail...">
                <span id="emailError" class="errorText"></span>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password...">
                <span id="passwordError" class="errorText"></span>
            </div>
            <div>
                <label for="passwordAgain">Password again: </label>
                <input type="password" id="passwordAgain" name="passwordAgain" placeholder="Password again...">
                <span id="passwordAgainError" class="errorText"></span>
            </div>
            <button>Sign Up</button>
        </form>
    </div>
    <script src="../Common/mapScript.js"></script>
</body>
</html>
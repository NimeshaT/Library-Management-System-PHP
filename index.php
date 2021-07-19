<!DOCTYPE html>
<html>
    <head>
        <?php include_once("includes/head.php")?>
    </head>
    <body>
            <?php include_once("includes/header.php")?>

        <section id="hero" class="d-flex align-items-center">
            <div class="container d-flex flex-column align-items-center">
                <h1><?=$L["welcome"]?></h1>
                <h3><?=$L["open"]?></h3>
                <h3><?=$L["close"]?></h3>
                <h3><b><?=$L["holiday"]?></b></h3>
                <a href="login.php" class="btn-about"><?=$L["login"]?></a>
                <a href="register.php" class="btn-about"><?=$L["REG"]?></a>
            </div>
        </section>

        <?php include_once("includes/footer.php")?>
        
    </body>
</html>
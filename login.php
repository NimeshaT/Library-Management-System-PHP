<!DOCTYPE html>
<html>
    <head>
        <?php include_once("includes/head.php")?>
    </head>
    <body>
        <?php include_once("includes/header.php")?>

        <div class="bg-img">
                <form action="login_action.php" method="post" class="container" id="box">
                    <h1 style="color:white;font-family:'Pacifico', cursive;font-size:35px"><?=$L["loginhead"] ?></h1><br/>

                    <?php
                        if(isset($_GET["msg"])){
                                ?>
                                <div class="alert alert-danger">
                                    <?=$_GET["msg"]?>
                                </div>
                                <?php
                        }
                    ?>

                    <label ><b><?=$L["email"] ?></b></label>
                    <input type="text" name="email" style="width:300px;" ><br/><br/>

                    <label ><b><?=$L["password"] ?></b></label>
                    <input type="password" name="password" style="width:300px;" ><br/><br/><br/>

                    <input type="reset" value="<?=$L["reset"]?>" class="btn btn-danger">
                    <input type="submit" value="<?=$L["login"]?>" class="btn btn-info">
                </form>
        </div>

        <?php include_once("includes/footer.php")?>
    </body>
</html>
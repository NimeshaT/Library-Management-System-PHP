<!DOCTYPE html>
<html>
    <head>
        <?php include_once("includes/head.php")?>
    </head>
    <body>
        <?php include_once("includes/header.php")?>
        <div class="bg-img">
                <form action="register_action.php" method="post" class="container" id="box2" enctype="multipart/form-data">
                    <h1 style="color:white;font-family:'Pacifico', cursive"><?=$L["registerhead"]?></h1>

                    <?php
                        if(isset($_GET["msg"])){
                                ?>
                                <div class="alert alert-danger">
                                    <?=$_GET["msg"]?>
                                </div>
                                <?php
                        }
                    ?>

                    <label ><b><?=$L["username"] ?></b></label><br/>
                    <input type="text"  name="name" style="width:350px;" required><br/>

                    <label><?=$L["photo"]?></label>
                    <input type="file" name="photo" class="form-control" style="width:350px;" required>

                    <label ><b><?=$L["address"] ?></b></label><br/>
                    <input type="text"  name="address" style="width:350px;" required><br/>

                    <label ><b><?=$L["email"] ?></b></label><br/>
                    <input type="text"  name="email" style="width:350px;" required><br/>

                    <label ><b><?=$L["mobile"] ?></b></label><br/>
                    <input type="text"  name="mobile" style="width:350px;"  required><br/>

                    <label ><b><?=$L["password"] ?></b></label><br/>
                    <input type="password"  name="password" style="width:350px;" required><br/>

                    <label ><b><?=$L["confirm"] ?></b></label><br/>
                    <input type="password" name="confirm" style="width:350px;"  required><br/><br/>

                    <input type="reset" value="<?=$L["reset"]?>" class="btn btn-danger">
                    <input type="submit" value="<?=$L["register"] ?>" class="btn btn-info">
                </form>
        </div>

        <?php include_once("includes/footer.php")?>
    </body>
</html>
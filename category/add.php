<!DOCTYPE html>
<html>
    <head>
        <?php include_once("../includes/head.php")?>
        <?php include_once("../includes/admin_only.php")?>
    </head>
    <body>
        <?php include_once("../includes/header.php")?>

        <div class="row container-fluid">
            <div class="col-md-3 container-fluid">
                <img src="<?=PATH ?>images/bar.png" class="img img-thumbnail">
            </div>
            <div class="col-md-9 container-fluid">
                <br/>
                <h1 style="color:black;font-size:20px;margin-bottom:0"><?=$L["addcategory"]?><a href="<?=PATH ?>dashboard.php" class="btn btn-info float-right" style=color:black><?=$L["dashboard"]?></a></h1>
                <hr/>
                <?php
                        if(isset($_GET["msg"])){
                                ?>
                                <div class="alert alert-danger">
                                    <?=$_GET["msg"]?>
                                </div>
                                <?php
                        }
                    ?>
                <form action="add_action.php" method="post" class="jumbotron">
                    <label><?=$L["username"]?></label>
                    <input type="text" name="name" class="form-control"><br/>
    
                    <input type="reset" value="<?=$L["reset"]?>" class="btn btn-danger"/>
                    <input type="submit" value="<?=$L["save"]?>" class="btn  btn-info"/>
                </form>
            </div>
        </div>

        <?php include_once("../includes/footer.php")?>
    </body>
    
</html>
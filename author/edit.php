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
                <h1 style="color:black;font-size:20px;margin-bottom:0"><?=$L["editauthor"]?><a href="<?=PATH ?>dashboard.php" class="btn btn-info float-right" style=color:black><?=$L["dashboard"]?></a></h1>
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

                    <?php
                        include_once("../includes/db.php");
                    //     if(isset($_GET['id'])){
                    //         $id = $_GET['id']; 
                    //    }else{
                    //         $id = "Name not set in GET Method";
                    //    }
                        $oid = isset($_GET['id']) ? $_GET['id'] : '';
                        $sql="SELECT * FROM author WHERE oid='$oid' ";
                        $result = mysqli_query($conn,$sql);
                        if($row = mysqli_fetch_array($result)){

                    ?>
                <form action="edit_action.php" method="post" class="jumbotron">
                    <label><?=$L["id"]?></label>
                    <input type="text" name="id" class="form-control" value="<?=$row["oid"]?>" readonly/><br/>

                    <label><?=$L["username"]?></label>
                    <input type="text" name="name" class="form-control" value="<?=$row["name"]?>"/><br/>
    
                    <input type="reset" value="<?=$L["reset"]?>" class=" btn btn-danger"/>
                    <input type="submit" value="<?=$L["update"]?>" class=" btn btn-info"/>
                </form>

                <?php
                        }
                ?>
            </div>
        </div>

        <?php include_once("../includes/footer.php")?>
    </body>
</html>
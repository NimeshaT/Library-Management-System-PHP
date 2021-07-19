<!DOCTYPE html>
<html>
    <head>
        <?php include_once("../includes/head.php")?>
        <?php include_once("../includes/admin_only.php")?>
    </head>
    <body>
        <?php include_once("../includes/header.php")?>
        <div class="bg-img">

        <?php
                        include_once("../includes/db.php");
                    //     if(isset($_GET['id'])){
                    //         $id = $_GET['id']; 
                    //    }else{
                    //         $id = "Name not set in GET Method";
                    //    }
                        $uid = isset($_GET['id']) ? $_GET['id'] : '';
                        $sql="SELECT * FROM user WHERE uid='$uid' ";
                        $result = mysqli_query($conn,$sql);
                        if($row = mysqli_fetch_array($result)){

                    ?>
                <form action="edit_action.php" method="post" class="container" id="box2" enctype="multipart/form-data">
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
                    <label><?=$L["id"]?></label>
                    <input type="text" name="id" class="form-control" value="<?=$row["uid"]?>" readonly>

                    <label ><b><?=$L["username"] ?></b></label><br/>
                    <input type="text"  name="name" style="width:350px;" value="<?=$row["name"]?>" required><br/>

                    <label><?=$L["photo"]?></label>
                    <input type="file" name="photo" class="form-control" style="width:350px;" value="<?=$row["photo"]?>" required>

                    <label ><b><?=$L["address"] ?></b></label><br/>
                    <input type="text"  name="address" style="width:350px;" value="<?=$row["address"]?>" required><br/>

                    <label ><b><?=$L["email"] ?></b></label><br/>
                    <input type="text"  name="email" style="width:350px;" value="<?=$row["email"]?>" required><br/>

                    <label ><b><?=$L["mobile"] ?></b></label><br/>
                    <input type="text"  name="mobile" style="width:350px;"  value="<?=$row["mobile"]?>" required><br/>

                    <label ><b><?=$L["password"] ?></b></label><br/>
                    <input type="password"  name="password" style="width:350px;" value="<?=$row["password"]?>" required><br/>

                    <label ><b><?=$L["confirm"] ?></b></label><br/>
                    <input type="password" name="confirm" style="width:350px;"  required><br/><br/>

                    <input type="reset" value="<?=$L["reset"]?>" class="btn btn-danger">
                    <input type="submit" value="<?=$L["register"] ?>" class="btn btn-info">
                </form>
                <?php
                        }
                ?>
        </div>

        <?php include_once("../includes/footer.php")?>
    </body>
</html>
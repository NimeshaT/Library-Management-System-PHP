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
                <h1 style="color:#003399;font-family:'Pacifico', cursive;"><?=$L["addbooks"]?></h1>
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
                <form action="add_action.php" method="post" class="jumbotron" enctype="multipart/form-data">
                    <label><?=$L["bookname"]?></label>
                    <input type="text" name="bookname" class="form-control">

                    <label><?=$L["author"]?> </label>
                    <!-- <input type="text" name="authorname" class="form-control"> -->
                    <select name="authorname" class="form-control">
                        <?php
                            include_once("../includes/db.php");
                            $sql="SELECT * FROM author";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)){
                        ?>
                        <option value="<?=$row["oid"]?>"><?=$row["name"]?></option>
                        <!-- <option value="2">Kudaligama</option>
                        <option value="3">Mahasen</option> -->

                        <?php
                            }
                        ?>
                    </select>

                    <label> <?=$L["category"]?></label>
                    <!-- <input type="text" name="categoryname" class="form-control"> -->
                    <select name="category" class="form-control">
                    <?php
                            include_once("../includes/db.php");
                            $sql="SELECT * FROM category";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)){
                        ?>
                        <option value="<?=$row["cid"]?>"><?=$row["name"]?></option>
                        <!-- <option value="2">Science</option>
                        <option value="3">Songs</option> -->
                        <?php
                            }
                        ?>
                    </select>

                    <label><?=$L["photo"]?></label>
                    <input type="file" name="photo" class="form-control">
    
                    <input type="reset" value="<?=$L["reset"]?>" class="btn btn-danger"/>
                    <input type="submit" value="<?=$L["save"]?>" class="btn btn-success"/>
                </form>
            </div>
        </div>

        <?php include_once("../includes/footer.php")?>
    </body>
</html>
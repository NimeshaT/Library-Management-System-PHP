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
                <h1 style="color:black;font-size:20px;margin-bottom:0"><?=$L["addlending"]?><a href="<?=PATH ?>dashboard.php" class="btn btn-info float-right"><?=$L["dashboard"]?></a></h1>
                <hr/>
                <form action="add_action.php" method="post" class="jumbotron" enctype="multipart/form-data">
                    <label><?=$L["name"]?></label>
                    <!-- <input type="text" name="uname" class="form-control"> -->
                    <select name="uname" class="form-control">
                        <?php
                            include_once("../includes/db.php");
                            $sql="SELECT * FROM user";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)){
                        ?>
                        <option value="<?=$row["uid"]?>"><?=$row["name"]?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <label><?=$L["bookname"]?></label>
                    <!-- <input type="text" name="bname" class="form-control"> -->
                    <select name="bname" class="form-control">
                    <?php
                            include_once("../includes/db.php");
                            $sql="SELECT * FROM book";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)){
                        ?>
                        <option value="<?=$row["bid"]?>"><?=$row["name"]?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <label><?=$L["duedate"]?></label>
                    <input type="date" name="dDate" class="form-control">

                    <label><?=$L["returndate"]?></label>
                    <input type="date" name="rDate" class="form-control"><br/>
    
                    <input type="reset" value="<?=$L["reset"]?>" class=" btn btn-danger"/>
                    <input type="submit" value="<?=$L["save"]?>" class=" btn btn-info" />
                    
                    
                </form>
                <?php
                    if(isset($_POST['submit'])){
                            echo 'Hello';
                    }
                    ?>
            </div>
        </div>

        <?php include_once("../includes/footer.php")?>
    </body>
</html>
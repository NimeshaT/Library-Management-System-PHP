<!DOCTYPE html>
<html>
    <head>
        <?php include_once("../includes/head.php")?>
    </head>
    <body>
        <?php include_once("../includes/header.php")?>

        <div class="row container-fluid">
            <div class="col-md-3 container-fluid">
                <img src="<?=PATH ?>images/bar.png" class="img img-thumbnail">
            </div>
            <div class="col-md-9 container-fluid">
                <br/>
                <h1 style="color:black;font-size:20px;margin-bottom:0"><?=$L["viewbook"]?><a href="<?=PATH ?>dashboard.php" class="btn btn-info float-right"><?=$L["dashboard"]?></a></h1>
                <hr/>
                <?php
                    include_once("../includes/db.php");
                    //     if(isset($_GET['id'])){
                    //         $id = $_GET['id']; 
                    //    }else{
                    //         $id = "Name not set in GET Method";
                    //    }
                        $bid = isset($_GET['id']) ? $_GET['id'] : '';
                        $sql="SELECT * FROM book WHERE bid='$bid'  ";
                        $result = mysqli_query($conn,$sql);

                        $sql2="UPDATE book SET view_count=view_count+1 WHERE book.bid='$bid'";
                        mysqli_query($conn,$sql2);

                        // $sql3="UPDATE book SET availability=availability-1 WHERE book.bid='$bid'";
                        // mysqli_query($conn,$sql3);

                        if($row = mysqli_fetch_array($result)){
                ?>
                <div class="jumbotron" style=padding:12px>
                    <img src="<?=PATH?><?=$row["photo"]?>" class="img img-thumbnail" style="width:200px;height:200px"/><hr/>

                    <label><?=$L["id"]?></label><br/>
                    <label><?=$row["bid"]?></label><hr/>

                    <label><?=$L["bookname"]?></label><br/>
                    <label><?=$row["name"]?></label><hr/>

                    <label><?=$L["author"]?> </label><br/>
                    <label>
                    <?=$row["oid"]?>
                    </label><hr/>

                    <label> <?=$L["category"]?></label><br/>
                    <label><?=$row["cid"]?></label><hr/>
    
                    <input type="reset" value="<?=$L["reset"]?>" class="btn btn-danger"/>
                    <input type="submit" value="<?=$L["update"]?>" class=" btn btn-info"/>
                </div>

                <?php
                        }
                ?>
            </div>
        </div>

        <?php include_once("../includes/footer.php")?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once("../includes/head.php")?>
        <?php include_once("../includes/member_only.php")?>
        
    </head>
    <body>
        <?php include_once("../includes/header.php")?>

        <div class="row container-fluid">
            <div class="col-md-3 container-fluid">
            <?php include_once("../includes/sideBar.php")?>
            </div>
            <div class="col-md-9 container-fluid">
                <br/>
                <h1 style="color:black;font-size:20px;margin-bottom:0"> <?=$L["listlending"]?><a href="add.php" class="btn btn-info float-right"><?=$L["add"]?></a></h1>
                <hr/>
               
                <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%"  >
                    <tr>
                        <th><?=$L["id"]?></th>
                        <th><?=$L["bookname"]?></th>
                        <th><?=$L["name"]?></th>
                        <th><?=$L["duedate"]?></th>
                        <th><?=$L["returndate"]?></th>
                        <th><?=$L["options"]?></th>
                    </tr>

                    <?php
                        include_once("../includes/db.php");
                        $mid = isset($_SESSION["ID"]) ? $_SESSION["ID"] : '';
                        $sql= "SELECT lending.*,book.name as bid,user.name as uid FROM lending INNER JOIN book ON book.bid=lending.bid ".
                            "INNER JOIN user ON user.uid=lending.uid AND lending.uid='$mid'";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result)){
                    ?>

                    <tr>
                        <td><?=$row["lid"]?></td>
                        <td><?=$row["bid"]?></td>
                        <td><?=$row["uid"]?></td>
                        <td><?=$row["dueDate"]?></td>
                        <td><?=$row["returnDate"]?></td>
                        <td>
                            <!-- <a href="view.php?id=1" class="btn btn-info"><?=$L["view"]?></a> -->
                            <a href="edit.php?id=<?=$row["lid"]?>" class="btn btn-warning"><?=$L["edit"]?></a>
                            <a href="delete_action.php?id=<?=$row["lid"]?>" class="btn btn-danger"><?=$L["delete"]?></a>
                        </td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
              
            </div>
        </div>

        <?php include_once("../includes/footer.php")?>
    </body>
</html>
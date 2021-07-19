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
            <?php include_once("../includes/sideBar.php")?>
            </div>
            <div class="col-md-9 container-fluid">
                <br/>
                <h1 style="color:black;font-size:20px;margin-bottom:0"> <?=$L["listauthor"]?><a href="add.php" class="btn btn-info float-right"><?=$L["add"]?></a></h1> 
                <hr/>
                <div class="jumbotron ">
                <table class="table" >
                    <tr>
                        <th><?=$L["id"]?></th>
                        <th><?=$L["username"]?></th>
                        <th><?=$L["options"]?></th>
                    </tr>

                    <?php
                        include_once("../includes/db.php");
                        $sql="SELECT * FROM author";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result)){
                    ?>

                    <tr>
                        <td><?=$row["oid"]?></td>
                        <td><?=$row["name"]?></td>
                        <td>
                            <a href="edit.php?id=<?=$row["oid"]?>" class="btn btn-warning"><?=$L["edit"]?></a>
                            <a href="delete_action.php?id=<?=$row["oid"]?>" class="btn btn-danger"><?=$L["delete"]?></a>
                        </td>
                    </tr>

                    <?php
                            }
                    ?>
                </table>
                </div>
            </div>
        </div>

        <?php include_once("../includes/footer.php")?>
    </body>
</html>
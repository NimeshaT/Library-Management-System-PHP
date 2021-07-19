<!-- //admin balana kotasa -->
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
                    <h1 style="color:black;font-size:20px;margin-bottom:0"><?=$L["userhead"]?></h1>
                    <hr/>
                    
                    <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%"   >
  <thead>
                        <tr>
                            <th><?=$L["id"]?></th>
                            <th><?=$L["photo"]?></th>
                            <th><?=$L["name"]?></th>
                            <th><?=$L["address"]?></th>
                            <th><?=$L["email"]?></th>
                            <th><?=$L["mobile"]?></th>
                            <th><?=$L["book_count"]?></th>
                            <th><?=$L["options"]?></th>
                        </tr>
</thead>
                        <?php
                            include_once("../includes/db.php");
                            // subquery
                            $sql= "SELECT *, (SELECT  count(lid) FROM lending WHERE lending.uid=user.uid) AS book_count from user";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)){
                        ?>
                        <tbody>
                        <tr>
                            <td><?=$row["uid"]?></td>
                            <td><img src="<?=PATH.$row["photo"]?>" class="img img-thumbnail" width="100"/></td>
                            <td><?=$row["name"]?></td>
                            <td><?=$row["address"]?></td>
                            <td><?=$row["email"]?></td>
                            <td><?=$row["mobile"]?></td>
                            <td>
                                <label class="badge badge-pill badge-success"><?=$row["book_count"]?></label>
                            </td>
                        
                            <td>
                                <!-- <a href="view.php?id=<?=$row["uid"]?>" class="btn btn-info"><?=$L["view"]?></a> -->
                                <a href="edit.php?id=<?=$row["uid"]?>" class="btn btn-warning"><?=$L["edit"]?></a>
                                <a href="delete_action.php?id=<?=$row["uid"]?>" class="btn btn-danger"><?=$L["delete"]?></a>
                            </td>
                        </tr>
                            </tbody>

                        <?php
                            }
                        ?>
                    </table>
                    
                </div>
            </div>

            <?php include_once("../includes/footer.php");?>
       
    </body>
</html>

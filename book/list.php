<!DOCTYPE html>
<html>
    <head>
        <?php include_once("../includes/head.php")?>
    </head>
    <body>
        <?php include_once("../includes/header.php")?>

        <div class="row container-fluid">
        
            <div class="col-md-3 container-fluid">
            <?php include_once("../includes/sideBar.php")?>
            </div>

            <div class="col-md-9 container-fluid">
                <br/>
                <h1 style=color:black;font-size:20px;margin-bottom:0><?=$L["listbook"]?><a href="add.php" class="btn btn-info float-right"><?=$L["add"]?></a></h1>
                <hr/>
                
                <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%"  >
                    <tr>
                        <th><?=$L["id"]?></th>
                        <th><?=$L["photo"]?></th>
                        <th><?=$L["username"]?></th>
                        <th><?=$L["author"]?></th>
                        <th><?=$L["category"]?></th>
                        <th><?=$L["availability"]?></th>
                        <th><?=$L["viewcount"]?></th>
                        <th><?=$L["options"]?></th>
                    </tr>

                    <?php
                        include_once("../includes/db.php");
                        $sql= "SELECT book.*,author.name as oid,category.name as cid FROM book INNER JOIN author ON author.oid=book.oid ".
                            "INNER JOIN category ON category.cid=book.cid";
                        // $sql="SELECT book.bid,book.name,author.name,category.name,book.availability,book.view_count
                        //         FROM (book INNER JOIN author ON book.oid=author.oid) INNER JOIN category ON book.cid=category.cid) ";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result)){
                    ?>

                    <tr>
                        <td><?=$row["bid"]?></td>
                        <td><img src="<?=PATH.$row["photo"]?>" class="img img-thumbnail" width="80"></td>
                        <td><?=$row["name"]?></td>
                        <td><?=$row["oid"]?></td>
                        <td><?=$row["cid"]?></td>
                        <td>
                            <label class="badge badge-pill badge-success"><?=$row["availability"]?></label>
                        </td>
                        <td><?=$row["view_count"]?></td>
                        <td>
                            <a href="view.php?id=<?=$row["bid"]?>" class="btn btn-info"><?=$L["view"]?></a>
                            <a href="edit.php?id=<?=$row["bid"]?>" class="btn btn-warning"><?=$L["edit"]?></a>
                            <a href="delete_action.php?id=<?=$row["bid"]?>" class="btn btn-danger"><?=$L["delete"]?></a>
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
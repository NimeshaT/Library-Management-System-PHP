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
                <h1 style=color:black;font-size:20px;margin-bottom:0><?=$L["editlending"]?><a href="<?=PATH ?>dashboard.php" class="btn btn-info float-right"><?=$L["dashboard"]?></a></h1>
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
                        $lid = isset($_GET['id']) ? $_GET['id'] : '';
                        $sql="SELECT * FROM lending WHERE lid='$lid'  ";
                        $result = mysqli_query($conn,$sql);
                        if($row = mysqli_fetch_array($result)){

                    ?>
                <form action="edit_action.php" method="post" class="jumbotron">
                    <label><?=$L["id"]?></label>
                    <input type="text" name="id" class="form-control" value="<?=$row["lid"]?>" readonly><br/>

                    <label><?=$L["name"]?></label>
                    <!-- <input type="text" name="uname" class="form-control" value="Perera"> -->
                    <select name="uname" class="form-control">
                    <?php
                            // include_once("../includes/db.php");
                            $sql1="SELECT * FROM user";
                            $result1=mysqli_query($conn,$sql1);
                            while($row1=mysqli_fetch_array($result1)){
                                if($row["uid"]==$row1["uid"]){
                                    ?>
                                    <option selected value="<?=$row1["uid"]?>"><?=$row1["name"]?></option>
                                    <?php
                                }else{
                        ?>
                        <option value="<?=$row1["uid"]?>"><?=$row1["name"]?></option>
                        <!-- <option value="2">Kudaligama</option>
                        <option value="3">Mahasen</option> -->

                        <?php
                            }
                        }
                        ?>
                    </select><br/>

                    <label><?=$L["bookname"]?></label>
                    <!-- <input type="text" name="bname" class="form-control" value="Desert Flower"> -->
                    <select name="bname" class="form-control">
                    <?php
                            // include_once("../includes/db.php");
                            $sql2="SELECT * FROM book";
                            $result2=mysqli_query($conn,$sql2);
                            while($row2=mysqli_fetch_array($result2)){
                                if($row["bid"]==$row2["bid"]){
                                    ?>
                                    <option selected value="<?=$row2["bid"]?>"><?=$row2["name"]?></option>
                                    <?php
                                }else{
                        ?>
                        <option value="<?=$row2["bid"]?>"><?=$row2["name"]?></option>
                        <!-- <option value="2">Science</option>
                        <option value="3">Songs</option> -->
                        <?php
                                }
                            }
                        ?>
                    </select><br/>

                    <label><?=$L["duedate"]?></label>
                    <input type="date" name="dDate" class="form-control " value="<?=$row["dueDate"]?>"><br/>

                    <label><?=$L["returndate"]?></label>
                    <input type="date" name="rDate" class="form-control" value="<?=$row["returnDate"]?>"><br/>
    
                    <input type="reset" value="<?=$L["reset"]?>" class=" btn btn-danger"/>
                    <input type="submit" value="<?=$L["update"]?>" class="btn btn-info"/>

                    <?php
                        }
                    ?>
                </form>
            </div>
        </div>

        <?php include_once("../includes/footer.php")?>
    </body>
</html>
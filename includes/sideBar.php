<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION["ROLE"])){
        ?>
            <div class="card " style="width:260px;background-color:#00778b;margin-left:-14px;padding:0;" >
            <img class="card-img-center img-thumbnail" style="width:100px;height:100px;margin-left:78px;margin-top: 28px;" src="<?=PATH ?><?=$_SESSION["PHOTO"]?>" alt="Card image">
            <div class="card-body ">
                <h4 class="card-title" style=text-align:center;font-weight:bold;color:white;><?=$_SESSION["NAME"]?></h4>
                <p class="card-text" style=font-size:20px;text-align:center;color:white><?=($_SESSION["ROLE"]=='a')?'Admin':'Member'?></p>
                <div class="btn-group-vertical flex-wrap container-fluid" >
                    <?php
                    if($_SESSION["ROLE"]=='a'){
                    ?>
                    <a href="<?=PATH ?>dashboard.php" class="btn  " style="background-color:#008B8B;color:white;"><span class="fa fa-bars" aria-hidden="true" style=float:left;padding-top:5px;padding-right:5px></span>DASHBOARD</a><br/>
                    <a href="<?=PATH ?>reports.php" class="btn  " style="background-color:#008B8B;color:white;"><span class="fa fa-bars" aria-hidden="true" style=float:left;padding-top:5px;padding-right:5px></span>REPORTS</a><br/>
                    <a href="<?=PATH ?>author/list.php" class="btn  " style="background-color:#008B8B;color:white;"><span class="fa fa-user" aria-hidden="true" style=float:left;padding-top:5px;padding-right:5px></span>AUTHOR LIST</a><br/>
                    <a href="<?=PATH ?>category/list.php" class="btn  " style="background-color:#008B8B;color:white;"><span class="fa fa-folder-open" aria-hidden="true" style=float:left;padding-top:5px;padding-right:6px></span>CATEGORY LIST</a><br/>
                    <a href="<?=PATH ?>user/list.php" class="btn " style="background-color:#008B8B;color:white;"><span class="fa fa-users" aria-hidden="true" style=float:left;padding-top:5px;padding-right:0px></span>USER LIST</a><br/>
                    <a href="<?=PATH ?>lending/list.php" class="btn  " style="background-color:#008B8B;color:white;"><span class="fa fa-inbox" aria-hidden="true" style=float:left;padding-top:5px;padding-right:5px></span>LENDING LIST</a><br/>
                    <a href="<?=PATH ?>book/list.php" class="btn  " style="background-color:#008B8B;color:white;"><span class="fa fa-book" aria-hidden="true" style=float:left;padding-top:5px;padding-right:5px></span>BOOK LIST</a><br/>
                    <?php
                        }else{
                    ?>
                    <a href="<?=PATH ?>dashboard.php" class="btn"  style="background-color:#008B8B;color:white;"><span class="fa fa-bars" aria-hidden="true" style=float:left;padding-top:5px;padding-right:5px></span>DASHBOARD</a><br/>
                    <a href="<?=PATH ?>lending/mylendings.php" class="btn  " style="background-color:#008B8B;color:white;"><span class="fa fa-address-card" aria-hidden="true" style=float:left;padding-top:5px;padding-right:5px></span>MY LENDINGS</a><br/>
                    <a href="<?=PATH ?>user/mydetails.php" class="btn  " style="background-color:#008B8B;color:white;"><span class="fa fa-database" aria-hidden="true" style=float:left;padding-top:5px;padding-right:5px></span>MY DETAILS</a><br/>

                    <?php
                        }
                    ?>
                </div>
            </div>
            </div>
        <?php
    }else{
        ?>
            <img src="<?=PATH ?>images/bar.png" class="img img-thumbnail">
        <?php
    }
?>

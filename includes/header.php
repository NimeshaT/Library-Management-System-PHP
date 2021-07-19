<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
            <nav class="navbar navbar-light " style=background-color:#00778b;>
            <a class="navbar-brand" >
            <img src="<?=PATH ?>favIcon.ico" width="30" height="30" class="d-inline-block align-top" alt="">
            <span class="mainName"><?=$L["sitename"] ?>
            </span>
            </a>
           <?php
                if(isset($_SESSION["ID"])){
           ?>

              <b style="color:black;font-size:16px;position:absolute;left:0;right:0;width:49%;margin:auto"> Welcome MISS <?=$_SESSION["NAME"] ?>  !</b>
              <a href="<?=PATH ?>logout.php" class="btn " style="position:absolute;left:0;right:0;width:10%;margin:auto;background-color:#008B8B;color:black"><?=$L["logout"]?></a>
           <?php
                }
           ?>
<!-- margin-left:-361px -->
           
           <div class="float-right" >
                
                <a class="lan" href="?lang=en">EN</a> |
                <a class="lan" href="?lang=si">SI</a> |
                <a class="lan" href="?lang=ta">TA</a>
                
            </div>
            

            
           
            
            
            
</nav>
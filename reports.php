<!DOCTYPE html>
<html>

<head>
    <?php include_once("includes/head.php") ?>
</head>

<body>
    <div class="container-fluid" style="padding:0">
        <?php include_once("includes/header.php") ?>
        <div class="row w-100 container-fluid">
            <div class="col-md-3 container-fluid">
                <?php include_once("includes/sideBar.php") ?>
            </div>
            <div class="col-md-9 container-fluid">
                <br/>
                <h1 style="color:black;font-size:20px;margin-bottom:0"><?= $L["report_title"] ?></h1>
                <br/>
                </hr>
                <div class="jumbotron container">
                    <lable>Member Wise Book Report</lable>
                    <a href="<?= PATH ?>report/report1.php" target="_blank" class="btn btn-info pull-right">REPORT 01</a>
                    <hr />
                    <!-- <lable>Brand Wise Car Report</lable>
                    <a href="<?= PATH ?>report/report2.php" target="_blank" class="btn btn-success pull-right">REPORT 02</a> -->
                </div>
            </div>
        </div>
        <?php include_once("includes/footer.php") ?>
    </div>
</body>

</html>
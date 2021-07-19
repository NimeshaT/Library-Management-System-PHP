<!DOCTYPE html>
<html>

<head>
    <?php include_once("includes/head.php") ?>
    <?php
    include_once("includes/db.php");
    $dataPoints = array(
        
        
    );
    
    $sql = "select * from book_category_count";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $dataPoints[]=array("y" => $row["book_count"], "label" => $row["cid"]);
    }



    ?>

    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Available books"
                },
                axisY: {
                    title: "Availability books"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0 books",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>
</head>

<body>
    <?php include_once("includes/header.php") ?>

    <div class="row container-fluid">

        <div class="col-md-3 container-fluid">
            <?php include_once("includes/sideBar.php") ?>
        </div>

        <div class="col-md-9 container-fluid">
            <br />
            <h1 style="color:black;font-size:20px;margin-bottom:0"><?= $L["dashboard"] ?></h1>
            <hr />

            <?php

            $book_count = 0;
            $view_count = 0;
            $category_count = 0;
            $author_count = 0;
            $user_count = 0;
            $lending_count = 0;

            // include_once("includes/db.php");

            $sql1 = "SELECT COUNT(bid) AS book_count FROM book";
            $result1 = mysqli_query($conn, $sql1);
            if ($row1 = mysqli_fetch_array($result1)) {
                $book_count = $row1["book_count"];
            }

            $sql2 = "SELECT SUM(view_count) AS view_count FROM book";
            $result2 = mysqli_query($conn, $sql2);
            if ($row2 = mysqli_fetch_array($result2)) {
                $view_count = $row2["view_count"];
            }

            $sql3 = "SELECT COUNT(cid) AS category_count FROM category";
            $result3 = mysqli_query($conn, $sql3);
            if ($row3 = mysqli_fetch_array($result3)) {
                $category_count = $row3["category_count"];
            }

            $sql4 = "SELECT COUNT(oid) AS author_count FROM author";
            $result4 = mysqli_query($conn, $sql4);
            if ($row4 = mysqli_fetch_array($result4)) {
                $author_count = $row4["author_count"];
            }

            $sql5 = "SELECT COUNT(uid) AS user_count FROM user";
            $result5 = mysqli_query($conn, $sql5);
            if ($row5 = mysqli_fetch_array($result5)) {
                $user_count = $row5["user_count"];
            }

            $sql6 = "SELECT COUNT(lid) AS lending_count FROM lending";
            $result6 = mysqli_query($conn, $sql6);
            if ($row6 = mysqli_fetch_array($result6)) {
                $lending_count = $row6["lending_count"];
            }
            ?>

            <div class="jumbotron " style=height:166px;padding:10px>
                <div class="row w-100 container-fluid">
                    <div class="col-md-2">
                        <div class="card border-info mx-sm-0 p-2 ">
                            <div class="card border-info shadow text-info p-2 my-card"><span class="fa fa-book" aria-hidden="true"></span></div>
                            <div class="text-info text-center mt-2">
                                <h5>Books</h5>
                            </div>
                            <div class="text-info text-center mt-2">
                                <h2><?= $book_count ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-info mx-sm-0 p-2">
                            <div class="card border-info shadow text-info p-2 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                            <div class="text-info text-center mt-2">
                                <h5>Views</h5>
                            </div>
                            <div class="text-info text-center mt-2">
                                <h2><?= $view_count ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-info mx-sm-0 p-2">
                            <div class="card border-info shadow text-info p-2 my-card"><span class="fa fa-inbox" aria-hidden="true"></span></div>
                            <div class="text-info text-center mt-2">
                                <h5>Lending</h5>
                            </div>
                            <div class="text-info text-center mt-2">
                                <h2><?= $lending_count ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-info mx-sm-0 p-2">
                            <div class="card border-info shadow text-info p-2 my-card"><span class="fa fa-users" aria-hidden="true"></span></div>
                            <div class="text-info text-center mt-2">
                                <h5>Users</h5>
                            </div>
                            <div class="text-info text-center mt-2">
                                <h2><?= $author_count ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="card border-info mx-sm-0 p-2">
                            <div class="card border-info shadow text-info p-2 my-card"><span class="fa fa-user-secret" aria-hidden="true"></span></div>
                            <div class="text-info text-center mt-2">
                                <h5>Authors</h5>
                            </div>
                            <div class="text-info text-center mt-2">
                                <h2><?= $author_count ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="card border-info mx-sm-0 p-2">
                            <div class="card border-info shadow text-info p-2 my-card"><span class="fa fa-folder-open-o" aria-hidden="true"></span></div>
                            <div class="text-info text-left mt-2 mr-0">
                                <h5 style="font-size:19px">Category's</h5>
                            </div>
                            <div class="text-info text-center mt-2">
                                <h2><?= $category_count ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="jumbotron">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>

        </div>
    </div>
    </div>

    <?php include_once("includes/footer.php") ?>

</body>

</html>
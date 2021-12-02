<?php

session_start();

// $userloginid = $_SESSION["userid"] = $_GET['userlogid'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Detail</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>

    <?php
    include("../php-script/data_class.php");

    $msg = "";

    if (!empty($_REQUEST['msg'])) {
        $msg = $_REQUEST['msg'];
    }

    if ($msg == "done") {
        echo "<div class='alert alert-success' role='alert'>Congrats! Successfully Done.</div>";
    } elseif ($msg == "fail") {
        echo "<div class='alert alert-danger' role='alert'>Fail</div>";
    }

    ?>

    <main>

        <div class="container">

            <div class="innerdiv" style="padding-top: 8%;">

                <div class="role"><Button class="top-btn">STUDENT DASHBOARD</Button></div>

                <div class="leftinnerdiv">
                    <Button class="btn" onclick="openpart('myaccount')">USER ACCOUNT</Button>
                    <Button class="btn" onclick="openpart('bookreport')"> CATALOGUE</Button>
                    <Button class="btn" onclick="openpart('searchbook')"> SEARCH BOOK</Button>
                    <Button class="btn" onclick="openpart('requestbook')"> REQUEST BOOK</Button>
                    <Button class="btn" onclick="openpart('returnbook')"> RETURN BOOK</Button>
                    <Button class="btn" onclick="openpart('issuebookreport')">STATUS REPORT</Button>
                    <a href="../logout.php"><Button class="btn logout-btn"> LOGOUT</Button></a>
                </div>

                <!--BOOK DETAIL-->
                <div class="rightinnerdiv">
                    <div id="bookdetail" class="innerright portion" style="<?php if (!empty($_REQUEST['returnid'])) {
                                                                                echo "display:none";
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">

                        <Button class="report-btn detail">BOOK DETAIL</Button>
                        <!-- </br> -->

                        <?php

                        $viewid = $_GET['bookid'];

                        $u = new data;
                        $u->setconnection();
                        $u->getbookdetail($viewid);
                        $recordset = $u->getbookdetail($viewid);
                        foreach ($recordset as $row) {

                            $bookid = $row[0];
                            $bookimg = $row[1];
                            $bookname = $row[2];
                            $bookdetail = $row[3];
                            $bookauthor = $row[4];
                            $bookpub = $row[5];
                            $branch = $row[6];
                            $bookprice = $row[7];
                            $bookquantity = $row[8];
                            $bookava = $row[9];
                            $bookrent = $row[10];
                        }
                        ?>

                        <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="../images/<?php echo $bookimg ?> " />
                        <!-- </br> -->

                        <p style="color:#04244c">&nbsp&nbsp&nbsp&nbspName: &nbsp&nbsp<?php echo $bookname ?></p>
                        <p style="color:#04244c">&nbsp&nbsp&nbsp&nbspAuthor: &nbsp&nbsp<?php echo $bookauthor ?></p>
                        <p style="color:#04244c">&nbsp&nbsp&nbsp&nbspCategory: &nbsp&nbsp<?php echo $branch ?></p>
                        <p style="color:#04244c">&nbsp&nbsp&nbsp&nbspPrice: &nbsp&nbsp$<?php echo $bookprice ?></p>
                        <br>
                        <p style="color:#04244c; margin-left: 20px;">Summary: &nbsp&nbsp<?php echo $bookdetail ?></p>


                    </div>
                </div>
            </div>



        </div>
        </div>



        <script>
            function openpart(portion) {
                var i;
                var x = document.getElementsByClassName("portion");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                document.getElementById(portion).style.display = "block";
            }
        </script>

    </main>
</body>

</html>
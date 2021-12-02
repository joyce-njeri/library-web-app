<?php

session_start();

$userloginid = $_SESSION["userid"] = $_GET['userlogid'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Dashboard</title>
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

        <div class="background"><img class="imgbackground" src="../images/background.jpg" />

            <div class="container">

                <div class="innerdiv">

                    <div class="role"><Button class="top-btn">STUDENT DASHBOARD</Button></div>

                    <div class="leftinnerdiv">
                        <!-- add search books -->
                        <Button class="btn" onclick="openpart('myaccount')">USER ACCOUNT</Button>
                        <Button class="btn" onclick="openpart('bookreport')"> CATALOGUE</Button>
                        <Button class="btn" onclick="openpart('requestbook')"> REQUEST BOOK</Button>
                        <Button class="btn" onclick="openpart('returnbook')"> RETURN BOOK</Button>
                        <Button class="btn" onclick="openpart('issuebookreport')">STATUS REPORT</Button>
                        <a href="../logout.php"><Button class="btn logout-btn"> LOGOUT</Button></a>
                    </div>

                    <!-- profile -->
                    <div class="rightinnerdiv">
                        <div id="myaccount" class="innerright portion" style="<?php if (!empty($_REQUEST['returnid'])) {
                                                                                    echo "display:none";
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>">
                            <Button class="report-btn detail">MY PROFILE</Button>

                            <?php

                            $u = new data;
                            $u->setconnection();
                            $u->userdetail($userloginid);
                            $recordset = $u->userdetail($userloginid);
                            foreach ($recordset as $row) {

                                $id = $row[0];
                                $firstname = $row[1];
                                $lastname = $row[2];
                                $email = $row[3];
                                $type = $row[5];
                            }
                            ?>

                            <div style="float: left; padding-left: 20px;"><img src="../images/undraw_profile.svg" width="100px" height="100px"></div>

                            <div style="padding-left: 20px;">

                                <p style="color:#04244c">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFull Name: &nbsp&nbsp<?php echo $firstname;
                                                                                                            echo ' ';
                                                                                                            echo $lastname ?></p>
                                <p style="color:#04244c">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEmail: &nbsp&nbsp<?php echo $email ?></p>
                                <p style="color:#04244c">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRole: &nbsp&nbsp<?php echo $type ?></p>
                            </div>

                        </div>
                    </div>
                    
                    <!-- VIEW BOOKS -->
                    <div class="rightinnerdiv">
                        <div id="bookreport" class="innerright portion" style="display:none">
                            <!-- <Button class="report-btn">VIEW BOOKS</Button> -->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->getbook();
                                        $recordset = $u->getbook();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><th>Book Name</th><th>Author</th><th>Category</th><th>Price</th><th>Available</th><th>Status</th></tr>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[4]</td>";
                                            $table .= "<td>$row[6]</td>";
                                            $table .= "<td>$$row[7]</td>";
                                            $table .= "<td>$row[9]</td>";
                                            if ($row[9] == 0) {
                                                $status = 'Bad';
                                                $status_btn = 'bad-btn';
                                            }
                                            else if ($row[9] < 5 && $row[9] != 0) {
                                                $status = 'Risky';
                                                $status_btn = 'risky-btn';
                                            }
                                            else {
                                                $status = 'Good';
                                                $status_btn = 'good-btn';
                                            }
                                            $table .= "<td><a href='dashboard.php?viewid=$row[0]'><button type='button' class='btn $status_btn btn-primary'>$status</button></a></td>";
                                            // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                                            $table .= "</tr>";
                                            // $table.=$row[0];
                                        }
                                        $table .= "</table>";

                                        echo $table;
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- request -->
                    <div class="rightinnerdiv">
                        <div id="requestbook" class="innerright portion" style="display:none">
                            <!-- <Button class="report-btn detail">REQUEST BOOK</Button> -->

                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->getbookissue();
                                        $recordset = $u->getbookissue();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><tr><th>Book Image</th><th>Book Name</th><th>Author</th><th>Category</th><th>Price</th></th><th>Borrow Book</th></tr>";

                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td><img src='../images/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[4]</td>";
                                            $table .= "<td>$row[6]</td>";
                                            $table .= "<td>$$row[7]</td>";
                                            $table .= "<td><a href='request_book.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary view-btn'>Send Request</button></a></td>";

                                            $table .= "</tr>";
                                            // $table.=$row[0];
                                        }
                                        $table .= "</table>";

                                        echo $table;


                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--return-->
                    <div class="rightinnerdiv">
                        <div id="returnbook" class="innerright portion" style="display:none">
                            <!-- <Button class="report-btn">VIEW ISSUE REPORT</Button> -->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->issuereport();
                                        $recordset = $u->issuereport();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Book Name</th><th>Borrow Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            if ($row[1] == $userloginid) {
                                                $table .= "<td>$row[3]</td>";
                                                $table .= "<td>$row[6]</td>";
                                                $table .= "<td>$row[7]</td>";
                                                $table .= "<td>$row[8]</td>";
                                                $table .= "<td><a href='return_book.php?viewid=$row[0]'><button type='button' class='btn update-btn btn-primary'>Return Book</button></a></td>";
                                                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                                                $table .= "</tr>";
                                                // $table.=$row[0];
                                            }
                                        }
                                        $table .= "</table>";

                                        echo $table;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--VIEW ISSUE REPORT-->
                    <div class="rightinnerdiv">
                        <div id="issuebookreport" class="innerright portion" style="display:none">
                            <!-- <Button class="report-btn">VIEW ISSUE REPORT</Button> -->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->issuereport();
                                        $recordset = $u->issuereport();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Book Name</th><th>Borrow Date</th><th>Return Date</th><th>Fine</th><th>Status</th></tr>";

                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            if ($row[1] == $userloginid) {
                                                $table .= "<td>$row[3]</td>";
                                                $table .= "<td>$row[6]</td>";
                                                $table .= "<td>$row[7]</td>";
                                                $table .= "<td>$row[8]</td>";
                                                if ($row[7] == date("d/m/Y")) {
                                                    $status = 'Bad';
                                                    $status_btn = 'bad-btn';
                                                }
                                                else {
                                                    $status = 'Good';
                                                    $status_btn = 'good-btn';
                                                }
                                                $table .= "<td><a href='dashboard.php?viewid=$row[0]'><button type='button' class='btn $status_btn btn-primary'>$status</button></a></td>";
                                                $table .= "</tr>";
                                                // $table.=$row[0];
                                            }
                                        }
                                        $table .= "</table>";

                                        echo $table;
                                        ?>
                                    </div>
                                </div>
                            </div>
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
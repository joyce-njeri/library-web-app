<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faculty Dashboard</title>
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
        echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
    } elseif ($msg == "fail") {
        echo "<div class='alert alert-danger' role='alert'>Fail</div>";
    }

    ?>

    <main>

        <div class="background"><img class="imgbackground" src="../images/background.jpg" />

            <div class="container">

                <div class="innerdiv">

                    <div class="role"><Button class="top-btn">WELCOME TO FACULTY DASHBOARD</Button></div>

                    <div class="leftinnerdiv">
                        <!-- add search books -->
                        <!-- add status avail/not -->
                        <Button class="btn student-btn" onclick="openpart('bookreport')"> CATALOGUE</Button>
                        <Button class="btn" onclick="openpart('issuebook')"> BORROW BOOK</Button>
                        <!-- add status whether return/not -->
                        <Button class="btn" onclick="openpart('issuebookreport')"> VIEW BORROWED BOOKS</Button>
                        <a href="../logout.php"><Button class="btn logout-btn"> LOGOUT</Button></a>
                    </div>

                    <!-- issue book -->
                    <div class="rightinnerdiv">
                        <div id="issuebook" class="innerright portion" style="display:none">
                            <!-- <Button class="report-btn">BORROW BOOK</Button> -->
                            <form action="issue_book.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="book" style="color: #04244c;">Choose Book:</label>

                                    <select name="book">
                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->getbookissue();
                                        $recordset = $u->getbookissue();
                                        foreach ($recordset as $row) {

                                            echo "<option value='" . $row[2] . "'>" . $row[2] . "</option>";
                                        }
                                        ?>
                                    </select>


                                    <label for="Select Student" style="color: #04244c;">:</label>
                                    <select name="userselect">
                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->userdata();
                                        $recordset = $u->userdata();
                                        foreach ($recordset as $row) {
                                            $id = $row[0];
                                            echo "<option value='" . $row[1] . "'>" . $row[1] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">Days:</label>
                                    <input type="number" name="days" />
                                </div>

                                <input class="submit-btn" type="submit" value="SUBMIT" style="margin-top: -3px;">
                            </form>
                        </div>
                    </div>

                    <!-- detail -->
                    <div class="rightinnerdiv">
                        <div id="bookdetail" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {
                                                                                    $viewid = $_REQUEST['viewid'];
                                                                                } else {
                                                                                    echo "display:none";
                                                                                } ?>">

                            <Button class="report-btn detail">BOOK DETAIL</Button>
                            <br></br>
                            <?php
                            $u = new data;
                            $u->setconnection();
                            $u->getbookdetail($viewid);
                            $recordset = $u->getbookdetail($viewid);
                            foreach ($recordset as $row) {

                                $bookid = $row[0];
                                $bookimg = $row[1];
                                $bookname = $row[2];
                                $bookdetail = $row[3];
                                $bookauthour = $row[4];
                                $bookpub = $row[5];
                                $branch = $row[6];
                                $bookprice = $row[7];
                                $bookquantity = $row[8];
                                $bookava = $row[9];
                                $bookrent = $row[10];
                            }
                            ?>

                            <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="../images/<?php echo $bookimg ?> " /></img>
                            <br></br>
                            <p style="color:black"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
                            <p style="color:black"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
                            <p style="color:black"><u>Book Authour:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
                            <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
                            <p style="color:black"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
                            <p style="color:black"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
                            <p style="color:black"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
                            <p style="color:black"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>
                        </div>


                    </div>


                    <!-- VIEW BOOKS -->
                    <div class="rightinnerdiv">
                        <div id="bookreport" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {
                                                                                    echo "display:none";
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>">
                            <!-- <Button class="report-btn">VIEW BOOKS</Button> -->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                            <?php
                            $u = new data;
                            $u->setconnection();
                            $u->getbook();
                            $recordset = $u->getbook();

                            $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><th>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Borrow</th><th>View</th></tr>";
                            foreach ($recordset as $row) {
                                $table .= "<tr>";
                                "<td>$row[0]</td>";
                                $table .= "<td>$row[2]</td>";
                                $table .= "<td>$row[7]</td>";
                                $table .= "<td>$row[8]</td>";
                                $table .= "<td>$row[9]</td>";
                                $table .= "<td>$row[10]</td>";
                                $table .= "<td><a href='dashboard.php?viewid=$row[0]'><button type='button' class='btn view-btn btn-primary'>View Book</button></a></td>";
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
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[3]</td>";
                                            $table .= "<td>$row[6]</td>";
                                            $table .= "<td>$row[7]</td>";
                                            $table .= "<td>$row[8]</td>";
                                            $table .= "<td>$row[4]</td>";
                                            // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
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
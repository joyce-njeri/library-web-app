<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Librarian Dashboard</title>
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

                <div class="innerdiv" style="padding-top: 2%;">

                    <div class="role"><Button class="top-btn">WELCOME TO LIBRARIAN DASHBOARD</Button></div>

                    <div class="leftinnerdiv">
                        <Button class="btn" onclick="openpart('bookreport')">Catalogue</Button>
                        <Button class="btn" onclick="openpart('addbook')">Record Book</Button>
                        <Button class="btn" onclick="openpart('updatebook')">Update Book</Button>
                        <Button class="btn" onclick="openpart('deletebook')">Delete Book</Button>
                        <Button class="btn" onclick="openpart('issuebook')">Lend Book</Button>
                        <Button class="btn" onclick="openpart('bookrequestapprove')">Book Requests</Button>
                        <Button class="btn" onclick="openpart('bookreturnapprove')">Book Returns</Button>
                        <Button class="btn" onclick="openpart('issuebookreport')"> Issue Report</Button>
                        <a href="../logout.php"><Button class="btn logout-btn"> LOGOUT</Button></a>
                    </div>

                    <!--BOOK REQUESTS-->
                    <div class="rightinnerdiv">
                        <div id="bookrequestapprove" class="innerright portion" style="display:none">
                            <Button class="report-btn detail">BOOK REQUESTS</Button>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->requestbookdata();
                                        $recordset = $u->requestbookdata();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Person Email</th><th>Role</th><th>Book Name</th><th>Days</th><th>Approve</th></tr>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            "<td>$row[1]</td>";
                                            "<td>$row[2]</td>";

                                            $table .= "<td>$row[3]</td>";
                                            $table .= "<td>$row[4]</td>";
                                            $table .= "<td>$row[5]</td>";
                                            $table .= "<td>$row[6]</td>";
                                            $table .= "<td><a href='approve_request.php?book=$row[5]&userselect=$row[3]&days=$row[6]&reqid=$row[0]'><button type='button' class='btn btn-primary'>Approve</button></a></td>";
                                            // $table .= "<td><a href='approve_request.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'>Approved</a></td>";
                                            // $table.="<td><a href='delete_book.php?deletebookid=$row[0]'>Delete</a></td>";
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

                    <!--BOOK RETURNS-->
                    <div class="rightinnerdiv">
                        <div id="bookreturnapprove" class="innerright portion" style="display:none">
                            <Button class="report-btn detail">BOOK RETURNS</Button>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->requestbookdata();
                                        $recordset = $u->requestbookdata();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Person Name</th><th>Role</th><th>Book Name</th><th>Days</th><th>Approve</th></tr>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            "<td>$row[1]</td>";
                                            "<td>$row[2]</td>";

                                            $table .= "<td>$row[3]</td>";
                                            $table .= "<td>$row[4]</td>";
                                            $table .= "<td>$row[5]</td>";
                                            $table .= "<td>$row[6]</td>";
                                            $table .= "<td><a href='approve_return.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approve</button></a></td>";
                                            // $table .= "<td><a href='approve_request.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'>Approved</a></td>";
                                            // $table.="<td><a href='delete_book.php?deletebookid=$row[0]'>Delete</a></td>";
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

                    <!--RECORD NEW BOOK-->
                    <div class="rightinnerdiv">
                        <div id="addbook" class="innerright portion" style="display:none">
                            <Button class="report-btn detail">ADD NEW BOOK</Button>
                            <br>
                            <form action="add_book.php" method="post" enctype="multipart/form-data" style="padding-left: 50px;">
                                <div class="form-group">
                                    <label style="color: #04244c;">Book Name:</label>
                                    <input type="text" name="bookname" style="width: 80%;">
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">Detail:</label>
                                    <input type="text" name="bookdetail" style="width: 80%;height:auto;">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Author:</label>
                                    <input type="text" name="bookauthor" style="width: 80%;">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Publication:</label>
                                    <input type="date" name="bookpub">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" style="color: #04244c;">Category:</label>
                                    <select name="branch" style="text-align:center;">
                                        <option name="branch">Fiction</option>
                                        <option name="branch">Drama</option>
                                        <option name="branch">Journal</option>
                                        <option name="branch">Kids</option>
                                        <option name="branch">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Price:</label>
                                    <input type="number" name="bookprice">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Quantity:</label>
                                    <input type="number" name="bookquantity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1" style="color: #04244c;">Book Photo:</label>
                                    <input type="file" name="bookphoto">
                                </div>
                                <button type="submit" class="submit-btn btn-primary" style="margin-top: -3px;">Submit</button>
                            </form>
                        </div>
                    </div>

                    <!--VIEW ISSUE REPORT-->
                    <div class="rightinnerdiv">
                        <div id="issuebookreport" class="innerright portion" style="display:none">
                            <Button class="report-btn detail">VIEW ISSUE REPORT</Button>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->issuereport();
                                        $recordset = $u->issuereport();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><tr><th>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[3]</td>";
                                            $table .= "<td>$row[6]</td>";
                                            $table .= "<td>$row[7]</td>";
                                            $table .= "<td>$row[8]</td>";
                                            $table .= "<td>$row[4]</td>";
                                            // $table.="<td><a href='dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
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

                    <!--issue book -->
                    <div class="rightinnerdiv">
                        <div id="issuebook" class="innerright portion" style="display:none">
                            <Button class="report-btn detail">LEND BOOK</Button>
                            <form action="issue_book.php" method="post" enctype="multipart/form-data">
                                <div class="addbook-input"  style="margin-top:20px;">
                                    <label for="book" style="color: #04244c;">Choose Book:</label>

                                    <select name="book" style="width: 280px; text-align: center;">
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
                                    <br><br>


                                    <label for="Select Student" style="color: #04244c;">Select Email:</label>
                                    <select name="userselect" style="width: 280px; text-align: center;">
                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->userdata();
                                        $recordset = $u->userdata();
                                        foreach ($recordset as $row) {
                                            $id = $row[0];
                                            echo "<option value='" . $row[3] . "'>" . $row[3] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <br><br>
                                    <label for="Select Days" style="color: #04244c;">Select Days:</label><input type="number" name="days" />

                                    <input class="submit-btn" type="submit" value="SUBMIT" />
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!--VIEW BOOKS-->
                    <div class="rightinnerdiv">
                        <div id="bookreport" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {
                                                                                    echo "display:none";
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>">
                            <Button class="report-btn detail">VIEW BOOKS</Button>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->getbook();
                                        $recordset = $u->getbook();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><thead><tr><th>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Borrow</th></th><th>View</th></tr></thead>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[7]</td>";
                                            $table .= "<td>$row[8]</td>";
                                            $table .= "<td>$row[9]</td>";
                                            $table .= "<td>$row[10]</td>";
                                            $table .= "<td><a href='dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary view-btn'>View Book</button></a></td>";
                                            $table .= "</tr>";
                                        }
                                        $table .= "</table>";

                                        echo $table;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--BOOK DETAIL-->
                    <div class="rightinnerdiv">
                        <div id="bookdetail" class="innerright portion"  style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">

                            <Button class="report-btn detail">BOOK DETAIL</Button>
                            <!-- </br> -->
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

                    <!--UPDATE BOOKS-->
                    <div class="rightinnerdiv">
                        <div id="updatebook" class="innerright portion" style="display:none";
                                                                                } ?>">
                            <Button class="report-btn detail">UPDATE BOOKS</Button>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->getbook();
                                        $recordset = $u->getbook();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><thead><tr><th>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Borrow</th></th><th>Update Book</th></tr></thead>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[7]</td>";
                                            $table .= "<td>$row[8]</td>";
                                            $table .= "<td>$row[9]</td>";
                                            $table .= "<td>$row[10]</td>";
                                            $bookviewid = $row[0];
                                            $table .= "<td><a href='dashboard.php?viewid=$row[0]'><button type='button' class='btn update-btn btn-primary view-btn'>Update Book</button></a></td>";
                                            $table .= "</tr>";
                                        }
                                        $table .= "</table>";

                                        echo $table;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- update details-->
                    <div class="rightinnerdiv">
                        <div id="updatebookdetail" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {
                                                                                    $viewid = $_REQUEST['viewid'];
                                                                                } else {
                                                                                    echo "display:none";
                                                                                } ?>">
                        <Button class="report-btn detail">UPDATE BOOK DETAILS</Button>
                            <!-- </br> -->
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
                                $bookauthor = $row[4];
                                $bookpub = $row[5];
                                $branch = $row[6];
                                $bookprice = $row[7];
                                $bookquantity = $row[8];
                            }
                            ?>

                            <form action="update_book.php" method="post" enctype="multipart/form-data" style="padding-left: 50px;">
                                <div class="form-group">
                                    <label style="color: #04244c;">Book ID:</label>
                                    <input type="text" name="bookid" value="<?php echo $bookid ?>">
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">Book Name:</label>
                                    <input type="text" name="bookname" value="<?php echo $bookname ?>" style="width: 280px; text-align:center;">
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">Detail:</label>
                                    <textarea type="textarea" name="bookdetail" style="width: 500px;"><?php echo $bookdetail ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Author:</label>
                                    <input type="text" name="bookauthor" value="<?php echo $bookauthor ?>">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Publication:</label>
                                    <input type="text" name="bookpub" value="<?php echo $bookpub ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" style="color: #04244c;">Category:</label>
                                    <select name="branch" style="text-align:center;">
                                        <option name="branch">Fiction</option>
                                        <option name="branch">Drama</option>
                                        <option name="branch">Journal</option>
                                        <option name="branch">Kids</option>
                                        <option name="branch">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Price:</label>
                                    <input type="number" name="bookprice" value="<?php echo $bookprice ?>">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Quantity:</label>
                                    <input type="number" name="bookquantity" value="<?php echo $bookquantity ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1" style="color: #04244c;">Book Photo:</label>
                                    <input type="file" id="file-uploader" name="bookphoto">
                                    <p id="feedback"></p>
                                </div>
                                <button type="submit" class="submit-btn btn-primary" style="margin-top: -3px;">Submit</button>
                            </form>
                        </div>
                    </div>

                    <!--DELETE BOOKS-->
                    <div class="rightinnerdiv">
                        <div id="deletebook" class="innerright portion" style="display:none;">
                            <Button class="report-btn detail">DELETE BOOKS</Button>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->getbook();
                                        $recordset = $u->getbook();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><thead><tr><th>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Borrow</th></th><th>Delete Book</th></tr></thead>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[7]</td>";
                                            $table .= "<td>$row[8]</td>";
                                            $table .= "<td>$row[9]</td>";
                                            $table .= "<td>$row[10]</td>";
                                            $table .= "<td><a href='delete_book.php?deletebookid=$row[0]'><button type='button' class='btn delete-btn btn-primary view-btn'>Delete Book</button></a></td>";
                                            $table .= "</tr>";
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
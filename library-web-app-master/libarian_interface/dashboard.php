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
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }

    .imgbackground {
        z-index: -1;
        height: 100%;
        width: 100%;
        position: fixed;
    }

    .container,
    .row,
    .imglogo {
        margin: auto;
    }

    .innerdiv {
        width: 100%;
        height: 100%;
        margin-top: 5%;
    }

    input {
        margin-left: 20px;
    }

    .leftinnerdiv {
        float: left;
        width: 25%;
    }

    .rightinnerdiv {
        float: right;
        width: 75%;
        height: 100%;
    }

    .innerright {
        background-color: #fff;
        margin-left: 5%;
        margin-top: 1%;
        height: auto;
        width: auto;
        position: relative;
        padding: 25px;
        /* border-radius: 30px; */
    }

    .innerright,
    label {
        color: #fff;
        font-weight: bold;
    }

    .btn {
        display: block;
        width: 100%;
        padding: 15px 20px;
        text-align: center;
        border: none;
        background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
        background-size: cover;
        outline: none;
        border-radius: 25px;
        font-size: 1.2rem;
        color: #FFF;
        cursor: pointer;
        transition: .3s;
        margin-bottom: 5%;
        margin-top: 5%;
        text-transform: uppercase;
    }

    .top-btn {
        display: block;
        width: 100%;
        padding: 15px 20px;
        text-align: center;
        border: none;
        background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
        background-size: cover;
        outline: none;
        border-radius: 25px;
        font-size: 1.2rem;
        color: #FFF;
        cursor: pointer;
        transition: .3s;
        letter-spacing: 1px;
        /* margin-top: 8%; */
    }

    .btn:hover {
        transform: translateY(-5px);
        background-image: linear-gradient(180deg, #1cc88a 10%, #13855c 100%);
        background-size: cover;
    }

    .btn,
    a {
        text-decoration: none;
        color: white;
        font-size: large;
    }

    .table {
        border-collapse: collapse !important;
        margin-top: -5%;
        border-radius: 30px;
    }

    .table-bordered {
        border: 1px solid #e3e6f0;
        border-radius: 30px !important;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #e3e6f0;
        color: #04244c;
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }

    .form-group {
        padding: 10px;
    }

    .addbook-input {
        margin: 2%;
    }

    .submit-btn {
        display: block;
        width: 200px;
        text-align: center;
        border: none;
        background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
        background-size: cover;
        outline: none;
        border-radius: 30px;
        font-size: 1.2rem;
        color: #FFF;
        cursor: pointer;
        transition: .3s;
        margin-right: 8%;
        margin-top: 8%;
        padding: 10px;
    }

    .submit-btn:hover {
        transform: translateY(-5px);
        background-image: linear-gradient(180deg, #1cc88a 10%, #13855c 100%);
        background-size: cover;
    }

    .report-btn {
        display: block;
        width: 100%;
        padding: 15px 20px;
        text-align: center;
        border: none;
        background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
        background-size: cover;
        outline: none;
        /* border-radius: 30px; */
        font-size: 1.2rem;
        color: #fff;
        cursor: pointer;
        transition: .3s;
        letter-spacing: 0.2px;
        font-weight: 500;
        /* margin-right: 8%;
        margin-top: 8%;
        padding: 10px; */
    }
</style>

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

                    <div class="role" style="margin-top: -60px;"><Button class="top-btn">WELCOME TO LIBRARIAN DASHBOARD</Button></div>

                    <div class="leftinnerdiv">
                        <Button class="btn" onclick="openpart('bookreport')">Catalogue</Button>
                        <Button class="btn" onclick="openpart('addbook')">Record Book</Button>
                        <Button class="btn" onclick="openpart('bookreport')">Update Book</Button>
                        <Button class="btn" onclick="openpart('bookreport')">Delete Book</Button>
                        <Button class="btn" onclick="openpart('issuebook')">Lend Book</Button>
                        <Button class="btn" onclick="openpart('bookrequestapprove')">Book Requests</Button>
                        <Button class="btn" onclick="openpart('bookrequestapprove')">Book Returns</Button>
                        <Button class="btn" onclick="openpart('issuebookreport')"> Issue Report</Button>
                        <a href="../logout.php"><Button class="btn"> LOGOUT</Button></a>
                    </div>
                    <!--BOOK REQUESTS-->
                    <div class="rightinnerdiv">
                        <div id="bookrequestapprove" class="innerright portion" style="display:none">
                            <!-- <Button class="report-btn">BOOK REQUESTS</Button> -->
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
                                            $table .= "<td><a href='approve_request.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approve</button></a></td>";
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
                            <!-- <Button class="report-btn">ADD NEW BOOK</Button> -->
                            <form action="add_book.php" method="post" enctype="multipart/form-data" style="padding-left: 20px;">
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Book Name:</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="bookname" style="width: 70%;">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Detail:</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="bookdetail" style="width: 70%;">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Author:</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="bookauthor" style="width: 70%;">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Publication:</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="bookpub" style="width: 70%;">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" style="color: #04244c;">Category:</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="branch" style="width: 70%;">
                                        <option name="branch">Fiction</option>
                                        <option name="branch">Drama</option>
                                        <option name="branch">Journal</option>
                                        <option name="branch">Kids</option>
                                        <option name="branch">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Price:</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput" name="bookprice" style="width: 70%;">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" style="color: #04244c;">Quantity:</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput" name="bookquantity" style="width: 70%;">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1" style="color: #04244c;">Book Photo:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="bookphoto">
                                </div>
                                <button type="submit" class="submit-btn btn-primary" style="margin-top: -3px;">Submit</button>
                            </form>
                            </form>
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

                    <!--issue book -->
                    <div class="rightinnerdiv">
                        <div id="issuebook" class="innerright portion" style="display:none">
                            <!-- <Button class="report-btn">ISSUE BOOK</Button> -->
                            <form action="issue_book.php" method="post" enctype="multipart/form-data">
                                <div class="addbook-input">
                                    <label for="book" style="color: #04244c;">Choose Book:</label>

                                    <select name="book" style="width: 220px; text-align: center;">
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
                                    <select name="userselect" style="width: 220px; text-align: center;">
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

                    <!--BOOK DETAIL-->
                    <div class="rightinnerdiv">
                        <div id="bookdetail" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {
                                                                                    $viewid = $_REQUEST['viewid'];
                                                                                } else {
                                                                                    echo "display:none";
                                                                                } ?>">

                            <Button class="report-btn">BOOK DETAIL</Button>
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
                            
                            <p style="color:black"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
                            <p style="color:black"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
                            <p style="color:black"><u>Book Author:</u> &nbsp&nbsp<?php echo $bookauthor ?></p>
                            <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
                            <p style="color:black"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
                            <p style="color:black"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
                            <p style="color:black"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
                            <p style="color:black"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>


                        </div>
                    </div>


                    <!--VIEW BOOKS-->
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

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><thead><tr><th>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Borrow</th></th><th>View</th></tr></thead>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[7]</td>";
                                            $table .= "<td>$row[8]</td>";
                                            $table .= "<td>$row[9]</td>";
                                            $table .= "<td>$row[10]</td>";
                                            $table .= "<td><a href='dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View Book</button></a></td>";
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
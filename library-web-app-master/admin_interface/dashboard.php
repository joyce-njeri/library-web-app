<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
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
        echo "<div class='alert alert-success' role='alert'>Congrats! Successfully Done</div>";
    } elseif ($msg == "fail") {
        echo "<div class='alert alert-danger' role='alert'>Fail</div>";
    }

    ?>

    <main>

        <div class="background"><img class="imgbackground" src="../images/background.jpg" />

            <div class="container">

                <div class="innerdiv">

                    <div class="role"><Button class="top-btn"> WELCOME TO ADMIN DASHBOARD</Button></div>

                    <div class="leftinnerdiv">
                        <Button class="btn student-btn" onclick="openpart('studentrecord')"> STUDENT REPORT</Button>
                        <Button class="btn" onclick="openpart('addperson')"> ADD USER</Button>
                        <Button class="btn" onclick="openpart('updateuser')"> UPDATE USER</Button>
                        <Button class="btn" onclick="openpart('deleteuser')"> DELETE USER</Button>
                        <a href="../logout.php"><Button class="btn logout-btn"> LOGOUT</Button></a>
                    </div>
                    <!-- add user -->
                    <div class="rightinnerdiv">
                        <div id="addperson" class="innerright portion" style="display: none">
                            <!-- <Button class="report-btn">ADD USER</Button> -->
                            <form class="form-group" action="add_person.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label style="color: #04244c;">First Name:</label><input type="text" name="addfirstname" style="width: 250px;" />
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">Last Name:</label><input type="text" name="addlastname" style="width: 250px;" />
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">Email:</label><input type="email" name="addemail" style="width: 250px;" />
                                </div>

                                <div class="form-group">
                                    <label style="color: #04244c;">Password:</label><input type="password" name="addpassword" style="width: 250px;" />
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">Confirm Password:</label><input type="password" name="addcpassword" style="width: 250px;" />
                                </div>
                                <div class="form-group">
                                    <label for="addrole" style="color: #04244c;">Choose Role:</label>
                                    <select name="addrole">
                                        <option value="Student">Student</option>
                                        <option value="Faculty">Faculty</option>
                                        <option value="Librarian">Librarian</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                <!-- </br> -->

                                <input class="submit-btn" type="submit" value="SUBMIT" />
                            </form>
                        </div>
                    </div>
                    <!-- view users -->
                    <div class="rightinnerdiv">
                        <div id="studentrecord" class="innerright portion" style="<?php if (!empty($_REQUEST['viewid'])) {
                                                                                        echo "display:none";
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?>">
                            <!-- <Button class="report-btn">VIEW STUDENTS</Button> -->

                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->userdata();
                                        $recordset = $u->userdata();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><th>First Name</th><th>Last Name</th><th>Email</th><th>Role</th></tr>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[1]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[3]</td>";
                                            $table .= "<td>$row[5]</td>";
                                            // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
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
                    <!-- update user -->
                    <div class="rightinnerdiv">
                        <div id="updateuser" class="innerright portion" style="display:none;">
                            <!-- <Button class="report-btn">UPDATE STUDENTS</Button> -->

                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php

                                        $u = new data;
                                        $u->setconnection();
                                        $u->userdata();
                                        $recordset = $u->userdata();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><th>First Name</th><th>Last Name</th><th>Email</th><th>Role</th><th>Update User</th></tr>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[1]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[3]</td>";
                                            $table .= "<td>$row[5]</td>";
                                            // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                                            $useridupdate=$row[0];
                                            $table .= "<td><a href='dashboard.php?useridupdate=$row[0]'><button type='button' class='btn update-btn btn-primary'>Update User</button></a></td>";
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

                    <!-- update user details -->
                    <div class="rightinnerdiv">
                        <div id="updateuserdetail" class="innerright portion" style="<?php if (!empty($_REQUEST['useridupdate'])) {
                                                                                            $useridupdate = $_REQUEST['useridupdate'];
                                                                                        } else {
                                                                                            echo "display:none";
                                                                                        } ?>">
                            <Button class="report-btn update">UPDATE USER DETAILS</Button>

                            <?php
                            $u = new data;
                            $u->setconnection();
                            $u->getuserdetail($useridupdate);
                            $recordset = $u->getuserdetail($useridupdate);
                            foreach ($recordset as $row) {

                                $firstname = $row[1];
                                $lastname = $row[2];
                                $email = $row[3];
                                $role = $row[5];
                            }
                            ?>

                            <form class="form-group" action="update_user.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label style="color: #04244c;">User ID:</label><input type="text" value="<?php echo $useridupdate ?>" name="adduserid" style="width: 250px;"/>
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">First Name:</label><input type="text" placeholder="<?php echo $firstname ?>" name="addfirstname" style="width: 250px;" required/>
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">Last Name:</label><input type="text" placeholder="<?php echo $lastname ?>" name="addlastname" style="width: 250px;" required/>
                                </div>
                                <div class="form-group">
                                    <label style="color: #04244c;">Email:</label><input type="email" placeholder="<?php echo $email ?>" name="addemail" style="width: 250px;" required/>
                                </div>

                                <div class="form-group">
                                    <label for="addrole" style="color: #04244c;">Choose Role:</label>
                                    <select name="addrole">
                                    <!-- <option value="" disabled selected hidden><?php echo $role ?></option> -->
                                        <option value="Student">Student</option>
                                        <option value="Faculty">Faculty</option>
                                        <option value="Librarian">Librarian</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>

                                <input class="submit-btn" type="submit" value="SUBMIT" />
                            </form>
                        </div>
                    </div>

                    <!-- delete user -->
                    <div class="rightinnerdiv">
                        <div id="deleteuser" class="innerright portion" style="display:none;">
                            <!-- <Button class="report-btn">DELETE STUDENTS</Button> -->

                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php
                                        $u = new data;
                                        $u->setconnection();
                                        $u->userdata();
                                        $recordset = $u->userdata();

                                        $table = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'><th>First Name</th><th>Last Name</th><th>Email</th><th>Role</th><th>Delete User</th></tr>";
                                        foreach ($recordset as $row) {
                                            $table .= "<tr>";
                                            "<td>$row[0]</td>";
                                            $table .= "<td>$row[1]</td>";
                                            $table .= "<td>$row[2]</td>";
                                            $table .= "<td>$row[3]</td>";
                                            $table .= "<td>$row[5]</td>";
                                            // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                                            $table .= "<td><a href='delete_user.php?useriddelete=$row[0]'><button type='button' class='btn delete-btn btn-primary'>Delete User</button></a></td>";
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
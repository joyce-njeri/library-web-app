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
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }

    /* Top Header and Menu */
    .header-h {
        position: fixed;
        top: 0px;
        left: 0px;
        right: 0px;
        background: white;
        z-index: 1020;
        padding: 0px 40px;
        /* padding-bottom: 0px; */
    }

    .header-h-scrolled {
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }

    .header-h-unscrolled .nav--links li a {
        padding: 30px 25px;
        /* height: 70px; */
    }

    .header-h-scrolled .nav--links li a {
        padding: 20px 25px;
        /* height: 50px; */
    }

    /* logo */

    .header-h .nav-logo img {
        height: 80px;
        float: left;
        margin-left: 5%;
        width: 80px;
    }

    .nav-logo img {
        border-radius: 100px;
    }

    /* nav-h */

    .nav-h {
        display: table;
        width: 100%;
    }

    .nav-h>* {
        display: table-cell;
        vertical-align: middle;
        width: 50%;
    }

    .nav-h .nav-nav {
        text-align: right;
    }

    .nav-h .nav-nav ul {
        list-style-type: none;
        display: flex;
        align-items: center;
    }

    .nav-h .nav-nav ul>* {
        flex-grow: 1;
    }

    /* links */
    .nav-nav ul {
        margin: 0px;
    }

    .nav-nav ul * {
        text-transform: uppercase;
    }

    .nav--links li {
        position: relative;
    }

    .nav--links li a {
        text-decoration: none;
        color: black;
        position: relative;
        display: block;
        text-align: center;
        transition: 300ms ease;
    }

    .nav--links li a.active {
        font-weight: bold;
    }

    .nav--links li a:hover {
        background: whitesmoke;
    }

    .nav--links li.active::after {
        position: absolute;
        content: "";
        bottom: 0px;
        height: 4px;
        background: #b30000;
        width: 100%;
        left: 0px;
    }

    .contact-btn {
        padding: 0.8rem 2.5rem;
        border-radius: 100rem;
        transition: 300ms ease;
        border: 2px;
        cursor: pointer;
    }

    .btn:focus {
        outline: none;
    }

    .btn-uppercase {
        text-transform: uppercase;
    }

    .btn-black {
        background: #b30000;
        color: #fff;
        /* font-weight: bold; */
        letter-spacing: 0.6px;
    }

    .btn-black:hover {
        background: #04244c;
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
        background-color: #04244c;
        margin-left: 5%;
        margin-top: 1%;
        height: auto;
        width: auto;
        position: relative;
        padding: 25px;
        border-radius: 30px;
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
        background: #04244c;
        outline: none;
        border-radius: 30px;
        font-size: 1.2rem;
        color: #FFF;
        cursor: pointer;
        transition: .3s;
        margin-bottom: 5%;
        margin-top: 5%;
    }

    .top-btn {
        display: block;
        width: 100%;
        padding: 15px 20px;
        text-align: center;
        border: none;
        background: #04244c;
        outline: none;
        border-radius: 30px;
        font-size: 1.2rem;
        color: #FFF;
        cursor: pointer;
        transition: .3s;
        letter-spacing: 1px;
        /* margin-top: 8%; */
    }

    .btn:hover {
        transform: translateY(-5px);
        background: #b30000;
    }

    .btn,
    a {
        text-decoration: none;
        color: white;
        font-size: large;
    }

    th {
        background-color: white;
        color: #04244c;
        text-align: center;
        padding: 5px;
        /* margin: 5px; */
    }

    td {
        background-color: #fed8b1;
        color: #04244c;
        padding: 5px;
        margin: 5px;
        text-align: center;
    }

    td,
    a {
        color: #04244c;
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
        background: #b30000;
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
        background: green;
    }

    .report-btn {
        display: block;
        width: 100%;
        padding: 15px 20px;
        text-align: center;
        border: none;
        background: #fff;
        outline: none;
        /* border-radius: 30px; */
        font-size: 1.2rem;
        color: #04244c;
        cursor: pointer;
        transition: .3s;
        letter-spacing: 1px;
        font-weight: 500;
        /* margin-right: 8%;
        margin-top: 8%;
        padding: 10px; */
    }
</style>

<body>

    <!-- the header of the website/ the navigation bar -->
    <header class="header-h header-h-unscrolled">

        <div class="nav-h">
            <div class="nav-logo">
                <img src="../images/ALU_logo.png" alt="">
            </div>

            <div class="nav-nav">
                <div>
                    <div class="nav--links">
                        <ul>

                            <li>
                                <button class="contact-btn btn-black btn-uppercase" onclick="window.location.href = 'contact.html';">Contact </button>

                            </li>
                        </ul>
                    </div>
                    <!-- <div class="nav--profile">
                <img src="" alt="">
            </div> -->

                </div>
            </div>
        </div>
    </header>

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

                    <div class="role"><Button class="top-btn"> ADMIN</Button></div>

                    <div class="leftinnerdiv">
                        <Button class="btn" onclick="openpart('addperson')"> ADD USER</Button>
                        <Button class="btn" onclick="openpart('studentrecord')"> STUDENT REPORT</Button>
                        <a href="../logout.php"><Button class="btn"> LOGOUT</Button></a>
                    </div>

                    <div class="rightinnerdiv">
                        <div id="addperson" class="innerright portion"  style="<?php if (!empty($_REQUEST['viewid'])) {
                                                                                echo "display:none";
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
                            <Button class="report-btn">ADD USER</Button>
                            <form action="add_person.php" method="post" enctype="multipart/form-data">
                                <div class="addbook-input">
                                    <label>First Name:</label><input type="text" name="addfirstname" style="width: 250px;" />
                                </div>
                                <div class="addbook-input">
                                    <label>Last Name:</label><input type="text" name="addlastname" style="width: 250px;" />
                                </div>
                                <div class="addbook-input">
                                    <label for="addrole">Choose Role:</label>
                                    <select name="addrole">
                                        <option value="student">Student</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="librarian">Librarian</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="addbook-input">
                                    <label>Email:</label><input type="email" name="addemail" style="width: 250px;" />
                                </div>
                                <div class="addbook-input">
                                    <label>Password:</label><input type="password" name="addpassword" style="width: 250px;" />
                                </div>
                                <div class="addbook-input">
                                    <label>Confirm Password:</label><input type="password" name="addcpassword" style="width: 250px;" />
                                </div>
                                <!-- </br> -->

                                <input class="submit-btn" type="submit" value="SUBMIT"/>
                            </form>
                        </div>
                    </div>

                    <div class="rightinnerdiv">
                        <div id="studentrecord" class="innerright portion" style="display:none">
                            <Button class="report-btn">VIEW STUDENTS</Button>

                            <?php
                            $u = new data;
                            $u->setconnection();
                            $u->userdata();
                            $recordset = $u->userdata();

                            $table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;height: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>First Name</th><th>Last Name</th><th>Email</th><th>Role</th></tr>";
                            foreach ($recordset as $row) {
                                $table .= "<tr>";
                                "<td>$row[0]</td>";
                                $table .= "<td>$row[1]</td>";
                                $table .= "<td>$row[2]</td>";
                                $table .= "<td>$row[4]</td>";
                                $table .= "<td>$row[3]</td>";
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
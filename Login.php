<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>

   <!-- the header of the website/ the navigation bar -->
    <header class="header-h header-h-unscrolled">

        <div class="nav-h">
            <div class="nav-logo">
                <img src="./images/ALU_logo.png" alt="">
            </div>
            <div class="nav-nav">
                <div>
                    <div class="nav--links">
                        <ul>
                            <li>
                                <a href="./index.php">Home</a>
                            </li>
                            
                            <li class="">
                                <a class="" href="./contact.html">Contact</a>
                            </li>
                            <!-- <li>
                                <button class="btn btn-black btn-uppercase">login</button>
                            </li> -->
                        </ul>
                    </div>
                    <!-- <div class="nav--profile">
                        <img src="" alt="">
                    </div> -->

                </div>
            </div>
        </div>
    </header>
    <!--  -->
    <!--  -->
    <main>
        <?php
            if(isset($_REQUEST['msg'])){
            $message=$_REQUEST['msg'];
            $visibility='';
          }
          else{
            $message='';
            $visibility='hidden';
          }
          
          ?>
          <p id="message" class=" <?php echo $visibility;?>" style="color: red;cursor: not-allowed;"><?php echo $message; ?></p>
            <script>
              
                $("#message").click(function(){
                  $("#message").hide();
                });
 
          
            </script>
        <!-- top -->
        <form name="login" class="contact" method="POST" action="./php-script/login.php">
            <!--  -->
            <div class="input-wrapper">
                <label for="">User Name</label>
                <input name="username" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Password</label>
                <input name="password" type="password" placeholder="holder">
            </div>
            
            <!--  -->
            <!--  -->
            <div class="submit-btn-h">
                <button type="Submit" class="btn btn-black" name="login">Submit</button>
            </div>
            <!--  -->
        </form>
        <!--  -->
    </main>
    <!--  -->
    <!--  -->
    <!--  -->
    <script src="./js/main.js"></script>
</body>

</html>
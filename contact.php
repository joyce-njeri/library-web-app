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

    <!-- main nav header -->
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
                           
                            <li class="active">
                                <a class="active" href="./contact.php">Contact</a>
                            </li>
                            <li>
                                <button class="btn btn-black btn-uppercase">login</button>
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
    <!--  -->
    <!--  -->
    <main>
        <!-- top -->
        <form name="contact" class="contact">
            <!--  -->
            <div class="input-wrapper">
                <label for="">Names</label>
                <input name="names" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Email</label>
                <input name="email" type="email" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Message</label>
                <textarea rows="10" type="text" placeholder="holder"></textarea>
            </div>
            <!--  -->
            <div id="contact-message">
            </div>
            <!--  -->
            <div class="submit-btn-h">
                <button type="button" onclick="submitForm()" class="btn btn-black">Submit</button>
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
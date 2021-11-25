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
                                <a href="./index.html">Home</a>
                            </li>
                            
                            <li class="active">
                                <a class="active" href="./contact.html">Contact</a>
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
        <!-- the code below is for the users to be able to enter their suggestions through a form -->
        <form name="suggestions" class="contact">
            <!--  -->
            <div class="input-wrapper">
                <label for="">Title</label>
                <textarea rows="2" type="text" placeholder="holder"></textarea>
            </div>
            <div class="input-wrapper">
                <label for="">Department</label>
                <input name="Department" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Concern</label>
                <textarea rows="8" type="text" placeholder="holder"></textarea>
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
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
                            <li>
                                <a href="./subjects.html">Subjects</a>
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
        <!-- the code below is for the users to be able to add their category name of the book  -->
        <form name="Category" class="contact">
            <!--  -->
            
            <div class="input-wrapper">
                <label for="">Category namet</label>
                <input name="Category" type="text" placeholder="holder">
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
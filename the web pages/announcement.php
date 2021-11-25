<section class="toside--h">
    <!--  -->
    <!-- subject highlight computer-->
    <div class="subj-h subj-view">
        <!-- the code below is for the users to be able to enter their suggestions through a form -->
        <form name="Announcements" class="contact" method="POST" action="./php-script/announcement.php">
            <!--  -->
            <div class="input-wrapper">
                <label for="">Announcement Title</label>
                <textarea rows="2" type="text" placeholder="holder" name="title"></textarea>
            </div>
            
            <div class="input-wrapper">
                <label for="">Details </label>
                <textarea rows="8" type="text" placeholder="holder" name="details"></textarea>
            </div>
           
            <!--  -->
            <div class="submit-btn-h">
                <button type="submit" class="btn btn-black" name="save">Submit</button>
            </div>
            <!--  -->
        </form>
    </div>
    <!--  -->
    <!--  -->
</section>
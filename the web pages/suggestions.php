<section class="toside--h">
    <!--  -->
    <!-- subject highlight computer-->
    <div class="subj-h subj-view">
        <!-- the code below is for the users to be able to enter their suggestions through a form -->
        <form name="suggestions" class="contact" method="POST" action="./php-script/suggestion.php"> 
            <!--  -->
            <div class="input-wrapper">
                <label for="">Title</label>
                <textarea rows="2" type="text" placeholder="holder" name="title"></textarea>
            </div>
            <div class="input-wrapper">
                <label for="">Department</label>
                <input name="department" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Message</label>
                <textarea rows="8" type="text" placeholder="holder" name="message"></textarea>
            </div>
            
            <!--  -->
            <div class="submit-btn-h">
                <button type="Submit"  class="btn btn-black">Submit</button>
            </div>
            <!--  -->
        </form>
    </div>
    <!--  -->
    <!--  -->
</section>
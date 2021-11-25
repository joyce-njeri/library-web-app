<section class="toside--h">
    <!--  -->
    <!-- subject highlight computer-->
    <div class="subj-h subj-view">
        <!-- below is the code for recording events happening in a certain department added by teacher users or events by the library  -->
        <form name="Events" class="contact" method="POST" action="./php-script/events.php">
            <!--  -->
            <div class="input-wrapper">
                <label for="">Title/ Name of the event </label>
                <input name="name" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for=""> Location </label>
                <input name="location" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Organiser</label>
                <input name="oganiser" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Date of the event</label>
                <input name="date" type="Date" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Department</label>
                <input name="department" type="text" placeholder="holder">
            </div>
            
            
            <!--  -->
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
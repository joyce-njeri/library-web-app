<section class="toside--h">
    <!--  -->
    <!-- subject highlight computer-->
    <div class="subj-h subj-view">
        <!-- below is the code for recording the books that are borrowed  -->
        <form name="borrowedbooks" class="contact" method="POST" action="./php-script/bookborrowing.php">
            <!--  -->
            <div class="input-wrapper">
                <label for="">Book id </label>
                <input name="book" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for=""> Edition </label>
                <input name="edition" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">User id</label>
                <input name="user" type="text" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Date the book was issued</label>
                <input name="issuedate" type="Date" placeholder="holder">
            </div>
            <div class="input-wrapper">
                <label for="">Date of return</label>
                <input name="returndate" type="Date" placeholder="holder">
            </div>
             <div class="input-wrapper">
                <label for="">Number of copies borrowed</label>
                <input name="borrowedcopies" type="Number" placeholder="holder">
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
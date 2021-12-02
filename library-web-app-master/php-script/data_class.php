<?php include("../php-script/connect.php");

class data extends db {

    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookauthor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;

    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;





    function __construct() {
        // echo " constructor ";
        echo "</br></br>";
    }


    function addnewuser($firstname,$lastname,$email,$password,$type){
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->email=$email;
        $this->password=$password;
        $this->type=$type;


         $q="INSERT INTO userdata(id, firstname, lastname, email, password,type)VALUES('','$firstname','$lastname','$email','$password','$type')";

        if($this->connection->exec($q)) {
            header("Location:dashboard.php?msg=New Add done");
        }

        else {
            header("Location:dashboard.php?msg=Register Fail");
        }



    }


    function addbook($bookpic, $bookname, $bookdetail, $bookauthor, $bookpub, $branch, $bookprice, $bookquantity) {
        $this->$bookpic=$bookpic;
        $this->bookname=$bookname;
        $this->bookdetail=$bookdetail;
        $this->bookauthor=$bookauthor;
        $this->bookpub=$bookpub;
        $this->branch=$branch;
        $this->bookprice=$bookprice;
        $this->bookquantity=$bookquantity;

       $q="INSERT INTO book (id,bookpic,bookname, bookdetail, bookauthor, bookpub, branch, bookprice,bookquantity,bookava,bookrent)VALUES('','$bookpic', '$bookname', '$bookdetail', '$bookauthor', '$bookpub', '$branch', '$bookprice', '$bookquantity','$bookquantity',0)";

        if($this->connection->exec($q)) {
            header("Location:dashboard.php?msg=done");
        }

        else {
            header("Location:dashboard.php?msg=fail");
        }

    }


    private $id;



    function getissuebook($userloginid) {

        $newfine="";
        $issuereturn="";

        $q="SELECT * FROM issuebook where userid='$userloginid'";
        $recordSetss=$this->connection->query($q);


        foreach($recordSetss->fetchAll() as $row) {
            $issuereturn=$row['issuereturn'];
            $fine=$row['fine'];
            $newfine= $fine;

            
                //  $newbookrent=$row['bookrent']+1;
        }


        $getdate= date("d/m/Y");
        if($issuereturn<$getdate){
            $q="UPDATE issuebook SET fine='$newfine' where userid='$userloginid'";

            if($this->connection->exec($q)) {
                $q="SELECT * FROM issuebook where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;
            }
            else{
                $q="SELECT * FROM issuebook where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;  
            }

        }
        else{
            $q="SELECT * FROM issuebook where userid='$userloginid'";
            $data=$this->connection->query($q);
            return $data;

        }






    }

    function getbook() {
        $q="SELECT * FROM book ";
        $data=$this->connection->query($q);
        return $data;
    }
    function getbookissue(){
        $q="SELECT * FROM book where bookava !=0 ";
        $data=$this->connection->query($q);
        return $data;
    }

    function userdata() {
        $q="SELECT * FROM userdata ";
        $data=$this->connection->query($q);
        return $data;
    }


    function getbookdetail($id){
        $q="SELECT * FROM book where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }

    function userdetail($id){
        $q="SELECT * FROM userdata where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }



    function requestbook($userid,$bookid){

        $q="SELECT * FROM book where id='$bookid'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where id='$userid'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $username=$row['name'];
            $usertype=$row['type'];
        }

        foreach($recordSetss->fetchAll() as $row) {
            $bookname=$row['bookname'];
        }

        if($usertype=="student"){
            $days=7;
        }
        if($usertype=="teacher"){
            $days=21;
        }


        $q="INSERT INTO requestbook (id,userid,bookid,username,usertype,bookname,issuedays)VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

        if($this->connection->exec($q)) {
            header("Location:dashboard.php?userlogid=$userid");
        }

        else {
            header("Location:dashboard.php?msg=fail");
        }

    }


    function returnbook($id){
        $fine="";
        $bookava="";
        $issuebook="";
        $bookrentel="";

        $q="SELECT * FROM issuebook where id='$id'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $userid=$row['userid'];
            $issuebook=$row['issuebook'];
            $fine=$row['fine'];

        }
        if($fine==0){

        $q="SELECT * FROM book where bookname='$issuebook'";
        $recordSet=$this->connection->query($q);   

        foreach($recordSet->fetchAll() as $row) {
            $bookava=$row['bookava']+1;
            $bookrentel=$row['bookrent']-1;
        }
        $q="UPDATE book SET bookava='$bookava', bookrent='$bookrentel' where bookname='$issuebook'";
        $this->connection->exec($q);

        $q="DELETE from issuebook where id=$id and issuebook='$issuebook' and fine='0' ";
        if($this->connection->exec($q)){
    
            header("Location:dashboard.php?userlogid=$userid");
         }
        //  else{
        //     header("Location:otheruser_dashboard.php?msg=fail");
        //  }
        }
        // if($fine!=0){
        //     header("Location:otheruser_dashboard.php?userlogid=$userid&msg=fine");
        // }
       

    }

    function delteuserdata($id){
        $q="DELETE from userdata where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:dashboard.php?msg=done");
        }
        else{
           header("Location:dashboard.php?msg=fail");
        }
    }

    function deletebook($id){
        $q="DELETE from book where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:dashboard.php?msg=done");
        }
        else{
           header("Location:dashboard.php?msg=fail");
        }
    }

        function issuereport(){
            $q="SELECT * FROM issuebook ";
            $data=$this->connection->query($q);
            return $data;
            
        }

        function requestbookdata(){
            $q="SELECT * FROM requestbook ";
            $data=$this->connection->query($q);
            return $data;
        }

      // issue issuebookapprove
      function issuebookapprove($book,$userselect,$days,$getdate,$returnDate,$redid){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM book where bookname='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookava=$row['bookava']-1;
                     $newbookrent=$row['bookrent']+1;
            }

        
            $q="UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

            if($this->connection->exec($q)) {

                $q="DELETE from requestbook where id='$redid'";
                $this->connection->exec($q);
                header("Location:dashboard.php?msg=done");
            }
    
            else {
                header("Location:dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:dashboard.php?msg=fail");
            }




        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }
    
    // issue book
    function issuebook($book,$userselect,$days,$getdate,$returnDate){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM book where bookname='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where email='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookava=$row['bookava']-1;
                     $newbookrent=$row['bookrent']+1;
            }

        
            $q="UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

            if($this->connection->exec($q)) {
                header("Location:dashboard.php?msg=done");
            }
    
            else {
                header("Location:dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:dashboard.php?msg=fail");
            }


        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }
}
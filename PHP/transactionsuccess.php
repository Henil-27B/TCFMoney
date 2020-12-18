<?php
    session_start();
     if($_SESSION['check']==1){
        header("Location: error.php");
    }
            if(isset($_REQUEST['sub'])){
            $val=$_REQUEST['sub'];
            if($val=="Transfer More Money"){
                header("Location: transfer.php");    
            }
            else if($val=="Back to Profile"){
                header("Location: signinsuccess.php");    
            }
            else if($val=="View Customers"){
                header("Location: customers.php");
            }
            else if($val=="Change Account"){
                session_unset();
                session_destroy();
                header("index.php");
            }
            
        }
        $cname=$_SESSION['name'];
        $usno=$_SESSION['userno'];
        $bal=$_SESSION['balance'];
        $rna=$_SESSION['rname'];
        $rno=$_SESSION['rno'];
        $amt=$_SESSION['samt'];
?>
<html>
    <head>
    <?php
        include("header2.php");
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <style type="text/css">
    <?php
    include("transactionsuccess.css");
    ?>
    </style>
    <body>
    <form>
    <div id="main">
    <?php

        echo "<h4>TRANSACTION SUCCESSFUL!!</h4><hr>";
        echo "<h2> Rs.".$amt. " has been credited to <b id='na'>Mr/Ms. ".$rna."</b><br> (Account Number: *****".$rno.")</h2><br>";
    
    ?>
    <input type="submit" name="sub" class="button" value="Back to Profile">
    <input type="submit" name="sub" class="button" value="Transfer More Money">
    <input type="submit" name="sub" class="button" value="View Customers">
    <br><br>
    <?php
        echo "<h3> Your remaining balance is Rs.".$bal.".</h3>";
    ?>
    </div>
    </form>
    <?php
        include("footer.php");
    ?>
    </body>
</html>
<?php
    session_start();
    if($_SESSION['check']==1){
        header("Location: error.php");
    }
    else{
    
    if(isset($_REQUEST['sub']) ){
    $val=$_REQUEST['sub'];
    if($val=="Transfer Money"){
        header("Location: transfer.php");
    }
    else if($val=="Change Account"){
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    else if($val=="Back To Profile"){
        header("Location: signinsuccess.php");
    }
    else if($val=="View Profile 1"){
        $vpno=1;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
    else if($val=="View Profile 2"){
        $vpno=2;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
    else if($val=="View Profile 3"){
        $vpno=3;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
    else if($val=="View Profile 4"){
        $vpno=4;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
    else if($val=="View Profile 5"){
        $vpno=5;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
    else if($val=="View Profile 6"){
        $vpno=6;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
    else if($val=="View Profile 7"){
        $vpno=7;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
    else if($val=="View Profile 8"){
        $vpno=8;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
    else if($val=="View Profile 9"){
        $vpno=9;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
    else if($val=="View Profile 10"){
        $vpno=10;
        $_SESSION['vpno']=$vpno;
        header("Location: profile1.php");
    }
}
}
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
        include("customer.css"); 
    ?>
</style>
<body>
<form>
<input type="submit" name="sub" class="account" value="Change Account">
<div id="d1">
<h2> Customers List </h2>
<?php

$link=new mysqli("localhost","id15704534_hostbankdb","1<4Vgq[LSujd~CVc","id15704534_bankdb") or die("DATABASE NOT FOUND");
$res=$link->query("select * from customers");
$i=1;

echo "<table border=3 id='t1'> ";
echo " <tr><th> Sr No </th><th> Customer Name </th> <th> AccountNo </th><th> Customer Mail ID </th><th> Customer Balance </th><th> View Profile </th></tr>";

$i=1;
while($row=$res->fetch_row()){
    echo "<tr><td> $row[0] </td> <td> $row[1] </td> <td> $row[2] </td> <td> $row[7] </td><td> $row[8] </td><td><input id='b1' type='submit' name='sub' value='View Profile $i' </td></tr>";
    $i+=1;
}

echo"</table>";
$link->close();

?>
<br>
<input type="submit" name="sub" class="button" value="Back To Profile"> &nbsp;&nbsp;&nbsp;
<input type="submit" name="sub" class="button" value="Transfer Money"><br><br>
</div>
</form>
<?php
    include("footer.php");
?>
</body>
</html>
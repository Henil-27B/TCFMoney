<?php
    session_start();
    if($_SESSION['check']==1){
        header("Location: error.php");
    }
    else{
        
    $cname=$_SESSION['name'];
    $usno=$_SESSION['userno'];
    $msg="";
    $err=0;
    
    $link=new mysqli("localhost","id15704534_hostbankdb","1<4Vgq[LSujd~CVc","id15704534_bankdb") or die("DATABASE NOT FOUND");
    $res=$link->query("select cbalance from customers where cname='$cname' and accno=$usno");
    $row=$res->fetch_row();
    $bal=$row[0];  
    
    if(isset($_REQUEST['sub'])){
        $val=$_REQUEST['sub'];
        if($val=="SEND MONEY"){
            $name=$_REQUEST['rna'];
            $amt=$_REQUEST['amount'];
            $pno=$_REQUEST['cpn'];

            $res=$link->query("select cbalance,accno from customers where cname='$name'");
            if($res==NULL){
                $err=1;
                $_SESSION['err']=$err;
                $msg="EMPTY FIELD. PLEASE FILL UP ALL THE FIELDS FOR SUCCESSFUL TRANSFER";
                $_SESSION['msg']=$msg;

            }
            else if($amt<0){
                $msg="AMOUNT CANNOT BE IN NEGATIVE. PLEASE ENTER A VALID AMOUNT";
                $_SESSION['msg']=$msg;
            }
            else{
                $row=$res->fetch_row();
                $value=$row[0];
                $acno=$row[1];
                if($value==NULL){
                    $msg="WRONG ACCOUNT. CHECK AGAIN!";
                    $_SESSION['msg']=$msg;
                }
                else{
                    if($bal-2000>=$amt){
                        $value=$value + $amt;
                        $bal=$bal-$amt;
                        $link->query("update customers set cbalance=$value where cname='$name' and accno=$acno");
                        $link->query("update customers set cbalance=$bal where cname='$cname' and accno=$usno");
                        $_SESSION['rname']=$name;
                        $_SESSION['rno']=$acno;
                        $_SESSION['samt']=$amt;
                        $_SESSION['balance']=$bal;
                        header("Location: transactionsuccess.php");
                    }
                    else{
                        $msg="LOW BALANCE! AMOUNT CAN'T BE CREDITED ";
                        $_SESSION['msg']=$msg;
                    }
                }
            }
        }
        else if($val=="Change Account"){
            session_unset();
            session_destroy();
            header("index.php");
        }
        else{
            header("Location: customers.php");
        }
    }
    $link->close();
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
        include("transfer.css");
    ?>
</style>
<body>
<form autocomplete="off">
    <div id="main">
<?php

    echo "<h3><b id='na'> Mr/Ms. ".$cname. "</b>  your current balance is Rs.".$bal. "</h3><hr><br>";
    echo "<h2>".$msg."</h2>";
    
?>
    <p>RECEIVER ACCOUNT HOLDER NAME:
    <select name="rna">
        <option value="Rajesh Bajaj">Rajesh Bajaj</option>
        <option value="Rahul Shrivastav">Rahul Shrivastav</option>
        <option value="Manohar Shah">Manohar Shah</option>
        <option value="Akhilesh Patel">Akhilesh Patel</option>
        <option value="Jhanvi Shah">Jhanvi Shah</option>
        <option value="Rajeshwari Chauhan">Rajeshwari Chauhan</option>
        <option value="Gaurang Mahajan">Gaurang Mahajan</option>
        <option value="Adit Rajput">Adit Rajput</option>
        <option value="Kashish Jadhav">Kashish Jadhav</option>
        <option value="none" selected>--none--</option>
    </select></p><br>
    <p>AMOUNT TO BE TRANSFERRED:   <input type="text" name="amount" placeholder="Enter Amount"></p><br>
    <p>ENTER YOUR 4 DIGIT PINNO:&nbsp; <input type="password" name="cpn" placeholder="Enter PIN NO " minlength="4" maxlength="4" required></p><br><br>

    <input type="submit" name="sub" class="button" value="BACK TO CUSTOMES LIST"> &nbsp;&nbsp;
    <input type="reset" name="res" class="button" value="RESET DETAILS">&nbsp;&nbsp;
    <input type="submit" name="sub" class="button" value="SEND MONEY"><br><br>
    </div>
</form>
<?php
    include("footer.php");
?>
</body>
</html>
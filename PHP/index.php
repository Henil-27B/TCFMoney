<?php
    session_start();
    $_SESSION['check']=1;
    $msg="";
    $err=1;
    if(isset($_REQUEST['sub'])){

        $na=$_REQUEST['cna'];
        $cacno=$_REQUEST['cno'];
        $pin=$_REQUEST['cpn'];

        $_SESSION['name']=$na;
        $_SESSION['userno']=$cacno;
        $_SESSION['check']=2;
        $link=new mysqli("localhost","id15704534_hostbankdb","1<4Vgq[LSujd~CVc","id15704534_bankdb") or die("DATABASE NOT FOUND");
        $res=$link->query("select pinno from customers where cname='$na' and accno=$cacno");
        $row=$res->fetch_row();
        $value=$row[0];
        
        if($value==NULL){
            $msg="ERROR! ENTER CORRECT ACCOUNT NAME and ACCOUNT NUMBER";
            $err=2;
            $_SESSION['msg']=$msg;
        }
        else{
            if($value===$pin){
                header("Location: signinsuccess.php");
            }
            else{
                $msg="Incorrect PIN NUMBER";
                $err=2;
                $_SESSION['msg']=$msg;
            }
        }
        $link->close();

    }
        echo "<html><head>";
        include("header.php");
?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style type="text/css">
    <?php
        include("index.css");
    ?>
</style>
<body>
<form autocomplete="off">
<div id="main"> 

<h2>The Most Trusted Bank of Singapore</h2>
<h3>Sign In to access your account</h3>
<?php
    if($err!=1){
    echo "<h4>".$msg."</h4>";
    }
?>
<br>
<p>ACCOUNT HOLDER NAME: <input type="text" name="cna" placeholder="Enter Name Here "></p><br>
<p>ACCOUNT NUMBER: <input type="text" name="cno" placeholder="Enter 6 digit Account No. "></p><br>
<p>4 Digit PINNO : <input type="password" name="cpn" placeholder="Enter PIN NO " minlength="4" maxlength="4" required></p><br>

<input type="submit" name="sub" class="button" value="SIGN IN"> &nbsp;&nbsp;&nbsp;
<input type="reset" name="res" class="button" value="CLEAR INFORMATION">
<br><br>

</div>
</form>
<?php
    include("footer.php");
?>
</body>
</html>
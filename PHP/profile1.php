<?php
    session_start();
    if($_SESSION['check']==1){
        header("Location: error.php");
    }
    else{
            if(isset($_REQUEST['sub'])){
                $val=$_REQUEST['sub'];
                if($val=="Back to Friends List"){
                    header("Location: customers.php");
                }
                else if($val=="Change Account"){
                    session_unset();
                    session_destroy();
                    header("index.php");
                }
            }
            
                $vpno=$_SESSION['vpno'];
                $link=new mysqli("localhost","id15704534_hostbankdb","1<4Vgq[LSujd~CVc","id15704534_bankdb") or die("DATABASE NOT FOUND");
                $res=$link->query("select * from customers where cno=$vpno");
                $row=$res->fetch_row();

                $name=$row[1];
                $accno=$row[2];
                $coun=$row[4];
                $city=$row[5];
                $phno=$row[6];
                $mail=$row[7];
                $bal=$row[8];
            

?>
<html>
<head>
<?php
    include("header2.php");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
    <?php include("profile.css"); ?>
</style>
<body>
    <form>
    <div id="main">
        <h2>CUSTOMER PROFILE</h2>
        <?php
        
                echo "<p><b>NAME:</b> ".$name."</p><p><b>ACCOUNT NUMBER:</b> 61612".$accno."</p><p><b>COUNTRY:</b> ".$coun." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>CITY:</b> ".$city."</p><p><b>EMAIL ADDRESS:</b> ".$mail."</p><p><b>CONTACT NUMBER:</b> ".$phno."</p><p><b>CURRENT BALANCE:</b> Rs.".$bal."</p><br>";
            }
        ?>
        <input type="submit" name="sub" class="button" value="Back to Friends List"><br><br>
    </div>
    </form>
    <?php
      include("footer.php");
    ?>
</body>
</html>

<?php
        $na=$_SESSION['name'];
        $acno=$_SESSION['userno'];
?>
<html>
<head>
</head>
<body>
<div id="head">
    <h1>Welcome to The Sharp Foundation International Bank</h1>
    <?php
        echo"<h5>You are logged in as: <b>".$na."</b></h5>";
        echo"<h6>Your Account Number is: <b>61612".$acno."</b></h6>";
    ?>
</div>
</body>
</html>
<?php
    if(isset($_REQUEST['sub']) ){
            header("Location: index.php");
    }
?>
<html>
    <head>
    <?php
        include("header.php");
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <style type="text/css">
        <?php
            include("error.css");
        ?> 
        </style>
    <body>
        <form>
            <div id="main">
                <h2>SESSION ENDED</h2>
                <br>
                <input type="submit" name="sub" class="button" value="BACK TO LOGIN">
                <br><br>    
            </div>
    </form>
<?php
    include("footer.php");
?>
</body>
</html>
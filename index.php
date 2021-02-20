    <?php
//Variables
$nombre = $input = $email = $mobile = $comments = "";
$nombreErr = $inputErr = $emailErr = $mobileErr = $commentsErr = "";
$espacio = "";
$espacioErr = "";
//input Method
function test_input($test){
    $test=htmlspecialchars($test);
    $test=trim($test);
    $test=stripslashes($test);
    return $test;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    //name
    if(empty($_POST["name"])){
        $espacio = "Por favor llenar los espacios en blanco";
    }else{
        $nombre = test_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z]+$/", $nombre)){
            $nombreErr = "* "."<br>";
            $espacioErr= "Por favor revisar los espacios con *";
        }
    }
    //email
    if(empty($_POST["email"])){
        $espacio = "Por favor llenar los espacios en blanco";
    }else{
        $email = "el email es".test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "*";
            $espacioErr= "Por favor revisar los espacios con *";
        }
    }
    //mobile
    if(empty($_POST["mobile"])){
        $espacio = "Por favor llenar los espacios en blanco";
    }else{
        $mobile = test_input($_POST["mobile"]);
        if (!preg_match('/^[0-9]*$/', $mobile)) {
            $mobileErr = "*"."<br>";
            $espacioErr= "Por favor revisar los espacios con *";
        }
    }
    //input
    if(empty($_POST["input"])){
            $espacio = "Por favor llenar los espacios en blanco";
    }else{
        $espacio = test_input($_POST["comments"]);
        if(empty($_POST["input"])){
            $inputErr = "*"."<br>";
        }
    }
    //comments
    if(empty($_POST["comments"])){
        $espacio = "Por favor llenar los espacios en blanco";
    }else{
        $comments = test_input($_POST["comments"]);
        if(!preg_match("/^[a-zA-Z]+$/", $comments)){
            $commentsErr = "*"."<br>";
            $espacioErr= "Por favor revisar los espacios con *";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>form_test</title>
    <style>
    #form_container{
    margin: 50px auto;
    text-align: center;
    width: 400px;
    border: solid;
    padding: 25px;
    }
    </style>
</head>
<body>
    <div id="form_container">
            <form action="index.php" method="POST">
                <?php echo "<b> $espacio </b>"; ?> <br>
                <?php echo "<b> $espacioErr </b>"; ?> <br><br>
                <label> Name</label><br>
                <input type="text" name="name"> 
                <?php echo "<b> $nombreErr </b>"; ?> <br>
                <label> Mobile</label><br>
                <input type="text" name="mobile">
                <?php echo "<b> $mobileErr </b>"; ?> <br>
                <label> Email</label><br>
                <input type="text" name="email"> 
                <?php echo "<b> $emailErr </b>"; ?> <br><br>
                <input type="radio" name="gender" value="Female">Female
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Other">Other <b> </b>  
                <?php echo "<b> $inputErr </b>"; ?> <br><br>
                <label> Comments</label><b> </b> <?php echo "<b> $commentsErr </b>"; ?> <br>
                <textarea name="comment" id="form__comment" cols="30" rows="10"></textarea><br>
                <input type="submit">
            </form>
    </div>

</body>
</html>

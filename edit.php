<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delete</title>
</head>
<body>
<button type="button" onclick="location.href='front.php'">Back</button>
<h1 align="center"></h1>
    <?php
    $link = mysqli_connect('localhost','haobosun','SUNhaobo2002!','2nd milestone');

    if(!$link){
        exit('failed connection');
    }
    //        mysqli_query($link, "set names utf8");
    session_start();
    $del = $_SESSION['del'];
    echo "$del";
    echo "delete has been done";


    $delete = "DELETE FROM employee
                                        WHERE emp_id= '$del' ";
    mysqli_select_db($link, "2nd milestone");
    mysqli_query($link,$delete);
    //        header('location:front.php');

    ?>
</body>
</html>
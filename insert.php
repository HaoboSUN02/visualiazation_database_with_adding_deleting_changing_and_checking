<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add new employee</title>
</head>
<body>
    <h1 align="center">add a new employeee</h1>
    <form action="" method="post" name="inf">
    <p align="center">emp id<input type="text" name="emp_id"></p>
        <p align="center">name<input type="text" name="name"></p>
        <p align="center">address<input type="text" name="addr"></p>
        <p align="center">salary<input type="text" name="sala"></p>
        <p align="center">dob<input type="text" name="dob"></p>
        <p align="center">nin<input type="text" name="nin"></p>
        <p align="center">department<input type="text" name="depart"></p>
        <p align="center">emergency_name<input type="text" name="ename"></p>
        <p align="center">emergency_relationship<input type="text" name="erelation"></p>
        <p align="center">emergency_phone<input type="text" name="ephone"></p>
        <p align="center"><input type="submit" name="insub" value="submit"></p>
    </form>
    <?php
            $link = mysqli_connect('localhost','haobosun','SUNhaobo2002!','2nd milestone');
            if(!$link){
                exit('failed connection');
            }
            if (!empty($_POST["insub"])){
                $emp_id = $_POST['emp_id'];
                $name = $_POST['name'];
                $address = $_POST['addr'];
                $sala = $_POST['sala'];
                $dob = $_POST['dob'];
                $nin = $_POST['nin'];
                $depart = $_POST['depart'];
                $ename = $_POST['ename'];
                $erelation = $_POST['erelation'];
                $ephone = $_POST['ephone'];
                $insert = "INSERT INTO employee".
                    "(emp_id,name,address,salary,dob,nin,department,emergency_name,emergency_relationship,emergency_phone) ".
                "VALUES".
                 "('$emp_id','$name','$address','$sala','$dob','$nin','$depart','$ename','$erelation','$ephone')";
                mysqli_select_db($link,"2nd milestone");
                mysqli_query($link, $insert);
                header(
                        'location:front.php'
                );
            }
    ?>
</body>
</html>
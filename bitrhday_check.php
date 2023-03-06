<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delete</title>
</head>
<body>
<table align="center" border="1px" cellspacing="0ox" width="800px">
    <tr><th>emp_id</th><th>name</th><th>address</th><th>salary</th><th>dob</th><th>nin</th><th>department</th><th>emer_name</th>
        <th>relationship</th><th>emer_phone</th></tr>
<button type="button" onclick="location.href='front.php'">Back</button>
    <?php
    $link = mysqli_connect('localhost','haobosun','SUNhaobo2002!','2nd milestone');

    if(!$link){
        exit('failed connection');
    }

    $store = 'call birthdaycheck();';
    $res = mysqli_query($link,$store);
//    $res = mysqli_query($link, "select * from employee where emp_id like '%9%'");

    while ($row = mysqli_fetch_array($res)) {
        echo '<tr>';
        echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td>";
    }


    ?>

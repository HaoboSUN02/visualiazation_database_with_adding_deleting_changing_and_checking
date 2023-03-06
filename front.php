<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>abacd</title>
</head>
<body>
<h1 align="center">information</h1>
<form action="" method="post" name="indexf">
    <p align="center"><input type="button" value="add" name="inbut" onClick="location.href='insert.php'"></p>
    <p align="center"><input type="button" value="looking for birthdays" onClick="location.href='bitrhday_check.php'"></p>
    <p align="center"><input type="button" value="search for department and relationships" name="inbut" onClick="location.href='search.php'"></p>
    <p align="center"><input type="text" name="sel"/><input type="submit" value="search" name="selsub"></p>
    <table align="center" border="1px" cellspacing="0ox" width="800px">
        <tr><th>emp_id</th><th>name</th><th>address</th><th>salary</th><th>dob</th><th>nin</th><th>department</th><th>emer_name</th>
            <th>relationship</th><th>emer_phone</th></tr>
        <?php
        session_start();
        $link = mysqli_connect('localhost','haobosun','SUNhaobo2002!','2nd milestone');

        if(!$link){
            exit('failed connection');
        }
        mysqli_query($link, "set names utf8");
        if (empty($_POST["selsub"])){
            $res = mysqli_query($link, "select * from employee order by emp_id");
        }
        else{
            $sel = $_POST["sel"];
            $res = mysqli_query($link, "select * from employee where emp_id like '%$sel%' or name like '%$sel%' or address like '%$sel%' or salary like '%$sel%' or dob like '%$sel%' or nin like '%$sel%' or department like '%$sel%' or emergency_name like '%$sel%' or emergency_relationship like '%$sel%' or emergency_phone like '%$sel%'");
        }
        while ($row = mysqli_fetch_array($res)){
            echo '<tr>';
            echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td>
            <td>
            <input type='submit' name='upsub$row[0]' value='edit' />
            <input type='submit' name='delsub$row[0]' value='delete' />
            </td>";
            echo '</tr>';
            if (!empty($_POST["upsub$row[0]"])){//edition
                echo '<tr align="center">';
                echo "<td>$row[0]</td>
                      <td><input type = 'text' name ='upen' value='$row[1]'/></td>
                      <td><input type = 'text' name ='upea' value='$row[2]'/></td>
                      <td><input type = 'text' name ='upes' value='$row[3]'/></td>
                      <td><input type = 'text' name ='uped' value='$row[4]'/></td>
                      <td><input type = 'text' name ='upenin' value='$row[5]'/></td>
                      <td><input type = 'text' name ='upedepart' value='$row[6]'/></td>
                      <td><input type = 'text' name ='uperelationname' value='$row[7]'/></td>
                      <td><input type = 'text' name ='uperelation' value='$row[8]'/></td>
                      <td><input type = 'text' name ='upep' value='$row[9]'/></td>
                      <td><input type = 'submit' value = 'confirm' name ='upsubs$row[0]'/></td>";
                echo '</tr>';
            }
            if (!empty($_POST["upsubs$row[0]"])) {
                $upen = $_POST['upen'];
                $upea = $_POST['upea'];
                $upes = $_POST['upes'];
                $uped = $_POST['uped'];
                $upenin = $_POST['upenin'];
                $upedepart = $_POST['upedepartment'];
                $uperelationname = $_POST['uperelationname'];
                $uperelation = $_POST['uperelation'];
                $upep = $_POST['upep'];

                $update = "UPDATE employee
                           SET name='$upen',
                        address='$upea',
                        salary='$upes',
                        dob='$uped',
                        nin='$upenin',
                        department='$upedepart',
                        emergency_name='$uperelationname',
                        emergency_relationship='$uperelation',
                        emergency_phone='$upep'
                        WHERE emp_id='$row[0]'
                           ";
                mysqli_select_db($link, "2nd milestone");
                mysqli_query($link, $update);
//                header('location:#');
            }
            if (!empty($_POST["delsub$row[0]"])){//开启缓存
                $_SESSION['del'] = $row[0];
//                echo '<script>
//                    var person=prompt("Type your emp_id","00000");
//                    </script>';
//                $keyword="<script>document.writeln(person);</script>";
//                echo "$keyword";
//                $_SESSION['log_id'] = "<script>document.writeln(person);</script>";
                echo '<script>
//                if (person!=null && person!=""){

                    if (confirm("delete or not?") == true){
                        location.href= "operid.php";
                    }
//                    }
                        </script>';



//                $delete = "DELETE FROM employee
//                                    WHERE emp_id= '$row[0]' ";
//                mysqli_select_db($link, "2nd milestone");
//                mysqli_query($link,$delete);
////                header('location:#');
//                $insert = "insert into delete_emp".
//                    "(emp_id_log)".
//                    "values ".
//                    "('$keyword')";
//                echo "$insert";
//                mysqli_select_db($link, "2nd milestone");
//                mysqli_query($link,$insert);


            }
//        if (!empty($_POST["delsub$row[0]"])){
//            mysqli_query($link,"delete from employee where emp_id=$row[0]");
//            header('location:#');
//        }

        }
        mysqli_close($link);
        ?>



    </table>
</form>


</body>
</html>
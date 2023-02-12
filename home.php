<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&family=Montserrat+Alternates:ital,wght@0,100;1,500;1,600&family=Poppins:ital,wght@0,300;1,200&family=Tajawal:wght@500&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="style.css">
</head>
<body dir="rtl">
    <?php
    #الاتصال مع قاعدة البيانات
    $host ='localhost';
    $user= 'root';
    $pass='';
    $db='student';
    $con=mysqli_connect($host,$user,$pass,$db);
    $query="SELECT * FROM student";
    $result=mysqli_query($con,$query);
    #button vars
    $id='';
    $name='';
    $adress='';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['adress'])){
        $adress=$_POST['adress'];
    }

    $sqls='';
    if(isset($_POST['add'])){
        $sqls="INSERT INTO student VALUE($id,'$name','$adress')";
        mysqli_query($con,$sqls);
      header("location:home.php");
    }
    if(isset($_POST['del'])){
        $sqls="DELETE FROM student WHERE NAME='$name'";
        mysqli_query($con,$sqls);
        header("location:home.php");
    }
    ?>
    <div id='mother'>
        <form action="" method='POST'>
            <!-- لوحة التحكم -->
            <aside>
                <div id='div'>
                    <img src="images/Header-1.webp" width="80%" height="190px" alt="لوجو الموقع">
                    <h3>لوحة المدير</h3>
                    <label>:رقم الطالب</label><br>
                    <input type="text" name="id" id="id"><br>
                    <label>:اسم الطالب</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label>:عنوان الطالب</label><br>
                    <input type="text" name="adress" id="adress"><br><br>
                    <button name="add">اضافة طالب</button>
                    <button name="del">حذف الطالب</button>
                </div>
            </aside>
            <main>
    <!-- عرض بيانات الطلاب -->
             <table id="tbl">
                <tr>
                    <th>الرقم التسلسلي </th>
                    <th>اسم الطالب</th>
                    <th>عنوان الطالب</th>

                </tr>
                    <?php
                        while($row=mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['adress']."</td>";
                            "</tr>";
                        }
                    ?>

             </table>
            </main>
        </form>
    </div>
</body>
</html>
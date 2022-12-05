<?php
session_start();
$conn = mysqli_connect('localhost','root','','board');
if(!$conn){
echo "数据库连接失败";
}

$username = $_POST['username'];
$password = $_POST['password'];


if($username && $password){
        $_SESSION['username'] = $username;
        $result = mysqli_query($conn,"select * from users where username = '$username' and password = '$password'");

        $row = mysqli_fetch_assoc($result);
        //echo $row['username'] . "" . $row['password'] . PHP_EOL;
        if($row > 0){
//                $_SESSION['username'] = $username;
                echo "  <script>alert('登录成功');window.location.href='index.php';</script>
             ";
        }elseif($row['username'] == $username){
            echo "<script>alert('密码错误，请重新输入');window.location.href='login.html';</script>";
        }else {

                echo "<script>alert('该用户不存在，请注册')</script>";
                echo "<script>window.location.href='register.html';</script>";
        }
}else{
        echo "<script>alert('用户名或密码为空');</script>";
        echo "<script>window.location.href='login.html';</script>";
}
?>
root

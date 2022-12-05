<?php

//连接数据库
$conn = mysqli_connect('localhost','root','');
if(!$conn){
        echo " 数据库连接失败" . mysqli_error() . PHP_EOL;
}

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_REQUEST['email'];


//创建数据
mysqli_select_db ($conn,'board');

if($username && $password){
        $sql_select = "select username from users where username='$username'";
        $row = mysqli_fetch_assoc(mysqli_query($conn,$sql_select));
        $pattern = "^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$";
        echo $row['username'];
        if($row > 0){
                echo "<script>alert('用户名已存在');window.location.href='register.html';</script>";
        }
	//elseif(!preg_match($email)){  
	//	echo "<script>alert('邮箱格式错误');window.location.href='register.html';</script>";
        //}
        else{
                $sql_insert = "insert into users (username,password,email) values('$username','$password','$email')";
                mysqli_query($conn,$sql_insert);
                echo "<script>alert('用户注册成功');window.location.href='login.html';</script>";
        }
}
else{
        echo "  <script>alert('用户名或密码为空');window.location.href='register.html';</script>";
}
?>

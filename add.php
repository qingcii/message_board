<?php
session_start();
if(empty($_SESSION['username'])){
	echo "<script>alert('请先登录');window.location.href='login.html';</script>";
//	header('Location:login.html');
}

$conn = mysqli_connect('localhost','root','','board');
if(!$conn){
        echo "数据库连接失败";
}

$username = $_POST['username'];
$email = $_POST['email'];
$content = $_POST['content'];

$refer = mysqli_query($conn,"select * from users where username='$username'");
$dat = mysqli_fetch_assoc($refer);
if($username && $content && $email){
    if($dat['username'] == $username){
            $sql_into = "insert into content (username,email,messages,date) values('$username','$email','$content',now())";
            mysqli_query($conn,$sql_into);
            echo "<script>alert('留言成功');window.location.href='index.php';</script>";
            // echo "
            //         <script>
            //             setTimeout(function(){window.location.href='index.php';},1000);
            //         </script>";
    }else{
            echo "<script>alert('当前用户未登录，请登录后留言');window.location.href='login.html';</script>";
    }
}else{
    echo"<script>alert('请勿留空');window.location.href='index.php';</script>";
}

?>

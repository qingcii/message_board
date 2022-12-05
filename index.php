<html>
<head>
<title>留言板</title>
</head>
<body>
<?php

?>
<div>
        <a href="login.html"><input type="button" name="lgoin" value="登录"></a>
        <a href="register.html"><input type="button" name="register.html" value="注册"></a>
        <a href="logout.php"><input type="button" name="logout.php" value="登出"></a>
</div>

<div id="form">
        <form action="add.php" method="post">
            <p>用户名：<input type="text" name="username" /></p>
            <p>邮&nbsp&nbsp箱：<input type="text" name="email" /></p>
            <p>留&nbsp&nbsp言：<textarea name="content" row="5" cols="20"></textarea></p>
            <p><input type="submit" name="submit" value="提交留言"/></p>
</div>



        <?php
                $conn = mysqli_connect('localhost','root','','board');
                $sql = "select * from content order by id desc";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                                echo "<pre>";
                                echo '<p>第' . $row['id'] . '楼:</p>';
                                echo '<p>留言人:' . $row['username'] . '</p>';
                                echo '<p>留言内容:' . $row['messages'] . '</p>';
                                echo '<p>留言时间:' . $row['date'] . '</p>';
				echo '----------------------------------------';
                        }
                }else{
                        echo"无数据";
                }



?>


</body>
</html>

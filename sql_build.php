<?php
$conn = mysqli_connect('localhost','root','');
if(!$conn){
	echo "Could not connect to mysql:" . mysqli_error();
}
else{
	echo "数据库连接成功" . PHP_EOL;
}
//mysqli_close($conn);

//创建数据库
$sql = "create database board";
if ($conn->query($sql) === TRUE) {
	echo "数据库board创建成功" . PHP_EOL;
}else{
	echo " Error creatinng database:" . $conn->error;
}


//使用数据库board

mysqli_select_db($conn,"board");
//创建数据表user
$sql = "create table users(
	id INT(6) unsigned auto_increment primary key,
	username varchar(30) not null,
	password varchar(30) not null,
	email varchar(50) not null
	)";
 

if (mysqli_query($conn,$sql)) {
        echo "数据表users创建成功" . PHP_EOL;
}else{
        echo " Error creatinng database:" . mysqli_error($conn);
}

//创建数据表content
$tb_content = ("create table content(
	id int(6) unsigned auto_increment primary key,
	username varchar(30) not null,
	email varchar(50) not null,
	messages varchar(200) not null,
	date timestamp NOT NULL
	)");
if(mysqli_query($conn,$tb_content)){
	echo "数据表content创建成功" . PHP_EOL;
}else{
	echo "数据表content创建失败：" . mysqli_error();}

//mysqli_close($conn);
?>

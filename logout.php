<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<html>
<body>
<script>alert("成功登出");window.location.href='index.php';</script>
</body>
</html>

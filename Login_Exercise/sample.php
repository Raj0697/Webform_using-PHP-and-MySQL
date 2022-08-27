<html>
<body>
<?php
echo"referer:".$_SERVER["HTTP_HOST"]."<br/>";
echo"browser:".$_SERVER["HTTP_USER_AGENT"]."<br/>";
echo"user's ip address:".$_SERVER["REMOTE_ADDR"];
?>
</body>
</html>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>分页</title>

   <?php

 

//分页的函数

function news($pageNum = 1, $pageSize = 3)

{

    $array = array();

    $coon = mysqli_connect("localhost", "root","123456");

    mysqli_select_db($coon, "itcast");

    mysqli_set_charset($coon, "utf8");

    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度

    $rs = "select * from user_info limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;

    $r = mysqli_query($coon, $rs);

    while ($obj = mysqli_fetch_object($r)) {

        $array[] = $obj;

    }

    mysqli_close($coon,"itcast");

    return $array;

}

 

//显示总页数的函数

function allNews()

{

    $coon = mysqli_connect("localhost", "root");

    mysqli_select_db($coon, "itcast");

    mysqli_set_charset($coon, "utf8");

    $rs = "select count(*) num from user_info"; //可以显示出总页数

    $r = mysqli_query($coon, $rs);

    $obj = mysqli_fetch_object($r);

    mysqli_close($coon,"itcast");

    return $obj->num;

}

 

    @$allNum = allNews();

    @$pageSize = 3; //约定没页显示几条信息

    @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];

    @$endPage = ceil($allNum/$pageSize); //总页数

    @$array = news($pageNum,$pageSize);

    ?>

</head>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<body style="background: #EEEEEE;">

<table border="1" cellpadding="0" cellspacing="0" style="width: 100%; border: solid 1px #eee; background: white; text-align: center" cellpadding="0" id="tb">

    <tr>

        <td>用户名</td>

        <td>邮箱</td>

        <td>性别</td>

        <td>访问次数</td>

        

    </tr>

    <?php

    foreach($array as $key=>$values){

        echo "<tr>";

        echo "<td>{$values->username}</td>";

        echo "<td>{$values->email}</td>";

        echo "<td>{$values->sex}</td>";

        echo "<td>{$values->count}</td>";

        

        echo "</tr>";

    }

    ?>

</table>

<div id="p">

    <a href="?pageNum=1">首页</a>

    <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>

    <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>

    <a href="?pageNum=<?php echo $endPage?>">尾页</a>

 

</div>

 

</body>

</html>
<style type="text/css">
	
</style>
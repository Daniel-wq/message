<?php 
header('Content-type:text/html;charset=utf-8');
function p($var){
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}
//创建message函数，用来进行操作完成后的提示及页面跳转
function message(){
    $str = <<<str
<script>
alert('操作完成');
//跳转到index.php页面
location.href = 'index.php';
</script>
str;
//必须输出$str，函数才算完成
echo $str;
exit;
}

//设置时区
date_default_timezone_set('PRC');

//定义是否是POST提交的常量
define('IS_POST',($_SERVER['REQUEST_METHOD'] == 'POST') ? true : false);








 ?>
<?php
//1、载入函数文件；2、为了以后要使用p函数及message函数，还有设置时区，还有判断IS_POST。
include '../functions.php';
//1、载入数据库并将返回的数据库信息返回给$data；2、为了把追加好的数组写入数据库文件中。
$data = include './data.php';
//1、当用户点击‘发表’按钮时，判断是POST请求，此时IS_POST返回true,就运行以下代码；2、只有在点击‘发表’按钮时才执行，其他情况IS_POST返回false（如刷新页面）不执行该判断语句，直接进入下阶段的代码。
if (IS_POST){
    //1、获得发布信息时刻的时间；2、为了在页面中显示发布信息时间。
    $_POST['time'] = date('Y-m-d H:i:s');
    //1、向数据库中追加留言信息；2、为了将新追加的信息加入数据库$data中。
    array_push($data,$_POST);
    //1、把追加信息后的数据库中的代码合法化,并且组合成完整代码；2、为了代码可以直接使用，所以要把代码合法化（用var_export打印），为了使用时，代码输出与原数据库代码格式相同，所以需要将合法化的代码用连字符组合成完整代码（\r\n是换行、空格，由于有些浏览器有可能不识别\r或\n，保险起见，两个都写，return后面有个空格，是因为在数据库中，return和数据之间有空格）。
    $code = "<?php\r\nreturn " . var_export($data,true) . '?>';
    //1、将数据写入数据库文件（data.php）中；2、为了将信息存入数据库中，这样才能在页面显示；
    file_put_contents('./data.php',$code);
    //1、引入message函数；2、为了进行操作完成后的窗口提示及页面跳转。
    message();
}

//1、载入模板文件；2、因为index.html里有php代码，用页面直接打开，浏览器不会解析其中的php代码，会把其中的php代码原样输出，因此php代码需要写在php环境中，而在该文件中载入index.html文件，就相当于把index.html文件复制在index.php里了，浏览器就可以解析index.html里的php代码。
include './tpl/index.html';






?>
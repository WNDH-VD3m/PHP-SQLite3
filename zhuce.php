<?php

try

{
    $db = new PDO('sqlite:demo4.db');

    $username = $_POST [ 'username' ];
    $password = $_POST [ 'password' ];
    $confirm = $_POST [ 'confirm' ];
    $email = $_POST [ 'email' ];

    if ( $username == "" || $password == "" || $confirm == "" || $email == "" )
    {
        echo "<script>alert('信息不能为空！重新填写');window.location.href='zhuce.html'</script>" ;
    } elseif (( strlen ( $username ) < 3)||(!preg_match( '/^\w+$/i' , $username ))) {
        echo "<script>alert('用户名至少3位且不含非法字符！重新填写');window.location.href='zhuce'</script>" ;
        //判断用户名长度
    } elseif ( strlen ( $password ) < 5){
        echo "<script>alert('密码至少5位！重新填写');window.location.href='zhuce.html'</script>" ;
        //判断密码长度
    } elseif ( $password != $confirm ) {
        echo "<script>alert('两次密码不相同！重新填写');window.location.href='zhuce.html'</script>" ;
        //检测两次输入密码是否相同
    } elseif (!preg_match( '/^[\w\.]+@\w+\.\w+$/i' , $email )) {
        echo "<script>alert('邮箱不合法！重新填写');window.location.href='zhuce.html'</script>" ;
        //判断邮箱格式是否合法
    } else{
        $db->exec("INSERT INTO login (username, password, confirm, email) VALUES ('$username','$password','$confirm','$email')");
    }

}

catch (PDOException $e)
{
    print 'Exception: ' . $e->getMessage();
}


?>


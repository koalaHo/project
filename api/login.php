<?php

$con = mysqli_connect('localhost','root','123456','project');

  $username = $_POST['username'];
  $password = $_POST['password'];
// $username = "koala";
// $password = "1234567";

  $sql = "SELECT * FROM `userlist` WHERE `username`='$username' AND `password`='$password'";

  $res = mysqli_query($con,$sql);

  if (!$res) {
    die('error for mysql: ' . mysqli_error());
  }

  $row = mysqli_fetch_assoc($res);

  if (!$row) {
    // 没有匹配的数据 登录失败
    echo json_encode(array(
      "code" => 0,
      "message" => "登陆失败"
    ));
  } else {
    // 有匹配的数据 登录成功
    echo json_encode(array(
      "code" => 1,
      "message" => "登录成功"
    ));
  }

?>
<?php
    
    $con = mysqli_connect('localhost','root','123456','project');

        // 请求第一页数据 传过来的start = 1 len = ? 请求的数据为0-?
        // 请求第二页数据 传过来的start = 2 len= ?  请求的数据为30-59 
        // 请求第三页数据 传过来的start = 3 len = ? 请求的额数据为 60 89  60
    $start = $_GET['start'];
    $len = $_GET['len'];
    $name=$_GET['name'];

    // print_r($start);
    // print_r($len);
    // $start = 1;
    // $len = 20;
    // $name = "套头";
    $s = ($start-1)*$len;
    // print_r($s);
    $sql = "SELECT * FROM `data` WHERE `name` LIKE '%$name%' LIMIT $s,$len";
    # 执行SQL语句
    $res = mysqli_query($con,$sql);
    //  ($res);
    if(!$res){
        die('error' . mysqli_error($con));
    };

    $dataArr = array();

    $row = mysqli_fetch_assoc($res);
    while($row){
        array_push($dataArr,$row);
        $row = mysqli_fetch_assoc($res);
    }
    # $row 得到的是当前请求的len条数据
    $sql2 = "SELECT COUNT(*) `count` FROM `data` WHERE `name` LIKE '%$name%'";
    $res2 = mysqli_query($con,$sql2);
  
    if (!$res2) {
      die('error for mysql: ' . mysqli_error($con));
    }
    $row2 = mysqli_fetch_assoc($res2);
    # 得到数据的总数量 
    # 需要把商品数据 和总数量都返回 给前端


    echo json_encode(array(
      "total" => $row2['count'],
      "list" => $dataArr,
      "code" => 1,
      "message" => "获取列表数据成功"
    ));
?>
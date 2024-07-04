<?php
require_once('funcs.php');
//POSTデータ取得
$pid = $_POST['pid'];
$country = $_POST['country'];
$post_code = $_POST['post_code'];
$province = $_POST['province'];
$city = $_POST['city'];
$address_line1 = $_POST['address_line1'];
$address_line2 = $_POST['address_line2'];
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE 
                          TPP01
                       SET
                          country = :country,
                          post_code= :post_code,
                          province = :province,
                          city = :city,
                          address_line1 = :address_line1,
                          address_line2 = :address_line2
                        WHERE pid = :pid;
                        ');



  // Integer 数値の場合 PDO::PARAM_INT
  // String文字列の場合 PDO::PARAM_STR
  $stmt->bindValue(':pid', $pid, PDO::PARAM_INT);
  $stmt->bindValue(':country', $country, PDO::PARAM_STR);
  $stmt->bindValue(':post_code', $post_code, PDO::PARAM_INT);
  $stmt->bindValue(':province', $province, PDO::PARAM_STR);
  $stmt->bindValue(':city', $city, PDO::PARAM_STR);
  $stmt->bindValue(':address_line1', $address_line1, PDO::PARAM_STR);
  $stmt->bindValue(':address_line2', $address_line2, PDO::PARAM_STR);
  $status = $stmt->execute(); //実行

    //４．データ登録処理後
    if($status === false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        $error = $stmt->errorInfo();
        exit('ErrorMessage:'.$error[2]);
      }else{
        //５．index.phpへリダイレクト
        header('Location: table.php');
      }



?>
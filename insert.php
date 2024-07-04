<?php
require_once('funcs.php');
//POSTデータ取得
$country = $_POST['country'];
$post_code = $_POST['post_code'];
$province = $_POST['province'];
$city = $_POST['city'];
$address_line1 = $_POST['address_line1'];
$address_line2 = $_POST['address_line2'];
$pdo = db_conn();

// echo "country" . $country ."post_code" . $post_code

//本番環境データベース
// $prob_db = "kichijoji55_hotel_db";
// //本番環境ホスト
// $prob_host = "mysql635.db.sakura.ne.jp";
// //本番環境ID
// $prob_id = "kichijoji55";
// //本番環境PW
// $prob_pw = "nakamura0121";

//2. DB接続
// //ID:'root', Password: xamppは 空白 ''
// try {
//     // $pdo = new PDO('mysql:dbname='. $prob_db .';charset=utf8;host='. $prob_host , $prob_id, $prob_pw);
//     $pdo = new PDO('mysql:dbname=kichijoji55_hotel_db;charset=utf8;host=localhost', 'root', '');
//   } catch (PDOException $e) {
//     exit('DBConnectError:'.$e->getMessage());
//   }
  
  //３．データ登録SQL作成
//   $stmt = $pdo->prepare('INSERT INTO TPP01(pid, country, post_code, province, city, address_line1, address_line2, date) VALUES (NULL,"JP","1800002","東京","武蔵野市吉祥寺東町","４丁目ー７−２６","あああ",now())');
  
//   $stmt = $pdo->prepare('INSERT INTO TPP01(pid, country, post_code, province, city, address_line1, address_line2, date) VALUES (NULL,:country,"1800002","東京","武蔵野市吉祥寺東町","４丁目ー７−２６","あああ",now())');
  
  $stmt = $pdo->prepare('INSERT INTO TPP01(pid, country, post_code, province, city, address_line1, address_line2, date) VALUES(NULL , :country, :post_code, :province, :city, :address_line1, :address_line2, now())');
  
  //  2. バインド変数を用意


  // Integer 数値の場合 PDO::PARAM_INT
  // String文字列の場合 PDO::PARAM_STR
  $stmt->bindValue(':country', $country, PDO::PARAM_STR);
  $stmt->bindValue(':post_code', $post_code, PDO::PARAM_INT);
  $stmt->bindValue(':province', $province, PDO::PARAM_STR);
  $stmt->bindValue(':city', $city, PDO::PARAM_STR);
  $stmt->bindValue(':address_line1', $address_line1, PDO::PARAM_STR);
  $stmt->bindValue(':address_line2', $address_line2, PDO::PARAM_STR);

  //  3. 実行
  $status = $stmt->execute();
  
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
  
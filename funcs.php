<?php

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。

function db_conn(){

    try{
        //開発環境
        $prob_db = 'hotel_db'; //データベース名
        $prob_id   = 'root'; //アカウント名
        $prob_pw   = ''; //パスワード：MAMPは'root'
        $prob_host = 'localhost'; //DBホスト

        //本番環境
        // $prob_db = "kichijoji55_hotel_db";
        // $prob_host = "mysql635.db.sakura.ne.jp";
        // $prob_id = "kichijoji55";
        // $prob_pw = "nakamura0121";



        $pdo = new PDO('mysql:dbname=' . $prob_db . ';charset=utf8;host=' . $prob_host, $prob_id, $prob_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)

function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}


//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header('Location: '. $file_name);
    exit();
}





?>
<?php
require_once('funcs.php');

$pid = $_GET['pid'];
$pdo = db_conn();
$stmt = $pdo->prepare('DELETE FROM TPP01 WHERE pid = :pid');
$stmt -> bindValue(':pid', $pid, PDO::PARAM_INT);
$status = $stmt->execute();


//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('table.php');
}


?>


<?php
require_once('funcs.php');

$pid = $_GET['pid'];
$pdo = db_conn();
//登録内容を抽出する
$stmt = $pdo->prepare('SELECT * FROM TPP01 WHERE pid = :pid;');
$stmt -> bindValue(':pid', $pid, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
$view = '';
if ($status === false) {
    sql_error($stmt);
} else {
    $result = $stmt->fetch();
    if ($pid > 0){
        $action .= 'update.php';
        $view .= '<input type="submit" class="Form-Btn" value="更新する">';
    }else {
        $action .= 'validation.php';
        $view .= '<input type="submit" class="Form-Btn" value="送信する">';
    }
}



?>



<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/reset.css"> -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form method="post" action="<?=  $action ?>">
    <div class="Form">
    <div class="Form-Item">
        <p class="Form-Item-Label">
        <span class="Form-Item-Label-Required">必須</span>国/地域
        </p>
        <input type="text" class="Form-Item-Input" name="country" placeholder="日本 - JP" disabled>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>郵便番号</p>
        <input type="text" class="Form-Item-Input" name="post_code" placeholder="例）012-3456" value="<?= $result['post_code'] ?>" required>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>都道府県</p>
        <input type="text" class="Form-Item-Input" name="province" placeholder="例）東京都" value="<?= $result['province'] ?>" required>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>市/郡/区</p>
        <input type="text" class="Form-Item-Input" name="city" placeholder="例）渋谷区" value="<?= $result['city'] ?>" required>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>番地</p>
        <input type="text" class="Form-Item-Input" name="address_line1" placeholder="例）１丁目１番地" value="<?= $result['address_line1'] ?>" required>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label"><span class="Form-Item-Label-Optional">任意</span>建物名、部屋番号</p>
        <input type="text" class="Form-Item-Input" name="address_line2" placeholder="例）１０１号室" value="<?= $result['address_line2'] ?>" >
    </div>
    <!-- <div class="Form-Item">
        <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>お問い合わせ内容</p>
        <textarea class="Form-Item-Textarea"></textarea>
    </div> -->

    <input type="hidden" class="Form-Item-Validation" name="pid" value="<?= $result['pid'] ?>">
    <input type="hidden" class="Form-Item-Validation" name="country" value="<?= $result['country'] ?>">
    <?= $view ?>
    
    </div>
</form>
    
</body>
</html>
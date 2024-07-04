<?php
//POSTデータ取得
$country = $_POST['country'];
$post_code = $_POST['post_code'];
$province = $_POST['province'];
$city = $_POST['city'];
$address_line1 = $_POST['address_line1'];
$address_line2 = $_POST['address_line2'];


?>


<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<form method="post" action="insert.php">
    <div class="Form">
    <div class="Form-Item">
        <p class="Form-Item-Label">国/地域</p>
        <span>JP</span>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label">郵便番号</p>
        <SPAN><?php echo htmlspecialchars($post_code); ?></SPAN>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label">都道府県</p>
        <SPAN><?php echo htmlspecialchars($province); ?></SPAN>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label">市/郡/区</p>
        <SPAN><?php echo htmlspecialchars($city); ?></SPAN>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label">番地</p>
        <SPAN><?php echo htmlspecialchars($address_line1); ?></SPAN>
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label">建物名、部屋番号</p>
        <SPAN><?php echo htmlspecialchars($address_line2); ?></SPAN>
    </div>

        <!-- 隠しフィールドによる選択肢の送信 -->
        <input type="hidden" class="Form-Item-Validation" name="country" value="JP">
        <input type="hidden" class="Form-Item-Validation" name="post_code" value="<?= $post_code?>">
        <input type="hidden" class="Form-Item-Validation" name="province" value="<?= $province?>">
        <input type="hidden" class="Form-Item-Validation" name="city" value="<?= $city?>">
        <input type="hidden" class="Form-Item-Validation" name="address_line1" value="<?= $address_line1?>">
        <input type="hidden" class="Form-Item-Validation" name="address_line2" value="<?= $address_line2?>">


    <div class="Form-Item">
    <input type="button" class="Form-Btn" value="戻る" onClick="history.back()">
    <input type="submit" class="Form-Btn" value="登録する">
    </div>
</form>

</body>
</html>
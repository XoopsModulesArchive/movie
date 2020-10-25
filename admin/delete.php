<?php

include '../../../mainfile.php';
include '../../../include/cp_header.php';
xoops_cp_header();
OpenTable();
?>
<html>
<body>
<?php
//MySQLへ接続
$host = XOOPS_DB_HOST;
$user = XOOPS_DB_USER;
$pass = XOOPS_DB_PASS;
$name = XOOPS_DB_NAME;
$pref = XOOPS_DB_PREFIX;
// DBに接続
$connect = @mysql_connect($host, $user, $pass);
if (!$connect) {
    die($GLOBALS['xoopsDB']->error());
}
// DBを選択
$select = mysqli_select_db($GLOBALS['xoopsDB']->conn, $name, $connect);
if (!$select) {
    die($GLOBALS['xoopsDB']->error($connect));
}
//データをテーブルxoops_movieから削除するQueryの作成
$movie_id = $_POST['movie_id'];
$MyQuery = "delete from xoops_xoops_movie where movie_id='$movie_id' ";
//Queryの実行
if (!$MyResult = $GLOBALS['xoopsDB']->queryF($MyQuery)) {
    echo '削除error';

    exit;
}
    //終了メッセージ
    echo '削除しました！';

//MySQLから切断
$GLOBALS['xoopsDB']->close($connect);
?>
<form action="list.php" method="post">
    <input type="submit" name="exec" value="更新メニューへ戻る">
</form>
</body>
</html>
<?php
CloseTable();
xoops_cp_footer();
?>

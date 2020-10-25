<?php

include '../../../mainfile.php';
include '../../../include/cp_header.php';
xoops_cp_header();
OpenTable();
?>
<html>
<body>
<?php
//register_globals = Off対策
$movie_id = $_POST['movie_id'];
$movie_title = $_POST['movie_title'];
$play_time = $_POST['play_time'];
$movie = $_POST['movie'];
$directory = $_POST['directory'];
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
//Queryの実行
$MyQuery = "select movie_id,movie_title,play_time,movie,directory from xoops_xoops_movie where movie_id='$movie_id'";
if (!$MyResult = $GLOBALS['xoopsDB']->queryF($MyQuery)) {
    echo 'Query error';

    exit;
}
//データ取り込み
if (!$MyResultRow = $GLOBALS['xoopsDB']->fetchBoth($MyResult)) {
    echo 'データは削除されています';

    exit;
}
//入力画面表示
echo '<b>[登録データの変更]</b>-------------------<br><br>';
echo 'Xoops_Movie:' . $MyResultRow['movie_id'];
echo '<form action=updateexec.php method=post>';
echo '<input type=hidden name=movie_id value=' . $MyResultRow['movie_id'] . '>';
echo 'タイトル：<input type=text name=movie_title value="' . $MyResultRow['movie_title'] . '"><br>';
echo '再生時間/サイズ：<input type=text name=play_time value="' . $MyResultRow['play_time'] . '"><br>';
echo '説明：<input type=text name=movie value=' . $MyResultRow['movie'] . '><br>';
echo 'ファイルurl：<input type=text name=directory value="' . $MyResultRow['directory'] . '"><br>';
echo '<input type=submit value=更新>';
echo '</form>';
//Result解放
$GLOBALS['xoopsDB']->freeRecordSet($MyResult);
//MySQLから切断
$GLOBALS['xoopsDB']->close($connect);
?>
<br><br>
<form action="index.php" method="post">
    <input type="submit" name="exec" value="Mainメニューへ戻る">
</form>
</body>
</html>
<?php
CloseTable();
xoops_cp_footer();
?>

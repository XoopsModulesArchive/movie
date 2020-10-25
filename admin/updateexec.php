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
//修正データをテーブルxoops_movieに更新するQueryの作成
echo '<table border=1>';
echo " <tr><td bgcolor=lightcyan>id</td><td>$movie_id</td></tr>";
echo " <tr><td bgcolor=lightcyan>タイトル</td><td>$movie_title</td></tr>";
echo " <tr><td bgcolor=lightcyan>再生時間</td><td>$play_time</td></tr>";
echo " <tr><td bgcolor=lightcyan>説明</td><td>$movie</td></tr>";
echo " <tr><td bgcolor=lightcyan>動画ファイル（アドレス）</td><td>$directory</td></tr>";
echo '</table>';
$MyQuery = "update xoops_xoops_movie set movie_title='$movie_title', play_time='$play_time', movie='$movie', directory='$directory' where movie_id='$movie_id'";
//Queryの実行
if (!$MyResult = $GLOBALS['xoopsDB']->queryF($MyQuery)) {
    echo '更新error';

    exit;
}
    //終了メッセージ
    echo '更新しました！';

//MySQLから切断
$GLOBALS['xoopsDB']->close($connect);
?>
<br><br>
<form action="list.php" method="post">
    <input type="submit" name="exec" value="更新メニューへ戻る">
</form>
</body>
</html>
<?php
CloseTable();
xoops_cp_footer();
?>

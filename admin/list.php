<?php

include '../../../mainfile.php';
include '../../../include/cp_header.php';
xoops_cp_header();
OpenTable();
?>
<html>
<body>
<b>[登録済データ 全表示]</b><br>
<?php
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
//入力データをテーブルxoops_movieに登録するQueryの作成
$MyQuery = 'SELECT movie_id,movie_title,play_time,movie,directory FROM xoops_xoops_movie ORDER BY movie_id';
//Queryの実行
$MyResult = $GLOBALS['xoopsDB']->queryF($MyQuery);
//表示
echo '<table border=1>';
echo "<tr bgcolor='lightblue'><td>ID</td><td>タイトル</td><td>再生時間</td><td>説明</td><td>ファイルアドレス</td><td colspan='2'>Update/Delete</td></tr>";
while (false !== ($MyResultRow = $GLOBALS['xoopsDB']->fetchBoth($MyResult))) {
    echo '<tr>';

    echo '<td>' . $MyResultRow['movie_id'] . '</td>';

    echo '<td>' . $MyResultRow['movie_title'] . '</td>';

    echo '<td>' . $MyResultRow['play_time'] . '</td>';

    echo '<td>' . $MyResultRow['movie'] . '</td>';

    echo '<td>' . $MyResultRow['directory'] . '</td>';

    echo '<form action=update.php method=post>';

    echo '<input type=hidden name=movie_id value=' . $MyResultRow['movie_id'] . '>';

    echo '<td><input type=submit value=変更></td>';

    echo '</form>';

    echo '<form action=delete.php method=post>';

    echo '<input type=hidden name=movie_id value=' . $MyResultRow['movie_id'] . '>';

    echo '<td><input type=submit value=削除></td>';

    echo '</form>';

    echo '</tr>';
}
echo '</table>';
//MySQLから切断
$GLOBALS['xoopsDB']->close($connect);
?>
<br>
表示完了
<form action="index.php" method="post">
    <input type="submit" name="exec" value="Mainメニューへ戻る">
</form>
</body>
</html>
<?php
CloseTable();
xoops_cp_footer();
?>

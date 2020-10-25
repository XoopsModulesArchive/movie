<?php

include '../../../mainfile.php';
include '../../../include/cp_header.php';
xoops_cp_header();
OpenTable();
?>
<html>
<body>
<br>
<b>[登録データ検索]</b>---------------<br><br>
以下の１つのみの条件で検索します<br>
いずれかの条件を入力して「検索」ボタンを押してください。
<form action="<?php echo (string)$PHP_SELF; ?>" method="post">
    <TABLE border="0" width="100%">
        <TBODY>
        <TR>
            <TD width="165">タイトル名検索：</TD>
            <TD width="589"><input type="text" name="movie_title">･･･一部分入力検索可能</TD>
        </TR>
        <TR>
            <TD width="165">ファイル名検索：</TD>
            <TD width="589"><input type="text" name="directory">･･･一部分入力検索可能</TD>
        </TR>
        </TBODY>
    </TABLE>
    <input type="submit" name="exec" value="検索">
</form>
<br>
【検索結果表示】---------------<br>
<br>
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
//入力データをテーブルxoops_movieから検索するQueryの作成
$MyQuery = 'SELECT movie_id,movie_title,play_time,movie,directory FROM xoops_xoops_movie';
if ($movie_title) {
    $MyQuery .= " where movie_title like '%$movie_title%' order by movie_id";
} elseif ($play_time) {
    $MyQuery .= " where directory = '$directory' order by movie_id";
}
//Queryの実行
if (($movie_title) or ($directory)) {
    if (!$MyResult = $GLOBALS['xoopsDB']->queryF($MyQuery)) {
        echo 'Query error';

        exit;
    }

    //表示

    echo '<table border=1>';

    echo '<tr><td>ID</td><td>タイトル</td><td>再生時間</td><td>説明</td><td>ファイルアドレス</td></tr>';

    while (false !== ($MyResultRow = $GLOBALS['xoopsDB']->fetchBoth($MyResult))) {
        echo '<tr>';

        echo '<td>' . $MyResultRow['movie_id'] . '</td>';

        echo '<td>' . $MyResultRow['movie_title'] . '</td>';

        echo '<td>' . $MyResultRow['play_time'] . '</td>';

        echo '<td>' . $MyResultRow['movie'] . '</td>';

        echo '<td>' . $MyResultRow['directory'] . '</td>';

        echo '</tr>';
    }

    echo '</table>';

    echo '表示完了';
}
//MySQLから切断
$GLOBALS['xoopsDB']->close($connect);
?>
<form action="index.php" method="post">
    <input type="submit" name="exec" value="Mainメニューへ戻る">
</form>
</body>
</html>
<?php
CloseTable();
xoops_cp_footer();
?>

<?php

include '../../../mainfile.php';
include '../../../include/cp_header.php';
xoops_cp_header();
OpenTable();
?>
<html>
<body>
<br>
<b>[XOOPS_MOVIE 新規登録]</b>---------------
<form action="<?php echo (string)$PHP_SELF; ?>" method="post">
    <TABLE border="0" width="100%">
        <TBODY>
        <TR>
            <TD width="141">タイトル：</TD>
            <TD width="613"><input type="text" name="movie_title">･･･（例）AEROBATICS JAPANGRANDPRIX 2005</TD>
        </TR>
        <TR>
            <TD width="141">再生時間：</TD>
            <TD width="613"><input type="text" name="play_time">･･･（例）5:26</TD>
        </TR>
        <TR>
            <TD width="141">説明：</TD>
            <TD width="613"><INPUT type="text" name="movie" size="51">･･･(例)昨年のAEROBATICS日本グランプリ、エキシビジョンを収録</TD>
        </TR>
        <TR>
            <TD>動画ファイル（アドレス）：</TD>
            <TD><INPUT type="text" name="directory" size="28">･･･動画ファイルのURL</TD>
        </TR>
        </TBODY>
    </TABLE>
    <input type="submit" name="exec" value="登録実行">
</form>
<?php
//register_globals = Off対策
$movie_id = $_POST['movie_id'];
$movie_title = $_POST['movie_title'];
$play_time = $_POST['play_time'];
$movie = $_POST['movie'];
$directory = $_POST['directory'];
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
//入力データをテーブルtable1に登録するQueryの作成
$MyQuery = "insert into xoops_xoops_movie(movie_title,play_time,movie,directory) values('$movie_title','$play_time','$movie','$directory')";
//Queryの実行
if ($movie_title and $play_time and $movie and $directory) {
    if (!$MyResult = $GLOBALS['xoopsDB']->queryF($MyQuery)) {
        echo '登録error';

        exit;
    }

    //終了メッセージ

    echo '登録しました！';
} else {
    echo 'データを全て入力してください';
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

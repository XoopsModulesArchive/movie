<?php

// ------------------------------------------------------------------------ //
//xoops_movie(sql)v1.1
//作成　2004/6/19
//http://www.rc-net.jp/xoops/
// ------------------------------------------------------------------------ //
include '../../../mainfile.php';
include '../../../include/cp_header.php';
xoops_cp_header();
OpenTable();
?>
<div align="center">
    <TABLE cellpadding="2" cellspacing="2" border="0" width="100%">
        <tbody>
        <TR>
            <TD colspan="2" align="center"><FONT size="+1"><B>XOOPS_MOVIE 管理メニュー</B></FONT></TD>
        </TR>
        <tr>
            <td valign="top" align="center" height="31">新規データ登録<br></td>
            <TD valign="top" align="left" height="31">
                <form action="registration.php" method="post"><input type="submit" name="exec" value="登録メニュー"></form>
            </TD>
        <tr>
            <td valign="top" align="center" height="31">編集/削除<br></td>
            <TD valign="top" align="left" height="31">
                <form action="list.php" method="post"><input type="submit" name="exec" value="更新メニュー"></form>
            </TD>
        <tr>
            <td valign="top" align="center" height="31">登録データ検索<br></td>
            <TD valign="top" align="left" height="31">
                <form action="search.php" method="post"><input type="submit" name="exec" value="検索メニュー"></form>
            </TD>
        </tbody>
    </TABLE>
</div>
<?php
CloseTable();
xoops_cp_footer();
?>

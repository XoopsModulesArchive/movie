<?php

//ヘッダ出力をします
header('Content-Type: text/html; charset=EUC-JP');
?>
<html>
<head>
    <title>Xoops Movie!</title>
    <style type="text/css">
        INPUT {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 8pt;
            background-color: #E6E6E6;
            border: 1 solid #999999;
            color: 666666;
        }
    </style>
</head>
<?php
# Get vars from globals
extract($_GET);
if (!isset($movie_id)) {
    $ModName = basename(__DIR__);
}
echo '<body bgcolor="#ffffff">';
echo "<center>
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
<tr><td><p align=\"center\"><font size=\"+3\">Xoops Movie!</font>
</td></tr>
<tr><td width=\"100%\" align=\"center\">
<object id=\"MediaPlayer1\" classid=\"clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95\" width=\"400\" height=\"360\">
<param name=\"AudioStream\" value=\"-1\">
<param name=\"AutoSize\" value=\"0\">
<param name=\"AutoStart' value=\"0\">
<param name=\"AnimationAtStart\" value=\"-1\">
<param name=\"AllowScan\" value=\"-1\">
<param name=\"AllowChangeDisplaySize\" value=\"-1\">
<param name=\"AutoRewind\" value=\"-1\">
<param name=\"Balance\" value=\"-1\">
<param name=\"BaseURL\" value>
<param name=\"BufferingTime\" value=\"5\">
<param name=\"CaptioningID\" value>
<param name=\"ClickToPlay\" value=\"0\">
<param name=\"CursorType\" value=\"0\">
<param name=\"CurrentPosition\" value=\"0\">
<param name=\"CurrentMarker\" value=\"0\">
<param name=\"DefaultFrame\" value>
<param name=\"DisplayBackColor\" value=\"-1\">
<param name=\"DisplayForeColor\" value=\"16777215\">
<param name=\"DisplayMode\" value=\"-1\">
<param name=\"DisplaySize\" value=\"-1\">
<param name=\"Enabled\" value=\"-1\">
<param name=\"EnableContextMenu\" value=\"-1\">
<param name=\"EnablePositionControls\" value=\"-1\">
<param name=\"EnableFullScreenControls\" value=\"-1\">
<param name=\"EnableTracker\" value=\"-1\">
<param name=\"SRC\"value=$directory ref>
<param name=\"InvokeURLs\" value=\"-1\">
<param name=\"Language\" value=\"-1\">
<param name=\"Mute\" value=\"0\">
<param name=\"PlayCount\" value=\"1\">
<param name=\"PreviewMode\" value=\"1\">
<param name=\"Rate\" value=\"1\">
<param name=\"SAMILang\" value>
<param name=\"SAMIStyle\" value>
<param name=\"SAMIFileName\" value>
<param name=\"SelectionStart\" value=\"-1\">
<param name=\"SelectionEnd\" value=\"-1\">
<param name=\"SendOpenStateChangeEvents\" Avalue=\"-1\">
<param name=\"SendWarningEvents\" value=\"-1\">
<param name=\"SendErrorEvents\" value=\"-1\">
<param name=\"SendKeyboardEvents\" value=\"0\">
<param name=\"SendMouseClickEvents\" value=\"0\">
<param name=\"SendMouseMoveEvents\" value=\"0\">
<param name=\"SendPlayStateChangeEvents\" value=\"-1\">
<param name=\"ShowCaptioning\" value=\"0\">
<param name=\"ShowControls\" value=\"-1\">
<param name=\"ShowAudioControls\" value=\"-1\">
<param name=\"ShowDisplay\" value=\"0\">
<param name=\"ShowGotoBar\" value=\"0\">
<param name=\"ShowPositionControls\" value=\"0\">
<param name=\"ShowStatusBar\" value=\"-1\">
<param name=\"ShowTracker\" value=\"0\">
<param name=\"TransparentAtStart\" value=\"0\">
<param name=\"VideoBorderWidth\" value=\"0\">
<param name=\"VideoBorderColor\" value=\"0\">
<param name=\"VideoBorder3D\" value=\"0\">
<param name=\"Volume\" value=\"-20\">
<param name=\"WindowlessVideo\" value=\"0\">
<embed type=\"application/x-mplayer2\"
pluginspage = \"http://www.microsoft.com/windows/mediaplayer/\"
src=\"$directory\"
name=\"MediaPlayer1\"
autostart=$autostart
showcontrols=\"1\" 
showstatusbar=\"1\" 
showdisplay=\"1\">
</embed>
<noembed><a href=\"$directory\">play $directory</a></noembed>
</object>
</td></tr>
</table>";
echo '<br>';
echo '<center><input type="button" name="close" value="close window" onclick="javascript: self.close();">';
?>
</body></html>

# ホスト: localhost
# 作成の時間: 2004年6月%d日 07:25
# サーバーのバージョン: 3.23.54
# PHP バージョン: 4.3.1
# --------------------------------------------------------
#
# テーブルの構造 `xoops_movie`
# 
CREATE TABLE xoops_movie (
    movie_id    INT(11)      NOT NULL AUTO_INCREMENT,
    movie_title VARCHAR(50)  NOT NULL DEFAULT '',
    play_time   VARCHAR(30)  NOT NULL,
    movie       TEXT         NOT NULL,
    directory   VARCHAR(100) NOT NULL,
    PRIMARY KEY (movie_id)
)
    ENGINE = ISAM;
#
# テーブルのダンプデータ `xoops_movie`
#
INSERT INTO xoops_movie
VALUES (1, 'テスト', '00:07', 'Madia Prayer test', 'movie/start.avi');

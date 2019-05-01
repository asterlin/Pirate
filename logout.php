<?php
$memId = $_POST["memId"];
session_start();

unset( $_SESSION["memId"]);
unset( $_SESSION["memPsw"]);
unset( $_SESSION["memNic"]);
unset( $_SESSION["memLv"]);
unset( $_SESSION["memExp"]);
unset( $_SESSION["memMoney"]);
unset( $_SESSION["intelligence"]);
unset( $_SESSION["strength"]);
unset( $_SESSION["agile"]);
unset( $_SESSION["luck"]);
unset( $_SESSION["shipTotalVote"]);
unset( $_SESSION["shipImgAll"]);
unset( $_SESSION["avatarImg"]);
unset( $_SESSION["playedTimes"]);
unset( $_SESSION["talentPointsRemain"]);

echo "清除資料";



?>
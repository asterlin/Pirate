<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>《大海賊帝國》去追尋吧！</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/shiprank.css">
    <link rel="stylesheet" href="css/wavebtn.css">
    <link rel="stylesheet" href="css/compass.css">
    <link rel="stylesheet" href="css/shiprank.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/login.css">

</head>

<body>
<?php require_once('header.php') ?>
<script>
    <?php
    if (isset($_SESSION['memId'])) {
        ?>
        var memid = "<?php echo $_SESSION['memId']; ?>";
        <?php $memid = $_SESSION['memId'];
    } else {
        ?>
        var memid = "tourist";
        <?php
        $memid = "tourist";

        ////////////////////
        $memId = "tourist";
        $memPsw = "signmemPsw";
        $errMsg = "";
        try {
            require_once("backstage/php/connectPirates.php");
            $sql = "select * from member where memId=:memId and memPsw=:memPsw"; //''
            $member = $pdo->prepare( $sql ); //先編譯好
            $member->bindValue(":memId", $memId); //代入資料
            $member->bindValue(":memPsw", $memPsw);
            $member->execute();//

            if( $member->rowCount() == 0 ){//找不到
                echo 0;
                $errMsg .= "帳密錯誤, <a href='signUp.html'>重新登入</a><br>";
            }else{
                $arr = [];
                $memRow = $member->fetch(PDO::FETCH_ASSOC);
                $arr[] = $memRow;
                echo json_encode($arr);
                //登入成功,將登入者的資料寫入session
                session_start();
                $_SESSION["memId"] = $memRow["memId"];
                $_SESSION["memPsw"] = $memRow["memPsw"];
                $_SESSION["memNic"] = $memRow["memNic"];
                $_SESSION["memLv"] = $memRow["memLv"];
                $_SESSION["memExp"] = $memRow["memExp"];
                $_SESSION["memMoney"] = $memRow["memMoney"];
                $_SESSION["intelligence"] = $memRow["intelligence"];
                $_SESSION["strength"] = $memRow["strength"];
                $_SESSION["agile"] = $memRow["agile"];
                $_SESSION["luck"] = $memRow["luck"];
                $_SESSION["shipTotalVote"] = $memRow["shipTotalVote"];
                $_SESSION["shipImgAll"] = $memRow["shipImgAll"];
                $_SESSION["avatarImg"] = $memRow["avatarImg"];
                $_SESSION["playedTimes"] = $memRow["playedTimes"];
                $_SESSION["talentPointsRemain"] = $memRow["talentPointsRemain"];
            }
        } catch (PDOException $e) {
            $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
            $errMsg .= "行號 : ".$e -> getLine()."<br>";
        }
    ////////////////////
    }
    ?>
</script>

    <div class="sRWrap">
    <label for="burgerCtrl">
        <input type="checkbox" name="" id="burgerCtrl">
        <div id="burger">
            <div class="burgerLine"></div>
            <div class="burgerLine"></div>
        </div>
    </label>
        <div class="sRContWrap">

            <h1>船匠排行</h1>

            <div class="sRSlidewrap">

                <div class="sYItem-bg">
                    <div class="sRDNWrap">
                        <div class="sRDayNightBox">
                            <div class="sun"></div>
                            <div class="moon">
                            </div>
                            <div class="stars">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sR-slider">
                    <div class="sR-sliderwrp swiper-wrapper">
                    <!-- /////////////////////////////// -->
                    <?php
                            try {
                                require_once("marketphp/connectPirates.php");
                                $ranksql = "select * from shiprankrecord WHERE recordTime='2019-04-26 17:31:46'";
                                $getRank=$pdo->query($ranksql);

                                if ($getRank->rowCount() == 0) {
                                    echo "排名尚未結算!!!";
                                } else {
                                    $rankList = $getRank->fetch(PDO::FETCH_NUM);

                                    for ($i=0; $i<10; $i++) {
                                        ?>
                        <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">

                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"><?php echo $i+1; ?></span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt"><?php
                                    switch ($i) {
                                        case 0:
                                            echo "10000G";
                                            break;
                                        case 1:
                                            echo "5000G";
                                            break;
                                        case 2:
                                            echo "3000G";
                                            break;
                                        case 3:
                                            echo "1000G";
                                            break;
                                        case 4:
                                            echo "1000G";
                                            break;
                                        case 5:
                                            echo "500G";
                                            break;
                                        case 6:
                                            echo "500G";
                                            break;
                                        case 7:
                                            echo "500G";
                                            break;
                                        case 8:
                                            echo "500G";
                                            break;
                                        case 9:
                                            echo "500G";
                                            break;
                                    } ?></span>
                                </div>
                                <?php
                                        //排行會員暱稱
                                        $onRankMemId = $rankList[$i*3+1];

                                        /////////////////////////////////////////////////////////////////////////////////////////////找會員有無在排行榜上

                                        if ($memid == $onRankMemId) {
                                            $myRank = $i+1;
                                        } else {
                                            $myRank = " -- ";
                                        }

                                        $rankMemNicsql = "select memNic from member WHERE memId='$onRankMemId'";
                                        $rankMemNics=$pdo->query($rankMemNicsql);

                                        if ($rankMemNics->rowCount() == 0) {
                                            echo "此會員因違反大海賊條款遭到強制驅逐!!!";
                                        } else {
                                            $rankMemNic = $rankMemNics->fetch(PDO::FETCH_ASSOC);
                                            $rankMemNicName = $rankMemNic["memNic"];
                                        } ?>
                                        <?php
                                            $getRankModelIdsql = "select ModelId from mycustom WHERE memId='$onRankMemId' and wearing=1";
                                        $getRankModelId=$pdo->query($getRankModelIdsql);

                                        if ($getRankModelId->rowCount() == 0) {
                                            echo "本海賊船已被脫個精光!!!";
                                        } else {
                                            $getRankModelIds = $getRankModelId->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($getRankModelIds as $j=>$getRankModelIdRow) {
                                                $rankModelIdsearch = $getRankModelIdRow["ModelId"];
                                                $getRankModeldetailsql = "select * from customlist WHERE modelId='$rankModelIdsearch'";
                                                
                                                $getRankModeldetail=$pdo->query($getRankModeldetailsql);
                                                foreach ($getRankModeldetail as $k=>$getRankModeldetailRow) {
                                                    if ($getRankModeldetailRow["modelPart"]==1) {
                                                        $rankHeadId = $getRankModeldetailRow["modelId"];
                                                        $rankHeadName = $getRankModeldetailRow["modelName"];
                                                        $rankHeadImg = $getRankModeldetailRow["modelImg"];
                                                        $rankHeadPrice = $getRankModeldetailRow["price"];
                                                    } elseif ($getRankModeldetailRow["modelPart"]==2) {
                                                        $rankBodyId = $getRankModeldetailRow["modelId"];
                                                        $rankBodyName = $getRankModeldetailRow["modelName"];
                                                        $rankBodyImg = $getRankModeldetailRow["modelImg"];
                                                        $rankBodyPrice = $getRankModeldetailRow["price"];
                                                    } elseif ($getRankModeldetailRow["modelPart"]==3) {
                                                        $rankSailId = $getRankModeldetailRow["modelId"];
                                                        $rankSailName = $getRankModeldetailRow["modelName"];
                                                        $rankSailImg = $getRankModeldetailRow["modelImg"];
                                                        $rankSailPrice = $getRankModeldetailRow["price"];
                                                    }
                                                }
                                            }
                                        } ?>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/<?php
                                                    echo $rankHeadImg; ?>">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/<?php
                                                    echo $rankBodyImg; ?>">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/<?php
                                                    echo $rankSailImg; ?>">
                                </div>

                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/<?php echo $rankList[$i*3+3]; ?>">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                    
                                        <?php
                                        echo $rankMemNicName; ?>
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                <?php echo $rankList[$i*3+2]; ?>票
                                </div>

                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox sRCheckHead" rankedModelid="<?php echo $rankHeadId; ?>" rankedModelType="1" href="market.php">
                                            <span class="sRShipPart sRSHead"><?php echo $rankHeadName; ?></span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox sRCheckBody" rankedModelid="<?php echo $rankBodyId; ?>" rankedModelType="2" href="market.php">
                                            <span class="sRShipPart sRSBody"><?php echo $rankBodyName; ?></span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox sRCheckSail" rankedModelid="<?php echo $rankSailId; ?>" rankedModelType="3" href="market.php">
                                            <span class="sRShipPart sRSSail"><?php echo $rankSailName; ?></span>

                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php
                                    }
                                }
                            } catch (PDOException $e) {
                                echo "error";
                            }
                            ?>
                        <!-- //////////////////////////////////////// -->

                        <!-- <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">
                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"> 2 </span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt">5000G</span>
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/100.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/300.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/200.png">
                                </div>

                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/shipComplete.png">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                        景陳好帥
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                    1024票
                                </div>
                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSHead">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSBody">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSSail">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">
                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"> 3 </span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt">3000G</span>
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/100.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/300.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/200.png">
                                </div>
                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/shipComplete.png">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                        景陳好帥
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                    1024票
                                </div>
                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSHead">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSBody">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSSail">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">
                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"> 4 </span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt">1000G</span>
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/100.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/300.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/200.png">
                                </div>
                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/shipComplete.png">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                        景陳好帥
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                    1024票
                                </div>
                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSHead">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSBody">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSSail">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">
                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"> 5 </span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt">1000G</span>
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/100.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/300.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/200.png">
                                </div>
                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/shipComplete.png">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                        景陳好帥
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                    1024票
                                </div>
                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSHead">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSBody">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSSail">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">
                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"> 6 </span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt">500G</span>
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/100.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/300.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/200.png">
                                </div>
                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/shipComplete.png">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                        景陳好帥
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                    1024票
                                </div>
                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSHead">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSBody">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSSail">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">
                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"> 7 </span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt">500G</span>
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/100.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/300.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/200.png">
                                </div>
                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/shipComplete.png">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                        景陳好帥
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                    1024票
                                </div>
                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSHead">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSBody">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSSail">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">
                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"> 8 </span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt">5000G</span>
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/100.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/300.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/200.png">
                                </div>
                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/shipComplete.png">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                        景陳好帥
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                    1024票
                                </div>
                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSHead">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSBody">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSSail">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">
                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"> 9 </span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt">500G</span>
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/100.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/300.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/200.png">
                                </div>
                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/shipComplete.png">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                        景陳好帥
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                    1024票
                                </div>
                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSHead">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSBody">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSSail">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="sR-slideritem swiper-slide">
                            <div class="sRitem">
                                <div class="sRrank">
                                    <div class="rNum">
                                        <span>第</span><span class="sRranktitle"> 10 </span><span>名</span><br>
                                    </div>
                                    <span>獎金 : </span><span class="sRranktxt">500G</span>
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartHead" src="image/merchProduct/100.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartBody" src="image/merchProduct/300.png">
                                </div>
                                <div class="sRCheckMerchBox">
                                    <img class="sYPartCheckImg sYPartSail" src="image/merchProduct/200.png">
                                </div>
                                <div class="sRimg">
                                    <img class="sRFullShipImg" src="image/ship/shipComplete.png">
                                </div>

                                <div class="SRWaveBox">
                                    <div class="wave-svg-shape">
                                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves"
                                            viewBox="0 0 600 215.43">
                                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                                transform="translate(-76 -985)"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="sRtitle">
                                    <a href="javascript:;">
                                        景陳好帥
                                    </a>
                                </div>
                                <div class="sRVoteSum">
                                    1024票
                                </div>
                                <div class="sRShipParts">
                                    <div class="sRShipPartBox">
                                        <span>船首</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSHead">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船身</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSBody">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                    <div class="sRShipPartBox">
                                        <span>船帆</span>
                                        <a class="sRCheckPartBox" href="javascript:;">
                                            <span class="sRShipPart sRSSail">
                                                景陳船頭
                                            </span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div> -->
                    </div>

                    <div class="sR-sliderctr">

                        <div class="sR-sliderarrows">
                            <button class="sR-sliderarrow sR-slider-prev">
                                <span class="icon-font">
                                    <svg class="icon icon-arrow-left">
                                        <use xlink:href="#icon-arrow-left"></use>
                                    </svg>
                                </span>
                            </button>
                            <button class="sR-sliderarrow sR-slider-next">
                                <span class="icon-font">
                                    <svg class="icon icon-arrow-right">
                                        <use xlink:href="#icon-arrow-right"></use>
                                    </svg>
                                </span>
                            </button>
                        </div>

                        <div class="sR-sliderpagination"></div>

                    </div>

                </div>

            </div>

            <svg class="sRArrows" hidden="hidden">
                <defs>
                    <symbol id="icon-arrow-left" viewBox="0 0 32 32">
                        <title>arrow-left</title>
                        <path
                            d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z">
                        </path>
                    </symbol>
                    <symbol id="icon-arrow-right" viewBox="0 0 32 32">
                        <title>arrow-right</title>
                        <path
                            d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z">
                        </path>
                    </symbol>
                </defs>
            </svg>

            <div class="sRMyShipCont sRmyShip">

                <div class="sRrank">
                    <div class="rNum">
                        <span>第</span><span class="sRranktitle"><?php
                            if (isset($_SESSION["memId"])) {
                                echo $myRank;
                            } else {
                                echo " -- ";
                            }?></span><span>名</span><br>
                    </div>
                    <a href="javascript:;"><span>獎金 : </span><span class="sRranktxt">500G</span></a>
                    <a class="sRClaimReward btnsec" href="javascript:;">
                        <span class="sRGetRewardTips">領取排行獎勵</span>
                    </a>
                </div>
                <div class="sRimg">
                    
                    <img class="sRFullShipImg" src="image/<?php
                            if (isset($_SESSION["memId"])) {
                                echo $_SESSION["shipImgAll"];
                            } else {
                                echo "shipComplete.png";
                            }?>">
                </div>

                <div class="SRWaveBox">
                    <div class="wave-svg-shape">
                        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg"
                            id="738255fe-a9fa-4a5e-963a-8e97f59370ad" data-name="3-waves" viewBox="0 0 600 215.43">
                            <path class="871c1787-a7ef-4a54-ad03-3cd50e05767a"
                                d="M639,986.07c-17-1-27.33-.33-40.5,2.67s-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S456,987.07,439,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06S256,987.07,239,986.07s-27.33-.33-40.5,2.67-24.58,11.84-40.46,15c-13.56,2.69-31.27,2.9-46.2,1.35-17.7-1.83-35-9.06-35-9.06v205.06h600V996S656,987.07,639,986.07Z"
                                transform="translate(-76 -985)"></path>
                        </svg>
                    </div>
                </div>

                <div class="sRtitle">
                    <a href="javascript:;">
                        <?php
                            if (isset($_SESSION['memId'])) {
                                echo $_SESSION["memNic"];
                            } else {
                                echo "您尚未登入!!!";
                            }?>
                    </a>
                </div>
                <div class="sRVoteSum">
                    <?php
                        if (isset($_SESSION['memId'])) {
                            echo $_SESSION["shipTotalVote"];
                        } else {
                            echo " -- ";
                        }?>票
                </div>

            </div>
            <div class="clearfix"></div>
        </div>

    </div>
    <div id="compass">
		<img src="image/compass_inner.png" alt="in" id="in">
		<img src="image/compass_outter.png" alt="out" id="out">
		<div id="compassBlue">
			<div id="blueImg" class="blueInfo"><img src="" alt=""></div>
			<div id="blueName" class="blueInfo"></div>
			<div id="blueLv" class="blueInfo">Lv<span></span></div>
			<div id="blueExp" class="blueInfo"><span></span>/100</div>
			<div id="blueMoney" class="blueInfo">金幣<span></span>G</div>
			<div id="blueStr" class="blueInfo">力量<span></span></div>
			<div id="blueLuck" class="blueInfo">幸運<span></span></div>
			<div id="blueAgi" class="blueInfo">敏捷<span></span></div>
			<div id="blueInt" class="blueInfo">智力<span></span></div>
			<div id="blueGameTime" class="blueInfo">體力值<span></span></div>
		</div>
	</div>

    <?php require_once('lightbox.php') ?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
    <script src="js/header.js"></script>
    <script src="js/verification.js"></script>
    <script src="js/wavebtn.js"></script>
    <script src="js/shipRank.js"></script>
    <script src="js/rain.js"></script>
    <script src="js/compass.js"></script>
    <script src="js/reset.js"></script>
<!-- <script src="js/getStatus.js"></script> -->
    <script>
var compass;
var playTimeCount=0;
var rankFly;
var gameStartTimer;
var bazierRank;
var memId=$('#getSession').text();
var memLv=parseInt($('#blueLv span').text());
var memExp=parseInt($('#blueLv span').text());
var memMoney=parseInt($('#blueLv span').text());
var playedTimes=parseInt($('#blueGameTime span').text());
var int=parseInt($('#blueInt span').text());
var str=parseInt($('#blueStr span').text());
var lcu=parseInt($('#blueLuck span').text());
var agi=parseInt($('#blueAgi span').text());
var rwd=$('#playTitleSec').width();
memLv=100;
memExp=100;
memMoney=1000;
playedTimes=2000;
int=100;
str=200;
lcu=300;
agi=400;
// getStatus();


$(document).ready(function(){
//還沒登入compass = none
if(memId!=''){
	$('#compass').css('display','block');
}else{
	$('#compass').css('display','none');
}
//rwd compass = none
if(rwd==375){
	$('#compass').css('display','none');
}else{
	$('#compass').css('display','block');
}
reset();
// getStatus();
//lightbox 離開
$('.checkToLeave').click(function(){$('.lightbox').css('display','none');});
$('.popbg').click(function(){$('.lightbox').css('display','none');});
$('.leave').click(function(){$('.lightbox').css('display','none');})

// 寫入遊戲測驗時間
$('#winbox .checkToLeave').click(function(){
	playedTimes-=1;
	updateScore();
	getScoreL();
	// getStatus();
	playTimeCount=0;
});
$('#losebox .checkToLeave').click(function(){
	playedTimes-=1;
	updateScore();
	getScoreL();
	// getStatus();
	playTimeCount=0;
});


// playBtn
if(memId!=''){
	$('.button_border').click(function(){
		if(playedTimes==0){
			$('#playedTimesBox .lightbox').css('display','block');
		}else{
			$('#playSpark').css('clipPath','circle(1900px)');
			gameStartTimer = setInterval(play,1000);
		}
	});
}else{
	$('#loginbox .lightbox').css('display','block');
}

function play(){
	clearInterval(gameStartTimer);
	$('.button_border').css('display','none');
	$('#defaultCanvas0').css('display','block');
	playTimer = setInterval(playTime,1000)
}
function playTime(){
	playTimeCount+=1;
	console.log('playTimeCount: ',playTimeCount);
}
});

		
		
		


	</script>
</body>

</html>
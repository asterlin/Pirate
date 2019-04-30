<!-- php -->
<!-- 熱門話題 -->
<?php
session_start();
// $_SESSION["memId"] = "test01";
// echo $_SESSION["memId"];
?>
<script>
    var thisMemId = "<?php echo $_SESSION["memId"]; ?>";
    console.log(thisMemId);
</script>


<?php
    try{
    require_once("connectPirate.php");
    $sqlHotIssue = "select * from articlelist join member on(articlelist.memId = member.memId) order by clickAmt desc limit 6";
    $hotIssue = $pdo->prepare( $sqlHotIssue );
    $hotIssue->execute();

    $sqlNews = "select * from articlelist join member on(articlelist.memId = member.memId) order by artTime desc";
    $news = $pdo->prepare( $sqlNews );
    $news->execute();

    }catch(PDOException $e){
    echo $e->getMessage();
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>《大海賊帝國》在情報酒館探索海賊們的秘密吧！</title>
    <link rel="stylesheet" href="css/bar.css">
    <link rel="stylesheet" href="css/wavebtn.css">
    <!-- <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>  -->
</head>
<body>
<label for="burgerCtrl">
        <input type="checkbox" name="" id="burgerCtrl">
        <div id="burger">
            <div class="burgerLine"></div>
            <div class="burgerLine"></div>
        </div>
    </label>
    <header class=""><!-- homeHeadHide-->
        <h1 id="headerLogo"><a href="index.php">
            <img src="image/logo.svg" alt="大海賊帝國">
        </a></h1>
        <nav id="headerMenu" >
            <ul>
                <li class="menuSwitch">
                    <a href="play.php">海賊試煉場</i></a>
                    <ul class="headerSub">
                        <li><a href="play.php#game">海賊試煉</a></li>
                        <li><a href="play.php#gpsWrap">啟航尋寶</a></li>
                    </ul>
                </li>
                <li class="menuSwitch">
                    <a href="market.php">海上市集</i></a>
                    <ul class="headerSub">
                        <li><a href="market.php">黑市</a></li>
                        <li><a href="market.php">造船廠</a></li>
                    </ul>
                </li>
                <li class="menuSwitch"><a href="bar.php">情報酒館</a></li>
                <li class="menuSwitch">
                    <a href="me.php">俺の海賊船</i></a>
                    <ul class="headerSub">
                        <li class="loginHere"><a href="javascript:;">登入</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
<!-- 頁面標題 -->
<div id="bartitle">
    <h1 class="titlePri">情報酒館</h1>
    <a class="btnpri artBtn" href="javacript:;" >
            <span>洩漏情報</span>
    </a>
</div>
<!-- 熱門話題 -->
<div id="hotIssueWrap">
    <h2 class="titleSec">
    熱門情報
        <img src="image/h2frame.svg" alt="">
    </h2>
    <p class="textM">
        眾所皆知的熱門八卦你不能不知道
    </p>
    <!-- <img src="image/bar/fire_2.gif" alt="fire" id="fire"> -->

    <div id="hotIssue">
    <?php 
    while($hotIssueRow = $hotIssue ->fetch(PDO::FETCH_ASSOC)){
    ?>
        <div class="hotIssueBox">
            <a href="javacript:;" class="hotIssueBoxLink artShow">
                <input type="hidden"  value="<?php echo $hotIssueRow["artId"];?>">
                <input type="hidden"  value="<?php echo $hotIssueRow["artText"];?>">
                <input type="hidden"  value="<?php echo $hotIssueRow["memNic"];?>">
                <input type="hidden"  value="<?php echo $hotIssueRow["memLv"];?>">
                <input type="hidden"  value="<?php echo $hotIssueRow["memMoney"];?>">
                <input type="hidden"  value="<?php echo $hotIssueRow["shipImgAll"];?>">
                <input type="hidden"  value="<?php echo $hotIssueRow["artCat"];?>">
                <input type="hidden"  value="<?php echo $hotIssueRow["artImg"];?>">
                <div class="hotIssueBoxInfo">
                    <img src="image/bar/DB/<?php echo $hotIssueRow["artImg"];?>" alt="情報圖片">
                </div>
                <div class="hotIssueBoxCont">
                    <h4 class="textM artTit"><?php echo $hotIssueRow["artTitle"];?></h4>
                    <p class="textS hotIssueBoxContText"></p>
                    <span class="hotIssueBoxView newsBoxView"><?php echo $hotIssueRow["clickAmt"]?></span>
                    <span class="hotIssueBoxCommend newsBoxCommend"><?php echo $hotIssueRow["msgAmt"]?></span>
                </div>
            </a>
        </div>
    <?php    
      $arr[]=$hotIssueRow["artText"];
    }
    $jsonStr = json_encode($arr);
    ?>        
    </div>
</div>
<script>
    var arrhotIssue = <?php echo $jsonStr; ?>;
    console.log(arrhotIssue);
</script>

<!-- 熱門話題內容開始 -->
<!-- 最新情報 -->
<div id="newsWrap">
    <!-- 最新情報標題列 -->
        <h2 class="titleSec">
            最新情報
            <img src="image/h2frame.svg" alt="">
        </h2>
        <p class="textM">
            最新、最熱、道聽塗說、以訛傳訛的情報風聲，各式各樣的八卦在等著你
        </p>
    <!-- 最新情報內容-->
    <div id="newsWrapCont">
     <!-- 內容標題列 -->
        <div id="newsWrapContListTit">
            <div id="newsWrapFilter">
                <span id="newsWrapListType">篩選：</span>
                <span id="newsWrapListAll" class="newsWrapListBtn" >ALL</span>
                <span id="newsWrapListGps" class="newsWrapListBtn" >尋寶</span>
                <span id="newsWrapListTraining" class="newsWrapListBtn" >試煉</span>
                <span id="newsWrapListOther" class="newsWrapListBtn" >其他 </span>
                <span id="newsWrapListNavy" class="newsWrapListBtn" >官方</span>
            </div>
            <div class="newsInfo">
                <span class="newsBoxView">人氣</span>
                <span class="newsBoxCommend">回覆</span>
            </div>
            <div class="newsOwner">洩密者
                <span class="newsBoxTime">走漏時間</span>
            </div>
        </div>
    <!-- 內容列 -->
        <div id="newsBoxWrap">
        <?php
         while ($newsRow = $news ->fetch(PDO::FETCH_ASSOC)){
            $newsCat;
            $newsBoxNameColor;
            switch ($newsRow["artCat"]) {
                case "1": $newsCat = "尋寶"; 
                          $newsBoxNameColor = "newsBoxNameGps";break;
                case "2": $newsCat = "試煉";
                          $newsBoxNameColor = "newsBoxNameTraining"; break;
                case "3": $newsCat = "其他";
                          $newsBoxNameColor = "newsBoxNameOther" ; break;
                case "4": $newsCat = "官方";
                          $newsBoxNameColor = "newsBoxNameNavy" ; break;
                default:break;
            };
            // $artTime = $newsRow["artTime"];
            // $artTime = substr( $artTime , 0, 10);
            $artTime = substr( $newsRow["artTime"] , 0, 10);
            $artTimeStr = str_replace("-","","$artTime");
        ?>
            <div class="newsBox artShow">
                <input type="hidden"  value="<?php echo $newsRow["artId"];?>">
                <input type="hidden"  value="<?php echo $newsRow["artText"];?>">
                <input type="hidden"  value="<?php echo $newsRow["memNic"];?>">
                <input type="hidden"  value="<?php echo $newsRow["memLv"];?>">
                <input type="hidden"  value="<?php echo $newsRow["memMoney"];?>">
                <input type="hidden"  value="<?php echo $newsRow["shipImgAll"];?>">
                <input type="hidden"  value="<?php echo $newsRow["artCat"];?>">
                <input type="hidden"  value="<?php echo $newsRow["artImg"];?>">
                <div class="newsBoxInfo">
                    <div class="newsBoxInfoCont">
                        <span class="newsBoxName <?php echo $newsBoxNameColor;?>"><?php echo $newsCat;?></span>
                        <div class="newsBoxTit artTit"><a href="javascript:;"><?php echo $newsRow["artTitle"];?></a></div>
                    </div>
                    <div class="newsInfo">
                        <span class="newsBoxView"><?php echo $newsRow["clickAmt"];?></span>
                        <span class="newsBoxCommend"><?php echo $newsRow["msgAmt"];?></span>
                    </div>
                    <div class="newsOwner">
                        <a href="javascript:;"><?php echo $newsRow["memNic"];?></a>
                        <span class="newsBoxTime"><?php echo $artTimeStr ?></span>
                    </div>
                </div>
                <div class="newsBoxArti"><?php echo $newsRow["artText"];?></div>
            </div>
            <?php }?>
            <!-- <div class="newsBox">
                <div class="newsBoxInfo">
                    <div class="newsBoxInfoCont">
                        <span class="newsBoxName">尋寶</span>
                        <div class="newsBoxTit"><a href="javascript;">2019新地圖</a></div>
                    </div>
                    <div class="newsInfo">
                        <span class="newsBoxView">1314</span>
                        <span class="newsBoxCommend">520</span>
                    </div>
                    <div class="newsOwner">
                        <a href="javascript:">景成船長</a>
                        <span class="newsBoxTime">190409</span>
                    </div>
                </div>
                <div class="newsBoxArti">
                    這次活動角竟然是酒吞，讚嘆營運 為了不讓縮圖停在怪怪的地方先上個預覽圖，請見諒ˊˋ 以下是全文，終於要和的....
                </div>
            </div> -->
        </div>
        <!-- <input type="button" value="點擊搜集更多情報" id="getMoreNews"> -->
    </div>
</div>
<!-- 新增討論燈箱 -->
<div id="addFormWrap">
    <!-- <h1 class="titleSec">
        洩漏情報
        <img src="image/h2frame.svg" alt="">
     </h1>
     <p class="textM">
         與海賊交換最新的情報風聲
     </p> -->
    <!-- <a href="javascript:;" class="artBtn">保密防諜回到酒館刺探情報</a> -->

    <form action="barphp/addArticlelist.php?memId=<?php echo $_SESSION["memId"]; ?>" method="post" id="addForm" enctype="multipart/form-data">
        <input type="hidden" name="thisMemId" id="artThisMemId">
        <a href="javascript:;" class="artBtn"></a>
         <h2 class="textHiliR">最高機密</h2>
         <div id="addFormCont">
             <div id="articleTypeTit">
                 <span>情報分類</span>
                 <input type="radio" name="articleType"  id="articleTypeGps" value="1">
                 <label for="articleTypeGps" class="articleTypeBtn">尋寶</label>
                 <input type="radio" name="articleType"  id="articleTypeEle" value="2">
                 <label for="articleTypeEle" class="articleTypeBtn">試煉</label>
                 <input type="radio" name="articleType"  id="articleTypeOth" value="3">    
                 <label for="articleTypeOth" class="articleTypeBtn">其他</label>
             </div>
             <label for="articleTit">情報題目 :</label>
                 <input type="text" id="articleTit" name="articleTit" placeholder="請點擊此處輸入情報內容">
             <div id="articleCont">
                 <span id="articleContTit">情報內容</span>
                 <input type="file" id="articleImg" name="articleImg">
                 <img src="" alt="" id="showArticleImg">
                 <input type="hidden" name="MAX_FILE_SIZE" value="2048">
                 <!-- <label for="articleImg"></label> -->
                 <textarea name="articleCont" id="articleCont" cols="30" rows="10" placeholder="請點擊此處輸入情報內容"></textarea>
             </div>
         </div>
         <a class="btnpri" href="javascript:;" id="submitArticleLabel">
                 <span><label for="submitArticle">發出情報</label></span>
         </a>
         <input type="submit"  id="submitArticle">
     </form>
</div>
<!-- 討論內容燈箱 -->
<div id="articleBoxWrapMask" >
    <div id="articleBoxWrap">
        <!-- <div id="articleBox">
            <div id="articleBoxTit">
                <span id="articleBoxType">尋寶</span>
                <h3 class="textL">金斧頭GET</h3>
                <a href="javascript:;" id="closeArt"></a>
                <a href="javascript:;" id="artReport"></a>
            </div>
            <div id="articleBoxMemInfo">
                <div id="articleBoxMemImg">
                    <img src="image/ship.png" alt="" id="">
                </div>
                <div id="articleBoxMemMeg">
                    <span id="articleBoxMemId">景成大帥哥</span>
                    <span id="articleBoxMemLv">7</span>
                    <span id="articleBoxMemMoney">100G</span>
                </div>
                <div id="articleBoxTitInfo">
                    <span id="articleBoxView">人氣</span>
                    <span id="articleBoxCommend">回覆</span>
                </div>
            </div>
            <div id="articleBoxCont">
                <div id="articleBoxImg">
                    <img src="image/bar/hotIssueImg_1.png" alt="文章圖片" id="articleBoxContImg">
                </div>
                <p class="textM">
                    讚嘆營運，不知道大家在開啟景成的大秘寶章節後，尋寶遊戲的運氣如何，那天玩尋寶遊戲，竟然在中大湖得到傳說中董董女神的金斧頭
                </p>
            </div>
        </div>
        <div class="artiRespondBox">
            <div class="artiRespondBoxMem">
                    <img src="image/ship.png" alt="留言者" class="artiRespondBoxMemImg">
                <span class="textM">景陳船長</span>
            </div>
            <div class="artiRespondBoxCont">
                <p class="textM artiRespondBoxContText">有 人稱中大黃金手不是叫假的</p>
                <span class="artiRespondBoxTime"></span>
            </div>
        </div>
        <div id="addArtRespondBox">
            <form action="addArtRespond.php" method="post" id="addArtRespond">
                <input type="hidden" value="">
                <textarea name="addArtRespondCont" id="addArtRespondCont" placeholder="加入回覆"></textarea>
                <a class="btnpri" href="javascript:">
                    <span><label for="submitAddArtRespond"></label>發送留言</span>
                </a>
            </form>
        </div> -->
    </div>
    <!-- <div id="addArtRespondBox">
        <form action="barphp/addArtRespond.php?&memId=" method="post" id="addArtRespond">
            <input type="hidden" name="addArtRespondArtId" id="addArtRespondArtId">
            <textarea name="addArtRespondCont" id="addArtRespondCont" placeholder="加入回覆"></textarea>
            <a class="btnpri" href="javascript:">
                <span><label for="submitAddArtRespond"></label>發送留言</span>
            </a>
            <input type="submit"  id="submitAddArtRespond">
        </form>
    </div>  -->
</div>
<!-- 討論檢舉燈箱 -->
<!-- <div class="black" id="lightBoxReport">
    <div class="box" >
        <div class="axis axis1"></div>
        <div class="info">
            <div class="contents">
                <div class="leave"></div>
                <div>
                    <form action="barphp/addArtreport.php" method="post" id="addNavyReportForm" enctype="multipart/form-data">
                        <h2 class="titleThi">讓海軍為你主持公道吧</h2>
                        <input type="hiddle">
<<<<<<< HEAD
                        <input type="hidden" name="memId" value="">
                        <input type="hidden" name="artId" value="">
=======
                        <input type="hidden" name="memId" value="<?php?>">
                        <input type="hidden" name="artId" value="<?php?>">
>>>>>>> 6e17014e939b58e711f8123d3aa0913cc9330654
                        <input type="text" name="navyReport" id="navyReportCont" placeholder="請點擊此處填入通報項目">
                        <a class="btnpri" href="javascript:;" ><span><label for="submitNavyReport">一鍵通報海軍</label></span>
                        </a>
                        <input type="submit" name="navyReport" id="submitNavyReport">
                    </form>
            </div>
            </div>
        </div>
        <div class="axis axis2"></div>
    </div>
</div> -->
<!-- 未登入燈箱 -->
<!-- <div class="black" id="lightBoxLogin">
    <div class="box" >
        <div class="axis axis1"></div>
        <div class="info">
            <div class="contents">
                <div class="leave"></div>
                <div>
                    <h2 class="titleThi">來者何人<br>光明正大的亮出你的海賊旗<br>宣告來你的名號吧</h2>
                    <a class="btnpri" href="javascript:;" ><span>一秒登入</span>
                    </a>

            </div>
            </div>
        </div>
        <div class="axis axis2"></div>
    </div>
</div> -->

<!-- script -->
<script src="js/bar.js?<?php echo time();?>"></script>
<script>
    function doFirst() {
        hotIssueText();
        addArt();
        news();
        //get queryString
        if (location.search.match("from=index") || location.search.match("from=me") ||  location.search.match("from=artRespond")) {
            // var location = location.search;
            // console.log(location.search);
            // console.log(location.search.indexOf("artId"));
            // console.log(location.search.substring(location.search.indexOf("artId"),location.search.length));
            artBoxContText='';
            var locationSearch = location.search;
            var artId = location.search.substring(location.search.indexOf("artId"),location.search.length);
            artId = artId.substring((artId.indexOf("=")+1),artId.length);
            // console.log(artId);
            artBox(artId);
            document.getElementById("articleBoxWrapMask").style.display = "block";
        }else{
            artBox();
        }
        artId="";
<<<<<<< HEAD
        news();
=======
>>>>>>> 6e17014e939b58e711f8123d3aa0913cc9330654
        artReport()
        // readArt();
        // alert(location.search);
        
    }
    window.addEventListener('load',doFirst());
</script>
<!-- <script src="js/bar.js>"></script> -->
<script src="js/wavebtn.js"></script>
<script src="js/header.js"></script>
</body>
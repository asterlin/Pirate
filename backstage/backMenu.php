<div class="menu">
            <div id="logo">
                <img src="../image/logo.svg" alt="">
            </div>
            <p>Hi~ 管理員 <span id="manager"><?php echo $_SESSION['managerAcc'] ?></span>♥</p>
            <p>你好^___^</p>
            <ul class="menuUl">
                <li>
                    <a href="backManager.php">管理員帳號管理</a>
                </li>
                <li>
                    <a href="backMember.php">會員帳號管理</a>
                </li>
                <li>
                    <a href="backOfficialMerch.php">官方商品管理</a>
                </li>
                <li>
                    <a href="backTreasure.php">寶物商品管理</a>
                </li>
                <li>
                    <a href="backTreasureRocard.php">寶物拍賣紀錄查詢</a>
                </li>
                <li>
                    <a href="backIQTest.php">測驗題目管理</a>
                </li>
                <li>
                    <a href="backBarArticle.php">討論區文章管理</a>
                </li>
                <li>
                    <a href="backBarCommend.php">討論區留言管理</a>
                </li>
                <a href="backLogout.php" class="btnpri" id="logout">
                    <span>登出</span>
                </a>
            </ul>
        </div>
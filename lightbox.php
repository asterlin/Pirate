<div class="lightbox justHide" id="loginBox">
    <div class="popbg"></div>
    <div class="info">
        <div class="axis axis1"></div>
        <div class="axis axis2"></div>
        <div class="leaveLightbox">
            <i class="fa fa-close"></i>
        </div>
        <div class="paper">

            <div id="tab-demo">
            
                <div id="tab01" class="tab-inner">
                    <h2 class="textL" >登船</h2>
                    
                    <label class="textS">帳號:</label>
                    <input id="signmemId" type="text" name="memId" placeholder="請輸入帳號"  class="textS"><br>
                    <label class="textS">密碼:</label>
                    <input id="signmemPsw" type="password" name="memPsw" class="textS" placeholder="請輸入密碼"><br>
                    <div class="verification" >
                        <h2 class="textS">請旋轉到正確方向</h2>
                        <button id="signlbtn">
                            <i class="fa fa-rotate-left"></i>
                        </button>
                        <img id="signnew" src="image/new.png" alt="">
                        <button id="signrbtn">
                            <i class="fa fa-rotate-right"></i>
                        </button>
                    </div>
                    <p id="feedback" class="textM"></p>
                    <a id="signUp"class="btnpri textS" href="javascript:;">
                        <span>登入</span>
                    </a>
                </div>

                <div id="tab02" class="tab-inner">
                    <h2 class="textL" class="textS">成為海賊</h2>
                    <form action="registered.php" id="loginforma">
                        <div class="Data-Title">
                            <label for="memId" class="textS">帳號:<input type="text" id="memId" name="memId"   class="textS"placeholder="請設定帳號"></label><br>
                            <label for="memNic" class="textS">暱稱:<input type="text" id="memNic" name="memNic"  class="textS" placeholder="請設定暱稱"></label><br>
                            <label for="memPsw" class="textS" >密碼:<input type="password" id="memPsw" name="memPsw"  class="textS" placeholder="請設定密碼"></label><br>
                            <label for="memCon" class="textS" >確認密碼:<input type="password" id="memCon" name="memCon"  class="textS" placeholder="請再次輸入密碼"></label><br>
                        </div>
                        <div class="Data-Items">
                            
                        </div>
                        <div class="clearfix"></div>
                        <p id="feedback2" class="textM"></p>
                        <a id="btnver" class="btnpri textS" href="javascript:;" >
                            <span>註冊</span>
                        </a>
                        
                    </form>
                </div>
                <ul class="tab-title textS">
                    <li><a class="signIn" href="#tab01">登入</a></li>
                    <li>/</li>
                    <li><a class="register" href="#tab02">註冊</a></li>
                </ul>
            </div>
        </div>
    </div>  
</div>


<div class="lightbox justHide" id="Msglightbox">
    <div class="popbg"></div>
    <div class="info">
        <div class="axis axis1"></div>
        <div class="axis axis2"></div>
        <div class="leaveLightbox">
            <i class="fa fa-close"></i>
        </div>
        <div class="paper textM">
        
        </div>
    </div>
</div>

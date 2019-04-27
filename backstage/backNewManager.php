<?php
    ob_start();
    session_start();
    if (isset($_SESSION['managerAcc']) == false) {
        header('location:backLogin.html');
    }
    
    $errMsg = "";
    try {
        require_once("php/connectPirates.php");
    } catch (PDOException $e) {
        $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
        $errMsg .= "行號 : ".$e -> getLine()."<br>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/backStage.css">
    <link rel="stylesheet" href="../css/wavebtn.css">
    <style>
       #myForm table{
            margin: auto;
            margin-bottom: 30px;
        }
        #myForm table tr td {
            /* padding: 5px 10px; */
            padding: 0 20px;
        }
        .btnpri{
            border: 1px solid transparent;
            margin: 0px 10px;
        }

        .butBox{
            display: flex;
            justify-content: center;
        }

        
    </style>
</head>
<body>
    <div class="backstage">
        <?php
        require_once("backMenu.php");
        ?>
        <div class="contentWrap">
            <div class="content">
                <h3 class="titlePri">管理員帳號新增</h3>
                <?php
                if ($errMsg != "") {
                    exit("<div><center>$errMsg</center></div>");
                }
                ?>
                <form id="myForm" action="backManagerToDb.php">
                    <table>
                        <tr>
                            <td>帳號</td>
                            <td><input type="text" name="managerAcc" size="15"></td>
                        </tr>
                        <tr>
                            <td>密碼</td>
                            <td><input type="password" id="managerPsw" name="managerPsw" size="15"></td>
                        </tr>
                        <tr>
                            <td>確認密碼</td>
                            <td><input type="password" id="checkPsw" size="15"></td>
                        </tr>
                    </table>
                    <div class="butBox">
                        <button type="button" class="btnpri" id="addButton"><span>新增帳號</span></button>
                        <button type="button" class="btnpri" id="cancelButton"><span>取消新增</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/wavebtn.js"></script>
    <script>
     document.getElementById('addButton').addEventListener('click', function () {
        if( document.getElementById('checkPsw').value == '' || document.getElementById('checkPsw').value != document.getElementById('managerPsw').value ){
                document.getElementById('managerPsw').value = '';
                document.getElementById('checkPsw').value = '';
                alert('密碼與確認密碼不正確！請重新輸入')
        }else{
            document.getElementById('myForm').submit();
        }
                
        });
        document.getElementById('cancelButton').addEventListener('click', function () {
            header("location:backManager.php");
        });
    </script>
   
</body>
</html>
window.onload = function () {
    var addBtn = document.getElementById('addTrea');
    

    // Date.now = function now() {
    //     return new Date().getSeconds();
    /// };


    function addRemove() {
        var addTLBtn = document.getElementsByClassName('addToList');
        for (var i = 0; i < addTLBtn.length; i++) {
            addTLBtn[i].onclick = function (e) {

                if (e.target.classList.contains("removeIt")) {
                    e.target.parentNode.parentNode.parentNode.removeChild(e.target.parentNode.parentNode);


                    var merchDelete = e.target.parentNode.parentNode;
                    var treaName = merchDelete.getElementsByClassName('treaName')[0].childNodes[0].value;
                    var treaImg = merchDelete.getElementsByClassName('treaImg')[0].getElementsByTagName('input')[0].value;
                    var treaInt = merchDelete.getElementsByClassName('treaInt')[0].getElementsByTagName('input')[0].value;
                    var treaStr = merchDelete.getElementsByClassName('treaStr')[0].getElementsByTagName('input')[0].value;
                    var treaAgi = merchDelete.getElementsByClassName('treaAgi')[0].getElementsByTagName('input')[0].value;
                    var treaLuk = merchDelete.getElementsByClassName('treaLuk')[0].getElementsByTagName('input')[0].value;
                    var saleYN = merchDelete.getElementsByClassName('saleYN')[0].getElementsByTagName('select')[0].value;

                    $.ajax({
                        url: '../php/editTrea.php',
                        data: {
                            doType: 'delete',
                            treaName: treaName,
                            treaImg: treaImg,
                            treaInt: treaInt,
                            treaStr: treaStrN,
                            treaAgi: treaAgi,
                            treaLuk: treaLuk,
                            saleYN: saleYN,
                        },
                        type: 'GET',
                        success: function () {
                            alert('修改完成');
                        },
                        error: function (e) {
                            alert('出錯囉???');
                        }
                    });

                } else {
                    addBtn.disabled = false;
                    e.target.innerHTML = "刪除";
                    e.target.classList.add("removeIt");
                    e.target.classList.remove("currentEdit");

                    var merchInsert = e.target.parentNode.parentNode;
                    var treaName = merchInsert.getElementsByClassName('treaName')[0].childNodes[0].value;
                    var treaImg = merchInsert.getElementsByClassName('treaImg')[0].getElementsByTagName('input')[0].value;
                    treaImg = treaImg.substr(treaImg.length-7,7);
                    var treaInt = merchInsert.getElementsByClassName('treaInt')[0].getElementsByTagName('input')[0].value;
                    var treaStr = merchInsert.getElementsByClassName('treaStr')[0].getElementsByTagName('input')[0].value;
                    var treaAgi = merchInsert.getElementsByClassName('treaAgi')[0].getElementsByTagName('input')[0].value;
                    var treaLuk = merchInsert.getElementsByClassName('treaLuk')[0].getElementsByTagName('input')[0].value;
                    var saleYN = merchInsert.getElementsByClassName('saleYN')[0].getElementsByTagName('select')[0].value;
                    
                    doUpdate();

                    $.ajax({
                        url: '../php/editTrea.php',
                        data: {
                            doType: 'insert',
                            treaName: treaName,
                            treaImg: treaImg,
                            treaInt: treaInt,
                            treaStr: treaStr,
                            treaAgi: treaAgi,
                            treaLuk: treaLuk,
                            saleYN: saleYN,
                        },
                        type: 'GET',
                        success: function () {
                            alert('修改完成');
                        },
                        error: function (e) {
                            alert('出錯囉???');
                        }
                    });
                }
            };
        }
    }

    addBtn.onclick = function () {
        addBtn.disabled = true;
        // var nowTime = new Date();
        // var yyyy = nowTime.getFullYear();
        // if (dd < 10) {
        //   dd = '0' + dd;
        // } 
        // if (mm < 10) {
        //   mm = '0' + mm;
        // } 
        // var mm = nowTime.getMonth() + 1;
        // var dd = nowTime.getDate();
        // var hr = nowTime.getHours();
        // var min = nowTime.getMinutes();
        // var sec = nowTime.getSeconds();

        // var nowTime = yyyy + '.' + mm + '.' + dd  + '.' + hr  + '.' + min  + '.' + sec;

        var newMerch = `
        <tr>
        <td class="treaNo"></td>
        <td class="treaName"><input type="text" name="treaName" value='' placeholder="請輸入造型名稱"></td>
        <td class="treaImg">
            <img src="" class="treaImg">
            <input class="treInputImg" type="file" >
        </td>
        <td class="treaInt"><input type="text" name="treaInt"  placeholder="請輸入能力值"></td>
        <td class="treaStr"><input type="text" name="treaStr"  placeholder="請輸入能力值"></td>
        <td class="treaAgi"><input type="text" name="treaAgi"  placeholder="請輸入能力值"></td>
        <td class="treaLuk"><input type="text" name="treaLuk"  placeholder="請輸入能力值"></td>

        <td class="saleYN">
        <select name="saleYN">
            <option value="1">上架中</option>
            <option value="0">已下架</option>
        </select>
    </td>
    <td>
        <button class="updateList removeIt" style="display:none">修改</button>
        <button class="addToList currentEdit">確認</button>
    </td>
        </td>`

    ;
        document.getElementById('merchTable').innerHTML += newMerch;


        addRemove();


        var inputImg = document.getElementsByClassName('treaInputImg');

        for (var j = 0; j < inputImg.length; j++) {
            inputImg[j].onchange = function (e) {
                var file = e.target.files[0];
                // console.log(file);
                // console.log(j);
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementsByClassName("imgPreview")[j - 1].src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        }
    };
    addRemove();
    doUpdate()

    //修改動作
    function doUpdate() {
        
        var updateBtn = document.getElementsByClassName('updateList');
        var inputChange = document.getElementsByTagName('input');
        var selectChange = document.getElementsByTagName('select');

        for (var i = 0; i < inputChange.length; i++) {
            inputChange[i].onkeyup = function (e) {
                e.target.parentNode.parentNode.getElementsByClassName('updateList')[0].style.display = "inline-block";
            };
        }
        for (var i = 0; i < selectChange.length; i++){
            selectChange[i].onchange = function (e) {
                e.target.parentNode.parentNode.getElementsByClassName('updateList')[0].style.display = "inline-block";
            };
        }


    }

    var updateBtn = document.getElementsByClassName('updateList');
    $('.addToList').click(function(){
        index = $(this).index;
    });
    
    for(var i=0;i<updateBtn.length;i++){

    updateBtn[i].onclick = function (e) {
        index = $(this).parent().parent().parent().index();
        e.target.style.display= "none";
        var merchUpdate = e.target.parentNode.parentNode;
        
        index-=2;
        console.log(index);
        // str = merchUpdate.getElementsByClassName('treaImg')[0].getElementsByTagName('input')[0].value;
        // console.log(str);
        // // str = str.substr(0,3);
        // console.log(str);
        var treaName = merchUpdate.getElementsByClassName('treaName')[0].childNodes[0].value;
<<<<<<< HEAD
        var treaImg = "0";//merchUpdate.getElementsByClassName('treaImg')[0].getElementsByTagName('input')[0].value;
=======
<<<<<<< HEAD
        var treaImg = "0";//merchUpdate.getElementsByClassName('treaImg')[0].getElementsByTagName('input')[0].value;
=======
        // var treaImg = merchUpdate.getElementsByClassName('treaImg')[0].getElementsByTagName('input')[0].value;
        var treaImg = $('.treaImg img').eq(index).attr('src');
        treaImg = treaImg.substr(treaImg.length-7,7);
>>>>>>> fbaf30a0ff4a845504c7524601543c42f54a4478
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d
        var treaInt = merchUpdate.getElementsByClassName('treaInt')[0].getElementsByTagName('input')[0].value;
        var treaStr = merchUpdate.getElementsByClassName('treaStr')[0].getElementsByTagName('input')[0].value;
        var treaAgi = merchUpdate.getElementsByClassName('treaAgi')[0].getElementsByTagName('input')[0].value;
        var treaLuk = merchUpdate.getElementsByClassName('treaLuk')[0].getElementsByTagName('input')[0].value;
        var saleYN = merchUpdate.getElementsByClassName('saleYN')[0].getElementsByTagName('select')[0].value;
        var treaNo = merchUpdate.getElementsByClassName('treaNo')[0].innerHTML;
        console.log(treaName);
        console.log(treaImg);
        console.log(treaInt);
        console.log(treaStr);
        console.log(treaAgi);
        console.log(treaLuk);
        console.log(saleYN);
        console.log(treaNo);

        $.ajax({
            url:'../php/editTrea.php',
            data: {
                doType: 'update',
                treaName: treaName,
                treaImg: '0',
                treaInt: treaInt,
                treaStr: treaStr,
                treaAgi: treaAgi,
                treaLuk: treaLuk,
                saleYN: saleYN,
            },
            type: 'GET',
            success: function () {
                alert('修改完成');
            },
            error: function (e) {
                alert('出錯囉???');
            }
        });
    };
}

};

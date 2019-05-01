window.onload = function () {
    var addBtn = document.getElementById('addMerch');


    // Date.now = function now() {
    //     return new Date().getSeconds();
    // };


    function addRemove() {
        var addTLBtn = document.getElementsByClassName('addToList');
        for (var i = 0; i < addTLBtn.length; i++) {
            addTLBtn[i].onclick = function (e) {

                if (e.target.classList.contains("removeIt")) {
                    e.target.parentNode.parentNode.parentNode.removeChild(e.target.parentNode.parentNode);


                    var merchDelete = e.target.parentNode.parentNode;
                    var merchName = merchDelete.getElementsByClassName('merchName')[0].childNodes[0].value;
                    var merchPart = merchDelete.getElementsByClassName('merchPart')[0].getElementsByTagName('select')[0].value;
                    var merchImg = merchDelete.getElementsByClassName('merchImg')[0].getElementsByTagName('input')[0].value;
                    var cusYN = merchDelete.getElementsByClassName('cusYN')[0].getElementsByTagName('select')[0].value;
                    var merchPrice = merchDelete.getElementsByClassName('merchPrice')[0].getElementsByTagName('input')[0].value;
                    var saleYN = merchDelete.getElementsByClassName('saleYN')[0].getElementsByTagName('select')[0].value;

                    $.ajax({
                        url: 'php/editMerch.php',
                        data: {
                            doType: 'delete',
                            merchName: merchName,
                            merchPart: merchPart,
                            merchImg: merchImg,
                            cusYN: cusYN,
                            merchPrice: merchPrice,
                            saleYN: saleYN,
                            merchId: 0,
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
                    var merchName = merchInsert.getElementsByClassName('merchName')[0].childNodes[0].value;
                    var merchPart = merchInsert.getElementsByClassName('merchPart')[0].getElementsByTagName('select')[0].value;
                    var merchImg = merchInsert.getElementsByClassName('merchImg')[0].getElementsByTagName('input')[0].value;
                    var cusYN = merchInsert.getElementsByClassName('cusYN')[0].getElementsByTagName('select')[0].value;
                    var merchPrice = merchInsert.getElementsByClassName('merchPrice')[0].getElementsByTagName('input')[0].value;
                    var saleYN = merchInsert.getElementsByClassName('saleYN')[0].getElementsByTagName('select')[0].value;

                    

                    $.ajax({
                        url: 'php/editMerch.php',
                        data: {
                            doType: 'insert',
                            merchName: merchName,
                            merchPart: merchPart,
                            merchImg: merchImg,
                            cusYN: cusYN,
                            merchPrice: merchPrice,
                            saleYN: saleYN,
                            merchId: 0,
                        },
                        type: 'GET',
                        success: function () {
                            console.log(document.getElementsByClassName("merchNo")[0].value);
                        if(!document.getElementsByClassName("merchNo")[0].value){
                            location.reload(true);
                            doUpdate();
                        }
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

        var newTr = document.createElement('TR');

        var newMerch = `
        <td class="merchNo"></td>
        <td class="merchName"><input type="text" name="merchName" value="" placeholder="請輸入造型名稱"></td>
        <td class="merchPart">
            <select name="merchPart">
                <option value="1">船頭</option>
                <option value="2">船身</option>
                <option value="3">船帆</option>
            </select>
        </td>
        <td class="merchImg">
            <img src="" class="imgPreview">
            <input class="merchInputImg" type="file">
        </td>
        <td class="cusYN">    
                <select name="cusYN">
                    <option value="1">商城造型</option>
                    <option value="0">客製化造型</option>
                </select>
        </td>
        <td class="merchPrice">
            <input type="text" name="oMPrice" value="">
        </td>

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
    `;

    newTr.innerHTML = newMerch;
    var merchTable = document.getElementById('merchTable');
    var firstMerch = merchTable.getElementsByTagName('tbody')[1];
    merchTable.insertBefore(newTr, firstMerch);

        var inputImg = document.getElementsByClassName('merchInputImg');

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
        addRemove();
    };
    addRemove();
    doUpdate();

    //修改動作
    function doUpdate() {
        var updateBtn = document.getElementsByClassName('updateList');
        var inputChange = document.getElementsByTagName('input');
        var selectChange = document.getElementsByTagName('select');

        for (var i = 0; i < updateBtn.length; i++) {
            inputChange[i * 3].onkeyup = function (e) {
                e.target.parentNode.parentNode.getElementsByClassName('updateList')[0].style.display = "inline-block";
            };
            inputChange[i * 3 + 1].onchange = function (e) {
                e.target.parentNode.parentNode.getElementsByClassName('updateList')[0].style.display = "inline-block";
            };
            inputChange[i * 3 + 2].onkeyup = function (e) {
                e.target.parentNode.parentNode.getElementsByClassName('updateList')[0].style.display = "inline-block";
            };
            selectChange[i * 3].onchange = function (e) {
                e.target.parentNode.parentNode.getElementsByClassName('updateList')[0].style.display = "inline-block";
            };
            selectChange[i * 3 + 1].onchange = function (e) {
                e.target.parentNode.parentNode.getElementsByClassName('updateList')[0].style.display = "inline-block";
            };
            selectChange[i * 3 + 2].onchange = function (e) {
                e.target.parentNode.parentNode.getElementsByClassName('updateList')[0].style.display = "inline-block";
            };
        }

        var updateBtn = document.getElementsByClassName('updateList');


        for (var i = 0; i < updateBtn.length; i++) {

            updateBtn[i].onclick = function (e) {

                var merchUpdate = e.target.parentNode.parentNode;
                var merchName = merchUpdate.getElementsByClassName('merchName')[0].childNodes[0].value;
                var merchPart = merchUpdate.getElementsByClassName('merchPart')[0].getElementsByTagName('select')[0].value;
                var merchImg = merchUpdate.getElementsByClassName('merchImg')[0].getElementsByTagName('input')[0].value;
                var cusYN = merchUpdate.getElementsByClassName('cusYN')[0].getElementsByTagName('select')[0].value;
                var merchPrice = merchUpdate.getElementsByClassName('merchPrice')[0].getElementsByTagName('input')[0].value;
                var saleYN = merchUpdate.getElementsByClassName('saleYN')[0].getElementsByTagName('select')[0].value;
                var merchId = merchUpdate.getElementsByClassName('merchNo')[0].innerHTML;

                e.target.style.display= "none";

                $.ajax({
                    url: 'php/editMerch.php',
                    data: {
                        doType: 'update',
                        merchName: merchName,
                        merchPart: merchPart,
                        merchImg: merchImg,
                        cusYN: cusYN,
                        merchPrice: merchPrice,
                        saleYN: saleYN,
                        merchId: merchId,
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

    }



};

window.addEventListener("load", function () {
    var butmodify = document.querySelectorAll(".IQmodify");
    for (var i = 0; i < butmodify.length; i++) {
        butmodify[i].onclick = function (e) {
            index = $(this).parent().parent().index() - 1;
            testText = $('.testText').eq(index).val();
            point = $('.point').eq(index).val();
            option1 = $('.option1').eq(index).val();
            option2 = $('.option2').eq(index).val();
            option3 = $('.option3').eq(index).val();
            option4 = $('.option4').eq(index).val();
            answer = $('.answer').eq(index).val();

            var xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    console.log('i');
                    console.log(xhr.responseText)
                    // getMeShipJSON( xhr.responseText );
                } else {
                    alert(xhr.status);
                }
            }

            var url = "backstage/backIQTest.php?testText=" + testText + "&point=" + point+ "&option1=" + option1+ "&option2=" + option2+ "&option3=" + option3+ "&option4=" + option4+ "&answer=" + answer;
            xhr.open("Get", url, true);
            xhr.send(null);

        }
    }
})
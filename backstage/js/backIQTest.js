window.addEventListener("load", function () {
    var butmodify = document.querySelectorAll(".IQmodify");
    for (var i = 0; i < butmodify.length; i++) {
        butmodify[i].onclick = function (e) {
            index = $(this).parent().parent().index() - 1;
            testText = $('.testText').eq(index).val();
            point = parseInt($('.point').eq(index).val());
            option1 = $('.option1').eq(index).val();
            option2 = $('.option2').eq(index).val();
            option3 = $('.option3').eq(index).val();
            option4 = $('.option4').eq(index).val();
            answer = $('.answer').eq(index).val();
            testId = parseInt($('.testId').eq(index).text());
            console.log(testText)
            console.log(point)
            console.log(option1)
            console.log(option2)
            console.log(option3)
            console.log(option4)
            console.log(answer)
            console.log(option1)

            var xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    
                } else {
                    alert(xhr.status);
                }
            }

            var url = "php/backIQTestUpdate.php?testId=" + testId +"&testText="+testText+"&point="+point+"&option1="+option1+"&option2="+option2+"&option3="+option3+"&option4="+option4+"&answer="+answer;
            xhr.open("Get", url, true);
            xhr.send( null );

        }
    }
})
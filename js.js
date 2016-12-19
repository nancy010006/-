var time=3000;//設定倒數10秒
function countdown(objid){
        if(time==0){
                document.getElementById("count").innerHTML = "<button onclick='overday()'>本日已結束 看帳本>_<</button>";
        }else{
                document.getElementById("count").innerHTML = (time/1000) + " sec...";
                setTimeout("countdown('" + objid + "')",1000);
        }
        time-=1000;
}
function overday(){
        $.ajax({
                      url: "controller.php",
                      type: 'POST',
                      data: $("#sell").serialize(), //optional, you can send field1=10, field2='abc' to URL by this
                      error: function(response) { //the call back function when ajax call fails
                        alert('異常錯誤 請稍後再試');
                        },
                      success: function(txt) { //the call back function when ajax call succeed
                        console.log(txt);
                        window.location.reload("index.php")
                        }
                    });
}

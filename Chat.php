<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>chat</title>

<link rel="stylesheet" href="">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<header>
名前<br>
    <input type="text" id="n" name="n"><br>
    メッセージ<br>
    <textarea id="m" name="m" cols="30" rows="3"></textarea>

    <button id="ajax">送信</button>
    <button id="del">トークの削除</button><hr>

    
</header>
<div id="result"></div>
<script>
$(function(){
  window.onload = function(){
    $.ajax({
            url:'./datasend.php',
            datatype: 'json',
            data:{}
        })
         .done( function(data){
             $('#result').html(data);
            console.log('通信成功');
         })
  }
  setInterval(function(){
      $.ajax({
          url:'./datasend.php',
          datatype: 'json',
          data:{}
      })
       .done( function(data){
           $('#result').html(data);
          console.log('通信成功');
       })

  }, 1000);

 $('#ajax').on('click',function(){

  $.ajax({
   url:'./dbconnect.php', //送信先
   type:'POST', //送信方法
   datatype: 'json', //受け取りデータの種類
   data:{
    'n' : $('#n').val(),
    'm' : $('#m').val()
   }
   })
   // Ajax通信が成功した時
   .done( function(data) {
   console.log('通信成功');
   console.log(data);
   })
   // Ajax通信が失敗した時
   .fail( function(data) {
   console.log('通信失敗');
   console.log(data);
   })

  $('textarea').val("");
 }); //#ajax click end


$('#del').on('click',function(){

  $.ajax({
   url:'./deletetb.php', //送信先
   data:{}
   })
   // 通信成功
   .done( function(data) {
   console.log('通信成功');
   console.log(data);
   })
   // 通信失敗
   .fail( function(data) {
   console.log('通信失敗');
   console.log(data);
   })

  $('textarea').val("");
 });


}); //終了
</script>

</body>
</html>
© 2021 Git

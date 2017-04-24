
// $(function(){$(document).on('submit','#chatForm',function(){
//
//     var text = $.trim($("#text").val());
//     var name = $.trim($("#name").val());
//
//     if(text != "" && name != ""){
//       $.post('ChatPoster.php',{text: text, name: name}, function(data){
//         $(".chatMessages").append(data);
//       });
//     } else{
//       alert("Please enter a message before posting.");
//     }
//   });
//
//   function getMessages(){
//     $.get('ChatMessages.php',function(data){
//       $(".chatMessages").html(data);
//     });
//   }
//
// });
$(function(){
  var timer = setInterval(function(){ getMessages() }, 500);

  function getMessages(){
    $.get('ChatMessages.php');
    $.post('ChatPoster.php',{text: text, name: name}, function(data){
            $(".chatMessages").append(data);
          });
        } else{
          alert("Please enter a message before posting.");
        }
  }
});

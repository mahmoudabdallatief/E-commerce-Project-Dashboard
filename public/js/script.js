$(document).ready(function(){ 
    var sess= $(".sess").html()
    if(sess){
    Swal.fire({
      position: 'top-top',
      icon: 'success',
      title: 'HELLO <span>'+sess+'</span>Login completed successfully',
      showConfirmButton: false,
      timer: 2000,
    })
    }
    
    
   var hidden = $(".hidden").val()
     if(hidden==1){
        Swal.fire({
            position: 'top-top',
            icon: 'success',
            title: 'The record has updated successfully',
            showConfirmButton: false,
            timer: 2000,
          })
    }
    if(hidden==2){
       Swal.fire({
           position: 'top-top',
           icon: 'success',
           title: 'The record has deleted successfully',
           showConfirmButton: false,
           timer: 2000,
      
         })  
        }
    if(hidden==3){
        Swal.fire({
            position: 'top-top',
            icon: 'success',
            title: 'The record has added successfully',
            showConfirmButton: false,
            timer: 2000,
       
          })  
        }  
        if(hidden==4)  {
            Swal.fire({
              position: 'top-top',
              icon: 'error',
              title: 'You can\'t delete brand has been used',
              showConfirmButton: false,
              timer: 2000,
         
            })
          }
          if(hidden==5)  {
            Swal.fire({
              position: 'top-top',
              icon: 'error',
              title: 'You can\'t delete category has been used',
              showConfirmButton: false,
              timer: 2000,
         
            })
          }
       
    $(".navbar-toggler").click(function(){
        $("#sidebarMenu").toggle()
    })
$('#example').DataTable();
$(".page-item").addClass("item")
$(".item").click(function(){

    $(this).addClass("active"); 
    $(".item").removeClass("active");
})
 $(".eye-icon").click(function(){
    var eye = $(".pass").attr("type")
    if(eye=="password"){
$(".pass").attr("type","text")
    }
    if(eye=="text"){
        $(".pass").attr("type","password")
            }
 })
 $(".btn-del").click(function() {
  var id = $(this).siblings(".delid").val();
  $.ajax({
      type: 'POST',
      url: '/readmessage',
      data: { delid: id },
      dataType: 'html',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        },
      success: function(data) {
          var d = JSON.parse(data);
          $(".message").html(d.count);
          $("#m" + id + "").html(d.view);
          $("#z" + id + "").html(d.date);
          Swal.fire({
              position: 'top-top',
              icon: 'success',
              title: 'The message has been read successfully ',
              showConfirmButton: false,
              timer: 2000,
          });
      }
  });
});
if (window.location.pathname != '/messages') {
   setInterval(function() {
      $(".message").load(location.href + ' #u');
  }, 5000);
}



  
$(".addadmin").click(function() {
  var admin = $(".admin").val();
  var passWord = $(".password").val();
  var priv = $("#priv").val();
  $.ajax({
      url: '/addnewadmin',
      method: 'POST',
      data: {
          admin: admin,
          password: passWord,
          priv: priv
      },
      dataType: 'html',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data1) {
        $("#example").load(location.href + "  .tt,.hh")
          console.log(data1);
          if(data1==2){
            Swal.fire({
            position: 'top-top',
            icon: 'info',
            title: 'Empty Input Data',
            showConfirmButton: false,
            timer: 2000,
       
          }) 

          }
         else{
            Swal.fire({
              position: 'top-top',
              icon: 'success',
              title: 'The record has added successfully',
              showConfirmButton: false,
              timer: 2000,
          
            })
          }
      },
      error: function(xhr) {
          // handle errors here
      }
  });
});
})


 
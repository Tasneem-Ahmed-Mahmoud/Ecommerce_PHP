$(document).ready(function(){

// delete product
$('.product_delete_btn').click(function(e){
    e.preventDefault();
 let id=$(this).val();

 swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover it!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        // 
      $.ajax({

         method:'POST',
         url:'../../hundler/products/delete.php',
         data:{
            'id':id,
            'product_delete_btn':true
         },
         
         success:function(response){
          console.log(response)
                  if(response==200){
                        swal("Success!","product deleted successfully","success");
                        $('#products_table').load(location.href + " #products_table")
                  }else if(response==500){
                    swal("error!","something went wrong","error");
                  }
         }



      })

// 
    } 
  })
})
////////////delete category////////////////



$('.categoty_delete_btn').click(function(e){
  e.preventDefault();
let id=$(this).val();
console.log()
swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover it!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      // 
    $.ajax({

       method:'POST',
       url:'../../hundler/categories/delete.php',
       data:{
          'id':id,
          'categoty_delete_btn':true
       },
     
       success:function(response){
        console.log(response)
                if(response==200){
                      swal("Success!","category deleted successfully","success");
                      $('#category_table').load(location.href + " #category_table")
                }else if(response==500){
                  swal("error!","something went wrong","error");
                }
       }



    })

// 
  } 
})
})

// //////delete user///////////

$('#users').click(function(e){
  // alert("fff")
  e.preventDefault();
let id=$(this).val();
console.log(id)
swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover it!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      // 
    $.ajax({

       method:'POST',
       url:'../../hundler/users/delete.php',
       data:{
          'id':id,
          'users_delete_btn':true
       },
       
       success:function(response){
        console.log(response)
                if(response==200){
                      swal("Success!","user deleted successfully","success");
                      $('#users_table').load(location.href + " #users_table")
                }else if(response==500){
                  swal("error!","something went wrong","error");
                }
       }



    })

// 
  } 
})
})











})



function updateUserStatus(){
  $.ajax({
    url:'../../hundler/users/update_status.php',
  
      success:function(){

      }



  })
}



function getUserStatus(){
  $.ajax({
    url:'../../hundler/users/get_status.php',
  
      success:function(response){
        console.log(response);
$("#user_body").html(response)
      }



  })
}
setInterval(function(){
  updateUserStatus()
},3000)


setInterval(function(){
  getUserStatus()
},7000)
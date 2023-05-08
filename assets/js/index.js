// alert("ssssss")
// function getStates(value) {
//     $.post("../../admin/hundler/products/search.php", {name:value},function(data){
//         $("#results").html(data);
//     }); 
//     console.log(value)
// }

$(document).ready(function(){




//     ///increment
//     $(document).on('click','.increment_btn',function(e){
//         e.preventDefault();
//         let qty=$('.input_qty').val();
//         let value=parseInt(qty,10);
//         value= isNaN(value)? 0:value;
//         console.log(value)
//         if(value < 10){
//             value++;
//             $('.input_qty').val(value);
//         }
        
//         })
        
        
//         $(document).on('click','.decrement_btn',function(e){
//             e.preventDefault();
//             let qty=$('.input_qty').val();
           
//             let value=parseInt(qty,10);
//             value= isNaN(value)? 0:value;
//             console.log(value)
//             if(value >1){
//                 value--;
//                 $('.input_qty').val(value);
//             }
            
//             })
        
// //add to cart

$(document).on('click','.addToCartBtn',function(e){
    e.preventDefault();
    let qty=$('.input_qty').val();
    let id=$(this).val();
    // console.log(id);
    
    //ajax
    $.ajax({
    
        method:'POST',
        url:'../../admin/hundler/carts/store.php',
        data:{
           'product_id':id,
           'product_qty':qty,
          
        },
        
        success:function(response){
          if(response==501){
            swal("error!","login to continue","error");
          }
            else if(response==200){
                swal("Success!","product added to cart  successfully","success");
          }else if(response==500){
            swal("error!","something went wrong","error");
          }else if(response==201){
            swal("error!","product arleady exist","error");
          }
            
        }  
     })
    //ajax
    
    })

// delete cart


$('.cart_delete_btn').click(function(e){
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
         url:'../../admin/hundler/carts/delete.php',
         data:{
            'cart_id':id,
            'product_delete_btn':true
         },
         
         success:function(response){
          console.log(response)
                  if(response==200){
                        swal("Success!","cart  deleted successfully","success");
                        $('#cart').load(location.href + " #cart")
                        // $(document).load()
                  }else if(response==500){
                    swal("error!","something went wrong","error");
                  }
         }



      })

// 
    } 
  })
})

////update cart qty
$(document).on('click','.updateQty',function(e){
    e.preventDefault();
    let id=$(this).closest('.product_data').find('.cart_id').val();;
    let qty=$(this).closest('.product_data').find('.input_qty').val();
console.log(id)
console.log(qty)
 
        // 
      $.ajax({

         method:'POST',
         url:'../../admin/hundler/carts/update.php',
         data:{
            'id':id,
            'qty':qty
         },
         
         success:function(response){
          console.log(response)
                  if(response==200){
                        swal("Success!","cart  updated  successfully","success");
                        $('#cart').load(location.href + " #cart")
                        // $(document).load()
                  }else if(response==500){
                    swal("error!","something went wrong","error");
                  }
         }



      
  })
})











    // search
$(document).on("keyup",".search",function(){
    // console.log($(this))


    let input=$(this).val();
    console.log(input)

    $.ajax({

        method:'POST',
        url:'../../admin/hundler/products/search.php',
        data:{
           name:input
        },
      
        success:function(response){
        if(response==500){
          console.log(response)

          $("#product").html(`<h4 class="text-center">NOT FOUND</h4>`);
        }else{
            console.log(response)
           
           $("#product").html(response);
        }
        }
 
 
 
     })





})


})

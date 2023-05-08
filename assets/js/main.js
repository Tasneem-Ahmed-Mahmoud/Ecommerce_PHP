

$(document).ready(function(){

    ///increment
    $(document).on('click','.increment_btn',function(e){
    e.preventDefault();
    let qty=$('.input_qty').val();
    let value=parseInt(qty,10);
    value= isNaN(value)? 0:value;
    console.log(value)
    if(value < 10){
        value++;
        $('.input_qty').val(value);
    }
    
    })
    
    
    $(document).on('click','.decrement_btn',function(e){
        e.preventDefault();
        let qty=$('.input_qty').val();
       
        let value=parseInt(qty,10);
        value= isNaN(value)? 0:value;
        console.log(value)
        if(value >1){
            value--;
            $('.input_qty').val(value);
        }
        
        })
    
    
    
    // add to cart
    // $(document).on('click','.addToCartBtn',function(e){
    // e.preventDefault();
    // let qty=$('.input_qty').val();
    // let id=$(this).val();
    // console.log(id);
    
    // //ajax
    // $.ajax({
    
    //     method:'POST',
    //     url:'../../admin/hundler/carts/store.php',
    //     data:{
    //        'product_id':id,
    //        'product_qty':qty,
          
    //     },
       
    //     success:function(response){
    //         console.log(response)
    //         if(response==200){
    //             alertify.success("Product added to cart");
    //         }else if(response=="existing"){
    //             console.log(response)
    //             alertify.success("product aready in the cart");
    //         }
    //         else if(response==201){
    //             console.log(response)
    //             alertify.success("product exist");
    //         }else if(response == 500){
    //             alertify.success("somthing went wrong");
    //         }
    //     }  
    //  })
    // //ajax
    
    // })

    // // update QTY
    // $(document).on('click','.updateQty',function(e){
    //     e.preventDefault();
    //  let id=$(this).closest('.product_data').find('.cart_id').val();;
    //     let qty=$(this).closest('.product_data').find('.input_qty').val();
    //     // console.log(qty);
    //     console.log("id:${id}")
    //     console.log(id)
    
    
    
    // //ajax
    // $.ajax({
    
    //     method:'POST',
    //     url:'../../admin/hundler/users/cart.php',
    //     data:{
    //        'id':id,
    //        'qty':qty,
    //        'scope':"update"
    //     },
        
    //     success:function(response){
    //         if(response==200){
    //             alertify.success("Product Qty  updated ");
    //             // location.reload(true)
    //             $('#cart').load(location.href + " #cart")
    //         }
    //         else if(response==500){
    //             alertify.success("somthing went wrong");
    //         }
    //     }  
    //  })
    //ajax
    
    
    // })
    //delete item
    // $(document).on('click','.delete_item',function(e){
    //     e.preventDefault();
    // cart_id=$(this).val();
    // // alert($ccart_id)
    
    // //ajax
    // $.ajax({
    
    //     method:'POST',
    //     url:'../../admin/hundler/users/cart.php',
    //     data:{
    //        'cart_id':cart_id,
          
    //        'scope':"delete"
    //     },
        
    //     success:function(response){
    //         if(response==200){
    //             alertify.success("Product deleted ");
    
    //         }
    //         else if(response==500){
    //             alertify.success("somthing went wrong");
    //         }
    //     }  
    //  })
    // //ajax
    // })
    // add to wish list
    
    
    // $('.addToWishlistBtn').click(function(e){
    //     e.preventDefault()
    //     })
        
    
    
    
    //end


    // //////////////////////////////////owl//////////////////////////

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })

    })
 
    
//     $(document).ready(function(){
    


        
//    $(document).on("keyup",".search",function(e){
//         console.log(e)
//             let input=$(this).val();
//             alert(input)
//             console.log(input)
        
//         })
//     })
    
    // 
    
       
   
     
        
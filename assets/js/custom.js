$(document).ready(function(){

    $('.increment-btn').click(function(e){
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();
    var value= parseInt(qty, 10);
    isNaN(value)? 0 : value;
    if(value < 10)
    {
        value++;
        // $('.input-qty').val(value);
        $(this).closest('.product_data').find('.input-qty').val(value);
    }
    });

 $('.decrement-btn').click(function(e){
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();
    var value= parseInt(qty, 10);
    isNaN(value) ? 0 : value;
    if(value > 1)
    {
        value--;
        // $('.input-qty').val(value);
        $(this).closest('.product_data').find('.input-qty').val(value);
    }
    });

    $('.addToCartBtn').click(function(e){
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();  
        // .val('id');
        // alert(prod_id);
        $.ajax({
            method: "POST",
            url:"functions/handlecart.php",
            data:{
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope":"add"
            },
            success: function (response){

                if(response == 201)
                {
                    alertify.success("Product added to cart");
                }
                else if(response == 401)
                {

                    alertify.success("Login to Continue");
                }
                else if(response == 500)
                { 
                    alertify.success("Something went Wrong");
                }
            }
        }); 
    });

    $(document).on('click', '.updateQty', function (){
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        // var prod_id = $(this).val(); 
        // prod_id
        var  prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method:"POST",
            url:"functions/handlecart.php",
            data:{
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope":"update"
            },
            success: function(response){
                // alert(response);
            }
        });
    });
    $(document).on('click','.deleteItem', function(){
        var cart_id = $(this).val();
        // alert(cart_id);
        $.ajax({
            method:"POST",
            url:"functions/handlecart.php",
            data:{
                "cart_id": cart_id,
                "scope":"delete"
            },
            success: function(response){
                // alert(response);
                if(response == 200)
                {
                    alertify.success("Item deleted successfully!");
                    // $('#mycart').load(location.href + "#mycart");
                    $('#my-cart').load("cart.php #my-cart > *");

                }
                else{
                    alertify.success(response);
                }
            }
        });
    });
});
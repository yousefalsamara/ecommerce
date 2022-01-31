$(document).ready(function () {

    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var product_id=$(this).closest('.product_data').find('.prod_id').val();
        var product_qty=$(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });



        $.ajax({
            method:'POST',
            url:"/add_to_cart",
            data:{
                'product_id':product_id,
                'product_qty':product_qty,
            },
            success:function (response) {
                alert(response.status);


            }


        });

    });



    $('.increment-btn').click(function (e) {
        e.preventDefault();

       // var inc_value=$('.qty-input').val();
        var inc_value=$(this).closest('.product_data').find('.qty-input').val();
        var value=parseInt(inc_value,10);
        value=isNaN(value) ? 0:value;
        if(value <10){
            value++;
           // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        //var dec_value=$('.qty-input').val();
        var dec_value=$(this).closest('.product_data').find('.qty-input').val()
        var value=parseInt(dec_value,10);
        value=isNaN(value) ? 0:value;
        if(value >1){
            value--;
          //  $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        var prod_id=$(this).closest('.product_data').find('.prod_id').val()





        $.ajax({
            method:'POST',
            url:"delete-cart-item",
            data:{
                'prod_id':prod_id,

            },
            success:function (response) {
                //alert(response.status);
                window.location.reload();
                swal("",response.status,"success");


            }


        });

    });

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        var prod_id=$(this).closest('.product_data').find('.prod_id').val()
        var qty=$(this).closest('.product_data').find('.qty-input').val()

        data={
            'prod_id':prod_id,
            'prod_qty':qty,
        }
        $.ajax({
            method:'POST',
            url:"update-cart",
            data:data,

            success:function (response) {
                window.location.reload();


            }


        });


    });



    $('.addToWishlist').click(function (e) {



        e.preventDefault();


        var product_id=$(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method:'POST',
            url:"/add_to_wishlist",
            data:{
                'product_id':product_id,
            },
            success:function (response) {
                swal(response.status);


            }


        });


    });


    $('.remove-wishlist-item').click(function (e) {
        e.preventDefault();

        var prod_id=$(this).closest('.product_data').find('.prod_id').val()

        $.ajax({
            method:'POST',
            url:"delete-wishlist-item",
            data:{
                'prod_id':prod_id,

            },
            success:function (response) {
                //alert(response.status);
                window.location.reload();
                swal("",response.status,"success");


            }


        });


    });
});
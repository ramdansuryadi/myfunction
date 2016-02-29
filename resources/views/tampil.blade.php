<meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <script type="text/javascript">
    var BASE_URL = "{{URL::to('/')}}";
    </script>



          <script>
$(document).ready(function(){   
        $(".form-item").submit(function(e){
            var form_data = $(this).serialize();
            var button_content = $(this).find('button[type=submit]');
            button_content.html('Adding...'); //Loading button text 

            $.ajax({ //make ajax request to cart_process.php
                url: BASE_URL+"/upload",
                type: "POST",
                dataType:"json", //expect json value from server
                data: form_data
            }).done(function(data){ //on Ajax success
                $("#cart-info").html(data.items); //total items in cart-info element
                button_content.html('Add to Cart'); //reset button text to original text
                console.log(data);
                alert("Item added to Cart!"); //alert user
                if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
                    $(".cart-box").trigger( "click" ); //trigger click to update the cart box.
                }
            })
            e.preventDefault();
        });

    //Show Items in Cart
    $( ".cart-box").click(function(e) { //when user clicks on cart box
        e.preventDefault(); 
        $(".shopping-cart-box").fadeIn(); //display cart box
        $("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
        $("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
    });
    
    //Close Cart
    $( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
        e.preventDefault(); 
        $(".shopping-cart-box").fadeOut(); //close cart-box
    });
    
    //Remove items from cart
    $("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
        e.preventDefault(); 
        var pcode = $(this).attr("data-code"); //get product code
        $(this).parent().fadeOut(); //remove item element from box
        $.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
            $("#cart-info").html(data.items); //update Item count in cart-info
            $(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
        });
    });

});
</script>

            @foreach ($tampil as $row)

       






                      <form class="form-item">

  
                      <h4 class="pr-title">{{ $row->part_name }}</h4>
    <input name="product_code" type="hidden" value="{$row["product_code"]}">
    <button type="submit">Add to Cart</button>
</div>
</form>
                
            @endforeach
        

/* get cart total from session on load */
updateCartTotal();

/* button event listeners */
document.getElementById("emptycart").addEventListener("click", emptyCart);
document.getElementById("checkout").addEventListener("click", checkOut);
var btns = document.getElementsByClassName('addtocart');
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click', function() {
        addToCart(this);
    });
}

/* ADD TO CART functions */
function addToCart(elem) {
    //init
    var sibs = [];
    var getprice;
    var getproductName;
    var cart = [];
     var stringCart;
    //cycles siblings for product info near the add button
    while(elem = elem.previousSibling) {
        if(elem.className == "price"){
            getprice = elem.innerText;
        }
        if (elem.className == "productname") {
            getproductName = elem.innerText;
        }
        sibs.push(elem);
    }
    //create product object
    var product = {
        productname : getproductName,
        price : getprice
    };
    //convert product data to JSON for storage
    var stringProduct = JSON.stringify(product);

    /*send product data to session storage */
    if(!sessionStorage.getItem('cart')){
        //append product JSON object to cart array
        cart.push(stringProduct);
        //cart to JSON
        stringCart = JSON.stringify(cart);
        //create session storage cart item
        sessionStorage.setItem('cart', stringCart);
        addedToCart(getproductName);
        updateCartTotal();
    }
    else {
        //get existing cart data from storage and convert back into array
       cart = JSON.parse(sessionStorage.getItem('cart'));
        //append new product JSON object
        cart.push(stringProduct);
        //cart back to JSON
        stringCart = JSON.stringify(cart);
        //overwrite cart data in sessionstorage 
        sessionStorage.setItem('cart', stringCart);
        addedToCart(getproductName);
        updateCartTotal();
    }
}

/* Calculate Cart Total */
function updateCartTotal(){
    //init
    var total = 0;
    var price = 0;
    var items = 0;
    var productname = "";
    var carttable = "";
    if(sessionStorage.getItem('cart')) {
        //get cart data & parse to array
        var cart = JSON.parse(sessionStorage.getItem('cart'));
        //get no of items in cart 
        items = cart.length;
        //loop over cart array
        carttable = "";
        for (var i = 0; i < items; i++){
            //convert each JSON product in array back into object
            var x = JSON.parse(cart[i]);
            //get property value of price
            price = parseInt(x.price?.split('TK ')[1] || 0);
            productname = x.productname;

            if(carttable.includes(productname)){
                index = carttable.lastIndexOf(productname)+productname.length+3;
                count = parseInt(carttable[index]) + 1;
                carttable = carttable.substring(0, index) + count.toString() + carttable.substring(index + 1);
            }
            else{
                //add price to total
                carttable += "<tr><td>" + productname + " (x1)</td><td>TK " + price + "</td></tr>";
            }
            total += price;
        }
        
    }
    //update total on website HTML
    document.getElementById("total").innerHTML = total;
    //insert saved products to cart table
    document.getElementById("carttable").innerHTML = carttable;
    //update items in cart on website HTML
    document.getElementById("itemsquantity").innerHTML = items;
}

//user feedback on successful add
function addedToCart(pname) {
  var message = "\"" + pname + "\"" + " added to cart";
  var alerts = document.getElementById("alerts");
  alerts.innerHTML = message;
  if(!alerts.classList.contains("message")){
     alerts.classList.add("message");
  }
  setTimeout(function(){
    alerts.innerHTML = "";
    alerts.classList.remove("message");
  }, 3000);
}

/* User Manually empty cart */
function emptyCart() {
    //remove cart session storage object & refresh cart totals
    if(sessionStorage.getItem('cart')){
        sessionStorage.removeItem('cart');
        updateCartTotal();
      //clear message and remove class style
      var alerts = document.getElementById("alerts");
      alerts.innerHTML = "";
      if(alerts.classList.contains("message")){
          alerts.classList.remove("message");
      }
    }
}

function checkOut() {
    //remove cart session storage object & refresh cart totals
    if(sessionStorage.getItem('cart') && confirm("Confirm Order?")){
        if(sessionStorage.getItem('cart')) {
            //get cart data & parse to array
            var cart = JSON.parse(sessionStorage.getItem('cart'));
            //get no of items in cart 
            items = cart.length;
            //loop over cart array
            itemNames = "";
            total = 0;
            for (var i = 0; i < items; i++){
                //convert each JSON product in array back into object
                var x = JSON.parse(cart[i]);
                //get property value of price
                price = parseInt(x.price?.split('TK ')[1] || 0);
                productname = x.productname;
                //add price to total
                if(itemNames.includes(productname)){
                    index = itemNames.lastIndexOf(productname)+productname.length+3;
                    count = parseInt(itemNames[index]) + 1;
                    itemNames = itemNames.substring(0, index) + count.toString() + itemNames.substring(index + 1);
                    console.log(itemNames[index+productname.length+3]);
                }
                else{
                    if(itemNames==""){
                        itemNames += productname + " - 1"; 
                    }
                    else{
                        itemNames += ",\n" + productname + " - 1"; 
                    }
                    
                }
                total += price;
            }
            console.log(itemNames);
        }
        console.log(total);
        $.ajax({
            type: "POST",
            url: "order.php",
            data:{
                itemNames: itemNames,
                totalBill: total,
                totalItems: items
            },
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==1){
                    sessionStorage.removeItem('cart');
                    updateCartTotal();
                    var bal = document.getElementById("balance").innerHTML;
                    balance = parseInt(bal?.split('Balance: ')[1] || 0);
                    document.getElementById("balance").innerHTML = "Balance: " + (balance-total);
                    //clear message and remove class style
                    var alerts = document.getElementById("alerts");
                    alerts.innerHTML = "";
                    if(alerts.classList.contains("message")){
                        alerts.classList.remove("message");
                    }
                    alert("Order Confirmed!\nPick up parcel within 30mins.");
                }
                else{
                    alert("Insufficient Balance...");
                }
                document.location.reload();
            }
        })
        
    }
}
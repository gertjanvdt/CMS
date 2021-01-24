getData();


function getData() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        //console.log(this);
        if (this.readyState == 4 && this.status == 200) {
            if(this.response === "") {
            } else {
                let basket = this.responseText; 
                setCartAmount(basket);
            }           
         }; 
    }
    xhttp.open("GET", "models/basket.php?basket", true);
    xhttp.send();
};

function setCartAmount(amount) {
    let cartAmount = document.getElementById('cart_amount');
    if (amount === 0) {
        cartAmount.innerHTML = 0;
    } else {
        cartAmount.innerHTML = amount;
    }
    
}

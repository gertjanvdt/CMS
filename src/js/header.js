getData();

function getData() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this);
        if (this.readyState == 4 && this.status == 200) {
            if(this.response === "") {
            } else {
                let basket = JSON.parse(this.response); 
                setCartAmount(basket.length);
            }            
         }; 
        
    }
    xhttp.open("GET", "models/basket.php", true);
    xhttp.send();
};

function setCartAmount(amount) {
    let cartAmount = document.getElementById('cart_amount');
    cartAmount.innerHTML = amount;
}


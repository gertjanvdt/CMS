const cartAmount = document.getElementById('cart_amount');
const closePopup = document.querySelector('.close_popup');
let cookie = document.cookie;
let loggedin = cookie.includes('loggedin');
const popup = document.querySelector('.ordersLogin_popup');
const optionOrder = document.querySelector('.order_link');

getData("models/basket.php?basket");

optionOrder.addEventListener('click', (e) => {
    if(loggedin) {
        window.location.href = "/orders";
    } else {     
        popup.classList.remove('hide')
    }
})

closePopup.addEventListener('click', () => {
    popup.classList.add('hide');
})


function getData(target) {
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
    xhttp.open("GET", target, true);
    xhttp.send();
};

function setCartAmount(amount) {
    if (amount === 0) {
        cartAmount.innerHTML = 0;
    } else {
        cartAmount.innerHTML = amount;
        setStyling(amount);
    }
    
}

function setStyling(amount) {
    if(amount >= 10) {
        cartAmount.style.left = '12px'
    }
}


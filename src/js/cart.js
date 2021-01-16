const bin = document.getElementById('delete_btn');
const main = document.getElementsByTagName('main');
let basket = '';
const basketItemsContainer = document.querySelector('.checkout_leftBasketItems');
const basketEmptyInfo = document.querySelector('.checkout_leftInfo');


bin.addEventListener('click', (e) => {
    sendData();
    setTotal();
    setNumberOfItems () 
    location.reload();
})

getData();


function showBasketItems() {
    if (basket !== "") {
        for (let i = 0; i < basket.length; i++) {
            
            let img = document.createElement('img');
            img.src = basket[i].image;;

            let title = document.createElement('p');
            title.innerHTML = basket[i].title;

            let price = document.createElement('p');
            price.innerHTML = `$ ${basket[i].price}`;

            let basketItemRow = document.createElement('div');
            basketItemRow.className = "basketItem_row";

            basketItemRow.appendChild(img);
            basketItemRow.appendChild(title);
            basketItemRow.appendChild(price);

            basketItemsContainer.appendChild(basketItemRow);
        }
    } else {
        console.log('basket is empty')
    }
}

function setTotal() {
    const total = document.querySelector(".subtotal_amount");
    if (basket === '') {
        total.innerHTML = "$0.00"
    } else {
        let totalPrice = 0
        for (let i = 0; i < basket.length; i++) {
            totalPrice += parseInt(basket[i].price);
        }
        total.innerHTML = totalPrice;
    }
}

function setNumberOfItems () {
    const nmbrOfItems = document.querySelector(".basketItems_amount");
    if (basket === '') {
        nmbrOfItems.innerHTML = "0"
    } else {
        nmbrOfItems.innerHTML = basket.length;
    }
}

function hideEmptyBanner (itemsInBasket) {
    if (itemsInBasket > 0) {
        basketEmptyInfo.classList.add("hide") 
    }
}


function sendData() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this);
    if (this.readyState == 4 && this.status == 200) {
        // Typical action to be performed when the document is ready:
        // document.location.reload();
        
     };
    }

    xhttp.open("POST", "models/basket.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('title=delete');
};

function getData() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.response === "there is no cookie") {
                console.log('do nothing')
            } else {
                console.log(this.response);
                basket = JSON.parse(this.response); 
                showBasketItems();
                setTotal();
                setNumberOfItems (); 
                hideEmptyBanner(basket.length)
            }            
         }; 
        
    }

    xhttp.open("GET", "models/basket.php", true);
    xhttp.send();
};


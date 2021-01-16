const cartButton = document.querySelectorAll('.add_to_cart');
const cartDisplay = document.getElementById('cart_amount');
let cartAmount = 0;

function addCartNumber() {
    let cartAmount = parseInt(cartDisplay.innerHTML);
    cartAmount++
    cartDisplay.innerHTML = cartAmount;
    return cartAmount;
}


// function getMovies() {
//     let xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//     console.log(this);
//     }

//     xhttp.open("GET", "movies.json", true);
//     xhttp.send();
// };

// function getData() {
//     let xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
        
//     }

//     xhttp.open("GET", "models/basket.php", true);
//     xhttp.send();
// };

function sendData(title) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    console.log(this);
    }

    xhttp.open("POST", "models/basket.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`title=${title}`);
};

for (let i = 0; i < cartButton.length; i++) {
    cartButton[i].addEventListener('click', (e) => {
        addCartNumber();
        let title= cartButton[i].dataset.title;
        sendData(title);
    })
}
const cartButton = document.querySelectorAll('.add_to_cart');
const cartDisplay = document.getElementById('cart_amount');


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
        let id = cartButton[i].dataset.title;
        sendData(id);
        //location.reload();
    })
}
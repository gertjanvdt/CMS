const bins = document.getElementsByClassName('delete_btn');
const checkout = document.querySelector('.checkout_btn');



if(checkout.disabled) {
    checkout.style.backgroundColor = 'grey'
}

for (let i = 0; i < bins.length; i++) {
    let id = bins[i].dataset.title;
    bins[i].addEventListener('click', () => {
        sendData(id);
        document.location.reload();
    })
}

// -----FUNCTIONS -----
function sendData(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this);
    if (this.readyState == 4 && this.status == 200) {
        // Typical action to be performed when the document is ready:  
     };
    }

    xhttp.open("POST", "models/basket.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`delete=${id}`);
};

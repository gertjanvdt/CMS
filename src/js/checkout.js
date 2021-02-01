const shipOptions = document.getElementById('shipment');
const ccType = document.getElementById('cctype');
const payBtn = document.getElementById('payment_btn');


let warning = checkWarning();
if (warning) {
    disableBtn();
    displayWarning(warning);
}

shipOptions.addEventListener('change', (e) => {
    let option = shipOptions.value;
    const cost = sendData(option);
    cost.then(function(result) {
        insertShipCost(result);
        insertTotalCost(result);
    });
    let warning = checkWarning();
    if (warning) {
        disableBtn();
        displayWarning(warning);
    } else {
        enableButton();
    }
})

ccType.addEventListener('change', (e) => {
    let warning = checkWarning();
    if (warning) {
        disableBtn();
        displayWarning(warning);
    } else {
        enableButton();
    }
})




// ----- FUNCTIONS ------
function enableButton() {
    payBtn.disabled = false;
    payBtn.style.backgroundColor = '#f0c14b'
}


function checkWarning() {
    if (isEmpty(ccType.value) && isEmpty(shipOptions.value)) {
        return "Please select shipment and payment options"
    } else if (isEmpty(ccType.value)) {
        return "Please select payment type"
    } else if (isEmpty(shipOptions.value)) {
        return "Please select shipment option"
    } else {
        payBtn.innerHTML = "Pay now"
        return false;
    }
}

function disableBtn() {
    payBtn.disabled = true;
    payBtn.style.backgroundColor = 'grey'
}

function displayWarning(warning) {
payBtn.innerHTML = warning
}


function isEmpty(value) {
    if (value === '') {
        return true
    } else {
        return false;
    }
}


function sendData(option) {
    const promise = new Promise((resolve, reject) => {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        //console.log(this);
        if (this.readyState == 4 && this.status == 200) {
            resolve (this.responseText);
        }
        }
    
        xhttp.open("POST", "views/partials/totalCost.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`option=${option}`);
    });
    return promise;
};

function insertShipCost(cost) {
    let ship = document.getElementById('shipment_price');
    ship.innerHTML = cost;
}

function insertTotalCost(shipCost) {
    totalPrice = document.getElementById('total_amount');
    movieCost = document.getElementById('movies_price').innerHTML;
    let totalCost = parseInt(shipCost) + parseInt(movieCost);
    console.log(shipCost);
    totalPrice.innerHTML = totalCost;
}
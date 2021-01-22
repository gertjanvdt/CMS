const claimBtn = document.getElementById('claim');
const congrats = document.getElementById('congrats');

claimBtn.addEventListener('click', (e) => {
    congrats.classList.remove('hide');
    sendData()
});


function sendData() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    console.log(this);
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            // document.location.reload();
            
        };
    }

    xhttp.open("POST", "models/movies.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('title=discount');
};
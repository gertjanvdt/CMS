const cartButton = document.querySelectorAll('.add_to_cart');
const cartDisplay = document.getElementById('cart_amount');
const navItems = document.getElementsByClassName('main_navItem');

// for (let i = 0; i < cartButton.length; i++) {
//     cartButton[i].addEventListener('click', (e) => {
//         document.location.reload();
//     })
// };

for(let i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener('click', (e) => {
        setNavBackground(e.target);
        let id = navItems[i].dataset.title;
        const moviesDiv = sendData('views/partials/renderMovies.php', 'category', id)
        moviesDiv.then(function(result) {
            setMoviePage(result);
        }); 
        //document.location.reload();
    })
};





// FUNCTIONS
function setMoviePage(moviesDiv) {
    const moviesContainer = document.querySelector('.movies_container');
    const container = document.querySelector('.container');
    moviesContainer.remove();
    container.innerHTML = moviesDiv;
};


function addToBasket(target, title, id) {
    sendData(target, title, id)
    document.location.reload();
}

function sendData(target, name, title) {
    const promise = new Promise((resolve, reject) => {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        console.log(this);
        if (this.readyState == 4 && this.status == 200) {
            resolve (this.responseText);
        }
        }
    
        xhttp.open("POST", `${target}`, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`${name}=${title}`);
    });
    return promise;
};

function setNavBackground(e) {
    for(let y = 0; y < navItems.length; y++) {
        navItems[y].classList.remove('main_navItemSelected');
    }
  e.classList.add('main_navItemSelected');
};
const loginBtn = document.querySelector('.signin_btn');
const emailField = document.getElementById('email');
const passField = document.getElementById('password');


const isEmpty = (email, password) => {
    if (email === "" || password === "") {
        return true;
    } else {
        return false;
    }
   }




// loginBtn.addEventListener('mouseout', (e) => {
//     emailField.style.borderColor = 'black';
//     passField.style.borderColor = 'black';
//     loginBtn.innerHTML = 'Sign in'
// });

loginBtn.addEventListener('click', (e) => {
    const result = document.querySelector('.result').innerHTML;
    console.log(result);
    if (result === 'empty') {
        emailField.style.borderColor = 'red';
        passField.style.borderColor = 'red';
    }
});


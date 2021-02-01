const inputs = document.getElementsByTagName('input');

for(let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('focusout', (e) => {
        if (inputs[i].value === '') {
            inputs[i].style.border = '1px red solid';
        } else {
            inputs[i].style.border = '1px black solid';
        }
    })
}
const VALID_COLOR = "black";
const INVALID_COLOR = "red";

let yField = document.getElementById("y");
let submitButton = document.getElementById("submitButton");


function valid(){
    if (yValidate()==true){
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function yValidate(){
    const FLOAT_REGEX = /^-?\d+(?:\.\d+)?$/;
    let inputY = yField.value;
    inputY = parseFloat(inputY);
    console.log(inputY);
    if (inputY>3 || inputY<-3 || Number.isNaN(inputY) || !FLOAT_REGEX.test(yField.value)){
        yField.style.borderColor = INVALID_COLOR;
        return false;
    } else {
        yField.style.borderColor = VALID_COLOR;
        return true;
    }
}

yField.addEventListener('input', valid);
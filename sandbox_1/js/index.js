'use strict';
window.addEventListener("DOMContentLoaded", () => {
    const indicator = document.getElementById('js');
    if (indicator) {
        indicator.textContent = "true";
    }

    const formDish = document.forms['menu-form'];
    const formDishRadioArr = formDish.querySelectorAll('.input_check-box');

    formDish.addEventListener("submit", function (evt) {
        if (!checkInputs(formDishRadioArr)) {
            evt.preventDefault();
            window.history.back();
            alert('Please, choose dishes before submitting');
        }
    });

    function checkInputs(inputsArr) {
        let checkedArr = [];
        inputsArr.forEach(function (item) {
            if (item.checked) {
                checkedArr.push(item);
            }
        });

        return checkedArr.length !== 0;
    }
/////////////////////////

});
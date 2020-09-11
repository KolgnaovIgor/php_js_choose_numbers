let formBlock = document.getElementsByClassName('form-box-block-numbers')
let dataCheck = '', numberCheck, dataCheckArray = []

for (let i = 1; i <= 512; i = i * 2){
    dataCheck += `<input type="checkbox" class="number-each-checkbox" id="name${i}" name="numbers"><label for="name${i}">${i}</label><br>`
}
dataCheck += `<input type="number">`

let classesCheck = document.getElementsByClassName('number-each-checkbox')

formBlock[0].children[0].innerHTML = dataCheck

for (let i = 0; i < classesCheck.length; i++){
    classesCheck[i].addEventListener('click', () => {
        numberCheck = 10
        for (let j = 0; j < classesCheck.length; j++){
            classesCheck[j].checked ? dataCheckArray[j] = 1 : dataCheckArray[j] = 0
        }
        $.ajax({
            url: '../functions/frontend/frontend.php',
            type: 'POST',
            cache: false,
            data: {
                'checkBoxes': dataCheckArray.join(',')
            },
            dateType: 'html',
            success: function (data) {
                formBlock[0].children[0].children[30].value = data
            }
        });
    })
}

formBlock[0].children[0].children[30].addEventListener('keydown', (event) => {
    if (event.key !== '0' && event.key !== '1' && event.key !== '2' && event.key !== '3' && event.key !== '4' && event.key !== '5' && event.key !== '6' && event.key !== '7' && event.key !== '8' && event.key !== '9'){
        alert('Необходимо вводить только числа!')
    }else{
        setTimeout(() => {
            $.ajax({
                url: '../functions/frontend/frontendback.php',
                type: 'POST',
                cache: false,
                data: {
                    'checkValue': formBlock[0].children[0].children[30].value
                },
                dateType: 'html',
                success: function (data) {
                    if(data == 1){
                        alert('Вы ввели не верное число!')
                    }else{
                        console.log(data)
                        let dataAll = data.split(',')
                        for(let n = 0; n < classesCheck.length; n++){
                            if (dataAll[n] == 1){
                                classesCheck[n].checked = true
                            }
                        }
                    }
                }
            });
        }, 10)
    }
})
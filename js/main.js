// 1. ex
function getUserCountry(){
    let userAnswerRight = true;
    while (userAnswerRight){
        const userCountry = prompt('Где вы живете?');
        //console.log(userCountry);
        //console.log(typeof  Number(userCountry));
        //console.log(Number(userCountry));
        //console.log(isNaN(Number(userCountry)));
        if (userCountry === ''){
            alert('Введите данные');
        } else if (!isNaN(Number(userCountry))){
            alert('Название не может быть числом');
        } else {
            userAnswerRight = false;
        }
    }
}
getUserCountry();
// 2. ex
function isAliquotNumber() {
    let firstNumber = prompt('Введите первое число');
    let secondNumber = prompt('Введите второе число');
    if (secondNumber % firstNumber === 0){
        alert('Второе число кратное первому');
    } else {
        alert('Второе число не кратное первому');
    }
}
isAliquotNumber();
// 3. ex
function isEvenNumber() {
    let isEvenValue = prompt('Введите число');
    //console.log(isEvenValue);
    //console.log(+isEvenValue);
    if (isEvenValue === ''){
        alert('Вы ничего не ввели');
    } else if (isNaN(+isEvenValue)){
        alert('Вы ввели не число!');
    } else if (+isEvenValue % 2 === 0){
        alert('Число четное');
    } else if (+isEvenValue % 2 !== 0){
        alert('Число не четное');
    }
}
isEvenNumber();
// 4. ex
function enterNumber1(){
    let userValue = prompt('Введите число от 1 до 100');
    if (userValue === ''){
        alert('Вы ничего не ввели');
    } else if (isNaN(+userValue)){
        alert('Вы ввели не число!');
    } else if (+userValue < 1 || +userValue > 100){
        alert('Число выходит за рамки диапазона');
    } else if (+userValue <= 25){
        alert('Число лежит в 1 четверти');
    } else if (+userValue > 25 && +userValue <= 50){
        alert('Число лежит в 2 четверти');
    } else if (+userValue > 50 && +userValue <= 75){
        alert('Число лежит в 3 четверти');
    } else{
        alert('Число лежит в 4 четверти');
    }
}
enterNumber1();
// 5. ex
function numericCycle1(){
    label: for (let i = 2; i <= 500; i++){
        for (let j = 2; j < i; j++){
            if (i % j === 0){
                continue label;
            }
        }
        console.log(i);
    }
}
numericCycle1();
// 6. ex
function numericCycle2(){
    for (let i = 1000; i >= 300; i--){
        console.log(i);
    }
}
numericCycle2();
// 7 ex.
function enterNumber2(){
    let userValue = prompt('Введите число');
    for (let i = 1; i <= 100; i++){
        console.log(+userValue + i);
        console.log(+userValue - i);
        console.log(+userValue / i);
        console.log(+userValue * i);
    }
}
enterNumber2();
// 8 ex.
function simpleCalculate(){
    let firstValue = prompt('Введите первое число:');
    if (firstValue === ''){
        alert('Вы ничего не ввели');
        return 0;
    } else if (isNaN(+firstValue)){
        alert('Вы ввели не число!');
        return 0;
    }
    let operand = prompt('Введите операнд ( "+"   "-"   "/"   "*")');
    //console.log(operand);
    //console.log(operand !== '+' && operand !== '-');
    if (operand === ''){
        alert('Вы ничего не ввели');
        return 0;
    } else if (operand !== '+' && operand !== '-' && operand !== '/' && operand !== '*'){
        alert('Вы ввели не операнд');
        return 0;
    }
    let secondValue = prompt('Введите второе число число:');
    if (secondValue === ''){
        alert('Вы ничего не ввели');
        return 0;
    } else if (isNaN(+secondValue)){
        alert('Вы ввели не число!');
        return 0;
    }
    switch (operand){
        case '+':
            alert(+firstValue + +secondValue + ' - результат сложения');
            break;
        case '-':
            alert(+firstValue - +secondValue + ' - результат вычитания');
            break;
        case '/':
            alert(+firstValue / +secondValue + ' - результат деления');
            break;
        case '*':
            alert(+firstValue * +secondValue + ' - результат умножения');
            break;
    }
}
simpleCalculate();
// 9 ex.
function randomGame() {
    let userBet = prompt('Введите вашу ставку:');
    if (userBet === ''){
        alert('Вы ничего не ввели');
        return 0;
    } else if (isNaN(+userBet)){
        alert('Вы ввели не число!');
        return 0;
    }
    let userDownRange = prompt('Введите нижнюю границу диапазона:');
    if (userDownRange === ''){
        alert('Вы ничего не ввели');
        return 0;
    } else if (isNaN(+userDownRange)){
        alert('Вы ввели не число!');
        return 0;
    }
    let userUpRange = prompt('Введите Верхнюю границу диапазона:');
    if (userUpRange === ''){
        alert('Вы ничего не ввели');
        return 0;
    } else if (isNaN(+userUpRange)){
        alert('Вы ввели не число!');
        return 0;
    }
    if (+userDownRange > +userUpRange || +userDownRange === +userUpRange){
        alert('Диапазон либо равняется нулю, либо отрицательный (некорректный ввод)')
        return 0;
    }
    let gainValue = (+userUpRange - +userDownRange) * 0.1 + +userBet;
    let userValue = prompt('Введите число:');
    if (userValue === ''){
        alert('Вы ничего не ввели');
        return 0;
    } else if (isNaN(+userValue)){
        alert('Вы ввели не число!');
        return 0;
    }
    function randomInteger(min, max) {
        // случайное число от min до (max+1)
        let rand = min + Math.random() * (max + 1 - min);
        return Math.floor(rand);
    }
    let randValue = randomInteger(+userDownRange, +userUpRange);
    if (randValue === +userValue){
        alert('Поздравляем! Вы получили ' + gainValue);
    } else {
        alert('Вы проиграли');
    }
}
randomGame();
// 10 ex.
function rockPaperScissors(){
    let userBet = prompt('Введите "камень", "ножницы" или "бумага":');
    if (userBet === ''){
        alert('Вы ничего не ввели');
        return 0;
    } else if (userBet !== 'камень' && userBet !== 'ножницы' &&  userBet !== 'бумага'){
        alert('Вы ввели не правильное значение!');
        return 0;
    }
    function randomInteger(min, max) {
        // случайное число от min до (max+1)
        let rand = min + Math.random() * (max + 1 - min);
        return Math.floor(rand);
    }
    let serverBet = randomInteger(1, 3);
    console.log(serverBet);
    console.log(userBet);
    switch (serverBet){
        case 1:
            alert('Компьютер поставил камень');
            if (userBet === 'камень'){
                alert('Ничья');
                return 0;
            } else if(userBet === 'ножницы'){
                alert('Вы проиграли');
                return 0;
            } else {
                alert('Вы победили');
                return 0;
            }
        case 2:
            alert('Компьютер поставил ножницы');
            if (userBet === 'камень'){
                alert('Вы победили');
                return 0;
            } else if(userBet === 'ножницы'){
                alert('Ничья');
                return 0;
            } else {
                alert('Вы проиграли');
                return 0;
            }
        case 3:
            alert('Компьютер поставил бумагу');
            if (userBet === 'камень'){
                alert('Вы проиграли');
                return 0;
            } else if(userBet === 'ножницы'){
                alert('Вы победили');
                return 0;
            } else {
                alert('Ничья');
                return 0;
            }
    }
}
rockPaperScissors();
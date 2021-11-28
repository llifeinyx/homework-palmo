// 1 ex.
function isNum(number){
    if (!number){
        return false;
    }
    if (isNaN(+number)){
        return false;
    } else {
        return true;
    }
}
alert(isNum(prompt('Введите число')));
// 2 ex.
function midValue(firstNumber, secondNumber, thirdNumber){
    if (isNum(+firstNumber) && isNum(+secondNumber) && isNum(+thirdNumber)){
        return (+firstNumber + +secondNumber + +thirdNumber)/3;
    }
    else {
        return 'Некорректный ввод';
    }
}
function midValueScript(){
    let firstNumber = prompt('Введите число:');
    let secondNumber = prompt('Введите число:');
    let thirdNumber = prompt('Введите число:');
    alert(midValue(firstNumber, secondNumber, thirdNumber));
}
midValueScript();
// 3 ex.
testObj1 = {
    name: 'Ira'
};
testObj2 = {
    noname: 'Ari'
};
function hasObjectPropertyName(obj) {
    if (obj.hasOwnProperty('name')){
        return true;
    } else {
        return false
    }
}
console.log(hasObjectPropertyName(testObj1));
console.log(hasObjectPropertyName(testObj2));
// 4 ex.
user = {
    name: 'Jhon',
    surname: 'Smith'
};
function UsernameObjectToString(user) {
    console.log(`${user.name} ${user.surname}`);
}
UsernameObjectToString(user);
// 5 ex.
userValue= {
    name1: 200,
    name2: 500,
    name3: 400
}
function sumObjProperties(obj) {
    return obj.name1 + obj.name2 + obj.name3;
}
console.log(sumObjProperties(userValue));
// 6 ex.
testObj3 ={
    name: 'Jhon',
    age: 23,
    gay: true
};
function objectTreatment(obj) {
    for (let prop in obj){
        if (typeof obj[prop] === 'number'){
            obj[prop] = Math.round(obj[prop]/2);
        } else if(typeof obj[prop] === 'string') {
            obj[prop] = 'Hello, Palmo.';
        } else {
            delete obj[prop];
        }
    }
    return obj;
}
console.log(objectTreatment(testObj3));
// 7 ex.
quizQuestions = [
    'Какого цвета зеленый?',
    'Какого вкуса апельсин?',
    'Где рак свистнет?',
    'Зачем целых 10 вопросов?',
    'Кончается ли у меня фантазия?',
    'q6',
    'q7',
    'q8',
    'q9',
    'q10'
];
quizAnswers = [
    'зеленый',
    'апельсиновый',
    'на горе',
    'не знаю',
    'да',
    'a6',
    'a7',
    'a8',
    'a9',
    'a10'
]
function userAnswerTreatment(i) {
    let userAnswer;
    let rightAnswer = true;
    while(rightAnswer){
        userAnswer = prompt(quizQuestions[i]);
        if (!userAnswer){
            alert('Некорректный ввод');
        } else {
            rightAnswer = false;
        }
    }
    if (userAnswer.toLowerCase() === quizAnswers[i]){
        return true;
    } else {
        return false;
    }
}
function gameQuiz() {
    let userScore = 0;
    for (let i = 0; i < 10; i++){
        if (userAnswerTreatment(i) === true) {
            userScore++;
        }
    }
    alert(`Вы набрали ${userScore} балов из 10 возможных`);
}
gameQuiz();
//ex 1
function upFirst(str) {
    if (!str) return str;
    return str[0].toUpperCase() + str.slice(1).toLowerCase();
}
//debug
console.log(upFirst('иВаНоВ'));
//ex 2
function truncate(str, maxlength) {
    return (str.length > maxlength) ? str.slice(0, maxlength - 1) + '…' : str;
}
//debug
console.log(truncate('lol', 2));
//ex 3
function getShortName(fullName) {
    let fullNameArray = fullName.split(' ');
    return fullNameArray[0] + ' ' + fullNameArray[1][0] + '. ' + fullNameArray[2][0] + '.';
}
//debug
console.log(getShortName('Бойко Жан Витальевич'));
//ex 4
function hasArrayItemPropertyNameTreatment(obj) {
    // console.log(obj);
    return obj.filter(function (item){
        return item.name;
    });
}
//debug
console.log(
    hasArrayItemPropertyNameTreatment(
        [
            {
                name: 'Andrew',
                age: 18
            },
            {
                name: 'Marry',
                age: 14
            },
            {
                age: 13
            }
        ]
    )
);
//ex 5
function mergeArrays(arr1, arr2) {
    return arr1.concat(arr2);
}
//debug
console.log(mergeArrays(['1', '2', '3'], ['4', '5', '6']));
//ex 6
function modifyString(str) {
    let arr = str.split('-');
    let outStr = arr[0];
    for (let i = 1; i < arr.length; i++){
        outStr += arr[i][0].toUpperCase() + arr[i].slice(1);
    }
    return outStr;
}
//debug
console.log(modifyString('template-of-my-function'));
//ex 7
function calc(str) {
    let firstNumber =  +str[0];
    let secondNumber = +str[str.length - 1];
    let operand;
    for (let value of str){
        if (value === '+'){
            operand = value;
        }
        if (value === '-'){
            operand = value;
        }
        if (value === '*'){
            operand = value;
        }
        if (value === '/'){
            operand = value;
        }
    }
    switch (operand){
        case '+':
            return firstNumber + secondNumber;
        case '-':
            return firstNumber - secondNumber;
        case '*':
            return firstNumber * secondNumber;
        case '/':
            return firstNumber / secondNumber;
    }
}
//debug
console.log(calc('1 +  9'));
//ex 8
function namesFromObjects(obj) {
    let arr = [];
    for (let i in obj){
        // console.log(obj[i].name);
        arr.push(obj[i].name);
    }
    return arr;
}
//debug
console.log(namesFromObjects(
    [
        {
            id: 1,
            name: 'John',
            age: 20
        },
        {
            id: 2,
            name: 'Marry',
            age: 22
        },
        {
            id: 3,
            name: 'Poll',
            age: 25
        },
    ]
));
//ex 9
function treatmentArray(arr) {
    for (let i = 0; i < arr.length; i++){
        if (typeof arr[i] === 'number'){
            arr[i] *= 2;
        }
        if (typeof arr[i] === 'string'){
            arr[i] = arr[i].split('');
        }
    }
    console.log(arr);
    return arr;
}
//debug
console.log(treatmentArray([2, 'str of my life']));
//ex 10
function antiSpam(str) {
    let arr = str.split(' ');
    for (let i = 0; i < arr.length; i++){
        for (let j = 0; j < arr.length; j++){
            if (i !== j && arr[i] === arr[j]){
                return true;
            }
        }
    }
    return false;
}
//debug
console.log(antiSpam('Spam Spam bla la'));
//ex 11
let badWordsArr = [
    'nword',
    'fword'
]
function antiBadWords(str) {
    let arr = str.split(' ');
    for (let i of arr){
        if (badWordsArr.includes(i)){
            return true
        }
    }
    return false;
}
//debug
console.log(antiBadWords('nword lol'));
//ex 12
function arrayToSentence(arr) {
    let str = '';
    for (let i of arr){
        if (typeof i === 'string'){
            str += i;
        }
    }
    return str;
}
//debug
console.log(arrayToSentence(['word1',10,'word2']));
//ex 13
function createPhoneNumber(numbers){
    let format = '(xxx) xxx-xxxx';

    for (number of numbers) {
        format = format.replace('x', number);
    }

    return format;
}
//debug
console.log(createPhoneNumber(
    [3, 8, 0, 8, 2, 4, 5, 5, 9, 1]
));
//ex 14
function getHighestSalary(users) {
    let maxSalary = users[0].salary;
    for (let i of users){
        if (i.salary > maxSalary){
            maxSalary = i.salary;
        }
    }
    return maxSalary;
}
//debug
console.log(getHighestSalary(
   [
       {
           salary: 1500
       },
       {
           salary: 1700
       },
       {
           salary: 1300
       }
   ]
));
//ex 15
function rightStr(str){
    return str.length >= 3 && str.length <= 16 && str &&
        !(
            str.includes('1') ||
            str.includes('2') ||
            str.includes('3') ||
            str.includes('4') ||
            str.includes('5') ||
            str.includes('6') ||
            str.includes('7') ||
            str.includes('8') ||
            str.includes('9') ||
            str.includes('0')
        );
}
//debug
console.log(rightStr('stoka'));
//ex 16
function rightPassword(str) {
    let hasUpperCase = false;
    let hasNumber = false;
    for (let i of str){
        if (i.toUpperCase() === i && (i <= '0' || i >= '9')){
            hasUpperCase = true;
        }
        if (i >= '0' && i <= '9'){
            hasNumber = true;
        }
    }
    return hasUpperCase && hasNumber && str.length >= 6;
}
//debug
console.log(rightPassword('Aacs22133'));

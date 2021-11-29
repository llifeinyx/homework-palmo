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
    for (let i of arr){
        console.log(i);
        if(typeof i === 'number'){
            i *= 2;
            console.log(i);
        }
        if(typeof i === 'string'){
            i = i.split();
            console.log(i);
        }
    }
    return arr;
}
console.log(treatmentArray([2, 'str of my life']));
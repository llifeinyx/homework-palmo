const btnFor1Ex = document.getElementById('btn-for-1-ex');
const btnFor2Ex = document.getElementById('btn-for-2-ex');
const btnFor3Ex = document.getElementById('btn-for-3-ex');
const btnFor4Ex = document.getElementById('btn-for-4-ex');
const btnFor5Ex = document.getElementById('btn-for-5-ex');
const btnFor6Ex = document.getElementById('btn-for-6-ex');
const btnFor8Ex = document.getElementById('btn-for-8-ex');
const btnFor9Ex = document.getElementById('btn-for-9-ex');
const btnForRegistration = document.getElementById('btn-for-registration');
const input1 = document.getElementById('input-1');
const input2 = document.getElementById('input-2');
const input3 = document.getElementById('input-3');
const ex7squareR = document.querySelector('.square.r-sq');
const ex7squareG = document.querySelector('.square.g-sq');
const ex10 = document.querySelector('.ex10 > form');
btnFor1Ex.onclick = () => {
    alert('Hello, Palmo.');
}
btnFor2Ex.onclick = () => {
    input1.value = 'Hello World!';
}
btnFor3Ex.onclick = () => {
    console.log(input2.value);
}
btnFor4Ex.onclick = () => {
    const ex4h1 = document.querySelector('.ex4 > h1');
    const ex4h2 = document.querySelector('.ex4 > h1 + h1');
    const h1text = ex4h1.textContent;
    const h2text = ex4h2.textContent;
    ex4h1.textContent = h2text;
    ex4h2.textContent = h1text;
}
btnFor5Ex.onclick = () => {
    const ptext = document.querySelector('.ex5 > p');
    if (ptext.style.color === 'red'){
        ptext.style.color = 'black';
    } else {
        ptext.style.color = 'red';
    }
}
btnFor6Ex.onclick = () => {
    if (input3.hasAttribute('disabled')){
        input3.removeAttribute('disabled');
    } else {
        input3.setAttribute('disabled', 'disabled');
    }
}
ex7squareR.onclick = () => {
    if (ex7squareR.style.backgroundColor === 'red'){
        ex7squareR.style.backgroundColor = 'green';
    } else {
        ex7squareR.style.backgroundColor = 'red';
    }
}
ex7squareG.onclick = () => {
    if (ex7squareG.style.backgroundColor === 'red'){
        ex7squareG.style.backgroundColor = 'green';
    } else {
        ex7squareG.style.backgroundColor = 'red';
    }
}
btnFor8Ex.onclick = () => {
    const myList = document.getElementById('my-list');
    const newLi = document.createElement('li');
    if (myList.lastElementChild){
        newLi.innerText = `${+myList.lastElementChild.innerText + 1}`;
    } else {
        newLi.innerText = '1';
    }
    myList.append(newLi);
}
btnFor9Ex.onclick = () => {
    const textArea = document.getElementById('textArea');
    const listForTextArea = document.getElementById('list-for-text-area');
    let strTextArea = textArea.value;
    //console.log(strTextArea);
    strTextArea = strTextArea.trim();
    let strTextAreaArr = strTextArea.split(', ');
    for (let item of strTextAreaArr){
        const newLi = document.createElement('li');
        newLi.innerText = `${item}`;
        listForTextArea.append(newLi);
    }
}
function loginTreatment(str){
    str = str.trim();
    let lengthError;
    if (str.length < 4) {
        lengthError = document.createElement('span');
        lengthError.innerText = ' символов меньше 4 ';
        if (ex10.children.item(0).lastElementChild.tagName === 'SPAN'){
            ex10.children.item(0).lastElementChild.remove();
        }
        ex10.children.item(0).append(lengthError);
        document.getElementById('user-login').style.border = '1px solid red';
    }
    if(str.length > 20){
        lengthError = document.createElement('span');
        lengthError.innerText = ' символов больше 20 ';
        if (ex10.children.item(0).lastElementChild.tagName === 'SPAN'){
            ex10.children.item(0).lastElementChild.remove();
        }
        ex10.children.item(0).append(lengthError);
        document.getElementById('user-login').style.border = '1px solid red';
    }
    if (
        str.includes('.') ||
        str.includes('_') ||
        str.includes('/') ||
        str.includes('\\') ||
        str.includes('|') ||
        str.includes(',')
    ){
        lengthError = document.createElement('span');
        lengthError.innerText = ' строка содержит недопустимые символы ';
        if (ex10.children.item(0).lastElementChild.tagName === 'SPAN'){
            ex10.children.item(0).lastElementChild.remove();
        }
        ex10.children.item(0).append(lengthError);
        document.getElementById('user-login').style.border = '1px solid red';
    }

    return str.length >= 4 && str.length <= 20 &&
        !(
            str.includes('.') ||
            str.includes('_') ||
            str.includes('/') ||
            str.includes('\\') ||
            str.includes('|') ||
            str.includes(',')
        );
}
function emailTreatment(str) {
    let dotCount = 0;
    let mailCount = 0;
    let symbolError = document.createElement('span');
    symbolError.innerText = ' Email не отвечает шаблону text@text.text ';
    str = str.trim();
    for (let i of str){
        if (i === '@'){
            mailCount++;
        }
        if (i === '.'){
            dotCount++;
        }
        if (
            str.includes('_') ||
            str.includes('/') ||
            str.includes('\\') ||
            str.includes('|') ||
            str.includes(',')
        ){
            if (ex10.children.item(1).lastElementChild.tagName === 'SPAN'){
                ex10.children.item(1).lastElementChild.remove();
            }
            ex10.children.item(1).append(symbolError);
            document.getElementById('user-email').style.border = '1px solid red';
            return false;
        }
    }
    if (mailCount !== 1 || dotCount !== 1){
        if (ex10.children.item(1).lastElementChild.tagName === 'SPAN'){
            ex10.children.item(1).lastElementChild.remove();
        }
        ex10.children.item(1).append(symbolError);
        document.getElementById('user-email').style.border = '1px solid red';
    }
    return str && dotCount === 1 && mailCount === 1;
}
function ageTreatment(str) {
    // let ageError = document.createElement('span');
    // if (!str){
    //     if (ex10.children.item(2).lastElementChild.tagName === 'SPAN'){
    //         ex10.children.item(2).lastElementChild.remove();
    //     }
    //     ageError.innerText = ' Пустая строка ';
    //     ex10.children.item(2).append(ageError);
    //     document.getElementById('user-email').style.border = '1px solid red';
    // }
    // if (isNaN(+str)){
    //     if (ex10.children.item(2).lastElementChild.tagName === 'SPAN'){
    //         ex10.children.item(2).lastElementChild.remove();
    //     }
    //     ageError.innerText = ' Вы ввели не число ';
    //     ex10.children.item(2).append(ageError);
    //     document.getElementById('user-email').style.border = '1px solid red';
    // }
    // if (+str < 0){
    //     if (ex10.children.item(2).lastElementChild.tagName === 'SPAN'){
    //         ex10.children.item(2).lastElementChild.remove();
    //     }
    //     ageError.innerText = ' Возраст не может быть отрицательным ';
    //     ex10.children.item(2).append(ageError);
    //     document.getElementById('user-email').style.border = '1px solid red';
    // }
    return str && !isNaN(+str) && +str > 0;
}
function passwordTreatment(str) {
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
function repeatPasswordTreatment(str1, str2) {
    return str1 === str2;
}
btnForRegistration.onclick = () => {
    let userLoginStr = document.getElementById('user-login').value;
    let userEmailStr = document.getElementById('user-email').value;
    let userAgeStr = document.getElementById('user-age').value;
    let userPasswordStr = document.getElementById('user-password').value;
    let userRepeatPasswordStr = document.getElementById('user-repeat-password').value;
    //console.log(loginTreatment(userLoginStr));
    //console.log(emailTreatment(userEmailStr));
    if (loginTreatment(userLoginStr) && emailTreatment(userEmailStr) && ageTreatment(userAgeStr) &&
        passwordTreatment(userPasswordStr) && repeatPasswordTreatment(userPasswordStr, userRepeatPasswordStr)){
        document.querySelector('.ex10 > p').innerText = 'Регистрация прошла успешно';
        document.getElementById('user-login').value = '';
        document.getElementById('user-email').value = '';
        document.getElementById('user-age').value = '';
        document.getElementById('user-password').value = '';
        document.getElementById('user-repeat-password').value = '';
    } else {
        document.querySelector('.ex10 > p').innerText = 'Некорректный ввод';
    }
}

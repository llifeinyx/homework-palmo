// let login = prompt('Введите логин:');
// if (login === 'admin' ){
//     if (prompt('Введите пароль:') === 'qwerty123'){
//         alert('Добро пожаловать!');
//     }
//     else{
//         alert('Неправильный пароль');
//     }
// }
// else {
//     alert('Неправильный логин');
// }
//Пример работы условных операторов if, else.
function ex1(){
    let password;
    let login = prompt('Введите логин:');
    if (login !== 'admin' ){
        alert('Неправильный логин');
    }
    if (login === 'admin'){
        password = prompt('Введите пароль');
    }
    if (password === 'qwerty123'){
        alert('Добро пожаловать!');
    }
    if (password !== 'qwerty123'){
        alert('Неправильный пароль.');
    }
}
//Версия без вложенных условий (более читаемая).
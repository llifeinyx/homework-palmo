function min(a, b) {
    if (a < b){
        return a;
    } else {
        return b;
    }
}
function pow(x, n) {
    return x ** n;
}
user = {};
user.name = 'Jhon';
user.surname = 'Smith';
user.name = 'Pete';
delete user.name;
function isEmpty(obj){
    for (const key in obj) {
        return false;
    }
    return true;
}
console.log(isEmpty(user));
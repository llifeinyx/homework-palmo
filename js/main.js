const addStudentBtn = document.querySelector('#add-student-btn');
addStudentBtn.onclick = () => {
    document.getElementById('danger-alert').style.display = 'none';
    let student = document.getElementById('student-name-input').value

    if (student) {
        const dangerAlert = document.getElementById('danger-alert')
        dangerAlert.style.display = 'none'

        const studentList = document.getElementById('student-list')
        const addedStudent = document.createElement('li')
        addedStudent.className = 'list-group-item'
        addedStudent.innerText = student
        studentList.append(addedStudent)

        const successAlert = document.getElementById('success-alert')
        successAlert.style.display = 'block'
        successAlert.textContent = 'Студент успешно добавлен'

        document.getElementById('student-name-input').value = ''

        setTimeout(() => {
            successAlert.style.display = 'none'
        }, 1000)
    } else {
        const dangerAlert = document.getElementById('danger-alert')
        dangerAlert.style.display = 'block'
        dangerAlert.textContent = 'Введите имя студента'
    }
}

const randomBtn = document.querySelector('#random-btn')

randomBtn.onclick = () => {
    const studentList = document.querySelector('#student-list')
    const randomIteration = Math.floor(Math.random() * (7 - 4) + 4)
    const randomStudent = Math.floor(Math.random() * (studentList.children.length) + 1)
    // Тот же самый расчет рандомного студента, но перенесенный в начало
    const sumIteration = randomIteration * studentList.children.length + randomStudent
    // общее количество итераций (прокрутки ради красоты, + необходимые прокрутки чтобы выбрать студента)

    for (const studentItem of studentList.children) {
        studentItem.classList.remove('active', 'is-random-student')
    }

    console.log(randomStudent);
    //дебаг для проверки совпадает ли зарандоменый в коде студент, с выпавшим в коде
    let counter = 0;
    // переменная счетчика. Интерпретирует переменную i в нужное нам число, путем сбрасывания i до нуля каждый раз,
    // когда i становится больше размера массива studentList.children
    for (let i = 0; i < sumIteration; i++){
        setTimeout( () =>{
            studentList.children[counter].classList.add('active');
            if (studentList.children[counter - 1]) {
                studentList.children[counter - 1].classList.remove('active')
            } else {
                studentList.children[studentList.children.length - 1].classList.remove('active')
            }
            if (i === sumIteration - 1){
                studentList.children[counter].classList.add('is-random-student');
            }
            counter++;
            // увеличение счетчика на 1
            if (counter === studentList.children.length){
                counter = 0;
            }
            // То самое условие для сброса счетчика
        }, 150 * i);
    }
// <----------------------------------------------->
//     for (let i = 0; i < randomIteration; i++) {
//         let randomStudent = null;
//
//         if ((randomIteration - 1) === i) {
//             randomStudent = Math.floor(Math.random() * (studentList.children.length) + 1)
//         }
//
//         setTimeout(() => {
//             for (let j = 0; j < (randomStudent || studentList.children.length); j++) {
//                 setTimeout(function timer() {
//                     studentList.children[j].classList.add('active')
//
//                     if (studentList.children[j - 1]) {
//                         studentList.children[j - 1].classList.remove('active')
//                         studentList.children[j - 1].classList.remove('is-random-student')
//                     }
//
//                     if (randomStudent && (randomStudent - 1) === j) {
//                         studentList.children[j].classList.add('is-random-student')
//                     }
//
//                     if (!studentList.children[j + 1] && (randomIteration - 1) !== i) {
//                         setTimeout(() => {
//                             studentList.children[j].classList.remove('active')
//                         }, 150)
//                     }
//                 }, j * 150);
//             }
//         }, i * (studentList.children.length * 150))
//     }
}
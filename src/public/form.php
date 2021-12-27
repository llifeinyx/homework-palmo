<?php
// PHP CODE FROM LESSON
//if (isset($_POST)){
//    print("Имя: " . $_POST['name']);
//    print("<br>Email: " . $_POST['email'] . "<br>");
//    //var_dump($_POST);
//}
//if (isset($_FILES['avatar'])){
//    $file = $_FILES['avatar'];
//    print("Загружен файл с именем " .$file['name'] . " и размером " . $file['size'] . " байт");
//}
//$current_path = $_FILES['avatar']['tmp_name'];
//
//$filename = $_FILES['avatar']['name'];
//$new_path = dirname(__FILE__) . '/uploads/' . $filename;
//$file_path = 'uploads/' . $filename;
//
//move_uploaded_file($current_path, $new_path);
//

// PHP CODE FOR HOMEWORK

function hasNumInStr($str){
    for ($i = 0; $i < strlen($str); $i++){
        if (is_numeric($str[$i])){
            return true;
        }
    }
    return false;
}

function isCorrectString($str, $MODE = 'STRICT'){
    if ($MODE === 'STRICT'){
        $treatmentStr = htmlspecialchars(mb_convert_case(mb_strtolower(trim($str)), MB_CASE_TITLE));
        if (hasNumInStr($treatmentStr) || strlen($treatmentStr) === 0){
            return 'некорректный ввод';
        } else {
            return $treatmentStr;
        }
    }
    if ($MODE === 'NOT_STRICT'){
        $treatmentStr = htmlspecialchars((trim($str)));
        if (is_numeric($treatmentStr) || strlen($treatmentStr) === 0){
            return 'некорректный ввод';
        } else{
            return  $treatmentStr;
        }
    }
}



if (isset($_POST) && isset($_POST['send1Form'])){
    print ("<h1>ЗАДАНИЕ ДЛЯ ПЕРВОЙ ФОРМЫ</h1>");
    print('Ваш город: ' . isCorrectString($_POST['enterCity']) . "<br>");
    print('Ваш возраст: ' . $_POST['radioAge'] . "<br>");
    //var_dump($_POST);
}

if (isset($_POST) && isset($_POST['send2Form'])){
    print ("<h1>ЗАДАНИЕ ДЛЯ ВТОРОЙ ФОРМЫ</h1>");
    print('Название товара: ' . isCorrectString($_POST['enterItemName'], 'NOT_STRICT') . "<br>");
    print('Производитель товара: ' . isCorrectString($_POST['enterItemCreator'], 'NOT_STRICT') . "<br>");
    print('Краткое описание товара: ' . isCorrectString($_POST['commentAboutItem'], 'NOT_STRICT') . "<br>");
    if(isset($_FILES['imageItem'])){
        $file = $_FILES['imageItem'];
        print("Загружен файл с именем " .$file['name'] . " и размером " . $file['size'] . " байт");

        $current_path = $_FILES['imageItem']['tmp_name'];
        $filename = $_FILES['imageItem']['name'];
        $new_path = dirname(__FILE__) . '/uploads/' . $filename;
        $file_path = 'uploads/' . $filename;
        move_uploaded_file($current_path, $new_path);
        echo "<img src='{$file_path}' alt='itemImage'>";
    }
}
//var_dump($_POST);
if (isset($_POST) && (isset($_POST['php_x']) || isset($_POST['html_x']))){
    $mark = 0;
    print ("<h1>ЗАДАНИЕ ДЛЯ ТРЕТЬЕЙ ФОРМЫ</h1>");
    $answerOnPutinTest = $_POST['test1'];
    if (isCorrectString($answerOnPutinTest) === 'Путин'){
        $mark++;
        print('Ответ на первый вопрос правильный' . "<br>");
    } else {
        print('Ответ на первый вопрос неправильный' . "<br>");
    }
    if (isset($_POST['test2'])){
        if ($_POST['test2'] === '988'){
            $mark++;
            print ('Ответ на второй вопрос правильный' . "<br>");
        } else {
            print ('Ответ на второй вопрос неправильный' . "<br>");
        }
    } else {
        print ('Ответ на второй вопрос неправильный' . "<br>");
    }
    print ('Ваши правильные варианты в 3 тесте:' . "<br>");
    if (isset($_POST['test3RightAnswer1'])){
        $mark++;
        print ('false || true' . "<br>");
    }
    if (isset($_POST['test3RightAnswer2'])){
        $mark++;
        print ('true && true' . "<br>");
    }
    if ( !isset($_POST['test3RightAnswer1']) && !isset($_POST['test3RightAnswer2'])){
        print ('их нет' . "<br>");
    }
    if (isset($_POST['php_x'])){
        print ('На финальный вопрос вы ответили неправильно. Ваши баллы: ' . $mark);
    } else {
        print ('Вы ответили правильно на финальный вопрос. Ваши баллы: ' . ++$mark);
    }
}
?>
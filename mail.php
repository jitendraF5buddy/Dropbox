<?php
//print_r($_POST);

$err_tel = '';
$err_name = '';
$err_email = '';
$email = '';
$type = 'Заявка на франшизу!';
//Если форма отправлена

    //Проверка Поля ИМЯ

    if (trim($_POST['name']) == '') {
        $hasError = true;
        $err_name = 'Введите имя';
    } else {
        $name = trim($_POST['name']);
    }

    if (checkPhoneNumber($_POST['tel']) == FALSE) {
        $hasError = true;
        $err_tel = 'Введите телефон';
    } else {
        $tel = checkPhoneNumber($_POST['tel']);
    }

        if(trim($_POST['email']) == ''){
            $hasError = true;
            $err_email = 'Введите Email';
        }else $email .= ' אימייל: '.(trim($_POST['email']));
        $type = 'הודעה מהאתר';

    //Если ошибок нет, отправить email
    if (!isset($hasError)) {
        $emailTo = 'adi@flexdecor.co.il'; //Сюда введите Ваш email
        $body ="שם פרטי ומשפחה: $name \n\n נושא: $type \n\n טלפון: $tel \n\n$email  \n\n ";
        $headers = 'From: My Site <' . $emailTo . '>';
        mail($emailTo, $type, $body, $headers);
        $emailSent = true;
        $err = array(
            'err'=> false
        );
        echo json_encode($err);
    }else {
        $err = array(
            'err'=> true,
            'tel'=> $err_tel,
            'name'=>$err_name,
            'email'=> $err_email,
            'haserr'=> $hasError,
            'test' => json_encode($_POST)
        );
        echo json_encode($err);

    }

function checkPhoneNumber($phoneNumber)
{

    $phoneNumber = preg_replace('/\s|\+|-|\(|\)/', '', $phoneNumber); // удалим пробелы, и прочие не нужные знаки

    if (is_numeric($phoneNumber)) {
        if (strlen($phoneNumber) < 5) // если длина номера слишком короткая, вернем false
        {
            return FALSE;
        } else {
            return $phoneNumber;
        }
    } else {
        return FALSE;
    }
}
?>
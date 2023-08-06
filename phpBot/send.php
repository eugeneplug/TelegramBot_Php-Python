<?php


/*
    $kitchen = $_POST['kitchen'];
    $people = $_POST['people'];
    $event = $_POST['event'];
    $eventDate = $_POST['eventDate'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $name = $_POST['name'];
   
    

/*
    $name = htmlspecialchars($name);
    $tel = htmlspecialchars($tel);
    $email = htmlspecialchars($email);
    $message = htmlspecialchars($message);


    $name = urldecode($name);
    $tel = urldecode($tel);
    $email = urldecode($email);
    $message = urldecode($message);


    $name = trim($name);
    $tel = trim($tel);
    $email = trim($email);
    $message = trim($message);
*/

/*
$kitchen = trim(urldecode(htmlspecialchars($kitchen)));
$people = trim(urldecode(htmlspecialchars($people)));
$event = trim(urldecode(htmlspecialchars($event)));
$eventDate = trim(urldecode(htmlspecialchars($eventDate)));
$address = trim(urldecode(htmlspecialchars($address)));
$tel = trim(urldecode(htmlspecialchars($tel)));
$name = trim(urldecode(htmlspecialchars($name)));

if (mail("yousucker8@gmail.com",
    "Новое письмо с сайта",
    "Вид Кухни: ".$kitchen."\n".
    "Кол-во людей: ".$people."\n".
    "Вид мероприятия: ".$event."\n".
    "Дата: ".$eventDate."\n".
    "Адрес: ".$address."\n".
    "Number: ".$tel."\n".
    "Name: ".$name."\n".
    "From: no-reply@mydomain.ru \r\n")
) {
    echo '<script>alert("Сообщение отправлено!");</script>';
    header('Location: catering.html'); // Redirect back to the initial page
    return;
} else {
    echo '<script>alert("Есть ошибки!");</script>';
}
?>
*/

/*
// Токен для доступа к API телеграм-бота
$telegramToken = '6340234154:AAF0DM3HgKUVFr7mGiibOELHRvrKmi-Tivo';

// ID чата, на который нужно отправить сообщение (можно получить с помощью API бота)
$chatId = 1414568567;

// Текст сообщения, который нужно отправить
$kitchen = $_POST['message'];
$people = $_POST['message'];
$event = $_POST['message'];
$eventDate = $_POST['message'];
$address = $_POST['message'];
$tel = $_POST['message'];
$name = $_POST['message'];

// Формируем URL для отправки запроса
$telegramUrl = "https://api.telegram.org/bot$telegramToken/sendMessage?chat_id=$chatId&text=".urlencode($message);

// Отправляем запрос
$response = file_get_contents($telegramUrl);

// Проверяем результат
if ($response === FALSE) {
    // В случае ошибки
    echo 'Ошибка отправки сообщения в Telegram!';
} else {
    // В случае успешной отправки
    echo 'Сообщение успешно отправлено в Telegram!';
}

*/

?>


<?php
// Токен для доступа к API телеграм-бота
$telegramToken = '6340234154:AAF0DM3HgKUVFr7mGiibOELHRvrKmi-Tivo';

function getNextOrderNumber()
{
    // You can store the last order number in a file or database.
    // For this example, let's assume it is stored in a text file.
    $file = 'order_number.txt';

    if (file_exists($file)) {
        $orderNumber = (int) file_get_contents($file);
        $orderNumber++;
    } else {
        // If the file doesn't exist, start with order number 1.
        $orderNumber = 1;
    }

    // Save the updated order number back to the file.
    file_put_contents($file, $orderNumber);

    return $orderNumber;
}

$orderNumber = getNextOrderNumber();



// ID чата, на который нужно отправить сообщение (можно получить с помощью API бота)
/*$chatId = 1414568567;*/

/*$chatId = -1001910030890;*/


$chatId = 1414568567;
// Получаем значения из формы
$kitchen = $_POST['kitchen'];
$people = $_POST['people'];
$event = $_POST['event'];
$eventDate = $_POST['eventDate'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$name = $_POST['name'];




// Формируем текст сообщения
$message = "Кейтеринг!\nЗаказ №$orderNumber\nВид кухни: $kitchen\nКоличество людей: $people\nТип мероприятия: $event\nДата мероприятия: $eventDate\nАдрес: $address\nТелефон: $tel\nИмя: $name";

// Формируем URL для отправки запроса
$telegramUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";

// Опции для POST-запроса
$options = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query(array('chat_id' => $chatId, 'text' => $message))
    )
);

// Создаем контекст запроса
$context  = stream_context_create($options);

// Отправляем запрос
$result = file_get_contents($telegramUrl, false, $context);

// Проверяем результат
if ($result === FALSE) {
    // В случае ошибки
    echo 'Ошибка отправки сообщения в Telegram!';
} else {
    // В случае успешной отправки
    echo 'Сообщение успешно отправлено в Telegram!';
}
?>
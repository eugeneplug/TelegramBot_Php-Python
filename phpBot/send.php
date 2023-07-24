<?php
// Токен для доступа к API телеграм-бота
$telegramToken = '6340234154:AAF0DM3HgKUVFr7mGiibOELHRvrKmi-Tivo';

// ID чата, на который нужно отправить сообщение (можно получить с помощью API бота)
$chatId = 1414568567;

// Текст сообщения, который нужно отправить
$message = $_POST['message'];

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
?>

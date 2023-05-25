<?php
if (isset($_POST['form_submit'])) {
    // отримуємо данні з форми
    $name = $_POST['username'];
    $email = $_POST['email'];
    $question = $_POST['question'];

    // перевіряємо дані
    if (empty($name) || empty($email) || empty($question)) {
        echo "Будь-ласка, заповніть всі поля форми.";
    } else {
        // відправляємо дані на email
        $to = "youremail@example.com";
        $subject = "Нове питання від користувача " . $name;
        $message = "Ім'я: " . $name . "\r\n";
        $message .= "Email: " . $email . "\r\n";
        $message .= "Питання: " . $question . "\r\n";

        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        mail($to, $subject, $message, $headers);

        echo "Ваше повідомлення відправлено!";
    }
}
?>
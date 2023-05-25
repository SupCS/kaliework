<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormProcessController extends Controller
{
    public function processForm(Request $request)
    {
        $name = $request->input('username');
        $email = $request->input('email');
        $question = $request->input('question');

        if (empty($name) || empty($email) || empty($question)) {
            return redirect()->back()->with('error', 'Будь-ласка, заповніть всі поля форми.');
        }
        // Sending email
        $to = "supezbiz@gmail.com";
        $subject = "Нове питання від користувача " . $name;
        $message = "Ім'я: " . $name . "\r\n";
        $message .= "Email: " . $email . "\r\n";
        $message .= "Питання: " . $question . "\r\n";

        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        mail($to, $subject, $message, $headers);

        return redirect()->route('contacts')->with('success', 'Ваше повідомлення відправлено!');
    }
}

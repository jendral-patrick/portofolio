<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Pastikan PHPMailer terinstal (gunakan Composer atau unduh manual)
require 'vendor/autoload.php'; // Jika menggunakan Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Konfigurasi server SMTP Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dffaaisfas@gmail.com'; // Ganti dengan Gmail Anda
        $mail->Password = 'disdikjabar123';   // Password aplikasi Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Pengaturan email
        $mail->setFrom('your-email@gmail.com', 'Website Contact Form');
        $mail->addAddress('dffaaisfas@gmail.com'); // Email penerima

        $mail->isHTML(true);
        $mail->Subject = 'Pesan Baru dari Form Kontak';
        $mail->Body    = "
            <h3>Pesan Baru dari Form Kontak:</h3>
            <p><strong>Nama:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Pesan:</strong><br>$message</p>
        ";

        $mail->send();
        echo "Pesan berhasil dikirim.";
    } catch (Exception $e) {
        echo "Pesan gagal dikirim. Error: {$mail->ErrorInfo}";
    }
}
?>
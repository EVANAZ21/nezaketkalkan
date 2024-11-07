<?php
// Ödeme bilgilerini al
$cardName = htmlspecialchars($_POST['cardName']);
$cardNumber = htmlspecialchars($_POST['cardNumber']);
$expiryDate = htmlspecialchars($_POST['expiryDate']);
$cvv = htmlspecialchars($_POST['cvv']);
$billingAddress = htmlspecialchars($_POST['billingAddress']);
$billingCity = htmlspecialchars($_POST['billingCity']);
$billingState = htmlspecialchars($_POST['billingState']);
$billingZip = htmlspecialchars($_POST['billingZip']);

// Hata mesajları için bir dizi
$errors = [];

// Kart numarası doğrulama
function validate_card_number($card_number) {
    $card_number = str_replace(' ', '', $card_number);
    $sum = 0;
    for ($i = 0; $i < strlen($card_number); $i++) {
        $digit = (int) $card_number[$i];
        if ($i % 2 == 0) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        $sum += $digit;
    }
    return $sum % 10 == 0;
}

if (!validate_card_number($cardNumber)) {
    $errors[] = "Kart numarası geçersiz!";
}

// Son kullanma tarihi doğrulama
function validate_expiry_date($expiry_date) {
    $expiry_date = str_replace('/', '', $expiry_date);
    if (strlen($expiry_date) != 4) {
        return false;
    }
    $month = (int) substr($expiry_date, 0, 2);
    $year = (int) substr($expiry_date, 2);
    if ($month < 1 || $month > 12) {
        return false;
    }
    if ($year < date('y')) {
        return false;
    }
    return true;
}

if (!validate_expiry_date($expiryDate)) {
    $errors[] = "Son kullanma tarihi geçersiz!";
}

// CVV doğrulama
function validate_cvv($cvv) {
    return strlen($cvv) == 3 || strlen($cvv) == 4;
}

if (!validate_cvv($cvv)) {
    $errors[] = "CVV geçersiz!";
}

// Adres bilgileri doğrulama
function validate_address($address) {
    return strlen($address) > 0;
}

if (!validate_address($billingAddress)) {
    $errors[] = "Fatura adresi geçersiz!";
}

// Hata varsa, hata mesajlarını göster ve formu geri döndür
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
    // Formu geri döndürmek için gerekli HTML kodunu buraya ekleyin
    // Örneğin, formu yeniden yüklemek için bir HTML formu ekleyebilirsiniz.
    exit;
}

// Dosya yazma işlemi
$file = 'payments.txt';
$paymentData = "Kart Sahibi: $cardName \n" .
               "Kart Numarası: $cardNumber\n" .
               "Son Kullanma Tarihi: $expiryDate\n" .
               "CVV: $cvv\n" .
               "Fatura Adresi: $billingAddress\n" .
               "Şehir: $billingCity\n" .
               "Eyalet: $billingState\n" .
               "Posta Kodu: $billingZip\n" .
               "-------------------------\n";

file_put_contents($file, $paymentData, FILE_APPEND | LOCK_EX);

echo "<div class='alert alert-success'>Ödeme bilgileri kaydedildi!</div>";
?>
<?php
// Fungsi untuk mengenkripsi teks
function encrypt($teks, $pergeseran) {
    $hasil = '';
    for ($i = 0; $i < strlen($teks); $i++) {
        $karakter = $teks[$i];
        if (ctype_alpha($karakter)) {// Periksa apakah karakter adalah huruf
            $isHurufKecil = ctype_lower($karakter); // Tentukan huruf kecil atau huruf besar
            $basis = $isHurufKecil ? ord('a') : ord('A');
            $karakter = chr(($basis + ((ord($karakter) - $basis + $pergeseran) % 26)));
        }
        $hasil .= $karakter;
    }
    return $hasil;
}

// Fungsi untuk mendekripsi teks
function decrypt($teks, $pergeseran) {
    return encrypt($teks, 26 - $pergeseran); // Dekripsi adalah enkripsi dengan pergeseran terbalik
}
// memanggil hasil berdasarkan inputan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teks = isset($_POST['teks']) ? $_POST['teks'] : '';
    $pergeseran = isset($_POST['pergeseran']) ? (int)$_POST['pergeseran'] : 0;

    $teksTerenkripsi = encrypt($teks, $pergeseran);
    $teksTerdekripsi = decrypt($teksTerenkripsi, $pergeseran);
} else {
    $teks = '';
    $pergeseran = 0;
    $teksTerenkripsi = '';
    $teksTerdekripsi = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Caesar Cipher</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo '<strong>Hasil Enkripsi:</strong>';
        echo '<p>' . $teksTerenkripsi . '</p>';
        echo '<strong>Hasil Dekripsi:</strong>';
        echo '<p>' . $teksTerdekripsi . '</p>';
    }
    ?>
</body>
</html>
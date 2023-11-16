<?php
// Fungsi untuk mengenkripsi teks
function monoalphabetic_encrypt($teks, $kunci) {
    $hasil = '';
    $teks = strtoupper($teks); // Konversi teks yg di input ke huruf besar

    $alfabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $kunci = strtoupper($kunci); // Konversi kunci ke huruf besar

    for ($i = 0; $i < strlen($teks); $i++) {
        $karakter = $teks[$i]; //menyimpan karakter yg sedng diproses
        //apakah inputannya huruf ABJAD
        if (ctype_alpha($karakter)) {
            $posisi = strpos($alfabet, $karakter); //untuk mencari posisi alfabet inputan dlm abjad asli
            //jk inputan huruf apjad mk kunci yg di inputkan akan dipakai
            if ($posisi !== false) {
                $hasil .= $kunci[$posisi];
            //jk bkn, mk inputannya tetap
            } else {
                $hasil .= $karakter;
            }
        // JK BKN ABJAD
        } else {
            $hasil .= $karakter;
        }
    }

    return $hasil;
}

// Fungsi untuk mendekripsi teks
function monoalphabetic_decrypt($teks, $kunci) {
    $hasil = '';
    $teks = strtoupper($teks); // Konversi teks ke huruf besar

    $alfabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $kunci = strtoupper($kunci); // Konversi kunci ke huruf besar

    for ($i = 0; $i < strlen($teks); $i++) {
        $karakter = $teks[$i];
        if (ctype_alpha($karakter)) {
            $posisi = strpos($kunci, $karakter);
            if ($posisi !== false) {
                $hasil .= $alfabet[$posisi];
            } else {
                $hasil .= $karakter;
            }
        } else {
            $hasil .= $karakter;
        }
    }

    return $hasil;
}
//jk ada inputan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //MENGAMBIL INPUTAN
    $teks = isset($_POST['teks']) ? $_POST['teks'] : '';
    $kunci = isset($_POST['kunci']) ? $_POST['kunci'] : '';

    $teksTerenkripsi = monoalphabetic_encrypt($teks, $kunci);
    $teksTerdekripsi = monoalphabetic_decrypt($teksTerenkripsi, $kunci);
} else {
    $teks = '';
    $kunci = '';
    $teksTerenkripsi = '';
    $teksTerdekripsi = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Monoalphabetic Cipher</title>
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
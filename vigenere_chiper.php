<?php
// Fungsi untuk mengenkripsi teks menggunakan algoritma Vigenere Cipher
function vigenere_encrypt($teks, $kunci) {
    $teks = strtoupper($teks); // Konversi teks ke huruf besar
    $kunci = strtoupper($kunci); // Konversi kunci ke huruf besar
    //menghitung panjang teks dan kunci
    $panjangTeks = strlen($teks);
    $panjangKunci = strlen($kunci);
    $teksTerenkripsi = '';

    //untuk mengiterasi melalui setiap karakter dalam teks.
    for ($i = 0; $i < $panjangTeks; $i++) {
        //memeriksa apakah karakter adalah huruf.
        if (ctype_alpha($teks[$i])) {
            //menghitung offset (pergeseran) untuk karakter dalam teks dan kunci.
            $offsetTeks = ord($teks[$i]) - ord('A');
            $offsetKunci = ord($kunci[$i % $panjangKunci]) - ord('A');
            //menggabungkan offset teks dan offset kunci, kemudian mengambil modulus 26.
            $offsetGabungan = ($offsetTeks + $offsetKunci) % 26;
            //mengonversi offset terenkripsi menjadi karakter sesuai dengan ASCII.
            $karakterTerenkripsi = chr($offsetGabungan + ord('A'));
            $teksTerenkripsi .= $karakterTerenkripsi; //mnyimpn ke variabelteksterenkripsi
        } 
        //jk bkn huruf
        else {
            $teksTerenkripsi .= $teks[$i];
        }
    }

    return $teksTerenkripsi;
}

// Fungsi untuk mendekripsi teks yang telah dienkripsi menggunakan Vigenere Cipher
function vigenere_decrypt($teks, $kunci) {
    $teks = strtoupper($teks); // Konversi teks ke huruf besar
    $kunci = strtoupper($kunci); // Konversi kunci ke huruf besar
    $panjangTeks = strlen($teks);
    $panjangKunci = strlen($kunci);
    $teksTerdekripsi = '';

    for ($i = 0; $i < $panjangTeks; $i++) {
        if (ctype_alpha($teks[$i])) {
            $offsetTeks = ord($teks[$i]) - ord('A');
            $offsetKunci = ord($kunci[$i % $panjangKunci]) - ord('A');
            $offsetGabungan = ($offsetTeks - $offsetKunci + 26) % 26;
            $karakterTerdekripsi = chr($offsetGabungan + ord('A'));
            $teksTerdekripsi .= $karakterTerdekripsi;
        } else {
            $teksTerdekripsi .= $teks[$i];
        }
    }

    return $teksTerdekripsi;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teks = isset($_POST['teks']) ? $_POST['teks'] : '';
    $kunci = isset($_POST['kunci']) ? $_POST['kunci'] : '';

        $teksTerenkripsi = vigenere_encrypt($teks, $kunci);
        $teksTerdekripsi = vigenere_decrypt($teksTerenkripsi, $kunci);
} else {
    $teks = '';
    $kunci = '';
    $aksi = '';
    $teksTerenkripsi = '';
    $teksTerdekripsi = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Algoritma Vigenere Cipher</title>
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

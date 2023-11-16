<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Formulir Gabungan</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-4 mb-3 mb-sm-0 p-2">
            <div class="card">
                <div class="card-body">
                    <h4>Caesar Cipher</h4>
                    <form action="caesar_chiper.php" method="post" target="proses">
                        <label for="teks">Teks:</label></br>
                        <input type="text" id="teks" name="teks" required></br>
                        <label for="pergeseran">Pergeseran (kunci):</label></br>
                        <input type="number" id="pergeseran" name="pergeseran" required></br>
                        <button type="submit" class="btn btn-primary mt-2" value="Enkripsi / Dekripsi">Enkripsi / Dekripsi</button>
                    </form>
                </div>
            </div>
        </div>
    <div class="col-sm-4 p-2">
        <div class="card">
            <div class="card-body">
                <h4>Algoritma Monoalfabetik</h4>
                    <form action="monoalphabet.php" method="post" target="proses">
                        <label for="teks">Teks:</label></br>
                        <input type="text" id="teks" name="teks" required></br>
                        <label for="kunci">Kunci (26 huruf):</label></br>
                        <input type="text" id="kunci" name="kunci" pattern="[A-Za-z]{26}" title="Kunci harus terdiri dari 26 huruf alfabet" required></br>
                        <button type="submit" class="btn btn-primary mt-2" value="Enkripsi / Dekripsi">Enkripsi / Dekripsi</button>
                    </form>     
            </div>
        </div>
    </div>
    <div class="col-sm-4 p-2">
        <div class="card">
            <div class="card-body">
                <h4>Algoritma Vigenere Cipher</h4>
                    <form action="vigenere_chiper.php" method="post" target="proses">
                        <label for="teks">Teks:</label></br>
                        <input type="text" id="teks" name="teks" required></br>
                        <label for="kunci">Kunci:</label></br>
                        <input type="text" id="kunci" name="kunci" required></br>
                        <button type="submit" class="btn btn-primary mt-2" value="Proses">Enkripsi / Dekripsi</button>
                    </form>
            </div>
        </div>
    </div>
    <div class="countainer">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <iframe name="proses"></iframe>
                </div>
            </div>
        </div>
    </div>
    </div>    
</body>
</html>

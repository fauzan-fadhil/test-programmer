<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hitung pola</title>
</head>

<body>
    <h2> menghitung pola</h2>
    <form method="post">
        <label for="text">Text:</label><br>
        <input type="text" id="text" name="text"><br>
        <label for="pattern">Pattern:</label><br>
        <input type="text" id="pattern" name="pattern"><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    function pattern_count($text, $pattern)
    {
        $text_length = strlen($text);
        $pattern_length = strlen($pattern);
        $count = 0;

        // Iterasi untuk mencari pola dalam teks
        for ($i = 0; $i <= $text_length - $pattern_length; $i++) {
            $found = true;

            // Cek apakah pola cocok
            for ($j = 0; $j < $pattern_length; $j++) {
                if ($text[$i + $j] != $pattern[$j]) {
                    $found = false;
                    break;
                }
            }

            // Jika pola cocok, tambahkan ke hitungan
            if ($found) {
                $count++;
            }
        }

        return $count;
    }

    // Memeriksa apakah ada input yang diterima dari formulir
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mendapatkan nilai inputan dari form
        $text = $_POST["text"];
        $pattern = $_POST["pattern"];

        // Memanggil fungsi pattern_count dengan input dari form
        $result = pattern_count($text, $pattern);

        // Menampilkan hasil
        echo "<h3>Result:</h3>";
        echo "Jumlah pola di temukan: $result";
    }
    ?>
</body>

</html>
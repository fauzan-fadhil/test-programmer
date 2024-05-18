<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menghitung angka pada hurup</title>
</head>

<body>
    <h2>menghitung angka pada hurup</h2>
    <form method="post">
        <label for="inputText">Input Text:</label><br>
        <textarea id="inputText" name="inputText" rows="4" cols="50"></textarea><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    function count_and_sort_letters($input)
    {
        $input = str_replace(' ', '', $input); // Hapus spasi dari input
        $letters = str_split($input); // Ubah input menjadi array karakter
        $letter_counts = array_count_values($letters); // Hitung kemunculan setiap huruf
        $sorted_letter_counts = [];

        // Urutkan hasil berdasarkan abjad, dengan mempertahankan huruf kapital
        foreach ($letter_counts as $letter => $count) {
            $lowercase_letter = strtolower($letter);
            if (!isset($sorted_letter_counts[$lowercase_letter])) {
                $sorted_letter_counts[$lowercase_letter] = ['count' => 0, 'uppercase' => []];
            }
            if (ctype_upper($letter)) {
                $sorted_letter_counts[$lowercase_letter]['uppercase'][] = $letter;
            } else {
                $sorted_letter_counts[$lowercase_letter]['count'] += $count;
            }
        }

        // Gabungkan hasil yang sudah diurutkan
        $result = [];
        foreach ($sorted_letter_counts as $letter => $info) {
            $count = $info['count'];
            $uppercase_letters = $info['uppercase'];
            foreach ($uppercase_letters as $uppercase_letter) {
                $result[$uppercase_letter] = 1;
            }
            if ($count > 0) {
                $result[$letter] = $count;
            }
        }

        ksort($result); // Urutkan hasil berdasarkan abjad

        return $result;
    }


    // Memeriksa apakah ada input yang diterima dari formulir
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mendapatkan nilai inputan dari textbox
        $inputText = $_POST["inputText"];

        // Memanggil fungsi count_and_sort_letters dengan input dari textbox
        $result = count_and_sort_letters($inputText);

        // Menampilkan hasil
        echo "<h3>Result:</h3>";
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
    ?>
</body>

</html>
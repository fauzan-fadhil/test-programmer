<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array angka</title>
</head>

<body>
    <h2>Array angka</h2>
    <form method="post">
        <label for="inputArray">Input Array (comma-separated):</label><br>
        <input type="text" id="inputArray" name="inputArray"><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    function sort_array($inputArray)
    {
        // Memisahkan input menjadi array
        $array = explode(",", $inputArray);

        // Menginisialisasi array untuk menyimpan huruf dan angka
        $letters = [];
        $numbers = [];

        // Memisahkan huruf dan angka ke dalam array terpisah
        foreach ($array as $item) {
            if (is_numeric($item)) {
                $numbers[] = $item;
            } else {
                $letters[] = $item;
            }
        }

        // Mengurutkan huruf secara alfabetis
        sort($letters);

        // Menggabungkan huruf dan angka kembali ke dalam satu array
        $sortedArray = array_merge($letters, $numbers);

        return $sortedArray;
    }

    // Memeriksa apakah ada input yang diterima dari formulir
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mendapatkan nilai inputan dari form
        $inputArray = $_POST["inputArray"];

        // Memanggil fungsi sort_array dengan input dari form
        $sortedArray = sort_array($inputArray);

        // Menampilkan hasil
        echo "<h3>Sorted Array:</h3>";
        echo implode(", ", $sortedArray);
    }
    ?>
</body>

</html>
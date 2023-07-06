<?php
    $json = "data.json";
    $dataCustomer = array();
    $dataJson = file_get_contents($json);
    $dataCustomer = json_decode($dataJson, true);

    function saveData($data) {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $jsonData);
    }

    if (isset($_POST['submit'])) {
        $newCustomer = array(
            'nama' => $_POST['nama'],
            'jenisKelamin' => $_POST['jenisKelamin']
        );
        array_push($dataCustomer, $newCustomer);
        saveData($dataCustomer);
    }

    function getData() {
        global $data;
        return $data;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>
</head>
<body>
    <h1>Data Customer</h1>
    <form method="POST">
        <table>
            <tr>
                <td>
                    <label for="nama">Nama</label>
                </td>
                <td>
                    <input type="text" name="nama" id="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Jenis Kelamin</label>
                </td>
                <td>
                    <input type="radio" id="Laki-laki" name="jenisKelamin" value="Laki-laki">
                    <label for="Laki-laki">Laki-laki</label><br>
                    <input type="radio" id="Perempuan" name="jenisKelamin" value="Perempuan">
                    <label for="Perempuan">Perempuan</label><br>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Kirim" name="submit">
                </td>
            </tr>
        </table>
    </form>

    <h1>Data Customer</h1>
    <table border="1" width='100%'>
        <tr>
            <th>Nama Customer</th>
            <th>Jenis Kelamin</th>
        </tr>
        <?php
            
            for($i=0; $i<count($dataCustomer); $i++) {
                echo "<tr>";
                echo "<td>" . $dataCustomer[$i]['nama'] . "</td>";
                echo "<td>" . $dataCustomer[$i]['jenisKelamin'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
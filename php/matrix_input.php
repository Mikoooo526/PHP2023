<!DOCTYPE html>
<html>
<head>
    <title>Formularz - Wartości macierzy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 500px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .matrix-input {
            width: 50px;
        }

        .submit-btn {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>Wprowadź wartości macierzy</h1>
    <form action="wynik.php" method="post">
        <?php
        $rowsA = $_POST['rowsA'];
        $colsA = $_POST['colsA'];
        $rowsB = $_POST['rowsB'];
        $colsB = $_POST['colsB'];

        echo "<h2>Macierz A:</h2>";
        echo "<table>";
        for ($i = 0; $i < $rowsA; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $colsA; $j++) {
                echo "<td><input class='matrix-input' type='text' name='matrixA[$i][$j]'></td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>Macierz B:</h2>";
        echo "<table>";
        for ($i = 0; $i < $rowsB; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $colsB; $j++) {
                echo "<td><input class='matrix-input' type='text' name='matrixB[$i][$j]'></td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<input type='hidden' name='rowsA' value='$rowsA'>";
        echo "<input type='hidden' name='colsA' value='$colsA'>";
        echo "<input type='hidden' name='rowsB' value='$rowsB'>";
        echo "<input type='hidden' name='colsB' value='$colsB'>";
        ?>
        <input class="submit-btn" type="submit" value="Oblicz">
    </form>
</body>
</html>

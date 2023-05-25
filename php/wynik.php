<!DOCTYPE html>
<html>
<head>
    <title>Wynik - Mnożenie macierzy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .result-table {
            margin-bottom: 50px;
        }

        .result-table th, .result-table td {
            font-weight: bold;
        }

        .matrix-table {
            margin-bottom: 20px;
        }

        .matrix-table th, .matrix-table td {
            min-width: 50px;
        }

        .matrix-input {
            width: 50px;
            text-align: center;
        }

        .submit-btn {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Wynik - Mnożenie macierzy</h1>
    <?php
    function multiplyMatrices($matrixA, $matrixB)
    {
        $rowsA = count($matrixA);
        $colsA = count($matrixA[0]);
        $rowsB = count($matrixB);
        $colsB = count($matrixB[0]);

        if ($colsA != $rowsB) {
            echo "<p class='error-message'>Nie można pomnożyć macierzy. Liczba kolumn macierzy A musi być równa liczbie wierszy macierzy B.</p>";
            return;
        }

        $result = array();

        for ($i = 0; $i < $rowsA; $i++) {
            $result[$i] = array();
            for ($j = 0; $j < $colsB; $j++) {
                $result[$i][$j] = 0;
                for ($k = 0; $k < $colsA; $k++) {
                    $result[$i][$j] += $matrixA[$i][$k] * $matrixB[$k][$j];
                }
            }
        }

        return $result;
    }

    $rowsA = $_POST['rowsA'];
    $colsA = $_POST['colsA'];
    $rowsB = $_POST['rowsB'];
    $colsB = $_POST['colsB'];

    $matrixA = array();
    for ($i = 0; $i < $rowsA; $i++) {
        for ($j = 0; $j < $colsA; $j++) {
            $matrixA[$i][$j] = $_POST['matrixA'][$i][$j];
        }
    }

    $matrixB = array();
    for ($i = 0; $i < $rowsB; $i++) {
        for ($j = 0; $j < $colsB; $j++) {
            $matrixB[$i][$j] = $_POST['matrixB'][$i][$j];
        }
    }

    $result = multiplyMatrices($matrixA, $matrixB);

    if ($result) {
        echo "<h2>Macierz A:</h2>";
        echo "<table class='matrix-table'>";
        for ($i = 0; $i < $rowsA; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $colsA; $j++) {
                echo "<td>{$matrixA[$i][$j]}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>Macierz B:</h2>";
        echo "<table class='matrix-table'>";
        for ($i = 0; $i < $rowsB; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $colsB; $j++) {
                echo "<td>{$matrixB[$i][$j]}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>Wynik:</h2>";
        echo "<table class='result-table'>";
        for ($i = 0; $i < $rowsA; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $colsB; $j++) {
                echo "<td>{$result[$i][$j]}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>

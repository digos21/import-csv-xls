<?php


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload csv</title>
</head>
<body>
    <h1>Upload csv e xls</h1>
    <form action="processa.php" method="post" name="uploadCsvXls" enctype="multipart/form-data">
        <label for="">Arquivo</label>
        <br>
        <input type="file">
        <br>
        <br>
        <input type="submit">

    </form>
</body>
</html>
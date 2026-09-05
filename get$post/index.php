<!DOCTYPE html>
<html>
<head>
    <title>Form Komentar</title>
</head>
<body>

<h2>Form Komentar</h2>

<form action="proses.php" method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Isi Komentar:</label><br>
    <textarea name="komentar" rows="5" cols="40" required></textarea><br><br>

    <input type="submit" value="Kirim">
</form>

</body>
</html>
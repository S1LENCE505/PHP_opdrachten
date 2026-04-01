<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="messages">message</label>
        <input type="text" name="message">
        <br>
        <label for="fileToUpload">Select image to upload:</label>
        <input type="file" name="fileToUpload">
        <button type="submit" name="submit">submit</button>
        <img src="uploads/IMG_20240612_122644.jpg" alt="Uploaded Image">
    </form>
</body>
</html>
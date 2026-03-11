<?php
require_once 'read.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>gastenboek</h1>
    <form action="">
        <input type="hidden" name="id">
        <input type="text" name="Author">
        <button>Filter</button>
    </form>
    <?php




    foreach ($rijen as $message){
        $htmlstring = "
        <form action='delete.php ' action='post'>
        <input type='hidden' name='id' value='$message[id]'>
        <label for='Author'>Author:</label>
        <p>$message[Author]</p>
        <label for='message'>Message:</label>
        <p>$message[message]</p>
        <button>Delete</button>
        </form>";   
        echo $htmlstring;
        }
    ?>
    <h2>create new message</h2>
    <form action="create.php" method="post">
        <input type="text" name="author" placeholder="Your Name" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Post Message</button>
    </form>
</body>

</html>
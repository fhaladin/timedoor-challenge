<?php
    require('app/init.php');
    
    if (!empty($_POST)) {
        $post->store();
    }

    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timedoor - Challenge</title>
</head>
<style>
    p {
        width: 367px;
    }
    
    p.error-message {
        color: red;
        text-align: center;
    }
</style>
<body>
    <p class="error-message"><?= $_SESSION['error_message'] ?? null; ?></p> 
    <form action="./index.php" method="post">
        <div>
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" style="width:367px">
        </div>
        <br>
        <div>
            <label for="body">Body</label><br>
            <textarea name="body" id="body" cols="50" rows="10"></textarea>
        </div>
        <div>
            <input type="submit" value="submit">
        </div>
    </form>
    <?php foreach ($post->show() as $data) : ?>
        <hr>
        <p><?= $data->title ?></p>
        <p><?= $data->body ?></p>
        <p style="text-align:right"><?= $data->created_at ?></p>
    <?php endforeach; ?>
</body>
</html>
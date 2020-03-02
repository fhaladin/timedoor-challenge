<?php
    require('class/post.php');
    $post = new Post($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timedoor - Challenge</title>
    <style>
        p {
            width: 367px;
        }
        p.date {
            text-align: right;
        }
        p.alert {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <p class="alert">
        <?php
            if (isset($_POST['submit'])){
                $redirect = $post->store($_POST);
                header($redirect);
            }
        ?>
    </p>
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
            <input type="submit" name="submit" value="submit">
        </div>
    </form>
    <?php if ($result = $post->list()) { ?>
        <?php while ($data = mysqli_fetch_object($result)) { ?>
            <hr>
            <p><?= $data->title ?></p>
            <p><?= $data->body ?></p>
            <p class='date'><?= $data->created_at ?></p>
        <?php } mysqli_free_result($result); ?> 
    <?php } ?>
</body>
</html>
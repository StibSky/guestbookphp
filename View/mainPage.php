<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> guestBook</title>
</head>
<body>
<form action="#" method="post">
    <h1>BESTBOOK GUESTBOOK</h1>
    <h3>share something nice</h3>
    <section>
        <label for="title">Write title here</label>
        <input id="title" name="title" required>
    </section>
    <section>
        <label for="name">Write name here</label>
        <input id="name" name="name" required>
    </section>
    <section>
        <label for="guestText">Write text here</label>
        <textarea id="guestText" name="guestText" rows="4" cols="50" required></textarea>
    </section>
    <input type="submit" name="submitButton">
</form>


<?php foreach (array_reverse($jsonArray) as $arrayItem) : ?>
    <section style="border: solid black">
        <p><strong>name of poster:</strong> <?php echo $arrayItem['name']; ?></p>
        <p><strong>title: </strong> <?php echo $arrayItem['title']; ?></p>
        <p><strong>date of post:</strong> <?php echo $arrayItem['date']; ?></p>
        <p><strong>message left:</strong> <?php echo $arrayItem['message']; ?></p>
    </section>
    <br>
    <br>
<?php endforeach ?>

</body>
</html>
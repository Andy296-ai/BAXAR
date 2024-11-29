<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $listing = "$title|$description|$price\n";
    file_put_contents('listings.txt', $listing, FILE_APPEND);
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Добавить объявление</title>
    <script src="./script.js"></script>
</head>
<body>
    <header> 
         <a href="./index.php" class="home-button">Назад</a>
                    <button id="theme-toggle">🌇</button>
    </header>
  
    <main class='main'>
        <form class="form" method="POST">
            <h1 class="add1">Добавить объявление</h1>
            <div class="asd">
            <label class="naming" for="title">Название:</label>
            <input type="text" id="title" name="title" required>
            </div>
            <div class="asd1">
            <label class="history" for="description">Описание:</label>
            <textarea id="description" name="description" required></textarea>
            </div>
            <div class="asd2">
            <label class="price" for="price">Цена:</label>
            <input type="number" id="price" name="price" required>
            </div>
            <button class="add-button" type="submit">Добавить</button>
        </form>  
        <label class="upload-button" for="avatar">Добавить аватарку</label>
<input type="file" name="avatar" id="avatar" accept="image/*" required>
<img id="avatarPreview" alt="Предварительный просмотр аватарки">
        
    </main>
</body>
</html>
<?php
$listings = file_exists('listings.txt') ? file('listings.txt') : [];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Аналог Avito</title>
    <script src="./script.js"></script>
</head>
<body>
    <header>
        <h1>Аналог Avito</h1>
        <button id="theme-toggle">🌇</button>
        <a href="add_listing.php" class="add-button3">Добавить объявление</a>
        <a href="https://example.com/registration" class="register-button">Регистрация</a> 
        <form method="GET" action="index.php" class="search-form">
            <input type="text" name="search" placeholder="Поиск..." required>
            <button type="submit">Найти</button>
        </form>
    </header>
    <main>
    <?php
            // Получаем список объявлений из файла
            $listings = file('listings.txt');

            // Проверяем, есть ли запрос на поиск
            if (isset($_GET['search'])) {
                $searchTerm = strtolower(trim($_GET['search']));
                $filteredListings = array_filter($listings, function($listing) use ($searchTerm) {
                    list($title, $description, $price) = explode('|', trim($listing));
                    return strpos(strtolower($title), $searchTerm) !== false || strpos(strtolower($description), $searchTerm) !== false;
                });
            } else {
                $filteredListings = $listings; // Если нет поиска, показываем все объявления
            }

            // Отображаем объявления
            foreach ($filteredListings as $listing): ?>
                <?php list($title, $description, $price) = explode('|', trim($listing)); ?>
                <div class="listing">
                    <h3><?php echo htmlspecialchars($title); ?></h3>
                    <p><?php echo htmlspecialchars($description); ?></p>
                    <p>Цена: <?php echo htmlspecialchars($price); ?> ₽</p>
                </div>
            <?php endforeach; ?>
        
    </main><h2 class = "xyi">Объявления</h2>
        <div class="listings">
            <?php foreach ($listings as $listing): ?>
                <?php list($title, $description, $price) = explode('|', trim($listing)); ?>
                <div class="listing">
                    <h3><?php echo htmlspecialchars($title); ?></h3>
                    <p><?php echo htmlspecialchars($description); ?></p>
                    <p>Цена: <?php echo htmlspecialchars($price); ?> ₽</p>
                </div>
            <?php endforeach; ?>
        </div>
</body>
</html>
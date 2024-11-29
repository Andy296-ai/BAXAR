<?php
$listings = file_exists('listings.txt') ? file('listings.txt') : [];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <title>Аналог Avito</title>
    <script src="./script.js"></script>
</head>
<body>
    <header>
        <h1>BazaarX</h1>
        <div class="butt">
            <button id="theme-toggle">🌇</button>
            <a href="add_listing.php" class="add-button3">➕</a>
            <a href="./register/h2.html" class="register-button">Регистрация</a>
        </div>
        <form method="GET" action="index.php" class="search-form">
            <input type="text" name="search" placeholder="Поиск..." required>
            <button class="search" type="submit">🔎</button>
        </form>
    </header>
    <main>
    <?php
            // Получаем список объявлений из файла
            $listings = file('BAXAR\listings.txt');

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
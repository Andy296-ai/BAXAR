<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="./h1cs.css">
            <script src="./scr.js"></script>
        
</head>
<body>
        <header>
        <h1>Регистрация</h1>
    </header>
    <main>
        <form method="POST" action="process_registration.php">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Электронная почта:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Зарегистрироваться</button>
        </form>
    </main>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Получаем данные из формы
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Здесь вы можете добавить код для сохранения пользователя в базе данных
        // Например, хеширование пароля и сохранение данных в MySQL

        // Для примера, просто выведем сообщение
        echo "Регистрация успешна! Добро пожаловать, " . htmlspecialchars($username) . "!";
    } else {
        // Если не POST-запрос, перенаправляем на страницу регистрации
        header('Location: registration.php');
        exit();
    }
?>

</div> 
</body>
</html>
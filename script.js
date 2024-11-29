'use strict';

document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButton = document.getElementById('theme-toggle');
    const body = document.body;

    // Проверяем, есть ли сохраненная тема в localStorage
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark');
        themeToggleButton.textContent = '☀️';
    }

    themeToggleButton.addEventListener('click', () => {
        body.classList.toggle('dark');

        // Сохраняем выбранную тему в localStorage
        if (body.classList.contains('dark')) {
            themeToggleButton.textContent = '☀️';
            localStorage.setItem('theme', 'dark');
        } else {
            themeToggleButton.textContent = '🌇';
            localStorage.removeItem('theme');
        }
    });
});
document.getElementById('avatar').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const preview = document.getElementById('avatarPreview');
            preview.src = e.target.result; // Установка источника для изображения
            preview.style.display = 'block'; // Показываем изображение
        }
        reader.readAsDataURL(file); // Чтение файла как Data URL
    }
});
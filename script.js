'use strict';

document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButton = document.getElementById('theme-toggle');
    const body = document.body;


    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark');
        themeToggleButton.textContent = '☀️';
    }

    themeToggleButton.addEventListener('click', () => {
        body.classList.toggle('dark');


        if (body.classList.contains('dark')) {
            themeToggleButton.textContent = '☀️';
            localStorage.setItem('theme', 'dark');
        } else {
            themeToggleButton.textContent = '🌇';
            localStorage.removeItem('theme');
        }
    });
});

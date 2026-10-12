## Структура проекта

```plaintext
D:\---DEVS---\itlant.ru\
├── docker/
├── root/                           ← Gulp-проект
│   ├── src/
│   │   ├── pages/                  ← HTML-страницы (7 шт.)
│   │   ├── partials/               ← HTML-части (5 шт.)
│   │   └── assets/
│   │       ├── css/                ← 7 CSS-исходников
│   │       │   ├── blog.css
│   │       │   ├── fonts.css
│   │       │   ├── form.css
│   │       │   ├── portfolio.css
│   │       │   ├── service.css
│   │       │   ├── style.css
│   │       │   └── table.css
│   │       ├── js/main.js
│   │       ├── fonts/              ← .woff2
│   │       ├── img/
│   │       └── favicon/
│   ├── dist/                       ← результат сборки
│   │   └── assets/css/*.min.css    ← 7 файлов
│   ├── gulpfile.js
│   └── package.json
├── theme/                          ← WordPress-тема
│   ├── assets/
│   │   ├── css/                    ← 7 .min.css + custom.css
│   │   ├── js/main.min.js
│   │   ├── fonts/
│   │   ├── img/
│   │   └── favicon/
│   ├── inc/                        ← 7 PHP-модулей
│   ├── template-parts/             ← 12 PHP-частей
│   ├── functions.php
│   ├── header.php
│   ├── footer.php
│   ├── front-page.php
│   ├── index.php / page.php / single.php
│   ├── archive.php / archive-portfolio.php
│   ├── single-service.php / single-portfolio.php
│   ├── 404.php
│   └── style.css
├── wp/                             ← WP (не в git)
│   └── wp-content/themes/itlant/   ← Junction → ../../theme
└── README.md
```

## Поток файлов

```plaintext
Gulp (root/) 
    │ npm run build
    ▼
dist/assets/css/*.min.css + js/main.min.js
    │ copyToTheme
    ▼
theme/assets/
    │ junction
    ▼
wp/wp-content/themes/itlant/
    │ wp_enqueue_style/script
    ▼
Браузер
```

## Рабочий процесс

Frontend-разработка (вёрстка):

```plaintext
cd root
npm install
npm run dev          # BrowserSync на :3000, watch файлов

WordPress сразу видит изменения через junction — обновлять тему в админке не нужно.
```

Сборка + деплой в тему:

```plaintext
cd root
npm run deploy       # build + copyToTheme

npm run build:prod   # NODE_ENV=production → htmlmin
```

WordPress-разработка:

```plaintext
cd docker
docker-compose up -d
# Открыть http://localhost:8080
```

Возможные проблемы и решения
Проблема	Причина	Решение
Стили не применились	enqueue.php не находит файл	Проверьте View Source, DevTools → Network. Возможно, ITLANT_DIR неправильный
500 ошибка	Синтаксис в PHP	Включите WP_DEBUG в wp-config.php, смотрите wp-content/debug.log
filemtime(): stat failed	Файл не существует	Проверьте theme/assets/css/*.min.css через Get-ChildItem
Junction «сломался»	Переместили theme/	Пересоздайте: Remove-Item ...itlant; New-Item -ItemType Junction ...
WP не видит тему	Junction без прав	Используйте Junction (не SymbolicLink) — работает без админки
itlant-custom не подключается	Нет custom.css	Создайте: New-Item ...theme\assets\css\custom.css
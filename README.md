D:\---DEVS---\itlant.ru\
│
├── docker/                          ← Docker-окружение
│   ├── docker-compose.yml
│   ├── nginx/
│   │   └── default.conf
│   ├── php/
│   │   └── Dockerfile
│   └── mysql/
│       └── init.sql
│
├── root/                            ← Gulp-проект (статичный сайт)
│   ├── src/
│   │   ├── pages/
│   │   ├── partials/
│   │   ├── assets/
│   │   └── static/
│   ├── dist/                        ← Результат сборки Gulp
│   ├── gulpfile.js
│   └── package.json
│
├── wp/                              ← WordPress (НЕ в git!)
│   ├── wp-admin/
│   ├── wp-content/
│   │   ├── themes/
│   │   │   └── itlant/
│   │   ├── plugins/
│   │   └── uploads/
│   ├── wp-config.php
│   └── ...
│
├── theme/                           ← Исходники темы (в git)
│   ├── functions.php
│   ├── header.php
│   ├── footer.php
│   ├── index.php
│   ├── front-page.php
│   ├── page.php
│   ├── single.php
│   ├── archive.php
│   ├── 404.php
│   ├── page-service.php
│   ├── page-success.php
│   ├── screenshot.png
│   ├── style.css                    ← Заголовок темы
│   ├── template-parts/
│   │   ├── modal.php
│   │   ├── card-service.php
│   │   └── card-article.php
│   └── assets/                      ← Копируется из root/dist/
│       ├── css/
│       ├── js/
│       ├── img/
│       ├── fonts/
│       └── favicon/
│
├── .gitignore
├── .nvmrc
└── README.md
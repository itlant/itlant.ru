```plaintext
itlant.ru/
│
├── docker/                          # Docker-окружение (уже есть)
│   ├── docker-compose.yml
│   ├── nginx/
│   │   └── default.conf
│   ├── php/
│   │   └── Dockerfile
│   └── mysql/
│       └── init.sql
│
│
├── src/                             # 🟢 ИСХОДНИКИ (то, что редактируется руками)
│   │
│   ├── pages/                       # HTML-страницы с @@include
│   │   ├── index.html
│   │   ├── page-service.html
│   │   ├── 404.html
│   │   ├── success.html
│   │   ├── blog.html
│   │   └── article.html
│   │
│   ├── partials/                    # Переиспользуемые блоки
│   │   ├── head.html
│   │   ├── header.html
│   │   ├── footer.html
│   │   ├── modal.html
│   │   ├── scripts.html
│   │   └── analytics.html
│   │
│   ├── assets/                      # Статика (исходная)
│   │   ├── css/
│   │   │   ├── style.css
│   │   │   ├── components.css
│   │   │   └── vendor/              # Сторонние стили
│   │   ├── js/
│   │   │   ├── main.js
│   │   │   ├── modal.js
│   │   │   └── vendor/
│   │   ├── img/                     # Исходные изображения
│   │   │   ├── icons/
│   │   │   ├── portfolio/
│   │   │   └── og/                  # Open Graph превью
│   │   ├── fonts/                   # Self-hosted шрифты
│   │   │   ├── PressStart2P.woff2
│   │   │   └── IBMPlexMono.woff2
│   │   └── favicon/
│   │       ├── favicon.ico
│   │       ├── favicon.svg
│   │       └── apple-touch-icon.png
│   │
│   ├── data/                        # JSON-данные для шаблонов
│   │   ├── services.json
│   │   ├── portfolio.json
│   │   └── articles.json
│   │
│   └── templates/                   # Опционально: Nunjucks/Handlebars
│       └── components/
│
├── dist/                            # 🔴 РЕЗУЛЬТАТ СБОРКИ (не редактируется, в .gitignore)
│   ├── index.html
│   ├── page-service.html
│   ├── 404.html
│   ├── success.html
│   ├── blog.html
│   ├── article.html
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.min.css
│   │   ├── js/
│   │   │   └── main.min.js
│   │   ├── img/
│   │   └── fonts/
│   ├── sitemap.xml
│   └── robots.txt
│
├── wordpress/                       # WordPress-тема (если интегрируется)
│   └── itlant-theme/
│       ├── style.css
│       ├── functions.php
│       ├── index.php
│       ├── header.php
│       ├── footer.php
│       ├── front-page.php
│       ├── page-service.php
│       ├── single.php
│       ├── archive.php
│       ├── 404.php
│       └── template-parts/
│           ├── modal.php
│           ├── card-service.php
│           └── card-article.php
│
├── node_modules/                    # Зависимости (в .gitignore)
│
├── .editorconfig                    # Единые настройки редактора
├── .gitignore                       # Что не коммитить
├── .gitattributes                   # Настройки git для line endings
├── .prettierrc                      # Форматирование
├── .stylelintrc.json                # Линтер CSS
├── .eslintrc.json                   # Линтер JS
├── .nvmrc                           # Версия Node.js
│
├── gulpfile.js                      # Сборка
├── package.json                     # Зависимости и скрипты
├── package-lock.json
│
├── README.md                        # Главный README проекта
└── LICENSE                          # Лицензия (если нужна)
```
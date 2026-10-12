# Сборка
cd D:\---DEVS---\itlant.ru\root
npm run build           # обычная
npm run build:prod      # с минификацией HTML
npm run dev             # watch + BrowserSync
npm run clean           # очистить dist/

# Проверка junction
Get-Item "D:\---DEVS---\itlant.ru\wp\wp-content\themes\itlant" | Select LinkType, Target

# Список CSS в теме
Get-ChildItem "D:\---DEVS---\itlant.ru\theme\assets\css"

# Список JS в теме
Get-ChildItem "D:\---DEVS---\itlant.ru\theme\assets\js"
# Описание

Проект по хакатону Цифровой Прорыв 2024 ЮФО на тему "Поиск музейных предметов".

## Состав команды

- Teamlead, ML — `Тищенко Дмитрий Александрович`
- ML, Speech — `Жданов Александр Сергеевич`
- Fullstack, ML — `Вебер Артем-Дариус Алексеевич`

# Build/Deploy

<!-- TODO: Дариусу расписать -->
## Backend / Frontend
```bash
git clone https://github.com/xLagerFeuer/southhack-museumsearch-2024.git
```

```bash
cd southhack-museumsearch-2024
```

```bash
git checkout back-front
```

```bash
copy .env.dev .env
```

**После чего настройте ваш .env файл**

Установка пакетов
```bash
composer update
```

```bash
sudo docker-compose up -d
```

**Теперь нужно зайти в контейнер**
Подключение к контейнеру:
```bash
sudo docker exec -it <container_id> bash
```

Миграции:
```bash
php artisan migrate
```

Публикация хранилища:
```bash
php artisan storage:link
```

Опционально, принудительный запуск очереди:
```bash
php artisan schedule:work
```

# Фичи проекта

## Векторный поиск

- Поиск изображений по вектороной базе данных
- Концепт использования эмбединга изображения и текста совместно для более точного семантического поиска

## Стандартизация текста

- Работа языковой модели для стандартизации текста по шаблону
- Концепт масштабирования стандартизации текста на большие данные

## Классификация

- Использование в тетрадях Yolov7 для классификации текста
<!-- TODO: уточнить -->

# Структура прототипа

## Дизайн пайплайна поиска по фото

![design photo search pipeline](docs/assets/hack-cp-2024-apri-search-pipeline.drawio.png)

## Дизайн пайплайна обобщения текста
<!-- TODO: добавить -->

# Исследование

## Предложение

Реализация поисковой системы экспонатов музея через методы обработки естественного языка (NLP)

## Почему только img2text не выход

![etrusk kaban meme](docs/assets/etrusk_kaban.png)

## Концепт пайплайна обобщения текста

На рабочие данные необходим пайплайн через стандартизацию путем использования данных с соседей, вероятно, в том числе и изображения.
![concept image text generalization](docs/assets/hack-cp-2024-april-generalize.drawio.png)

## Концепт масштабирования стандартизации на большие данные

Редуцированный подход, в котором экземпляры ранижируются по ревелантности своих данных
![concept scaling text gen., part 1](docs/assets/hack-cp-2024-april-scale-standartization-concept_1.drawio.png)

Таким образом, при прохождении от наиболее ревелантным к наименее, мы можем формировать единый формат записи текста. Также можно рассмотреть переобобщение записей после 1 итерации.

![concept scalint text gen., part 2](docs/assets/hack-cp-2024-april-scale-standartization-concept_2.drawio.png)

# Использованные модели
<!-- TODO: добавить ссылки на модели -->

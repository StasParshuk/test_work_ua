# Проект "Мінімізатор URL" Readme

## Вимоги

- Symfony: 6.4
- PHP: 8.1
- MySQL: 8

## Розгортання

1. Встановіть залежності:

    ```bash
    $ composer install
    ```

2. Створіть базу даних:

    ```bash
    $ php ./bin/console doctrine:database:create
    ```

3. Застосуйте міграції:

    ```bash
    $ php ./bin/console doctrine:migrations:migrate
    ```

## Налаштування з'єднання з базою даних

Переконайтеся, що ви налаштували з'єднання з базою даних у файлі `.env`. Замініть значення змінних оточення для забезпечення правильного підключення до вашої бази даних.

```env
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
```

## Використання

1. Зайдіть в адміністративний розділ Sonata у секцію "UrlRecords".
2. Натисніть "Add new".
   [Приклад](https://prnt.sc/PrlWbnDraOFd)
3. Заповніть поля:
  - Original Url: URL, на який ви хочете вказати.
  - Short Code: Короткий URL на вашому сайті (слаг).
  - Expiration Time: Термін дії перенаправлення.

## Статистика

[Приклад](https://prnt.sc/-pP1IkpZQygj)

Статистика включає в себе записи за днями з кількістю переходів, фільтрацією та сортуванням.

## Використані технології та реалізація

- [Symfony](https://symfony.com/bundles/SonataAdminBundle/current/index.html)
- Валідація в сутностях використовує [Symfony Validator](https://symfony.com/doc/current/validation.html)
- Реалізовано адміністративний інтерфейс за допомогою [Sonata Admin Bundle](https://symfony.com/bundles/SonataAdminBundle/current/index.html)
- Забезпечено взаємодію з базою даних MySQL
- Додано можливість створення та управління короткими URL з розширеною статистикою

## Використання коротких URL

Для використання короткого URL, перейдіть за посиланням, яке складається з основного хосту та короткого коду. Це посилання автоматично перенаправить вас на вказаний "Original Url".

**Примітка:** Якщо короткий URL "expired" або не знайдено, користувач буде перенаправлений на сторінку 404 Not Found. [Приклад](https://prnt.sc/pemt7e_O5B6I)

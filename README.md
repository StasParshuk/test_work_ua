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
    $ php ./bin/console doctrine:migrations:diff
    ```

## Використання

1. Зайдіть в адміністративний розділ Sonata у секцію "UrlRecords".
2. Натисніть "Add new".
   https://prnt.sc/PrlWbnDraOFd
3. Заповніть поля:
  - Original Url: URL, на який ви хочете вказати.
  - Short Code: Короткий URL на вашому сайті (слаг).
  - Expiration Time: Термін дії перенаправлення.

## Статистика

https://prnt.sc/-pP1IkpZQygj

Статистика включає в себе записи за днями з кількістю переходів, фільтрацією та сортуванням.

## Використані технології та реалізація

- [Symfony](https://symfony.com/bundles/SonataAdminBundle/current/index.html)
- Валідація в сутностях використовує [Symfony Validator](https://symfony.com/doc/current/validation.html)
- Реалізовано адміністративний інтерфейс за допомогою [Sonata Admin Bundle](https://symfony.com/bundles/SonataAdminBundle/current/index.html)
- Забезпечено взаємодію з базою даних MySQL
- Додано можливість створення та управління короткими URL з розширеною статистикою

## Внесені зміни

- Додано валідацію для сутностей з використанням Symfony Validator.
- Розроблено адміністративний інтерфейс за допомогою Sonata Admin Bundle.
- Забезпечено можливість відслідковування та виведення статистики переходів за короткими URL.

**Будь ласка, переконайтеся, що ви встановили всі необхідні залежності та налаштували з'єднання з базою даних перед розгортанням.**


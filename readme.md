Задание
--

1) Создать 2 Highload-блока:
Первый блок должен состоять из полей Название Каталога.
Второй блок должен состоять из полей Название Книги, Автор, Id каталога
(связь с первым блоком).
2) Описать таблицы, и связь между ними в Orm.
3) Заполнить таблицы (можно ручками).
4) Написать компонент выводящий на экран массив данных из блоков, но запрос
должен подаваться только на 1 Highload-блок с фильтром по ID каталога.
5) Id должен вводиться в input.
6) Запрос должен посылаться через ajax методом post.

Структура проекта
--

- Сам компонент находится `/local/components/nglab/ng`

 - ORM сущности проекта: `/local/php_interface/lib/omg`
 - в `/local/init.php `- автозагрузка классов проекта

В проекте использовал автозагрузку PSR-4 

````"autoload": {
          "psr-4": {
              "Omg\\": "local/php_interface/lib/omg",
              "Project\\": "local/php_interface/lib/project"
          }
      }``
````


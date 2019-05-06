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

Результат работы можно увидеть здесь:
[нажми сюда](http://bitrix.artem-rogov.ru/)

ИД каталогов для ввода в input: ``id:1, id:2, id:3, id:4``

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

структура таблиц highload блоков
--

таблица каталога книг
```sql
ng_catalog_book | CREATE TABLE `ng_catalog_book` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `UF_NAME_CATALOG` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci |
```
таблица с книгами:
```sql
 ng_books | CREATE TABLE `ng_books` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `UF_AUTHOR` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `UF_BOOK_NAME` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `UF_CATALOG_ID` int(18) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci 
```

В для локальной разработки создал бокс контейнер на базе [homestead](https://laravel.com/docs/5.8/homestead)
только поменял сменил сервер с nginx на apache СУБД - mariadb.

Homestead.yml

```---
   ip: "192.168.10.12"
   memory: 2048
   cpus: 2
   provider: virtualbox
   mariadb: true
   authorize: ~/.ssh/id_rsa.pub
   
   keys:
       - ~/.ssh/id_rsa
   folders:
       - map: ~/bx_projects
         to: /home/vagrant/code
   
   sites:
       - map: bitrix.test
         to: /home/vagrant/code/bitrix
         php: "7.1"
         type: "apache"
   
   databases:
       - bitrix_db

```


# ListCRUD

A list CRUD in MVC with autoload and a simple persistence framework.

Here you'll find two pages to get a list and a sublist, add itens to those lists edit items from those lists, and delete any of the items from those lists.

## Minimum Requirements

- PHP 7
- apache 2.4.29 with Rewrite mode enabled
- MySQL 5.7.25

## Installation

Clone this repository and create the database in your database manager. Use the file "database.sql" at the root of this project. Put the database access data in the config.php file in the config folder.

```
$ git clone git@github.com:edigar/basicCRUD-PHP.git basicCRUD
$ cd basicCRUD
$ cat database.sql
```
Copy the output of the content into your database manager. An access inteface, such as MySQL Workbench, makes it easy to use.

```
$ cd config
$ nano config.php
```
Add the database access data, such as database name, username and password.

On your browser access localhost/basicCRUD/ and voilà. Enjoy listing..
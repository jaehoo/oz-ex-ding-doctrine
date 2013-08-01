# Orbital Zero PHP example Ding and Doctrone

An a simple example to show how to use Ding and Doctrine PHP frameworks in action :)

### Requirements

* php 3.4+
* composer

And install this optional components:

- APC module (Only for production envorinments)
- pcntl module (Only for linux and OSX)

## Installation

Open terminal and go to project directory `oz-site`,  if you download for first time use this command:

```bash
php bin/composer.phar install
```
Or if you update source:

```bash
php bin/composer.phar update
```

Create the data base schema `OZ_TASKS` in your db manager.

Go to directory `src\main\resources` and configure your data base connection, edit the `config.properties`:

```properties
; Database (doctrine2) configuration

doctrine.db[driver]=pdo_mysql
doctrine.db[user]=USER
doctrine.db[password]=PASS
doctrine.db[host]=127.0.0.1
doctrine.db[dbname]=OZ_TASKS
doctrine.db[charset]=UTF8
```

Use Doctrine commands to create data base:
```bash
#Linux/Unix:
php vendor/bin/doctrine orm:schema-tool:create

#Windows
vendor\bin\doctrine.bat orm:schema-tool:create

```


**Other useful Doctrine commands**
```bash
doctrine orm:validate-schema
doctrine orm:schema-tool:update --dump-sql
doctrine orm:schema-tool:create --dump-sql
doctrine orm:schema-tool:drop --force --dump-sql
```

### References

[Why you must be use Doctrine](http://es.slideshare.net/jwage/doctrine-2-not-the-same-old-php-orm)

* http://es.slideshare.net/jwage/doctrine-2-not-the-same-old-php-orm
* http://parasitovirtual.wordpress.com/?s=doctrine
* http://parasitovirtual.wordpress.com/2011/03/26/un-vistazo-a-la-clase-query-de-doctrine-2/
* http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
* http://codesamplez.com/?s=doctrine
* http://docs.doctrine-project.org/en/2.1/reference/association-mapping.html
* http://docs.doctrine-project.org/en/latest/tutorials/composite-primary-keys.html
* http://docs.doctrine-project.org/en/latest/reference/annotations-reference.html
* http://docs.doctrine-project.org/en/latest/reference/tools.html
* http://docs.doctrine-project.org/en/latest/reference/native-sql.html
* http://docs.doctrine-project.org/en/latest/reference/basic-mapping.html
* http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/configuration.html
* http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/getting-started.html#what-are-entities
* http://akrabat.com/php/setting-up-php-mysql-on-os-x-10-7-lion/
* http://www.glenscott.co.uk/blog/2012/02/15/installing-alternative-php-cache-apc-on-mac-os-x-lion/
* http://crosstown.coolestguyplanettech.com/os-x/40-setting-up-os-x-lion-to-plug-into-homebrew-package-manager


Credits
-------

![orbital-zero](https://lh6.googleusercontent.com/-gXFiyKSSZ4E/UewkL6Eez8I/AAAAAAAADpg/Phifd0oafkc/s288/OZ%2520logo.png)

This project is maintained by [Orbital Zero, inc](http://www.orbitalzero.com/community)
and people like you :) . Thank you!

License
-------

This project is copyright © 2013 by Jaehoo (Alberto Sánchez) and Orbital Zero,inc. It is free software, and may be
redistributed under the terms specified in the `LICENSE` file.

The names and logos for this sample code are trademarks of Orbital Zero, inc.

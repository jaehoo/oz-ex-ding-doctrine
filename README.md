# Doctrine PHP Bootstrap

## Requirements

- APC module
- pcntl modolue (only linux and OSX)

## Installation

1. Go to project dir "cd oz-site" and execute "php bin/composer.phar install"
2. Create data base 'OZ_TASKS'
3. Edit bootstrap.php and set your db config (user, pass...etc)
3. Generate db schema:
   - linux/unix: "php vendor/bin/doctrine orm:schema-tool:create"
   - win: "vendor\bin\doctrine.bat orm:schema-tool:create"
4. Run tests


Other Doctrine commands:
doctrine orm:validate-schema
doctrine orm:schema-tool:update --dump-sql
doctrine orm:schema-tool:create --dump-sql
doctrine orm:schema-tool:drop --force --dump-sql

By: Jaehoo :)

Docs:

Why you must be use Doctrine:
http://es.slideshare.net/jwage/doctrine-2-not-the-same-old-php-orm

http://parasitovirtual.wordpress.com/?s=doctrine
http://parasitovirtual.wordpress.com/2011/03/26/un-vistazo-a-la-clase-query-de-doctrine-2/
http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
http://codesamplez.com/?s=doctrine

http://docs.doctrine-project.org/en/2.1/reference/association-mapping.html
http://docs.doctrine-project.org/en/latest/tutorials/composite-primary-keys.html
http://docs.doctrine-project.org/en/latest/reference/annotations-reference.html
http://docs.doctrine-project.org/en/latest/reference/tools.html
http://docs.doctrine-project.org/en/latest/reference/native-sql.html
http://docs.doctrine-project.org/en/latest/reference/basic-mapping.html
http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/configuration.html
http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/getting-started.html#what-are-entities

http://akrabat.com/php/setting-up-php-mysql-on-os-x-10-7-lion/
http://www.glenscott.co.uk/blog/2012/02/15/installing-alternative-php-cache-apc-on-mac-os-x-lion/
http://crosstown.coolestguyplanettech.com/os-x/40-setting-up-os-x-lion-to-plug-into-homebrew-package-manager
# TYPO3 CMS Base Distribution

Get going quickly with TYPO3 CMS.

## Prerequisites

* 8.0 || 8.1 || 8.2
* [Composer](https://getcomposer.org/download/)
* [GIT](https://git-scm.com/)

## Quickstart

* `composer create-project sudhaus7/default-sitepackage project-name ^12`
* `cd project-name`

# Changes (12)
- init.sh script has been added to manage git init stuff.
- updates on the entry point for some composer commands
# Changes (10 and 11)
- The typo3/coding-standards is now installed and used
- a default .php-cs-fixer.php config has been added with a Sudhaus7/B-Factor/12bis3/code711 specific header. If you are not working for Sudhaus7/B-Factor/12bis3/code711 you might want to change that header, otherwise it will be applied to all your files in packages
- in .githooks a pre-commit hook has been added which will parse to-be-commited php files with the php-cs-fixer
- a .gitconfig has been added to configure the local .githooks folder
- On `composer create-project` git-init will be executed (default branch main) and this .gitconfig will be added to the config.

**Setup:**

To start an interactive installation, you can do so by executing the following
command and then follow the wizard:

```
php vendor/bin/typo3cms install:setup
```

**Setup unattended (optional):**

If you're a more advanced user, you might want to leverage the unattended installation.
To do this, you need to execute the following command and substite the arguments
with your own environment configuration.

```
php vendor/bin/typo3cms install:setup \
    --non-interactive \
    --database-user-name=typo3 \
    --database-user-password=typo3 \
    --database-host-name=127.0.0.1 \
    --database-port=3306 \
    --database-name=typo3 \
    --use-existing-database \
    --admin-user-name=admin \
    --admin-password=password \
    --site-setup-type=site
```

**Development server:**

While it's advised to use a more sophisticated web server such as
Apache 2 or nginx, you can instantly run the project by using PHPs` built-in
[web server](https://secure.php.net/manual/en/features.commandline.webserver.php).

* `TYPO3_CONTEXT=Development php -S localhost:8000 -t public`
* open your browser at "http://localhost:8000"

Please be aware that the built-in web server is single threaded. Which is ultimately
a performance killer and may result in deadlocks if you execute too many requests at once.

# License

GPL-2.0 or later

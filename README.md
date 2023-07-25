# TALK Rendertypes

see  https://code711.de/talks/enhance-your-tca-how-to-write-your-own-rendertypes


## Prerequisites

* 8.1 || 8.2
* [Composer](https://getcomposer.org/download/)
* [GIT](https://git-scm.com/)

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

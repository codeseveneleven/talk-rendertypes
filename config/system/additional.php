<?php

/*
 * This file is part of the TYPO3 project.
 * (c) 2022 B-Factor GmbH / 12bis3 / Sudhaus7 / code711.de
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 * The TYPO3 project - inspiring people to share!
 *
 * @copyright 2022 B-Factor GmbH / 12bis3 / Sudhaus7 / https://code711.de/
 */

$currentApplicationContext = \TYPO3\CMS\Core\Core\Environment::getContext();
$GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'] .= ' (' . (string)$currentApplicationContext . ')';

/*
We are loading an additional, optional configuration from INSTALLROOT/Configuration,
based on the Application Context. Uf you need to set your own environment
add a .php file in the appropriate directory in INSTALLROOT.
For example if your TYPO3_CONTEXT variable is Development/fberger create a
file INSTALLROOT/config/development/fberger.php

You can add this to the git if needed. This way different developers can have
different environments.

There can be an INSTALLROOT/config/production.php file which contains
additional configurations (managed in GIT for example) for production. If you
need to add production specific configurations please add them there.
*/

if (file_exists(\TYPO3\CMS\Core\Core\Environment::getProjectPath() . '/config/' . (string)strtolower($currentApplicationContext) . '.php')) {
    require(\TYPO3\CMS\Core\Core\Environment::getProjectPath() . '/config/' . (string)strtolower($currentApplicationContext) . '.php');
} elseif (file_exists(\TYPO3\CMS\Core\Core\Environment::getProjectPath() . '/config/' . (string)$currentApplicationContext . '.php')) {
    require(\TYPO3\CMS\Core\Core\Environment::getProjectPath() . '/config/' . (string)$currentApplicationContext . '.php');
}

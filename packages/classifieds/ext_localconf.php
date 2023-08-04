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

use Talk\Classifieds\Controller\ClassifiedsController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::configurePlugin(
    'Classifieds',
    'Classifieds',
    [
        ClassifiedsController::class => 'index,add,save',
    ],
    [
        ClassifiedsController::class => 'index,add,save',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1690219795] = [
    'nodeName' => 'base64image',
    'priority' => 10,
    'class' => \Talk\Classifieds\Backend\TCA\Base64ImageFormElement::class,
];
$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1690286618] = [
    'nodeName' => 'infosheet',
    'priority' => 10,
    'class' => \Talk\Classifieds\Backend\TCA\InfosheetFormElement::class,
];

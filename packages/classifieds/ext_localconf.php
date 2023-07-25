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

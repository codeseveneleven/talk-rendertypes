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

use SpoonerWeb\TcaBuilder\TcaBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(function (): void {
    ExtensionUtility::registerPlugin(
        'classifieds',
        'Classifieds',
        'Classifieds List',
        '',
        'special'
    );

    $tcaBuilder = GeneralUtility::makeInstance(TcaBuilder::class);
    $tcaBuilder->setTable('tt_content')
               ->setType('classifieds_classifieds')
               ->addDiv('Allgemein')
               ->addPalette('general')
               ->addPalette('header')
               ->addField('pages')
               ->saveToTca();
});

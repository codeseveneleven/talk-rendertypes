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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

return [

    'ctrl' => [
        'title'             => 'Classified Add',
        'label'             => 'title',
        'defaultSortby'     => 'tstamp',
        'tstamp'            => 'tstamp',
        'crdate'            => 'crdate',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,bodytext',
        'dynamicConfigFile' => ExtensionManagementUtility::extPath('classifieds') . 'Configuration/TCA/tx_classifieds_domain_model_add.php',
        'iconfile' => 'EXT:classifieds/Resources/Public/Icons/Extension.svg',
    ],
    'types' => [
        '0' => [
            'showitem' => 'global_information,hidden,title,bodytext,b64img',
        ],
    ],
    'palettes' => [
        //'1' => Array('showitem' => 'hidden,sys_language_uid,t3ver_label,l10n_parent'),
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],

        'global_information' => [
            'label' => 'Infos',
            'config' => [
                'type' => 'none',
                'renderType'=>'infosheet',
            ],
        ],

        'title' => [
            'exclude' => 0,
            'label' => 'Title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],

        'bodytext' => [
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'Text',
            'config' => [
                'type' => 'text',
                'cols' => 80,
                'rows' => 15,
            ],
        ],
        'b64img' => [
            'label' => 'Image',
            'config' => [
                'type' => 'text',
                'cols' => 80,
                'rows' => 15,
                'renderType'=>'base64image',
            ],
        ],

    ],
];

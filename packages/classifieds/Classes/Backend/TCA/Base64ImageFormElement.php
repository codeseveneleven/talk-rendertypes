<?php

declare(strict_types=1);

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

namespace Talk\Classifieds\Backend\TCA;

use function str_starts_with;
use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;

class Base64ImageFormElement extends AbstractFormElement
{
    public function render()
    {
        $result = $this->initializeResultArray();
        $parameterArray = $this->data['parameterArray'];

        $html = [];
        $html[] = sprintf('<input type="hidden" name="%s" id="%s" value="%s"/>', $parameterArray['itemFormElName'], $parameterArray['itemFormElID'], $parameterArray['itemFormElValue']);

        $html[] = '<figure class="b64preview">';
        if (str_starts_with($parameterArray['itemFormElValue'], 'data:')) {
            $html[] = sprintf('<img src="%s" alt=""/>', $parameterArray['itemFormElValue']);
        } else {
            $html[] = 'No Image available';
        }
        $html[] = '</figure>';
        $html[] = '<style>.b64preview { width: 100%; } .b64preview img{width:100%;height:auto;}</style>';

        $result['html'] = implode("\n", $html);

        return $result;
    }
}

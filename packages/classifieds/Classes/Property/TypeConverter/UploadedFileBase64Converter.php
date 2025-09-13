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

namespace Talk\Classifieds\Property\TypeConverter;

use function base64_encode;
use function file_get_contents;
use function str_starts_with;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationInterface;
use TYPO3\CMS\Extbase\Property\TypeConverter\AbstractTypeConverter;
use const UPLOAD_ERR_OK;

class UploadedFileBase64Converter extends AbstractTypeConverter
{
    protected string $property = '';

    public function __construct(string $property = '')
    {
        $this->property=$property;
    }

    public function convertFrom(
        $source,
        string $targetType,
        array $convertedChildProperties = [],
        PropertyMappingConfigurationInterface $configuration = null
    ) {
        if (!is_array($source) && str_starts_with($source, 'data:')) {
            return $source;
        }

        $result = null;
        $files = $this->getConvertedFileArray();
        if (isset($files[$this->property]) && $files[$this->property]['error'] === UPLOAD_ERR_OK) {
            $result = sprintf('data:%s;base64,%s', $files[$this->property]['type'], base64_encode(file_get_contents($files[$this->property]['tmp_name'])));
        }
        return $result ?? $source;
    }

    private function getConvertedFileArray(): array
    {
        $return = [];

        foreach ($_FILES as $plugin => $matrix) {
            $fields = array_keys($matrix);
            foreach ($fields as $field) {
                foreach ($matrix[$field] as $form => $config) {
                    $keys = array_keys($config);
                    foreach ($keys as $key) {
                        if (!isset($return[$key])) {
                            $return[$key] = [];
                        }
                        $return[ $key ][ $field ] =  $config[ $key ];
                    }
                }
            }
        }
        return $return;
    }
}

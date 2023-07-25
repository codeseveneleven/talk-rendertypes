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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Talk\Classifieds\Property\TypeConverter\UploadedFileBase64Converter;

return static function (ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void {
    $services = $containerConfigurator->services();
    $services->defaults()
             ->public()
             ->autowire()
             ->autoconfigure();

    $services->load('Talk\\Classifieds\\', __DIR__ . '/../Classes/')
             ->exclude([
                 __DIR__ . '/../Classes/Domain/Model/',
             ]);

    $services->set(UploadedFileBase64Converter::class)->tag('extbase.type_converter', [
        'priority'=>50,
        'target'=>'string',
        'sources'=>'array',
        'public'=>true,
    ]);
};

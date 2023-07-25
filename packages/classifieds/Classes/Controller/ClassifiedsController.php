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

namespace Talk\Classifieds\Controller;

use Psr\Http\Message\ResponseInterface;
use Talk\Classifieds\Domain\Model\Add;
use Talk\Classifieds\Domain\Repository\AddRepository;
use Talk\Classifieds\Property\TypeConverter\UploadedFileBase64Converter;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ClassifiedsController extends ActionController
{
    protected AddRepository $add_repostitory;
    public function __construct(AddRepository $add_repostitory)
    {
        $this->add_repostitory = $add_repostitory;
    }

    public function indexAction(): ResponseInterface
    {
        $this->view->assign('adds', $this->add_repostitory->findAll());
        return $this->htmlResponse($this->view->render());
    }

    public function addAction(): ResponseInterface
    {
        $add = new Add();
        $this->view->assign('add', $add);
        return $this->htmlResponse($this->view->render());
    }

    public function initializeSaveAction(): void
    {
        $newOfferConfiguration = $this->arguments['add']->getPropertyMappingConfiguration();
        $newOfferConfiguration->forProperty('b64img')->setTypeConverter(new UploadedFileBase64Converter('b64img'));
    }
    public function saveAction(Add $add): ResponseInterface
    {
        $contentObject = $this->request?->getAttribute('currentContentObject') ?? $this->contentObject;
        $add->setPid($contentObject->data['pid']);
        $add->setHidden(true);
        $this->add_repostitory->add($add);
        return $this->redirect('index');
    }
}

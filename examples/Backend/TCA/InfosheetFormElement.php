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

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class InfosheetFormElement extends AbstractFormElement
{
    /**
     * @inheritDoc
     */
    public function render()
    {
        $result = $this->initializeResultArray();

        $rowTemplate =  '<tr><td>%s</td><td>%s</td></tr>';
        $html = [];
        $html[] = '<div class="panel panel-default"><table class="table table-striped table-hover">';
        $html[] = sprintf($rowTemplate, 'Created', date('d.m.Y H:i', $this->data['databaseRow']['crdate']));

        if ($this->data['command']==='edit') {
            $query = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('sys_history');
            $res   = $query->select(
                [ '*' ],
                'sys_history',
                [
                    'actiontype' => 2,
                    'tablename'  => $this->data['tableName'],
                    'recuid'     => $this->data['vanillaUid'],
                ],
                [],
                ['tstamp'=>'desc'],
                1
            );
            $historyRow = $res->fetchAssociative();
            $html[] = sprintf($rowTemplate, 'Last Change', date('d.m.Y H:i', $historyRow['tstamp']));
            if ($historyRow) {
                $beuser = BackendUtility::getRecord('be_users', $historyRow['userid']);
                $html[] = sprintf($rowTemplate, 'Last Change By', $beuser['realName'] . ' (' . $beuser['username'] . ')');
            }
        }

        $html[] = '</table></div>';

        $result['html'] = implode("\n", $html);
        return $result;
    }
}

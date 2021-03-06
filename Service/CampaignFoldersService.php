<?php

namespace Smile\EzUICampaignBundle\Service;

use Welp\MailchimpBundle\Exception\MailchimpException;

/**
 * Class CampaignFoldersService
 *
 * @package Smile\EzUICampaignBundle\Service
 */
class CampaignFoldersService extends BaseService
{
    /**
     * Retrive a list of Campaign Folder
     *
     * @param int $offset search offset
     * @param int $count maximum folder count
     * @return array List of Campaign Folders
     * @throws MailchimpException MailChimpException
     */
    public function get($offset = 0, $count = 10)
    {
        $campaignFolders = $this->mailChimp->get('/campaign-folders', array(
            'offset' => $offset,
            'count' => $count
        ));

        if (!$this->mailChimp->success()) {
            $campaignFolders = array(
                'folders' => array(),
                'total_items' => 0
            );
        }

        return $campaignFolders;
    }
}

<?php
namespace bl\newsletter\common\base;

use yii\base\Module;

use bl\newsletter\common\components\ClientManager;

/**
 * Base Newsletter module
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
abstract class NewsletterModule extends Module
{
    const CLIENT_MANAGER_COMPONENT_ID = 'clientManager';


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (!$this->has(self::CLIENT_MANAGER_COMPONENT_ID)) {
            $this->set(self::CLIENT_MANAGER_COMPONENT_ID, [
                'class' => ClientManager::class
            ]);
        }
    }

    /**
     * Get [[ClientManager]] component
     *
     * @return ClientManager
     */
    public function getClientManager()
    {
        return $this->get(self::CLIENT_MANAGER_COMPONENT_ID);
    }
}
<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TestFramework\ObjectManager;

class Configurator implements \Magento\Framework\ObjectManager\DynamicConfigInterface
{
    /**
     * Map application initialization params to Object Manager configuration format
     *
     * @return array
     */
    public function getConfiguration()
    {
        return [
            'preferences' => [
                'Magento\Framework\Stdlib\Cookie' => 'Magento\TestFramework\Cookie',
                'Magento\Framework\Stdlib\CookieManagerInterface' => 'Magento\TestFramework\CookieManager',
            ]
        ];
    }
}

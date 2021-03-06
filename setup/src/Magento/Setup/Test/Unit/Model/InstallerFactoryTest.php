<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Setup\Test\Unit\Model;

use \Magento\Setup\Model\InstallerFactory;

class InstallerFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $returnValueMap = [
            [
                'Magento\Setup\Model\FilePermissions',
                $this->getMock('Magento\Setup\Model\FilePermissions', [], [], '', false),
            ],
            [
                'Magento\Framework\App\DeploymentConfig\Writer',
                $this->getMock('Magento\Framework\App\DeploymentConfig\Writer', [], [], '', false),
            ],
            [
            'Magento\Framework\App\DeploymentConfig\Reader',
                $this->getMock('Magento\Framework\App\DeploymentConfig\Reader', [], [], '', false),
            ],
            [
                'Magento\Framework\App\DeploymentConfig',
                $this->getMock('Magento\Framework\App\DeploymentConfig', [], [], '', false),
            ],
            [
                'Magento\Framework\Module\ModuleList',
                $this->getMock('Magento\Framework\Module\ModuleList', [], [], '', false),
            ],
            [
                'Magento\Framework\Module\ModuleList\Loader',
                $this->getMock('Magento\Framework\Module\ModuleList\Loader', [], [], '', false),
            ],
            [
                'Magento\Setup\Model\AdminAccountFactory',
                $this->getMock('Magento\Setup\Model\AdminAccountFactory', [], [], '', false),
            ],
            [
                'Magento\Setup\Module\ConnectionFactory',
                $this->getMock('Magento\Setup\Module\ConnectionFactory', [], [], '', false),
            ],
            [
                'Magento\Framework\App\MaintenanceMode',
                $this->getMock('Magento\Framework\App\MaintenanceMode', [], [], '', false),
            ],
            [
                'Magento\Framework\Filesystem',
                $this->getMock('Magento\Framework\Filesystem', [], [], '', false),
            ],
            [
                'Magento\Setup\Model\SampleData',
                $this->getMock('Magento\Setup\Model\SampleData', [], [], '', false),
            ],
            [
                'Magento\Setup\Model\ObjectManagerProvider',
                $this->getMock('Magento\Setup\Model\ObjectManagerProvider', [], [], '', false),
            ],
            [
                'Magento\Framework\Model\Resource\Db\TransactionManager',
                $this->getMock('Magento\Framework\Model\Resource\Db\TransactionManager', [], [], '', false),
            ],
            [
                'Magento\Framework\Model\Resource\Db\ObjectRelationProcessor',
                $this->getMock('Magento\Framework\Model\Resource\Db\ObjectRelationProcessor', [], [], '', false),
            ],
            [
                'Magento\Setup\Model\ConfigModel',
                $this->getMock('Magento\Setup\Model\ConfigModel', [], [], '', false),
            ],
        ];
        $serviceLocatorMock = $this->getMockForAbstractClass('Zend\ServiceManager\ServiceLocatorInterface', ['get']);
        $serviceLocatorMock
            ->expects($this->any())
            ->method('get')
            ->will($this->returnValueMap($returnValueMap));

        $log = $this->getMockForAbstractClass('Magento\Setup\Model\LoggerInterface');
        $resourceFactoryMock = $this->getMock('Magento\Setup\Module\ResourceFactory', [], [], '', false);
        $resourceFactoryMock
            ->expects($this->any())
            ->method('create')
            ->will($this->returnValue($this->getMock('Magento\Framework\App\Resource', [], [], '', false)));
        $installerFactory = new InstallerFactory($serviceLocatorMock, $resourceFactoryMock);
        $installer = $installerFactory->create($log);
        $this->assertInstanceOf('Magento\Setup\Model\Installer', $installer);
    }
}

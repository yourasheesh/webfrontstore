<?php 

/**
 * Dev Asheesh Singh
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category    Asheesh
 * @package     Asheesh_WebFrontStore
 * @author 		Asheesh Singh <yourasheesh@gmail.com>
 * @copyright   Copyright Asheesh Singh
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->run("CREATE TABLE IF NOT EXISTS `{$installer->getTable('webfrontstore_models/products')}` (
		  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
		  `productid` varchar(150) NOT NULL COMMENT 'ProductId',
		  `groupid` varchar(150) NOT NULL DEFAULT '' COMMENT 'GroupId',
		  `movietitle` varchar(255) NOT NULL COMMENT 'MovieTitle',
		  `store` varchar(150) NOT NULL DEFAULT 'Movies' COMMENT 'Store',
		  `category` int(10) NOT NULL DEFAULT '0' COMMENT 'Category',
		  `subcategory` int(10) NOT NULL DEFAULT '0' COMMENT 'Subcategory',
		  `price` decimal(12,4) NOT NULL DEFAULT '0.0000' COMMENT 'Price',
		  `shippingduration` int(10) NOT NULL DEFAULT '0' COMMENT 'ShippingDuration',
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `productid` (`productid`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Products table created By Asheesh Singh' AUTO_INCREMENT=1 ;");
		
$installer->run("CREATE TABLE IF NOT EXISTS `{$installer->getTable('webfrontstore_models/categories')}` (
		  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
		  `oplabel` varchar(150) NOT NULL COMMENT 'Option Label',
		  `is_sub` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Is Subcategory',
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Categories table created By Asheesh Singh' AUTO_INCREMENT=1 ;");
	
$installer->endSetup();
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

/**
 * Webfrontstore Resource Collection
 *
 * @category    Asheesh
 * @package     Asheesh_WebFrontStore
 */ 
 
class Asheesh_WebFrontStore_Model_Mysql4_Categories_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	/**
     * Initialization here
     *
     */
	protected function _construct()
	{
		/**
		 * Standard Webfrontstore resource collection initialization
		 */
		$this->_init('webfrontstore_models/categories');
	}
}
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
 * Webfrontstore model class
 *
 * @category    Asheesh
 * @package     Asheesh_WebFrontStore
 */ 
 
class Asheesh_WebFrontStore_Model_Categories extends Mage_Core_Model_Abstract
{
	/**
     * Prefix of Webfrontstore model events names
     *
     * @var string
     */
	protected $_eventPrefix      = 'asheesh_webfrontstore_categories';
	
	/**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getWebfrontstore() in this case
     *
     * @var string
     */
    protected $_eventObject      = 'webfrontstore_categories';
	
	/**
     * Internal constructor not depended on params. Can be used for object initialization
     */
	protected function _construct()
	{
		/**
		 * Standard Webfrontstore model initialization
		 */
		$this->_init('webfrontstore_models/categories');
	}
	
}
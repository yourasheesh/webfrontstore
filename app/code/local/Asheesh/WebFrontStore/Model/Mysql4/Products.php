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
 * Webfrontstore resource model class
 *
 * @category    Asheesh
 * @package     Asheesh_WebFrontStore
 */ 
 
class Asheesh_WebFrontStore_Model_Mysql4_Products extends Mage_Core_Model_Mysql4_Abstract
{

	/**
     * Internal constructor not depended on params. Can be used for object initialization
     */
	protected function _construct()
	{
		/**
		 * Standard Webfrontstore resource model initialization
		 */
		$this->_init('webfrontstore_models/products','id');
	}
	
	/**
     * Process product data before save
     *
     * @param Varien_Object $object
     * @return Mage_Catalog_Model_Resource_Product
     */
    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {

        /**
         * Check if declared category ids in object data.
         */
        if ($object->hasCategory()) {
            $categoryId = Mage::getResourceSingleton('webfrontstore_models/categories')->verify(
                $object->getCategory()
            );
            $object->setCategory($categoryId);
        }
		
		if ($object->hasSubcategory()) {
            $subCategoryId = Mage::getResourceSingleton('webfrontstore_models/categories')->verify(
                $object->getSubcategory(),1
            );
			
            $object->setSubCctegory($subCategoryId);
        }

        return parent::_beforeSave($object);
    }
	
	public function insertMass($data){
		$adapter = $this->_getWriteAdapter();
		$adapter->insertMultiple($this->getTable('webfrontstore_models/products'),$data);
	}
	
}
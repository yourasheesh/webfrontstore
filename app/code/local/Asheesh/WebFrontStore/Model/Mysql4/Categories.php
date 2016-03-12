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
 
class Asheesh_WebFrontStore_Model_Mysql4_Categories extends Mage_Core_Model_Mysql4_Abstract
{

	/**
     * Internal constructor not depended on params. Can be used for object initialization
     */
	protected function _construct()
	{
		/**
		 * Standard Webfrontstore resource model initialization
		 */
		$this->_init('webfrontstore_models/categories','id');
	}
	
	public function verify($label,$type=0)
    {
        if (strlen($label) ==0) {
            return array();
        }
        $data = array();
        $select = $this->_getReadAdapter()->select()
            ->from($this->getTable('webfrontstore_models/categories'), 'id')
            ->where("oplabel = '{$label}' AND is_sub = {$type}");
		$data = $this->_getReadAdapter()->fetchCol($select);
		if(count($data) == 0){
			$adapter = $this->_getWriteAdapter();
			$newdata = array();
			$newdata[] = array('oplabel'=>$label,'is_sub'=>$type);
			$adapter->insertMultiple($this->getTable('webfrontstore_models/categories'),$newdata);
			$select = $this->_getReadAdapter()->select()
				->from($this->getTable('webfrontstore_models/categories'), 'id')
				->where("oplabel = '{$label}' AND is_sub = {$type}");
			$data = $this->_getReadAdapter()->fetchCol($select);
		}
        return $data;
    }
	
}
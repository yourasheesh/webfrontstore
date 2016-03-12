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
 
class Asheesh_WebFrontStore_Model_System_Config_Source_Categories
{

    /**
     * Retrieve Option values array
	 *
	 * @param boolean $defaultValues
     *
     * @return Array $options
     */
    public function toOptionArray($defaultValues = false)
    {
		$options = array();
		if($defaultValues) 
			$options[] = array('value' => '', 'label'=>Mage::helper('webfrontstore_helpers')->__('Please Select'));
		$options[] = array('value' => 0, 'label'=>Mage::helper('webfrontstore_helpers')->__('Disabled'));
		$options[] = array('value' => 1, 'label'=>Mage::helper('webfrontstore_helpers')->__('Enabled'));
		return $options;
		
    }
	
	/**
     * Retrieve options for grid filter
     *
     * @param boolean $defaultValues
	 * 
     * @return Array $filterOptions
     */
	public function toFilterableOptionArray($defaultValues = false) {
		$options = $this->toOptionArray($defaultValues);
		$filterOptions = array();
		if(count($options)) {
			foreach($options as $option) {
				if(isset($option['value']) && isset($option['label'])) {
					$filterOptions[$option['value']] = $option['label'];
				}
			}
		}
		return $filterOptions;
	}

}
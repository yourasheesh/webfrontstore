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
 
class Asheesh_WebFrontStore_Block_Adminhtml_Webfrontstore_Edit_Tab_Categories extends Mage_Adminhtml_Block_Widget_Form
{
	/**
     * Prepare form before rendering HTML
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
		$product = Mage::registry('webfrontstore_product_data');
		if ($product) {
			$form = new Varien_Data_Form();
			$fieldset = $form->addFieldset('webfrontstore_image', array('legend'=> Mage::helper('webfrontstore_helpers')->__('Categories Information')));
			$fieldset->addField('category', 'select', array(
				'label'     => Mage::helper('webfrontstore_helpers')->__('Category'),
				'class'     => 'required-entry',
				'value'     => $product->getCategory(),
				'values'    =>  Mage::getModel('webfrontstore_models/system_config_source_categories')->toOptionArray(),
				'required'  => true,
				'name'      => 'category',

			));
			
			$fieldset->addField('subcategory', 'select', array(
				'label'     => Mage::helper('webfrontstore_helpers')->__('Subcategory'),
				'class'     => 'required-entry',
				'value'     => $product->getSubcategory(),
				'values'    =>  Mage::getModel('webfrontstore_models/system_config_source_categories')->toOptionArray(1),
				'required'  => true,
				'name'      => 'subcategory',

			));
			
			$this->setForm($form);
		}
		return $this;
    }
}
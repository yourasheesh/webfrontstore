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
 
class Asheesh_WebFrontStore_Block_Adminhtml_Webfrontstore_Edit_Tab_Main extends Mage_Adminhtml_Block_Widget_Form
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
			$fieldset = $form->addFieldset('webfrontstore_main', array('legend'=> Mage::helper('webfrontstore_helpers')->__('General Information')));
			$fieldset->addField('productid', 'text', array(
				'label'     => Mage::helper('webfrontstore_helpers')->__('ProductId'),
				'class'     => 'required-entry',
				'value'      => $product->getProductid(),
				'required'  => true,
				'name'      => 'productid',
				));
				
			$fieldset->addField('movietitle', 'text', array(
				'label'     => Mage::helper('webfrontstore_helpers')->__('MovieTitle'),
				'class'     => 'required-entry',
				'value'      => $product->getMovietitle(),
				'required'  => true,
				'name'      => 'movietitle',
				));
				
			$fieldset->addField('store', 'text', array(
				'label'     => Mage::helper('webfrontstore_helpers')->__('Store'),
				'class'     => 'required-entry',
				'value'      => $product->getStore(),
				'required'  => true,
				'name'      => 'store',
				));
				
			$fieldset->addField('price', 'text', array(
				'label'     => Mage::helper('webfrontstore_helpers')->__('price'),
				'class'     => 'required-entry',
				'value'      => $product->getPrice(),
				'required'  => true,
				'name'      => 'price',
				'note'      => Mage::helper('webfrontstore_helpers')->__('[USD]'),
			));
			
			$fieldset->addField('shippingduration', 'text', array(
				'label'     => Mage::helper('webfrontstore_helpers')->__('Shippingduration'),
				'class'     => '',
				'value'      => $product->getShippingduration(),
				'required'  => false,
				'name'      => 'shippingduration',
				'note'      => Mage::helper('webfrontstore_helpers')->__('[Days]'),
			));
			
			$this->setForm($form);
		}
		return $this;
    }
}
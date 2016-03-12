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
 
class Asheesh_WebFrontStore_Block_Adminhtml_Webfrontstore_Edit_Tab_Version extends Mage_Adminhtml_Block_Widget_Form
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
			$fieldset = $form->addFieldset('webfrontstore_status', array('legend'=> Mage::helper('webfrontstore_helpers')->__('Group/Version Information')));
			$fieldset->addField('groupid', 'text', array(
				'label'     => Mage::helper('webfrontstore_helpers')->__('GroupId/Version'),
				'class'     => '',
				'value'     => $product->getGroupid(),
				'required'  => false,
				'name'      => 'groupid',
				'note'      => Mage::helper('webfrontstore_helpers')->__('If Product have multiple versions then enter the version or group id otherwise left blank.'),

			));
			$this->setForm($form);
		}
		return $this;
    }
}
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
 
class Asheesh_WebFrontStore_Block_Adminhtml_Webfrontstore_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {         
        $this->_objectId = 'id';
        $this->_blockGroup = 'webfrontstore_blocks';
        $this->_controller = 'adminhtml_webfrontstore';
        
		parent::__construct();
		
        $this->_updateButton('save', 'label', Mage::helper('webfrontstore_helpers')->__('Save Product'));
        $this->_updateButton('delete', 'label', Mage::helper('webfrontstore_helpers')->__('Delete Product'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('webfrontstore_helpers')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('webfrontstore_product_data') && Mage::registry('webfrontstore_product_data')->getId() ) {
            return Mage::helper('webfrontstore_helpers')->__('Edit Product "%s" ', $this->htmlEscape(Mage::registry('webfrontstore_product_data')->getMovietitle()));
        } else {
            return Mage::helper('webfrontstore_helpers')->__('Add Product');
        }
    }
}
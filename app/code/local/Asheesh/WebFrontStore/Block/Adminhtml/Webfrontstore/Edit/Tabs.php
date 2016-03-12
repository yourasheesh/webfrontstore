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
 
class Asheesh_WebFrontStore_Block_Adminhtml_Webfrontstore_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('slider_image_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('webfrontstore_helpers')->__('Product Information'));
  }
  
  protected function _beforeToHtml()
  {
	$this->addTab('main', array(
		'label'     => Mage::helper('webfrontstore_helpers')->__('General Information'),
		'content'   => $this->getLayout()->createBlock('webfrontstore_blocks/adminhtml_webfrontstore_edit_tab_main')->toHtml(),
	));
	$this->addTab('categories', array(
		'label'     => Mage::helper('webfrontstore_helpers')->__('Categories Information'),
		'content'   => $this->getLayout()->createBlock('webfrontstore_blocks/adminhtml_webfrontstore_edit_tab_categories')->toHtml(),
	));
	$this->addTab('group', array(
		'label'     => Mage::helper('webfrontstore_helpers')->__('Group/Version Information'),
		'content'   => $this->getLayout()->createBlock('webfrontstore_blocks/adminhtml_webfrontstore_edit_tab_version')->toHtml(),
	));
	
	

	Mage::dispatchEvent('webfrontstore_adminhtml_edit_tabs', array(
	'tabs'  => $this
	));
    return parent::_beforeToHtml();
  }
}
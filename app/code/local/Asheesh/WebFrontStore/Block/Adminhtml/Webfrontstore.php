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
 
class Asheesh_WebFrontStore_Block_Adminhtml_Webfrontstore extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct() {
		$this->_controller = 'adminhtml_webfrontstore';
		$this->_blockGroup = 'webfrontstore_blocks';
		$this->_headerText = Mage::helper('webfrontstore_helpers')->__("Manage Products");
		$this->_addButtonLabel = Mage::helper('webfrontstore_helpers')->__('Add New Product');
		
		$url =  Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB).'webfrontstore_calling_name/wfs/index/';
		
		$this->_addButton('go', array(
            'label'     => Mage::helper('webfrontstore_helpers')->__('Web Front Store View'),
            'onclick'   => 'popWin(\'' . $url .'\', \'_blank\')',
            'class'     => 'go',
        ));
		
		$iurl =  $this->getUrl('*/*/import');
		
		$this->_addButton('save', array(
            'label'     => Mage::helper('webfrontstore_helpers')->__('Import Products CSV'),
            'onclick'   => 'popWin(\'' . $iurl .'\', \'_blank\')',
            'class'     => 'save',
        ));
		parent::__construct();
	}
	
	/**
     * Redefine header css class
     *
     * @return string
     */
    public function getHeaderCssClass() {
        return 'icon-head head-cms-block';
    }
}
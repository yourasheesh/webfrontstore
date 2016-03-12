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

class Asheesh_WebFrontStore_Block_Adminhtml_Webfrontstore_Grid_Renderer_Status extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract 
{
	/**
	 * Render approval link in each vendor row
	 * @param Varien_Object $row
	 * @return String
	 */
	public function render(Varien_Object $row) {
		$html = '';
		if($row->getId()!='' && $row->getImageStatus() != 1) {
			$url =  $this->getUrl('*/*/massStatus', array('id' => $row->getId(), 'status'=>1, 'inline'=>1));
			$html .= '<a href="javascript:void(0);" onclick="deleteConfirm(\''.$this->__('Are you sure you want to Enable?').'\', \''. $url . '\');" >'.Mage::helper('webfrontstore_helpers')->__('Enable').'</a>';  
		} 
				
		if($row->getId()!='' && $row->getImageStatus() != 0) {
			$url =  $this->getUrl('*/*/massStatus', array('id' => $row->getId(), 'status'=>0, 'inline'=>1));
			$html .= '<a href="javascript:void(0);" onclick="deleteConfirm(\''.$this->__('Are you sure you want to Disable?').'\', \''. $url . '\');" >'.Mage::helper('webfrontstore_helpers')->__('Disable')."</a>";
		}
		
		return $html;
	}
}
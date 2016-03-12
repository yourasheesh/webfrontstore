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

class Asheesh_WebFrontStore_Block_Adminhtml_Webfrontstore_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract 
{
	/**
	 * Render Image
	 * @param Varien_Object $row
	 * @return String
	 */
	public function render(Varien_Object $row) 
	{
		$html  = '<a href="'.Mage::getBaseUrl('media').$row->getImagePath().'" onclick="imagePreview(\'image_path_image\'); return false;" >';
		$html .= '<img width="100" height="50" id="image_path_image" title="'.$row->getImageName().'" src="'.Mage::getBaseUrl('media').$row->getImagePath().'" alt="'.$row->getImageName().'" />';
		$html .= '</a>';
		return $html;
	}
}
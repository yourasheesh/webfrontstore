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
 
class Asheesh_WebFrontStore_Helper_Image extends Mage_Core_Helper_Abstract
{

	public static $allowed_extension = array('jpg','jpeg','gif','png');
	public function UploadImage() {
		$data = false;
		$postData=Mage::app()->getRequest()->getPost();

		if(isset($_FILES['image_path']['name'])) {
			$data = array();
			if(isset($postData['image_path']['delete']) && $postData['image_path']['delete'] == 1) {	
				$data['image_path'] = '';
				$imageName = explode('/',$postData['image_path']['value']);
				$imageName = $imageName[count($imageName)-1];
				unlink(Mage::getBaseDir('media') . DS .'asheesh' . DS . 'webfrontstore' . DS . $imageName);
			}
			if(file_exists($_FILES['image_path']['tmp_name'])) {
				$fieldName = $_FILES['image_path']['name'];
				$uploader = new Varien_File_Uploader("image_path");
				$uploader->setAllowedExtensions(self::$allowed_extension); 				 	
				$uploader->setAllowRenameFiles(false);
				$uploader->setFilesDispersion(false);
			   
				$path = Mage::getBaseDir('media') . DS .'asheesh' . DS . 'webfrontstore' . DS;
				$extension=pathinfo($_FILES['image_path']['name'], PATHINFO_EXTENSION);
				$fileName = 'slide_image_'.time().'.'.$extension;
				
				$uploader->save($path, $fileName);
				
				$data['image_path'] = 'asheesh/webfrontstore/'.$fileName;
			} 
		}
		return $data;
	}
	
}
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
 
class Asheesh_WebFrontStore_Adminhtml_WebfrontstoreController extends Mage_Adminhtml_Controller_Action
{
	
	protected function _initProduct($idFieldName = 'id')
    {
        $this->_title($this->__('Dev Asheesh'))->_title($this->__('Manage Product'));

        $id = (int) $this->getRequest()->getParam($idFieldName);
        $product = Mage::getModel('webfrontstore_models/products');

        if ($id) {
            $product->load($id);
        }

        Mage::register('current_wfs_products', $product);
        return $this;
    }
	
	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('webfrontstore_menu/webfrontstore_submenu1')
			->_addBreadcrumb(Mage::helper('webfrontstore_helpers')->__('Dev Asheesh'), Mage::helper('webfrontstore_helpers')->__('Manage Products'));
		return $this;
	}
	
	public function indexAction() {
		$this->_initAction();
		$this->getLayout()->getBlock('head')->setTitle(Mage::helper('webfrontstore_helpers')->__('Manage Products') . ' | ' . Mage::helper('webfrontstore_helpers')->__('Web Front Store ') . ' | ' . Mage::helper('webfrontstore_helpers')->__('Dev Asheesh'));
		$this->renderLayout();
	}
	
	public function gridAction() {
        $this->loadLayout();
        $this->renderLayout();
    }
	
	public function editAction() {
		$id     = $this->getRequest()->getParam('id',0);
		$model  = Mage::getModel('webfrontstore_models/products')->load($id);

		if ($model->getId() || $id == 0) {
			Mage::register('webfrontstore_product_data', $model);		
			$this->loadLayout();				
			$this->_setActiveMenu('webfrontstore_menu/webfrontstore_submenu1')
				 ->_addBreadcrumb(Mage::helper('webfrontstore_helpers')->__('Dev Asheesh'), Mage::helper('webfrontstore_helpers')->__('Manage Products'));
			$this->getLayout()->getBlock('head')->setTitle(Mage::helper('webfrontstore_helpers')->__('Product Information') . ' | ' . Mage::helper('webfrontstore_helpers')->__('Manage Products | Web Front Store ') . ' | ' . Mage::helper('webfrontstore_helpers')->__('Dev Asheesh'));
			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('webfrontstore_helpers')->__('Product does not exist'));
			$this->_redirect('*/*/');
		}
	}
	
	public function newAction() {
		$this->_forward('edit');
	}
 
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			$model = Mage::getModel('webfrontstore_models/products');
			if($id = $this->getRequest()->getParam('id')) {
				$model->load($id);
			}
			$model->addData($data);
			
			try {
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('webfrontstore_helpers')->__('Product has been saved successfully.'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);				

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('webfrontstore_helpers')->__('Unable to find Product to save'));
        $this->_redirect('*/*/');
	}
	
	/**
     * Delete product action
     */
    public function deleteAction()
    {
        $this->_initProduct();
        $product = Mage::registry('current_wfs_products');
        if ($product->getId()) {
            try {
                $product->load($product->getId());
                $product->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('webfrontstore_helpers')->__('The Product has been deleted.'));
            }
            catch (Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/');
    }
	
	/**
     * Delete product(s) action
     *
     */
	public function massDeleteAction()
    {
        $ids = $this->getRequest()->getParam('id');
        if (!is_array($ids)) {
            $this->_getSession()->addError(Mage::helper('webfrontstore_helpers')->__('Please select product(s).'));
        } else {
            if (!empty($ids)) {
                try {
                    foreach ($ids as $id) {
                        $product = Mage::getModel('webfrontstore_models/products')->load($id);
                        Mage::dispatchEvent('asheesh_webfrontstore_controller_adminhtml_delete_before', array('product' => $product));
                        $product->delete();
                    }
                    $this->_getSession()->addSuccess(
                        $this->__('Total of %d product(s) have been deleted.', count($ids))
                    );
                } catch (Exception $e) {
                    $this->_getSession()->addError($e->getMessage());
                }
            }
        }
        $this->_redirect('*/*/index');
    }
	
	public function exportCsvAction() {
        $fileName   = 'Dev_Asheesh_WebFrontStore_products'.time().'.csv';
        $content    = $this->getLayout()->createBlock('webfrontstore_blocks/adminhtml_webfrontstore_grid')
            ->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    public function exportXmlAction() {
        $fileName   = 'Dev_Asheesh_WebFrontStore_Products'.time().'.xml';
        $content    = $this->getLayout()->createBlock('webfrontstore_blocks/adminhtml_webfrontstore_grid')
            ->getXml();

        $this->_sendUploadResponse($fileName, $content);
    }

    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream') {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }
	
	public function importAction(){
        $this->_initAction()
            ->_title($this->__('Import'))
            ->_addBreadcrumb($this->__('Import'), $this->__('Import'));

        $this->renderLayout();
	}
	
	public function importPostAction(){
        if ($_FILES) {

            try {
                if ($_FILES['import_file']['size'] > 0) {
					//get the csv file
					$keys = array();
					$data = array();
					$file = $_FILES['import_file']['tmp_name'];
					$handle = fopen($file,"r");
					$ids = 0;
					//loop through the csv file and insert into database
					$model = Mage::getResourceModel('webfrontstore_models/products');
					$newdata = array();
					do {
						
						if (isset($data[1]) && strlen($data[1]) > 0) {
							if(count($keys) == 0){
								$keys = $data;
							} else {
								
								
								$flag = false;
								$temp = array();
								foreach($data as $key=>$value){
									if(isset($keys[$key])){
										$flag = true;
											
										if (strtolower($keys[$key]) == 'category') {
											$categoryId = Mage::getResourceSingleton('webfrontstore_models/categories')->verify(
												addslashes($value)
											);
											
											$value = isset($categoryId[0])?$categoryId[0]:0;
										}
										
										if (strtolower($keys[$key]) == 'subcategory') {
											$subcategoryId = Mage::getResourceSingleton('webfrontstore_models/categories')->verify(
												addslashes($value),1
											);
											$value = isset($subcategoryId[0])?$subcategoryId[0]:0;
										}
										
										if (strtolower($keys[$key]) == 'groupid' && strlen($value) == 0) {
											$value = '';
										}
										
										$temp[strtolower($keys[$key])] = $value;
									  
								    }
								}
								
								if($flag){
									$newdata[] = $temp;
									$ids++;
								}
								if(count($newdata) > 1000){
									$model->insertMass($newdata);
									$newdata = array();
								}
								
							}
							
						}
					} while ($data = fgetcsv($handle,1000,",","'")); 
					$model->insertMass($newdata);
					$this->_getSession()->addSuccess(
                        $this->__('Total of %d product(s) have been imported.', $ids)
                    );
				} else {
					
				}
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/import');
	}

}
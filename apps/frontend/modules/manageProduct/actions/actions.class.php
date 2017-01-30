<?php

/**
 * manageProduct actions.
 *
 * @package    megamed
 * @subpackage manageProduct
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class manageProductActions extends sfActions
{

    public function executeIndex(sfWebRequest $request)
    {
        $this->products = ProductTable::getList();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new ProductForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ProductForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($product = Doctrine_Core::getTable('Product')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
        $this->form = new ProductForm($product);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($product = Doctrine_Core::getTable('Product')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
        $this->form = new ProductForm($product);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($product = Doctrine_Core::getTable('Product')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
        $product->delete();

        $this->redirect('@manage_product');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $product = $form->save();

            $detailsId = $request->getParameter('productDetailId');
            $detailsVal = $request->getParameter('productDetailVal');
            foreach ($detailsId as $id => $value) {
                $obj = ProductDetailTable::getInstance()->findOneBy('id', $id);
                $obj->setProductId($product->getId());
                $obj->setProductDetailTypeId($value);
                $obj->setVal($detailsVal[$id]);

                if ($obj && trim($obj->getVal()) != '') {
                    $obj->save();
                }
            }

            $newDetailsId = $request->getParameter('newProductDetailId');
            $newDetailsVal = $request->getParameter('newProductDetailVal');
            foreach ($newDetailsId as $key => $detailId) {
                $obj = new ProductDetail();
                $obj->setProductId($product->getId());
                $obj->setProductDetailTypeId($detailId);
                $obj->setVal($newDetailsVal[$key]);

                if (trim($obj->getVal()) != '') {
                    $obj->save();
                }
            }

            $this->getUser()->setFlash('success', 'Амжилттай');
            $this->redirect('@manage_product_edit?id=' . $product->getId());
        }
    }

}

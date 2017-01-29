<?php

/**
 * orders actions.
 *
 * @package    megamed
 * @subpackage orders
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ordersActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->rows = OrdersTable::getList();
    }

    public function executeProducts(sfWebRequest $request)
    {
        $this->rows = OrderProductsTable::getList($request->getParameter('id'));
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $order = OrdersTable::getInstance()->findOneBy('id', $request->getParameter('id'));
        if ($order) {
            $order->setStatus($request->getParameter('status'));
            $order->save();
        }
        die();
    }

    public function executeMy(sfWebRequest $request)
    {
        $this->rows = OrdersTable::getMy($this->getUser()->getId());
    }

}

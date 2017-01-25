<?php

/**
 * cart actions.
 *
 * @package    megamed
 * @subpackage cart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cartActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->items = $this->getUser()->getCartItems();
        $this->setLayout(false);
    }

    public function executeAdd(sfWebRequest $request)
    {
        $items = $this->getUser()->getCartItems();

        $id = (int) $request->getParameter('id');

        $items[$id] = isset($items[$id]) ? $items[$id] + 1 : 1;
        $this->getUser()->setCartItems($items);

        $this->items = $this->getUser()->getCartItems();
        $this->setTemplate('index');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $id = $request->getParameter('id');
        $items = $this->getUser()->getCartItems();
        $newItems = array();

        foreach ($items as $item) {
            if ($item != $id) {
                $newItems[] = $item;
            }
        }

        $this->getUser()->setCartItems($newItems);

        $this->items = $this->getUser()->getCartItems();
        $this->setTemplate('index');
    }

}

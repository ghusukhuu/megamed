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

    public function executeView(sfWebRequest $request)
    {
        if ($request->isMethod('post')) {
            $items = array();

            $products = $request->getParameter('product');
            foreach ($products as $id => $cnt) {
                $items[$id] = $cnt;
            }

            $this->getUser()->setCartItems($items);
        }

        $this->items = $this->getUser()->getCartItems();
    }

    public function executeCheck(sfWebRequest $request)
    {
        $this->items = $this->getUser()->getCartItems();
        $this->firstname = $request->getParameter('firstname');
        $this->mobile = $request->getParameter('mobile');
        $this->address = $request->getParameter('address');
        $this->paymentType = $request->getParameter('payment');

        if ($request->isMethod('post')) {
            $firstname = $this->firstname;
            $mobile = $this->mobile;
            $address = $this->address;
            $paymentType = $this->paymentType;
            $items = $this->items;

            $errors = array();

            if (strlen($firstname) <= 0) {
                $errors[] = 'Нэр';
            }
            if (intval($mobile) <= 0) {
                $errors[] = 'Утас';
            }
            if (strlen($address) <= 0) {
                $errors[] = 'Хаяг';
            }

            if (count($errors)) {
                $this->getUser()->setFlash("error", implode(', ', $errors) . ' талбарт утга оруулна уу.');
            } else {
                $totalCount = 0;
                $totalAmount = 0;

                if (count($items)) {
                    $order = new Orders();
                    $order->setUserId($this->getUser()->getId());
                    $order->setFirstname($firstname);
                    $order->setMobile($mobile);
                    $order->setAddress($address);
                    $order->setPaymentType($paymentType);
                    $order->setIp($request->getRemoteAddress());
                    $order->setAgent($_SERVER['HTTP_USER_AGENT']);
                    $order->save();

                    foreach ($items as $id => $count) {
                        $product = ProductTable::getBy($id);
                        if ($product) {
                            $totalCount += $count;
                            $totalAmount += $count * $product->getPrice();

                            $orderProduct = new OrderProducts();
                            $orderProduct->setOrderId($order->getId());
                            $orderProduct->setProductId($id);
                            $orderProduct->setQuantity($count);
                            $orderProduct->setPrice($product->getPrice());
                            $orderProduct->setAmount($count * $product->getPrice());
                            $orderProduct->save();
                        }
                    }

                    $order->setAmount($totalAmount);
                    $order->save();

                    $body = 'Хүндэт борлуулалтын баг';
                    $body .= '<br/>';
                    $body .= '<br/>';
                    $body .= 'Шинэ захиалга ирлээ.';
                    $body .= '<br/>';
                    $body .= 'Барааны тоо: ' . $totalCount . ', Мөнгөн дүн: ' . AppEntity::numberFormat($totalAmount);
                    $body .= '<br/>';
                    $body .= 'Веб хуудас руу орон шалгана уу.';
                    $body .= '<br/>';
                    $body .= '<br/>';
                    $body .= 'Хүндэтгэн ёслосон http://megamed.mn';

                    MailEntity::sentMail(MailEntity::MAIN_EMAIL, $body);
                    $this->getUser()->setCartItems(array());
                    $this->redirect('@cart_check_complete');
                }
            }
        }
    }

    public function executeComplete(sfWebRequest $request)
    {
        
    }

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

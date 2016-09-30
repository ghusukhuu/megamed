<?php

/**
 * user actions.
 *
 * @package    etest
 * @subpackage user
 * @author     usukhbayar.m
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        
    }

    public function executeLogin(sfWebRequest $request)
    {
        $this->form = new FormLogin();

        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->redirect($request->getParameter('referer', '@homepage'));
            }
        }

        if ($this->getUser()->isAuthenticated()) {
            $this->redirect('@homepage');
        }

        $this->referer = $request->getUri();
    }

    public function executeLogout(sfWebRequest $request)
    {
        $this->getUser()->signOut();
        $this->redirect('@homepage');
    }

    public function executeSecure()
    {
        die('access denied!');
    }

}

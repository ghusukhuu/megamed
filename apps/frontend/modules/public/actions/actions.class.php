<?php

/**
 * public actions.
 *
 * @package    megamed
 * @subpackage public
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        
    }

    public function executeLogout(sfWebRequest $request)
    {
        $this->getUser()->signOut();
        $this->redirect('@homepage');
    }

    public function execute404(sfWebRequest $request)
    {
        
    }

}

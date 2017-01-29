<?php

/**
 * homepage actions.
 *
 * @package    megamed
 * @subpackage homepage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homepageActions extends sfActions
{

    public function preExecute()
    {
        //$this->getUser()->setAuthenticated(true);
        //$this->getUser()->addCredential('admin');
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->facebook = new Facebook(array(
            'appId' => sfConfig::get('app_facebook_id'),
            'secret' => sfConfig::get('app_secret_id')
        ));

        $this->user = $this->facebook->getUser();

        if ($this->user) {
            try {
                $this->user_profile = $this->facebook->api('/me');

                $userFb = UserFbTable::getInstance()->findOneBy('id', $this->user_profile['id']);
                if (!$userFb) {
                    $userFb = new UserFb();
                    $userFb->setId($this->user_profile['id']);

                    $user = new User();
                    $user->setUsername('facebook_' . $this->user_profile['id']);
                    $user->setLastname($this->user_profile['last_name']);
                    $user->setFirstname($this->user_profile['name']);
                    $user->setUserTypeId(UserTable::USER_FACEBOOK);
                    $user->save();

                    $userFb->setUserId($user->getId());
                } else {
                    $user = UserTable::getInstance()->findOneBy('id', $userFb->getUserId());
                }

                $userFb->setFirstName($this->user_profile['first_name']);
                $userFb->setGender($this->user_profile['gender']);
                $userFb->setLastName($this->user_profile['last_name']);
                $userFb->setLink($this->user_profile['link']);
                $userFb->setLocale($this->user_profile['locale']);
                $userFb->setName($this->user_profile['name']);
                $userFb->setTimezone($this->user_profile['timezone']);
                $userFb->setUpdatedTime($this->user_profile['updated_time']);
                $userFb->setVerified($this->user_profile['verified']);
                $userFb->setPhoto('http://graph.facebook.com/' . $userFb->getId() . '/picture');
                $userFb->setUpdatedAt(date('Y-m-d'));

                $userFb->save();

                $user->setFirstname($this->user_profile['name']);
                $user->setPhoto($userFb->getPhoto());
                $user->save();

                # 2 => facebook
                $this->getUser()->signIn($user, UserTable::USER_FACEBOOK);
            } catch (FacebookApiException $e) {
                $this->user = null;
            }
        } else {
            $this->getUser()->signOut();
        }
    }

}

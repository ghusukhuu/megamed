<?php

class myUser extends sfBasicSecurityUser
{

    public function signIn($user, $userType = 1)
    {
        $this->setAuthenticated(true);
        $this->setAttribute('userid', $user->getId());
        $this->setAttribute('email', $user->getEmail());
        $this->setAttribute('username', $user->getUsername());
        $this->setAttribute('photo', $user->getPhoto());
        $this->setAttribute('firstname', $user->getFirstname());
        $this->setAttribute('lastname', $user->getLastname());
        $this->setAttribute('fullname', AppEntity::utf8_substr($user->getLastname(), 0, 1) . '.' . $user->getFirstname());
        $this->setAttribute('user_type', $userType);
        $this->setLastLogin($user);
        $this->setPermissions();
        $this->setUserType();
    }

    public function setPermissions()
    {
        
    }

    public function setLastLogin($user)
    {
        if ($this->getUserType() == 1) {
            $user->setLastLogin(AppEntity::getOgnoo());
            $user->save();
        }
    }

    public function signOut()
    {
        $this->getAttributeHolder()->removeNamespace();
        $this->clearCredentials();
        $this->setAuthenticated(false);
        $this->shutdown();
        $this->deleteAllCookies();
    }

    public function deleteAllCookies()
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 1000);
                setcookie($name, '', time() - 1000, '/');
            }
        }
    }

    public function getId()
    {
        return $this->getAttribute('userid', '');
    }

    public function getEmail()
    {
        return $this->getAttribute('email', '');
    }

    public function getUsername()
    {
        return $this->getAttribute('username', '');
    }

    public function getPhoto()
    {
        return $this->getAttribute('photo', '');
    }

    public function getTotalPoint()
    {
        return UserTable::getTotalPoint($this->getId());
    }

    public function getUsedPoint()
    {
        return UserTable::getUsedPoint($this->getId());
    }

    public function getLastname()
    {
        return $this->getAttribute('lastname', '');
    }

    public function getFirstname()
    {
        return $this->getAttribute('firstname', '');
    }

    public function getPicture()
    {
        return $this->getAttribute('picture', '');
    }

    public function getFullname()
    {
        return $this->getAttribute('fullname', '');
    }

    public function setUserType()
    {
        if ($this->getUserType() == UserTable::USER_FACEBOOK) {
            $facebook = new Facebook(array(
                'appId' => sfConfig::get('app_facebook_id'),
                'secret' => sfConfig::get('app_secret_id')
            ));

            $params = array('next' => 'http://megamed.mn/logout');
            $this->setAttribute('logout_url', $facebook->getLogoutUrl($params));
        }
    }

    public function getUserType()
    {
        return $this->getAttribute('user_type', 1);
    }

    public function getLogoutUrl()
    {
        return $this->getAttribute('logout_url', '');
    }

}

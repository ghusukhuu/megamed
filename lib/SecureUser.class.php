<?php

class SecureUser extends sfBasicSecurityUser
{

    public function signIn($user)
    {
        $this->setAuthenticated(true);
        $this->setAttribute('id', $user->getId());
        $this->setAttribute('username', $user->getUsername());
        $this->setAttribute('firstname', $user->getFirstname());
        $this->setAttribute('lastname', $user->getLastname());
        $this->setAttribute('fullname', AppEntity::utf8_substr($user->getLastname(), 0, 1) . '.' . $user->getFirstname());
        $this->setLastLogin($user);
        $this->setPermissions();
    }

    public function setPermissions()
    {
        $this->addCredential('super_admin');
    }

    public function setLastLogin($user)
    {
        $user->setLastLogin(AppEntity::getOgnoo());
        $user->save();
    }

    public function signOut()
    {
        $this->getAttributeHolder()->removeNamespace();
        $this->clearCredentials();
        $this->setAuthenticated(false);
    }

    public function getId()
    {
        return $this->getAttribute('id', '');
    }

    public function getUsername()
    {
        return $this->getAttribute('username', '');
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

}

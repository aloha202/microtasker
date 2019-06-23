<?php

class myUser extends sfGuardSecurityUser
{
    public function isDemoEditor()
    {
        return $this->isAuthenticated()
                && $this->hasCredential('editor');
    }

}

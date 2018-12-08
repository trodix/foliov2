<?php

namespace App\Services\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class CommonHandler {

    protected $em;
    protected $session;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    public function setSession(Session $session)
    {
        $this->session = $session;
    }

    public function initEntityManagers(){}

    public function initRepositories(){}

    /**
     * Adds a flash message to the current session for type.
     *
     * @param string $type    The type
     * @param string $message The message
     *
     * @throws \LogicException
     */
    protected function addFlash($type, $message)
    {
        $this->session->getFlashBag()->add($type, $message);
    }

}
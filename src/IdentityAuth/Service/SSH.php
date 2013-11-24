<?php
namespace IdentityAuth\Service;

use IdentityCommon\Service\AbstractService;

class SSH extends AbstractService
{
    public function findToken($id) {
        $entityManager = $this->getEntityManager();
        return $entityManager->getRepository('IdentityCommon\Entity\User\PublicKey\Token')->find($id);
    }
}

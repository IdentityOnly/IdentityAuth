<?php
namespace IdentityAuth\Controller;

class Authenticator extends AbstractController
{
    public function sshAction()
    {
        $sshService = $this->getServiceLocator()->get('IdentityAuth\Service\SSH');
    
        $jsonBody = $this->getRequest()->getContent();
        if(!$jsonBody || !($json = json_decode($jsonBody))) {
            return $this->getResponse()
                ->setStatusCode(400);
        }
        
        $authUser = $json->authUser;
        if(!$authUser) {
            return $this->getResponse()
                ->setStatusCode(401);
        }
        
        $sshToken = $sshService->findToken($authUser);
        if(!$sshToken) {
            return $this->getResponse()
                ->setStatusCode(404);
        }
        
        $publicKey = $sshToken->getPublicKey();
        if(!$publicKey) {
            return $this->getResponse()
                ->setStatusCode(404);
        }
        
        return $this->getResponse()
            ->setStatusCode(200)
            ->setContent($publicKey->getData());
    }
}

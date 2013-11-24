<?php
return array(
    'routes' => array(
        'authenticator' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route' => '/authenticator',
                'defaults' => array(
                    'controller' => 'IdentityAuth\Controller\Authenticator',
                    'action' => 'index',
                )
            ),
            'child_routes' => array(
                'ssh' => array(
                    'options' => array(
                        'route' => '/ssh',
                        'defaults' => array(
                            'action' => 'ssh',
                        )
                    )
                )
            )
        )
    )
);

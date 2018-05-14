<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Acl\Adapter\Memory as AclList;


class TrackerAcl
{

  private $acl;

  public function example()
  {
    $acl = new AclList();

    $acl->setDefaultAction(Acl::DENY);

    //adding roles
    $roleAdmin = new Role('Administrator');
    $roleUser = new Role('User');
    $roleGuest = new Role('Guest');

    $acl->addRole($roleAdmin);
    $acl->addRole($roleUser);
    $acl->addRole($roleGuest);

    $employeeResource = new Resource('Employee');
    $acl->addResource($employeeResource, 'search');
    $acl->addResource($employeeResource, ['create', 'update']);
  }
}
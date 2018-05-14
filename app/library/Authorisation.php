<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11.05.2018
 * Time: 9:45
 */
namespace TimeTracker\Library;

use Phalcon\Mvc\User\Component;
use Phalcon\Exception as PhalconException;
use TimeTracker\Models\Users;


class Authorisation extends Component
{
  public function check($information) {
    // Check if the user exist
    $user = Users::findFirstByEmail($information['email']);
    if ($user == false) {
      //$this->registerUserThrottling(0);
      throw new PhalconException('Wrong email/password combination');
    }

    // Check the password
    if (!$this->security->checkHash($information['password'], $user->password)) {
      //$this->registerUserThrottling($user->id);
      throw new PhalconException('Wrong email/password combination');
    }

    // Check if the user was flagged
    //$this->checkUserFlags($user);

    // Register the successful login
    //$this->saveSuccessLogin($user);

    // Check if the remember me was selected
    /*if (isset($information['remember'])) {
      $this->createRememberEnvironment($user);
    }*/

    $this->session->set('auth-identity', [
      'id' => $user->id,
      'name' => $user->name,
      'permission' => $user->permission
    ]);
  }
}
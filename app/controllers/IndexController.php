<?php

use TimeTracker\Forms\LoginForm;
use TimeTracker\Library\Authorisation;
use TimeTracker\Models\Users;

class IndexController extends ControllerBase
{

  public function indexAction()
  {
    if($this->session->has('auth-identity')) {
      $permission = $this->session->get('auth-identity')['permission'];
      if($permission == 0) {
        $this->dispatcher->forward([
          'controller' => 'user',
          'action' => 'index'
        ]);
      } elseif ($permission == 1) {
        $this->dispatcher->forward([
          'controller' => 'admin',
          'action' => 'index'
        ]);
      } else {
        $this->session->destroy();
      }
    } else {
      $this->dispatcher->forward([
        'controller' => 'index',
        'action' => 'login'
      ]);
    }
  }

  public function loginAction()
  {
    $form = new LoginForm();

    try {

      if($this->request->isPost() && ($form->isValid($this->request->getPost()) != false)) {
        $auth = new Authorisation();
        $auth->check([
          'email' => $this->request->getPost('email'),
          'password' => $this->request->getPost('password'),
          'remember' => $this->request->getPost('remember')
        ]);

        return $this->response->redirect('index');
        }
      } catch (AuthException $e) {
      $this->flash->error($e->getMessage());
    }

    $this->view->form = $form;
  }
}


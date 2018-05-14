<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.05.2018
 * Time: 16:00
 */

use Phalcon\Mvc\Controller;
use TimeTracker\Forms\RegistrationForm;
use TimeTracker\Models\Users;
use TimeTracker\Models\Statistics;
use \TimeTracker\Models\Weekends;

class AdminController extends Controller
{
  public function indexAction()
  {
    $allUsers = Users::find([
      'active = 1'
    ])->toArray();

    $statistics = Statistics::find([
      'order' => 'date DESC, user_id ASC'
    ])->toArray();

    $weekends = Weekends::find()->toArray();

    // work days of current month
    $work_days = array();

    $today = strtotime('now');
    while (intval(date('j', $today)) != 1) {
      $add = false;
      foreach ($weekends as $day_off) {
        $add = true;
        if($day_off['is_weekend'] == 1) {
          if(date('w', $today) == date('w', strtotime($day_off['day_off']))) { $add = false; break; }
        } elseif ($day_off['is_holiday'] == 1 && $day_off['is_regular'] == 1) {
          if(date('m-d', $today) == date('m-d', strtotime($day_off['day_off']))) { $add = false; break; }
        } elseif ($day_off['is_holiday'] == 1 && $day_off['is_regular'] == 0) {
          if(date('Y-m-d', $today) == date('Y-m-d', strtotime($day_off['day_off']))) { $add = false; break; }
        }
      }
      if($add) {
        $work_days[date('Y-m-d', $today)] = date('Y-m-d', $today);
      }
      $today = strtotime(date('Y-m-d',$today) ."-1 day");
    }



    $this->view->setVars([
      'allUsers' => $allUsers,
      'statistics' => $statistics,
      'workDays' => $work_days,
    ]);

    print_die($statistics);

  }

  public function newUserRegistrationAction()
  {
    $form = new RegistrationForm();

    if ($this->request->isPost()) {

      $admin = $this->request->getPost('isAdmin');
      $isAdmin = (isset($admin) && $admin!="")?$this->request->getPost('isAdmin'):0;

      if ($form->isValid($this->request->getPost()) != false) {


        $user = new Users([
          'name' => $this->request->getPost('name', 'striptags'),
          'email' => $this->request->getPost('email'),
          'password' => $this->security->hash($this->request->getPost('password')),
          'registration' => date('Y-m-d'),
          'permission' => $isAdmin,
          'active' => 1
        ]);

        if ($user->save()) {
          echo 1;
        }


        /*if ($user->save()) {
          return $this->dispatcher->forward([
            'controller' => 'index',
            'action' => 'index'
          ]);
        }*/

        $this->flash->error($user->getMessages());
      }
    }

    $this->view->form = $form;
  }
}
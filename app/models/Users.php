<?php

namespace TimeTracker\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=64, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="password", type="string", length=128, nullable=false)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(column="email", type="string", length=64, nullable=false)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(column="registration", type="string", nullable=false)
     */
    public $registration;

    /**
     *
     * @var string
     * @Column(column="permission", type="string", length=64, nullable=false)
     */
    public $permission;

    /**
     *
     * @var integer
     * @Column(column="active", type="integer", length=6, nullable=false)
     */
    public $active;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("timetracker");
        $this->setSource("users");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

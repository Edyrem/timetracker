<?php

namespace TimeTracker\Models;

class Permissions extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="active", type="integer", length=4, nullable=false)
     */
    public $active;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("timetracker");
        $this->setSource("permissions");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'permissions';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permissions[]|Permissions|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permissions|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

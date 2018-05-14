<?php

namespace TimeTracker\Models;

class Statistics extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="user_id", type="integer", length=11, nullable=false)
     */
    public $user_id;

    /**
     *
     * @var string
     * @Column(column="work_begins", type="string", nullable=false)
     */
    public $work_begins;

    /**
     *
     * @var string
     * @Column(column="work_ends", type="string", nullable=false)
     */
    public $work_ends;

    /**
     *
     * @var integer
     * @Column(column="is_active", type="integer", length=6, nullable=false)
     */
    public $is_active;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("timetracker");
        $this->setSource("statistics");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'statistics';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Statistics[]|Statistics|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Statistics|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

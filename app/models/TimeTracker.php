<?php

namespace TimeTracker\Models;

class TimeTracker extends \Phalcon\Mvc\Model
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
     * @Column(column="work_begin_time", type="string", nullable=false)
     */
    public $work_begin_time;

    /**
     *
     * @var string
     * @Column(column="work_end_time", type="string", nullable=false)
     */
    public $work_end_time;

    /**
     *
     * @var string
     * @Column(column="changed_date", type="string", nullable=false)
     */
    public $changed_date;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("timetracker");
        $this->setSource("time_tracker");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'time_tracker';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TimeTracker[]|TimeTracker|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TimeTracker|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

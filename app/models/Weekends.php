<?php

namespace TimeTracker\Models;

class Weekends extends \Phalcon\Mvc\Model
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
     * @Column(column="day_off", type="string", nullable=false)
     */
    public $day_off;

    /**
     *
     * @var integer
     * @Column(column="is_weekend", type="integer", length=6, nullable=false)
     */
    public $is_weekend;

    /**
     *
     * @var integer
     * @Column(column="is_holiday", type="integer", length=6, nullable=false)
     */
    public $is_holiday;

    /**
     *
     * @var integer
     * @Column(column="is_regular", type="integer", length=6, nullable=false)
     */
    public $is_regular;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("timetracker");
        $this->setSource("weekends");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'weekends';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Weekends[]|Weekends|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Weekends|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

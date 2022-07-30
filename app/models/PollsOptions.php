<?php

class PollsOptions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $polls_id;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    public $number_votes;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'polls_options';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PollsOptions[]|PollsOptions
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PollsOptions
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

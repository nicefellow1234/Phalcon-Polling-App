<?php

class Polls extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $question;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        /*$this->hasMany(
            'id',
            'PollsOptions',
            'polls_id',
            [
                'foreignKey' => [
                    'action' => \Phalcon\Mvc\Model\Relation::ACTION_CASCADE
                ]
            ]
        );*/
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'polls';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Polls[]|Polls
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Polls
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

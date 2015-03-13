<?php

namespace BenjaminGayGeffroy\PokemonBattle;

/**
 * Class Pokemon
 *
 * @package pokemonbattle\Init
 *
 * @Entity
 * @Table(name="pokemon")
 */

class Pokemon implements Model\PokemonInterface
{

    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $id;


    /**
     * @var string
     *
     * @Column(name="name", type="string", length=60)
     */
    private $name;


    /**
     * @var int
     *
     * @Column(name="hp", type="int")
     */
    private $hp;

    /**
     * @var int
     *
     * @Column(name="type", type="smallint", length=1)
     */
    private $type;
        const TYPE_WATER = 0;
        const TYPE_FIRE = 1;
        const TYPE_PLANT = 2;

    /**
     * @var trainer
     * @OneToOne(targetEntity="Trainer")
     *
     */
    private $trainer;
    /**
     * @var int
     *
     * @Column(name="restart", type="integer", length=10)
     */
    private $resuscitate;



    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Pokemon
     *
     * @throws \Exception
     */
    public function setName($name)
    {
        if (is_string($name))
            $this->name = $name;
        else
            throw new \Exception('name must be a string');
        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     *
     * @return Pokemon
     *
     * @throws \Exception
     */
    public function setType($type)
    {
        if (true === in_array($type, [
                self::TYPE_FIRE,
                self::TYPE_PLANT,
                self::TYPE_WATER,
            ]))
            $this->type = $type;
        else
            throw new \Exception('Type is not valid');
        return $this;
    }

    /**
     * @return int
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param int $hp
     *
     * @return Pokemon
     *
     * @throws \Exception
     */
    public function setHp($hp)
    {
        if (is_int($hp))
            $this->hp = $hp;
        else
            throw new \Exception('HP must be an integer');
        return $this;
    }

    /**
     * @param int $hp
     *
     * @return Pokemon
     *
     * @throws \Exception
     */
    public function addHP($hp)
    {
        $this->hp = $hp;
    }

    /**
     * @param int $hp
     *
     * @return Pokemon
     *
     * @throws \Exception
     */
    public function removeHP($hp)
    {
        $this->hp = $hp;
    }


    /**
     *
     * @return string
     */
    public function getTrainer()
    {
        return $this->trainer;
    }
    /**
     * @param $trainer
     * @return $this
     * @throws \Exception
     */
    public function setTrainer($trainer)
    {
        if (is_object($trainer))
            $this->trainer = $trainer;
        else
            throw new \Exception('Trainer is not an object');
        return $this;
    }
    /**
     * @return int
     */
    public function getResuscitate()
    {
        return $this->resuscitate;
    }
    /**
     * @param int $resuscitate
     * @throws \Exception
     * @return Pokemon
     */
    public function setResuscitate($resuscitate)
    {
        if (is_int($resuscitate))
            $this->resuscitate = $resuscitate;
        else
            throw new \Exception('Resuscitate must be an integer');
        return $this;
    }




}
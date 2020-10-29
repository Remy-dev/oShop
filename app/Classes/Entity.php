<?php
namespace Oshop\Classes;

abstract class Entity {

    protected $id;
    protected $name;
    protected $createdAt;
    protected $updatedAt;
    

    use Hydrator;

    public function __construct(array $array = [])
    {
        $this->hydrate($array);
    }

    public function setId($id)
    {
        $id = (int) $id;
    }

    public function setName($name)
    {
        if (is_string($name))
        {
            $this->name = $name;
        }
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function createdAt()
    {
        return $this->createdAt;
    }

    public function updatedAt()
    {
        return $this->updatedAt;
    }

    public function setCreatedAt(\Datetime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(\Datetime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


}
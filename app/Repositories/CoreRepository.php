<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use PhpParser\Node\Expr\BinaryOp\Mod;

//use Your Model

/**
 * Class CoreRepository.
 */
abstract class CoreRepository
{
    /**
     * @return string
     *  @var Model
     */
    protected $model;


    /**
     * @return mixed
     *
     */
    abstract protected function getModelClass();


    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return Model|\Illuminate\Foundation\Application\mixed
     *
     */

    protected function startConditions()
    {
        return clone $this->model;
    }
}

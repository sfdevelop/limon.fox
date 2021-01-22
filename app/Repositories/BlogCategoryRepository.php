<?php

namespace App\Repositories;

use App\Modals\BlogCategory as Model;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */

     public function getModelClass()
     {
         return Model::class;
     }


     //получаем модель для редактирования в админке

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }


    // получаем список категорий для вывода в выпадающем списке
    public function getForCombobox(){
        return $this->startConditions()->all();
    }
}

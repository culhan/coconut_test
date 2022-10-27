<?php
// File ini ini di  buat dengan Laravel Rest Builder,
// Jika ada perubahan tambahkan code diantara comment "start custom code" dan "end custom code" di akhir file
// atau hubungi A'mal Sholihan
namespace App\Http\Repositories;

use Request;
use App\Models\UserGenerated;
use App\Exceptions\DataEmptyException;
use KhanCode\LaravelBaseRest\BaseRepository;

/**
 * code for system logic
 */
class UserGeneratedRepository extends BaseRepository
{
    /**
     * [$module description]
     * @var string
     */
    public $module = 'User Generated';

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->model = new UserGenerated;
    }

    /**
     * [getIndexData description]
     *
     * @param   array  $sortableAndSearchableColumn  [$sortableAndSearchableColumn description]
     * @param   array  $relationColumn               [$relationColumn description]
     * @param   array  $data_filter                  [$data_filter description]
     *
     * @return  [type]                               [return description]
     */
    public function getIndexData(array $sortableAndSearchableColumn = [], array $relationColumn = [], array $data_filter = []) {
        $this->model::validate(Request::all(), [
            'per_page'  =>  ['numeric'],
        ]);

        $data = $this->model
            ->getAll($data_filter)
            ->setSortableAndSearchableColumn($sortableAndSearchableColumn)
            ->setRelationColumn($relationColumn)
            ->search()
            ->distinct()
            ->sort()
            ->paginate(Request::get('per_page'));

        $data->sortableAndSearchableColumn = $sortableAndSearchableColumn;
        $data->relationColumn = $relationColumn;
        
        if($data->total() == 0) throw new DataEmptyException(trans('validation.attributes.dataNotExist',['attr' => $this->module]));

        return $data;
    }

    /**
     * [getSingleData description]
     *
     * @param   [type] $id           [$id description]
     * @param   array  $data_filter  [$data_filter description]
     *
     * @return  [type]               [return description]
     */
    public function getSingleData( $id, array $data_filter = [] ) {
        $return = $this->model
                ->getAll($data_filter)
                ->encapsulatedQuery()
                ->where($this->model->getKeyName(),$id)
                ->first();

        if($return === null) throw new DataEmptyException(trans('validation.attributes.dataNotExist',['attr' => $this->module]));

        return $return;
    }

    /**
     * [setModulName description]
     *
     * @param   [type] $name           [$name description]
     *
     * @return  [type]               [return description]
     */
    public function setModulName( $name ) {
        $this->module = $name;
        return $this;
    }

    // start function
    // end function

    // start custom code    
    // end custom code
}
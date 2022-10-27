<?php
namespace App\Http\Services;

use App;
use Request;
use KhanCode\LaravelBaseRest\Helpers;
use KhanCode\LaravelBaseRest\Locking;
use KhanCode\LaravelBaseRest\DataEmptyException;
use KhanCode\LaravelBaseRest\ValidationException;
use KhanCode\LaravelBaseRest\BaseService;

/**
 * code for system logic
 */
class UserGeneratedService extends BaseService
{
    

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->model = new App\Models\UserGenerated;
        $this->repository = new App\Http\Repositories\UserGeneratedRepository;
    }

    // start list function
    
    /**
     * [list description]
     * @return [type] [description]
     */
    public function getListData($searchableSortableColumn,$relation,$data)
    {
        $dataRecord = $data_filter = $data;

        
        
                        

        if( !empty( Helpers::is_error() ) ) throw new ValidationException( Helpers::get_error() );

        // custom code before
        

        $return = $this->repository->getIndexData($searchableSortableColumn,$relation,$data_filter);

        // custom code after
        

        return $return;
    }

    // end list function    

    // start custom code
    // end custom code
}
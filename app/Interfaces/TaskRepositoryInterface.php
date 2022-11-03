<?php
namespace App\Interfaces;

interface TaskRepositoryInterface 
{
    /**
     * @return collection
     */
    public function all();

    /**
     * @return collection
     */
    public function paginate();


    /**
     * @param int $id
     * @return object
     */
    public function find($id);


    /**
     * @param int $id
     * @return mixed
     */
    public function delete($id);

    
    /**
     * @param array $data
     * @return object
     */
    public function create(array  $data);


    /**
     * @param int $id
     * @param array $data
     * @return object
     */
    public function update(array $data, $id);

}
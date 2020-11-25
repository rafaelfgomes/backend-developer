<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CustomerRepository implements RepositoryInterface
{
  private $model;

  /**
   * Create a new repository instance.
   *
   * @return void
   */
  public function __construct(Customer $customer)
  {
    $this->model = $customer;
  }

  /**
   * Get all resources.
   *
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function all() : ?Collection
  {
    return $this->model->all();
  }

  /**
   * Get one resource.
   *
   * @param string $id
   * @return App\Models\Customer
   */
  public function show(string $id) : ?Customer
  {
    return $this->model->find($id);
  }

  /**
   * Store or update one resource.
   *
   * @param Illuminate\Http\Request $request
   * @param string $id
   * @return App\Models\Customer
   */
  public function storeOrUpdate(Request $request, string $id) : ?Customer
  {
    $example = $this->model->find($id);
    return (!$example) ? $this->model->create($request->all()) : tap($example)->update($request->all());
  }

  /**
   * Delete one resource.
   *
   * @param string $id
   * @return App\Models\Customer
   */
  public function delete(string $id) : ?Customer
  {
    return $this->model->find($id)->delete();
  }
}
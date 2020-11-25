<?php

namespace App\Repositories;

use App\Models\Address;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AddressRepository implements RepositoryInterface
{
  private $model;

  /**
   * Create a new repository instance.
   *
   * @return void
   */
  public function __construct(Address $address)
  {
    $this->model = $address;
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
   * @return App\Models\Address
   */
  public function show(string $id) : ?Address
  {
    return $this->model->find($id);
  }

  /**
   * Store or update one resource.
   *
   * @param Illuminate\Http\Request $request
   * @param string $id
   * @return App\Models\Address
   */
  public function storeOrUpdate(Request $request, string $id) : ?Address
  {
    $example = $this->model->find($id);
    return (!$example) ? $this->model->create($request->all()) : tap($example)->update($request->all());
  }

  /**
   * Delete one resource.
   *
   * @param string $id
   * @return App\Models\Address
   */
  public function delete(string $id) : ?Address
  {
    return $this->model->find($id)->delete();
  }
}
<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SalesRepository implements RepositoryInterface
{
  private $model;

  /**
   * Create a new repository instance.
   *
   * @return void
   */
  public function __construct(Sale $sale)
  {
    $this->model = $sale;
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
   * @return App\Models\Sale
   */
  public function show(string $id) : ?Sale
  {
    return $this->model->find($id);
  }

  /**
   * Store or update one resource.
   *
   * @param Illuminate\Http\Request $request
   * @param string $id
   * @return App\Models\Sale
   */
  public function storeOrUpdate(Request $request, string $id) : ?Sale
  {
    $example = $this->model->find($id);
    return (!$example) ? $this->model->create($request->all()) : tap($example)->update($request->all());
  }

  /**
   * Delete one resource.
   *
   * @param string $id
   * @return App\Models\Sale
   */
  public function delete(string $id) : ?Sale
  {
    return $this->model->find($id)->delete();
  }
}
<?php

namespace App\Repositories;


use App\Models\Installment;
use Illuminate\Http\Request;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class InstallmentRepository extends RepositoryInterface
{
  private $model;

  /**
   * Create a new repository instance.
   *
   * @return void
   */
  public function __construct(Installment $installment)
  {
    $this->model = $installment;
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
   * @return App\Models\Installment
   */
  public function show(string $id) : ?Installment
  {
    return $this->model->find($id);
  }

  /**
   * Store or update one resource.
   *
   * @param Illuminate\Http\Request $request
   * @param string $id
   * @return App\Models\Installment
   */
  public function storeOrUpdate(Request $request, string $id) : ?Installment
  {
    $installment = $this->model->find($id);
    return (!$installment) ? $this->model->create($request->all()) : tap($installment)->update($request->all());
  }

  /**
   * Delete one resource.
   *
   * @param string $id
   * @return App\Models\Installment
   */
  public function delete(string $id) : ?Installment
  {
    return $this->model->find($id)->delete();
  }
}
<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Interfaces\RepositoryInterface;
use Carbon\Carbon;
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
  public function storeOrUpdate(array $data, string $id = '') : ?Sale
  {
    $example = isset($id) ? $this->model->find($id) : null;
    return (!$example) ? $this->model->create($data) : tap($example)->update($data);
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

  /**
   * Set data to Model.
   *
   * @param string $id
   * @return App\Models\Sale
   */
  public function setData(array $data) : void
  {
    $amountConverted = convertToDouble($data['amount']);
    $date = convertToDate($data['date']);

    $this->model->setCode($data['code']);
    $this->model->setDate($date);
    $this->model->setAmount($amountConverted);
  }

  public function getFields() : ?array
  {
    $model = [
      'code' => $this->model->getCode(),
      'date' => $this->model->getDate(),
      'amount' => $this->model->getAmount()
    ];

    return $model;
  }
}
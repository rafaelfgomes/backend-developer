<?php

namespace App\Models;

use Illuminate\Support\Facades\Date;
use Jenssegers\Mongodb\Eloquent\Model;

class Sale extends Model
{
  /**
   * @var Date
   */
  private $date;

  /**
   * @var float
   */
  private $amount;

  protected $collection = 'sales';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'date',
    'amount'
  ];

  public function getDate() : Date
  {
    return $this->date;
  }

  public function setDate(Date $date) : void
  {
    $this->date = $date;
  }

  public function getAmount() : float
  {
    return $this->amount;
  }

  public function setAmount(float $amount) : void
  {
    $this->amount = $amount;
  }
}
<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class CustomerAddress extends Model
{
  /**
   * @var string
   */
  private $customerId;

  /**
   * @var string
   */
  private $addressId;

  /**
   * @var int
   */
  private $number;

  /**
   * @var string
   */
  private $complement;

  protected $collection = 'customer_address';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'customer_id',
    'address_id',
    'number',
    'complement'
  ];

  public function getCustomerId() : string
  {
    return $this->customerId;
  }

  public function setCustomerId(string $customerId) : void
  {
    $this->customerId = $customerId;
  }

  public function getAddressId() : string
  {
    return $this->addressId;
  }

  public function setAddresId(string $addressId) : void
  {
    $this->addressId = $addressId;
  }

  public function getNumber() : int
  {
    return $this->number;
  }

  public function setNumber(string $number) : void
  {
    $this->number = $number;
  }

  public function getComplement() : string
  {
    return $this->complement;
  }

  public function setComplement(string $complement) : void
  {
    $this->complement = $complement;
  }
}


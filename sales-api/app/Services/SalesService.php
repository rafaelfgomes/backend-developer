<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\RepositoryInterface;

class SalesService
{
  /**
   *
   * @var SalesRespository
   */
  private $salesRepository;

  /**
   *
   * @var InstallmentRespository
   */
  private $installmentRepository;

  /**
   *
   * @var CustomerMentRespository
   */
  private $customerRepository;

  /**
   *
   * @var AddressRespository
   */
  private $addressRepository;

  /**
   * Create a new service instance.
   *
   * @return void
   */
  public function __construct(RepositoryInterface $salesRepository, RepositoryInterface $installmentRepository,RepositoryInterface $customerRepository, RepositoryInterface $addressRepository)
  {
    $this->salesRepository = $salesRepository;
    $this->installmentRepository = $installmentRepository;
    $this->customerRepository = $customerRepository;
    $this->addressRepository = $addressRepository;
  }

  public function uploadSales(Request $request)
  {
    dd($request->all());
  }
}
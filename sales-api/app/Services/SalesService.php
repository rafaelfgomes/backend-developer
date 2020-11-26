<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\RepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;

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

  public function uploadSales(Request $request) : JsonResponse
  {
    $data = [];
    $file = fopen($request->sales, 'r');

    while (!feof($file)) {

      $values = extractTextInfo(fgets($file));

      if ($values['code']) {
        $values['customerName'] = trim($values['customerName']);
        $data[] = $values;
      }

    }

    fclose($file);

    return response()->json(['data' => $data]);
  }
}
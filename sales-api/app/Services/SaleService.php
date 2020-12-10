<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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
   * @var CustomerRespository
   */
  private $customerRepository;

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
    $response = [];
    $file = fopen($request->sales, 'r');

    while (!feof($file)) {

      $values = extractTextInfo(fgets($file));

      if ($values['code']) {
        $values['customerName'] = trim($values['customerName']);
        $data[] = $values;
      }

    }

    fclose($file);

    foreach ($data as $value) {
      $this->salesRepository->setData($value);
      $this->customerRepository->setData($value);
      $this->addressRepository->setData($value);

      $sales = $this->salesRepository->getFields();
      $customer = $this->customerRepository->getFields();
      $address = $this->addressRepository->getFields();
      $installments = $this->installmentRepository->calculateInstallments($value);

      $response[] = [
        'sales' => [
          'id' => $sales['code'],
          'date' => $sales['date'],
          'amount' => $sales['amount'],
          'customer' => [
            'name' => $customer['name'],
            'address' => [
              'street' => $address['street'],
              'neighborhood' => $address['neighborhood'],
              'city' => $address['city'],
              'state' => $address['state'],
              'postal_code' => $address['postal_code']
            ]
          ],
          'installments' => $installments
        ]
      ];
    }

    return response()->json($response);
  }
}
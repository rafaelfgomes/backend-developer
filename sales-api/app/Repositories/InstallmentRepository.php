<?php

namespace App\Repositories;


use App\Models\Installment;

class InstallmentRepository
{
  private $installment;

  /**
   * Create a new repository instance.
   *
   * @return void
   */
  public function __construct(Installment $installment)
  {
    $this->installment = $installment;
  }

  /**
   * Set data to Model.
   *
   * @param string $id
   * @return App\Models\Sale
   */
  public function calculateInstallments(array $data) : ?array
  {
    $dataInstallments = [];
    $dateInstallment = convertToDate($data['date']);
    $totalAmount = convertToDouble($data['amount']);
    $totalInstallments = intval($data['installments']);
    $installmentValue = $totalAmount / $totalInstallments;
    $installment = 0;

    for ($i=0; $i < $totalInstallments; $i++) {
      $dataInstallments[] = [
        'installment' => ($i + 1),
        'amount' => round($installmentValue, 2),
        'date' => date('Y-m-d', strtotime('+' . ($i + 1) . 'months', strtotime($dateInstallment)))
      ];

      $installment += formatNumber($installmentValue);
      if ($installment > $totalAmount) {
        $diff = $installment - $totalAmount;
        $dataInstallments[$i]['amount'] -= $diff;
      }
    }

    return $dataInstallments;
  }
}
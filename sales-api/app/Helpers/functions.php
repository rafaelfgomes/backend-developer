<?php

function extractTextInfo($line)
{
  $characters = str_split($line);

  if (count($characters)) {

    $data = [
      'code' => '',
      'date' => '',
      'amount' => '',
      'installments' => '',
      'customerName' => '',
      'postalCode' => ''
    ];

    foreach ($characters as $key => $character) {
      if ($key < 3) {
        $data['code'] .= $character;
      }

      if ($key >= 3 && $key < 11) {
        $data['date'] .= $character;
      }

      if ($key >= 11 && $key < 21) {
        $data['amount'] .= $character;
      }

      if ($key >= 21 && $key < 23) {
        $data['installments'] .= $character;
      }

      if ($key >= 23 && $key < 43) {
        $data['customerName'] .= $character;
      }

      if ($key >= 43 && $key < 51) {
        $data['postalCode'] .= $character;
      }
    }

    return $data;
  }
}
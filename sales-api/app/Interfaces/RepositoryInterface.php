<?php

namespace App\Interfaces;

interface RepositoryInterface
{
  public function setData(array $data) : void;
  public function getFields() : ?array;
}
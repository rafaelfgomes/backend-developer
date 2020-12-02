<?php

namespace App\Interfaces;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
  public function all() : ?Collection;
  public function show(string $id) : ?Model;
  public function storeOrUpdate(array $data, string $id = '') : ?Model;
  public function delete(string $id) : ?Model;
}
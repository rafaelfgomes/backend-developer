<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
  public function all() : ?Collection;
  public function show(string $id) : ?Model;
  public function storeOrUpdate(Request $request, string $id) : ?Model;
  public function delete(string $id) : ?Model;
}
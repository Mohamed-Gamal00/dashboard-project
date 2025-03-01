<?php

namespace App\Repositories\Order;

interface OrderInterface
{
  public function getAll();
  public function show($id);
  public function update($request,$id);
  public function delete($id);
}

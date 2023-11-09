<?php

namespace App\Interfaces;


Interface OnlineClasseRepositoryInterface{

   public function index();
   public function create();

   public function indirectCreate();
   public function storeIndirect($request);

    public function show($id);

    public function edit($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
}



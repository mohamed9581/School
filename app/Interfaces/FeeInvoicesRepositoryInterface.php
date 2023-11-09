<?php

namespace App\Interfaces;


Interface FeeInvoicesRepositoryInterface{

    public function index();
    public function show($id);
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);
    //get all amounts with ajax
    public function getAmounts($id);
}



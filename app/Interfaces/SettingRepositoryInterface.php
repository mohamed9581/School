<?php

namespace App\Interfaces;


Interface SettingRepositoryInterface{

   public function index();

    public function edit($id);

    public function update($request);

}



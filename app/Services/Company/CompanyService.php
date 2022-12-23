<?php

namespace App\Services\Company;

use App\Http\Requests\CompanyRequest;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompanyService
{
    public function index()
    {
        $oder = company::query()->get();
        return $oder;
    }
    public function create($data)
    {
        $create = company::create($data);
        return $create;
    }
    public function edit($data, $id)
    {
        $Company = company::where('_id', $id)
            ->update([
                'name' => $data['name'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'email' => $data['email'],
            ]);
        return $Company;
    }
    public function delete($id)
    {
        $delete = company::where('_id', $id)
            ->delete();
        return $delete;
    }
}

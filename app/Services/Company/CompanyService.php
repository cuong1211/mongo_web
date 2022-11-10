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
    public function edit(CompanyRequest $request, $id)
    {

        // $a = 'ObjectId';
        // $Company_old = $a."("."'".$id."'".")";
        $Company = company::where('_id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        // $Company = Company::find($obId)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        // ]);
        return $Company;
    }
    public function delete($id)
    {
        $delete = company::where('_id', $id)
            ->delete();
        return $delete;
    }
}

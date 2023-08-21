<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{
    use Response;

    public function index()
    {
        $data = Promo::all();
        return $this->success($data);
    }

    public function show($id)
    {
        $data = Promo::find($id);
        return $this->success($data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = Promo::create($request->all());
            DB::commit();
            return $this->success($data, 'Promo Created', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = Promo::find($id);
            $data->update($request->all());
            DB::commit();
            return $this->success($data, 'Promo Updated');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = Promo::find($id);
            $data->delete();
            DB::commit();
            return $this->success($data, 'Promo Deleted');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
}

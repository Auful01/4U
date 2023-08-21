<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\Tips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipsController extends Controller
{
    use Response;

    public function index()
    {
        return $this->success('Tips');
    }

    public function show($id)
    {
        return $this->success('Tips Detail');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = Tips::create($request->all());

            DB::commit();

            return $this->success($data, 'Tips Created', 201);
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

            $data = Tips::find($id);
            $data->update($request->all());

            DB::commit();

            return $this->success($data, 'Tips Updated');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $data = Tips::find($id);
            $data->delete();

            DB::commit();

            return $this->success($data, 'Tips Deleted');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
}

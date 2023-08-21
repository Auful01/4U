<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\TipsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipsCategoryController extends Controller
{
    use Response;

    public function index()
    {
        $data = TipsCategory::all();

        return $this->success($data);
    }

    public function show($id)
    {
        $data = TipsCategory::find($id);

        return $this->success($data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = TipsCategory::create($request->all());

            DB::commit();
            return $this->success($data, 'Tips Category Created', 201);
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

            $data = TipsCategory::find($id);
            $data->update($request->all());

            DB::commit();

            return $this->success($data, 'Tips Category Updated');
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

            $data = TipsCategory::find($id);
            $data->delete();

            DB::commit();

            return $this->success($data, 'Tips Category Deleted');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
}

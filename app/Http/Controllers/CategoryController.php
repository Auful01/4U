<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use Response;

    public function index()
    {
        $data = Category::all();

        return $this->success($data);
    }

    public function show($id)
    {
        $data = Category::find($id);

        return $this->success($data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = Category::create($request->all());

            DB::commit();

            return $this->success($data, 'Category Created', 201);
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

            $data = Category::find($id);
            $data->update($request->all());

            DB::commit();

            return $this->success($data, 'Category Updated');
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

            $data = Category::find($id);
            $data->delete();

            DB::commit();

            return $this->success($data, 'Category Deleted');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
}

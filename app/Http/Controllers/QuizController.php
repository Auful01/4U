<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    use Response;

    public function index()
    {
        $data = Quiz::all();
        return $this->success($data);
    }

    public function show($id)
    {
        //
        $data = Quiz::find($id);

        return $this->success($data);
    }

    public function store(Request $request)
    {
        try {
            //code...
            DB::beginTransaction();
            $data = Quiz::create($request->all());

            DB::commit();
            return $this->success($data, 'Quiz Created', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            //code...
            DB::beginTransaction();
            $data = Quiz::find($id);
            $data->update($request->all());

            DB::commit();
            return $this->success($data, 'Quiz Updated');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            //code...
            DB::beginTransaction();
            $data = Quiz::find($id);
            $data->delete();

            DB::commit();
            return $this->success($data, 'Quiz Deleted');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
}

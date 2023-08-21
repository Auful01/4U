<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizAnswerController extends Controller
{
    use Response;

    public function index()
    {
        $data = QuizAnswer::all();

        return $this->success($data);
    }

    public function show($id)
    {
        $data = QuizAnswer::find($id);

        return $this->success($data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = QuizAnswer::create($request->all());

            DB::commit();

            return $this->success($data, 'QuizAnswer Created', 201);
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

            $data = QuizAnswer::find($id);
            $data->update($request->all());

            DB::commit();

            return $this->success($data, 'QuizAnswer Updated');
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

            $data = QuizAnswer::find($id);
            $data->delete();

            DB::commit();

            return $this->success($data, 'QuizAnswer Deleted');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
}

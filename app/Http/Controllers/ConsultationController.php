<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
    use Response;

    public function index()
    {
        $data = Consultation::all();
        return $this->success($data);
    }

    public function show($id)
    {
        $data = Consultation::find($id);
        return $this->success($data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = Consultation::create($request->all());
            DB::commit();
            return $this->success($data, 'Consultation Created', 201);
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
            $data = Consultation::find($id);
            $data->update($request->all());
            DB::commit();
            return $this->success($data, 'Consultation Updated');
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
            $data = Consultation::find($id);
            $data->delete();
            DB::commit();
            return $this->success($data, 'Consultation Deleted');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function consultation()
    {
        return $this->success('Consultation');
    }
}

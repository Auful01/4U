<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\Doctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorsController extends Controller
{
    //
    use Response;

    public function index()
    {
        $data = Doctors::all();
        return $this->success($data);
    }

    public function show($id)
    {
        return $this->success('Doctor Detail');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $photo = $request->file('photo');
            $name = null;

            if ($photo) {
                $name = date('Ymd') . '-' . $photo->getClientOriginalName();
                $photo->storeAs('public/doctors',  $name);
            }

            $data = Doctors::create($request->all());
            $data->photo = $name;
            $data->save();
            DB::commit();
            return $this->success($data, 'Doctor Created', 201);
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->error($th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $data = Doctors::find($id);
            $data->update($request->all());

            $photo = $request->file('photo');
            $name = null;

            if ($photo) {
                $name = date('Ymd') . '-' . $photo->getClientOriginalName();
                $photo->storeAs('public/doctors',  $name);
            }

            $data->photo = $name;
            $data->save();
            DB::commit();
            return $this->success($data, 'Doctor Updated', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $data = Doctors::find($id);
            $data->delete();
            DB::commit();
            return $this->success($data, 'Doctor Deleted', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }
}

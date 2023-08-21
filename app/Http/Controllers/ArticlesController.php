<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    use Response;

    public function index()
    {
        $data = Articles::all();
        return $this->success($data);
    }

    public function show($id)
    {
        $data = Articles::find($id);
        return $this->success($data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = Articles::create($request->all());
            $filename = null;
            $photo = $request->file('thumbnail');
            if ($photo) {
                $filename = date('Ymd') . '-' . $photo->getClientOriginalName();
                $photo->storeAs('public/articles', $filename);
                $data->thumbnail = $filename;
                $data->save();
            }
            DB::commit();
            return $this->success($data, 'Article Created', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = Articles::find($id);
            $data->update($request->all());
            $filename = null;
            $photo = $request->file('thumbnail');
            if ($photo) {
                $filename = date('Ymd') . '-' . $photo->getClientOriginalName();
                $photo->storeAs('public/articles', $filename);
                $data->thumbnail = $filename;
                $data->save();
            }
            DB::commit();
            return $this->success($data, 'Article Updated', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $data = Articles::find($id);
            $data->delete();
            DB::commit();
            return $this->success($data, 'Article Deleted', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }
}

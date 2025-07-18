<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\DataKeluarga;
use App\Models\DataRumah;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'created_at');
        $order = $request->input('order', 'desc');
    
        $surveys = Survey::query()
            ->when($search, function ($query, $search) {
                $query->where('nama_lengkap', 'like', "%$search%")
                      ->orWhere('nik', 'like', "%$search%");
            })
            ->orderBy($sort, $order)
            ->get();
    
        return view('surveys.index', compact('surveys'));


    }



    public function create()
    {
        return view('surveys.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:surveys,nik',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        // Generate code otomatis
        $last = Survey::orderBy('id', 'desc')->first();
        $number = $last ? ((int)substr($last->code, 6) + 1) : 1;
        $newCode = 'SURVEY' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $survey = Survey::create([
            'code' => $newCode,
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'tanggal_survey' => now(),
        ]);

        return redirect()->route('keluarga.create', ['survey' => $survey->id]);
    }
    public function edit($id)
    {
        $survey = Survey::findOrFail($id);
        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $survey = Survey::findOrFail($id);
        $survey->update($request->all());

        return redirect()->route('survey.index')->with('success', 'Data survey berhasil diperbarui!');
    }



    public function destroy(Survey $survey)
    {
        // Hapus semua data keluarga terkait survey ini
        DataKeluarga::where('survey_id', $survey->id)->delete();

        // Hapus semua data rumah terkait survey ini
        DataRumah::where('survey_id', $survey->id)->delete();

        // Hapus survey
        $survey->delete();

        return redirect()->route('survey.index')->with('success', 'Survey dan semua data terkait berhasil dihapus.');
    }

    public function show(Survey $survey)
    {
        return view('surveys.show', compact('survey'));
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

// namespace App\Http\Controllers;

// use App\Models\Employee;
// use Barryvdh\DomPDF\PDF;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;


// class controller untuk employee
class EmployeeController extends Controller
{
    // menampilkan data pegawai
    public function index () {
        // menampilkan seluruh data
        // $data = Employee::all();

        // menampilkan hanya lima data
        $data = Employee::paginate(5);
        return view('datapegawai', compact('data'));
    }

    // menambah or insert data pegawai
    public function tambahpegawai () {
        return view('tambahpegawai');
    }

    public function insertpegawai (Request $request) {
        Employee::create($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Disimpan');
    }

    // edit or update data
    public function editpegawai($id) {
        $data = Employee::find($id);
        // dd($data);
        return view('editpegawai', compact('data'));
    }

    public function updatepegawai(Request $request, $id) {
        // select datanya dulu semua
        $data = Employee::find($id);
        // update data
        $data->update($request->all());
        // jika sudah di update terus di arahkan ke halaman pegawai
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Diupdate');
    }

    // detele data tabel
    public function deletepegawai($id) {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Dihapus');
    }

    // export pdf
    public function exportpdf() {
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('data.pdf');
    }

    public function exportexcel(){
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }
}

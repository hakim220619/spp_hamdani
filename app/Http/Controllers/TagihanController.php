<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagihanController extends Controller
{
    public function view()
    {
        $data['title'] = "Tagihan";
        $data['tagihan'] = DB::select("select t.*, ta.tahun from tagihan t left join tahun_ajaran ta on t.thajaran_id=ta.id");
        return view('backend.tagihan.view', $data);
    }
    public function add()
    {
        $data['title'] = "Tambah Tagihan";
        $data['siswa'] = DB::select("select * from users where role = '2'");
        $data['thajaran'] = DB::select("select * from tahun_ajaran where active = 'ON'");
        $data['jnpembayaran'] = DB::select("select * from jenis_pembayaran where status = 'ON'");
        return view('backend.tagihan.add', $data);
    }
    public function addProses(Request $request)
    {
        // dd($request->all());
        foreach ($request->user_id as $k =>  $u) {
            // dd($u);
            $data[] = [
                'user_id' => $u,
                'thajaran_id' => $request->thajaran_id,
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'nilai' => $request->nilai,
                'status' => "ON",
                'created_at' => now(),
            ];
            // dd($data);

        }
        DB::table('tagihan')->insert($data);
        return redirect("tagihan");
    }
    public function jenisPembayaran()
    {
        $data = DB::select("select id, pembayaran as jenis_pembayaran from jenis_pembayaran where status = 'ON'");
        return response()->json($data);
    }
    public function getSiswa(Request $request)
    {
        // dd($request->all());
        $getsiswa = DB::select("SELECT a.id, a.nama_lengkap FROM users a
WHERE role = 2
AND a.id NOT IN (
    SELECT b.user_id FROM tagihan b
    WHERE b.thajaran_id = '$request->thajaran_id' AND b.jenis_pembayaran = '$request->id'
)
ORDER BY a.nama_lengkap");
        return response()->json($getsiswa);
    }

    // public function cities(Request $request)
    // {
    //     return \Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
    // }
}

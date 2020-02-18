<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataFuzzy;
use App\Fuzzyfikasi;
use App\Inferensi;
use App\Defuzzyfikasi;

class AnalysisController extends Controller
{
    // public function index()
    // {
    //     return view('analisa_fuzzy.index');
    // }


    public function create()
    {
        $data_fuzzy = new DataFuzzy();
        
        return view('analisa_fuzzy.create', compact('data_fuzzy'));
    }

    public function store(DataFuzzy $data_fuzzy)
    {
        $data_fuzzy = DataFuzzy::create($this->validateRequest());

        return redirect('analisa/' . $data_fuzzy->id);
    }

    public function show(DataFuzzy $data_fuzzy)
    {
        return view('analisa_fuzzy.analisa', compact('data_fuzzy'));
    }

    public function analisa(DataFuzzy $data_fuzzy)
    {
        $data_fuzzy = DataFuzzy::find($data_fuzzy->id);
        // $data_fuzzy = DataFuzzy::all();

        $fasilitas_kn = $data_fuzzy->fasilitas_kn;
        $fasilitas_cn = $data_fuzzy->fasilitas_cn;
        $fasilitas_sn = $data_fuzzy->fasilitas_sn;
        $pelayanan_kb = $data_fuzzy->pelayanan_kb;
        $pelayanan_cb = $data_fuzzy->pelayanan_cb;
        $pelayanan_sb = $data_fuzzy->pelayanan_sb;

        //fuzzyfikasi
        $kurang_nyaman = (9-$fasilitas_kn)/(9-0);

        if($fasilitas_cn<5)
        {
            $cukup_nyaman = (9-$fasilitas_cn)/(9-5);
        }
        if($fasilitas_cn>=5)
        {
            $cukup_nyaman = ($fasilitas_cn-1)/(5-1);
        }

        $sangat_nyaman = ($fasilitas_sn-1)/(9-1);


        $kurang_baik = (9-$pelayanan_kb)/(9-0);

        if($pelayanan_cb<5)
        {
            $cukup_baik = (9-$pelayanan_cb)/(9-5);
        }
        if($pelayanan_cb>=5)
        {
            $cukup_baik = ($pelayanan_cb-1)/(5-1);
        }

        $sangat_baik = ($pelayanan_sb-1)/(9-1);

        //inferensi
        $a_predikat1 = min($kurang_nyaman, $kurang_baik); 
        $a_predikat2 = min($kurang_nyaman, $cukup_baik); 
        $a_predikat3 = min($kurang_nyaman, $sangat_baik);
        $a_predikat4 = min($cukup_nyaman, $kurang_baik); 
        $a_predikat5 = min($cukup_nyaman, $cukup_baik); 
        $a_predikat6 = min($cukup_nyaman, $sangat_baik);
        $a_predikat7 = min($sangat_nyaman, $kurang_baik);
        $a_predikat8 = min($sangat_nyaman, $cukup_baik);
        $a_predikat9 = min($sangat_nyaman, $sangat_baik);

        //defuzzyfikasi
        $z1 = 4-(3*$a_predikat1);
        $z2 = 4-(3*$a_predikat2);
        $z3 = 4-(3*$a_predikat3);
        if($fasilitas_cn<5)
        {
            $z4 = 9-(4*$a_predikat4);
        }
        if($fasilitas_cn>=5)
        {
            $z4 = 1+(4*$a_predikat4);
        }
        
        if($fasilitas_cn<5)
        {
            $z5 = 9-(4*$a_predikat5);
        }
        if($fasilitas_cn>=5)
        {
            $z5 = 1+(4*$a_predikat5);
        }

        if($fasilitas_cn<5)
        {
            $z6 = 9-(4*$a_predikat6);
        }
        if($fasilitas_cn>=5)
        {
            $z6 = 1+(4*$a_predikat6);
        }

        $z7 = 6+(3*$a_predikat7);
        $z8 = 6+(3*$a_predikat8);
        $z9 = 6+(3*$a_predikat9);

        $z_hasil = (($a_predikat1*$z1)+($a_predikat2*$z2)+($a_predikat3*$z3)+($a_predikat4*$z4)+($a_predikat5*$z5)+($a_predikat6*$z6)+($a_predikat7*$z7)+($a_predikat8*$z8)+($a_predikat9*$z9))/($z1+$z2+$z3+$z4+$z5+$z6+$z7+$z8+$z9);

        $fuzzyfikasi = new Fuzzyfikasi();
        $fuzzyfikasi->kurang_nyaman = $kurang_nyaman;
        $fuzzyfikasi->cukup_nyaman = $cukup_nyaman;
        $fuzzyfikasi->sangat_nyaman = $sangat_nyaman;
        $fuzzyfikasi->kurang_baik = $kurang_baik;
        $fuzzyfikasi->cukup_baik = $cukup_baik;
        $fuzzyfikasi->sangat_baik = $sangat_baik;
        $fuzzyfikasi->save();

        $inferensi = new Inferensi();
        $inferensi->a_predikat1 = $a_predikat1;
        $inferensi->a_predikat2 = $a_predikat2;
        $inferensi->a_predikat3 = $a_predikat3;
        $inferensi->a_predikat4 = $a_predikat4;
        $inferensi->a_predikat5 = $a_predikat5;
        $inferensi->a_predikat6 = $a_predikat6;
        $inferensi->a_predikat7 = $a_predikat7;
        $inferensi->a_predikat8 = $a_predikat8;
        $inferensi->a_predikat9 = $a_predikat9;
        $inferensi->save();

        $defuzzyfikasi = new Defuzzyfikasi();
        $defuzzyfikasi->z1 = $z1;
        $defuzzyfikasi->z2 = $z2;
        $defuzzyfikasi->z3 = $z3;
        $defuzzyfikasi->z4 = $z4;
        $defuzzyfikasi->z5 = $z5;
        $defuzzyfikasi->z6 = $z6;
        $defuzzyfikasi->z7 = $z7;
        $defuzzyfikasi->z8 = $z8;
        $defuzzyfikasi->z9 = $z9;
        $defuzzyfikasi->z_hasil = $z_hasil;
        $defuzzyfikasi->save();

        return view('analisa_fuzzy.analisa', compact('data_fuzzy'));
    }

    public function proses()
    {
        // $data_fuzzies = DataFuzzy::all();
        // $data_fuzzy = DataFuzzy::find($data_fuzzy->id);

        // $fasilitas_kn = $data_fuzzies->fasilitas_kn;
        // $fasilitas_cn = $data_fuzzies->fasilitas_cn;
        // $fasilitas_sn = $data_fuzzies->fasilitas_sn;
        // $pelayanan_kb = $data_fuzzies->pelayanan_kb;
        // $pelayanan_cb = $data_fuzzies->pelayanan_cb;
        // $pelayanan_sb = $data_fuzzies->pelayanan_sb;

        // //fuzzyfikasi
        // $kurang_nyaman = (9-$fasilitas_kn)/(9-0);

        // if($fasilitas_cn<5)
        // {
        //     $cukup_nyaman = (9-$fasilitas_cn)/(9-5);
        // }
        // if($fasilitas_cn>=5)
        // {
        //     $cukup_nyaman = ($fasilitas_cn-1)/(5-1);
        // }

        // $sangat_nyaman = ($fasilitas_sn-1)/(9-1);


        // $kurang_baik = (9-$pelayanan_kb)/(9-0);

        // if($pelayanan_cb<5)
        // {
        //     $cukup_baik = (9-$pelayanan_cb)/(9-5);
        // }
        // if($pelayanan_cb>=5)
        // {
        //     $cukup_baik = ($pelayanan_cb-1)/(5-1);
        // }

        // $sangat_baik = ($pelayanan_sb-1)/(9-1);

        // //inferensi
        // $a_predikat1 = min($kurang_nyaman, $kurang_baik); 
        // $a_predikat2 = min($kurang_nyaman, $cukup_baik); 
        // $a_predikat3 = min($kurang_nyaman, $sangat_baik);
        // $a_predikat4 = min($cukup_nyaman, $kurang_baik); 
        // $a_predikat5 = min($cukup_nyaman, $cukup_baik); 
        // $a_predikat6 = min($cukup_nyaman, $sangat_baik);
        // $a_predikat7 = min($sangat_nyaman, $kurang_baik);
        // $a_predikat8 = min($sangat_nyaman, $cukup_baik);
        // $a_predikat9 = min($sangat_nyaman, $sangat_baik);

        // //defuzzyfikasi
        // $z1 = 4-(3*$a_predikat1);
        // $z2 = 4-(3*$a_predikat2);
        // $z3 = 4-(3*$a_predikat3);
        // if($fasilitas_cn<5)
        // {
        //     $z4 = 9-(4*$a_predikat4);
        // }
        // if($fasilitas_cn>=5)
        // {
        //     $z4 = 1+(4*$a_predikat4);
        // }
        
        // if($fasilitas_cn<5)
        // {
        //     $z5 = 9-(4*$a_predikat5);
        // }
        // if($fasilitas_cn>=5)
        // {
        //     $z5 = 1+(4*$a_predikat5);
        // }

        // if($fasilitas_cn<5)
        // {
        //     $z6 = 9-(4*$a_predikat6);
        // }
        // if($fasilitas_cn>=5)
        // {
        //     $z6 = 1+(4*$a_predikat6);
        // }

        // $z7 = 6+(3*$a_predikat7);
        // $z8 = 6+(3*$a_predikat8);
        // $z9 = 6+(3*$a_predikat9);

        // $z_hasil = (($a_predikat1*$z1)+($a_predikat2*$z2)+($a_predikat3*$z3)+($a_predikat4*$z4)+($a_predikat5*$z5)+($a_predikat6*$z6)+($a_predikat7*$z7)+($a_predikat8*$z8)+($a_predikat9*$z9))/($z1+$z2+$z3+$z4+$z5+$z6+$z7+$z8+$z9);

        // $fuzzyfikasi = new Fuzzyfikasi();
        // $fuzzyfikasi->kurang_nyaman = $request->kurang_nyaman;
        // $fuzzyfikasi->cukup_nyaman = $request->cukup_nyaman;
        // $fuzzyfikasi->sangat_nyaman = $request->sangat_nyaman;
        // $fuzzyfikasi->kurang_baik = $request->kurang_baik;
        // $fuzzyfikasi->cukup_baik = $request->cukup_baik;
        // $fuzzyfikasi->sangat_baik = $request->sangat_baik;
        // $fuzzyfiaksi->save();

    }

    private function validateRequest()
    {
        return request()->validate([
            'fasilitas_kn' => 'required',
            'fasilitas_cn' => 'required',
            'fasilitas_sn' => 'required',
            'pelayanan_kb' => 'required',
            'pelayanan_cb' => 'required',
            'pelayanan_sb' => 'required',
        ]);
    }
}

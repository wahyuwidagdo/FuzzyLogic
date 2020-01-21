<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataFuzzy;

class AnalysisController extends Controller
{
    // public function index()
    // {
    //     return view('analisa_fuzzy.index');
    // }


    public function create()
    {
        $analisa = new DataFuzzy();
        
        return view('analisa_fuzzy.create', compact('analisa'));
    }

    public function store()
    {
        DataFuzzy::create($this->validateRequest());

        return redirect('analisa');
    }

    public function analisa()
    {
        return view('analisa_fuzzy.analisa');
    }

    public function proses()
    {
        $data_fuzzies = DataFuzzy::all();

        $fasilitas_kn = $data_fuzzies->fasilitas_kn;
        $fasilitas_cn = $data_fuzzies->fasilitas_cn;
        $fasilitas_sn = $data_fuzzies->fasilitas_sn;
        $pelayanan_kb = $data_fuzzies->pelayanan_kb;
        $pelayanan_cb = $data_fuzzies->pelayanan_cb;
        $pelayanan_sb = $data_fuzzies->pelayanan_sb;

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

<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Place;
use App\Models\Rak;
use App\Models\Shap;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function newPlacement(Request $request)
    {
        $placeId = $request->input('place_id');
        $newPlace = $request->input('new_place');
        $areaId = $request->input('area_id');
        $newArea = $request->input('new_area');
        $rakId = $request->input('rak_id');
        $newRak = $request->input('new_rak');
        $shapId = $request->input('shap_id');
        $newShap = $request->input('new_shap');

        // Tambah tempat baru
        if ($placeId == 0 && $newPlace != null) {
            $place = $this->createPlace($newPlace);

            if ($areaId == 0 && $newArea != null) {
                $area = $this->createArea($newArea, $place->id);

                if ($rakId == 0 && $newRak != null) {
                    $rak = $this->createRak($newRak, $area->id);

                    if ($shapId == 0 && $newShap != null) {
                        $this->createShap($newShap, $rak->id);
                    }
                }
            }

            return redirect()->back()->with('success', 'Berhasil menambahkan lokasi baru!');
        }

        // Tambah area baru
        if ($placeId != 0 && $areaId == 0 && $newArea != null) {
            $this->createArea($newArea, $placeId);
            return redirect()->back()->with('success', 'Berhasil menambahkan area baru!');
        }

        // Tambah rak baru
        if ($areaId != 0 && $rakId == 0 && $newRak != null && $newShap == null) {
            $this->createRak($newRak, $areaId);
            return redirect()->back()->with('success', 'Berhasil menambahkan rak baru!');
        }

        // Tambah shap baru
        if ($rakId != 0 && $shapId == 0 && $newShap != null) {
            $this->createShap($newShap, $rakId);
            return redirect()->back()->with('success', 'Berhasil menambahkan shap baru!');
        }

        return redirect()->back()->with('error', 'Gagal menambahkan lokasi baru!');
    }

    // Fungsi untuk membuat tempat
    private function createPlace($name)
    {
        $place = new Place();
        $place->name = $name;
        $place->save();
        return $place;
    }

    // Fungsi untuk membuat area
    private function createArea($name, $placeId)
    {
        $area = new Area();
        $area->name = $name;
        $area->place_id = $placeId;
        $area->save();
        return $area;
    }

    // Fungsi untuk membuat rak
    private function createRak($name, $areaId)
    {
        $rak = new Rak();
        $rak->name = $name;
        $rak->area_id = $areaId;
        $rak->save();
        return $rak;
    }

    // Fungsi untuk membuat shap
    private function createShap($name, $rakId)
    {
        $shap = new Shap();
        $shap->name = $name;
        $shap->rak_id = $rakId;
        $shap->save();
        return $shap;
    }
}

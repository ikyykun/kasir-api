<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show(){
        $menu = Barang::All();

        return response()->json($menu   );
    }

    public function getmenu(string $id){
        $menu = Barang::findOrFail($id);

        return response()->json($menu);
    }
}

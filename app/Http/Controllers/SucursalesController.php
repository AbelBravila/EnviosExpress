<?php

namespace App\Http\Controllers;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SucursalesController extends Controller
{
    public function index()
    {
        $sucursales=DB::select("SELECT * from sucursales");
        return view("sucursal.index")->with("sucursales",$sucursales);
    }
    
    public function create(Request $request)
    {
       
        $sql = false;  // Definir $sql antes del bloque try

        try {
            $sql = DB::insert("INSERT INTO sucursales (nombreSucursal, ubicacion, telefono) VALUES (?, ?, ?)", [
                $request->nombreSucursal,
                $request->ubicacion,
                $request->telefono,
                
            ]);
            
        } catch (\Throwable $th) {
            // Manejo de la excepción
        }

        if ($sql) {
            return back()->with("correcto", "Producto se registró correctamente");
        } else {
            return back()->with("incorrecto", "Producto no se registró correctamente");
        }
    }

    
    public function update(Request $request){
        $request->validate([

            'nombreSucursal' => 'required',
            'estado' => 'required',
            'ubicacion' => 'required',
            'telefono' => 'required|numeric',
        ]);
        $sucursales = Sucursal::findOrFail($request->id);

        $sucursales->update([
            'nombreSucursal' => $request->nombreSucursal,
            'estado' => $request->estado,
            'ubicacion' => $request->ubicacion,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('sucursales')->with('success', 'Producto actualizado correctamente.');

    }

    public function delete(Request $request){
        $sucursales = Sucursal::findOrFail($request->id);
        $sucursales->delete();
        return redirect()->route('sucursales')->with('success', 'Producto eliminado correctamente.');
    }
}

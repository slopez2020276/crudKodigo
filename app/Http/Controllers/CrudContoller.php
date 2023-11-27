<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class CrudContoller extends Controller
{
    public function index(){
        $datos=DB::select(" SELECT * from empleado ");
        return view("welcome")->with("datos",$datos);
    }
    
    public function create(Request $request){
       try{
        $sql=DB::insert("INSERT INTO empleado(id_empleado,nombre,apellido,edad)values(?,?,?,?) ",[
            $request->txtCodigo,
            $request->txtNombre,
            $request->txtApellido,
            $request->txtEdad,
        ]);
       }catch(\Throwable $th){
           $sql = 0;
       }
        if ($sql== true) {
            return back()->with("corrrecto","EMPLEADO REGISTRADO CORRECTAMENTE");
        } else {
            return back()->with("incorrecto","ERROR AL REGISTRAR EL EMPLEADO");
        }
        
        
    }


    public function update(Request $request){
        try{
            $sql=DB::update("UPDATE empleado set nombre=?,  apellido=?, edad=? WHERE id_empleado=? ",[
                
                $request->txtNombre,
                $request->txtApellido,
                $request->txtEdad,
                $request->txtCodigo,
            ]);
            if ($sql==0){
                $sql = 1;
            }
        }catch(\Throwable $th){
            $sql = 0;


        }
        if ($sql== true) {
            return back()->with("corrrecto","EMPLEADO EDITADO CORRECTAMENTE");
        } else {
            return back()->with("incorrecto","ERROR AL EDITAR EL EMPLEADO");
        }
    }


    public function delete ($id){
        try{
            $sql=DB::delete("DELETE from empleado WHERE id_empleado=$id");
           }catch(\Throwable $th){
               $sql = 0;
           }
            if ($sql== true) {
                return back()->with("corrrecto","EMPLEADO ELIMINADO CORRECTAMENTE");
            } else {
                return back()->with("incorrecto","ERROR AL ELIMINAR EL EMPLEADO");
            }

    }
}

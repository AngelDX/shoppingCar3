<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Comprobante;
use App\Models\DetalleComprobante;

class ClienteController extends Controller{
    
    public function registro_cliente($total){
        
        return view('tienda/cliente',compact('total'));
    }

    public function save(Request $request){
        $cliente=new Cliente();
        $cliente->correo=$request->get('email');
        $cliente->celular=$request->get('celular');
        $cliente->nombre=$request->get('nombre');
        $cliente->apellidos=$request->get('apellido');
        $cliente->tdocumento=$request->get('tdocumento');
        $cliente->documento=$request->get('documento');
        $cliente->direccion=$request->get('direccion');
        $cliente->tdatos=($request->get('tdatos')=="on")?"1":"0";

        $cliente->save();

        $proforma=new Comprobante();
        $proforma->cliente_id=$cliente->id;
        $proforma->tipo="PROFORMA";
        $proforma->numero="P000001";
        $proforma->fecha=date('Y-m-d');
        $proforma->total=$request->get('total');
        $proforma->tletras="DOSCIENTOS TREINTA Y CINCO";
        
        $proforma->save();

        foreach (session('cart') as $id => $details) {
            $detalle=new DetalleComprobante();
            $detalle->comprobante_id=$proforma->id;
            $detalle->cantidad=$details['cantidad'];
            $detalle->descripcion=$details['nombre'];
            $detalle->punitario=$details['precio'];
            $detalle->importe=$details['precio']*$details['cantidad'];
            $detalle->save();
        }


        return redirect('proforma/'.$proforma->id);
    }

    public function proforma($id){
        $pdf = \PDF::loadView('tienda/proforma', compact('id'));
        return $pdf->download('proforma.pdf');
        
        //return view('tienda/proforma',compact('id'));

    }
}

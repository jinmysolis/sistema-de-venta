<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Persona;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\PersonaFormRequest;
use Illuminate\Support\Facades\DB;
use sisVentas\Http\Requests\EditClienteRequest;

class ProveedorController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
                if ($request)
                {
                    $query=trim($request->get('searchText'));
                    $personas = DB::table('persona')
                            ->where('nombre','LIKE','%'.$query.'%')
                            ->where('tipo_persona','=','Proveedor')
                            ->orwhere('num_documento','LIKE','%'.$query.'%')
                            ->where('tipo_persona','=','Proveedor')
                            ->orderBy('idpersona','desc')
                            ->paginate(2);
                    return view('compras.proveedor.index',["personas"=>$personas,"searchText"=>$query
                            ]);
                }
            
            
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('compras.proveedor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PersonaFormRequest $request)
	{
		 $persona = new Persona($request->all());
                 $persona->tipo_persona='Proveedor';
                 $persona->save();
//                 flash::success("Categoria creada correctamente");
                 return Redirect::to('compras/proveedor');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('compras.proveedor.show',["persona"=>Persona::findOrFail($id)]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            return view('compras.proveedor.edit',["persona"=>Persona::findOrFail($id)]);
             
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditClienteRequest $request,$id)
	{
            $persona = Persona::find($id);
            $persona->fill($request->all());
            $persona->save();
//                flash::warning("categoria editada correctamente");
                  return Redirect::to('compras/proveedor');
           
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            
//               $persona= Persona::find($id);
//               $persona->delete();
            
		$persona=Persona::findOrFail($id);
                $persona->tipo_persona='Inactivo';
                $persona->update();
                 return Redirect::to('compras/proveedor');
                 
                 
                 
                 
                
	}
}

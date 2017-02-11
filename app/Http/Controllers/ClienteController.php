<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Persona;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\PersonaFormRequest;
use Illuminate\Support\Facades\DB;
use sisVentas\Http\Requests\EditClienteRequest;

class ClienteController extends Controller
{
   public function __construct() {
       
    }
    
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
                            ->where('tipo_persona','=','Cliente')
                            ->orwhere('num_documento','LIKE','%'.$query.'%')
                            ->where('tipo_persona','=','Cliente')
                            ->orderBy('idpersona','desc')
                            ->paginate(2);
                    return view('ventas.cliente.index',["personas"=>$personas,"searchText"=>$query
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
		return view('ventas.cliente.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PersonaFormRequest $request)
	{
		 $persona = new Persona($request->all());
                 $persona->tipo_persona='Cliente';
                 $persona->save();
//                 flash::success("Categoria creada correctamente");
                 return Redirect::to('ventas/cliente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('ventas.cliente.show',["persona"=>Persona::findOrFail($id)]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            return view('ventas.cliente.edit',["persona"=>Persona::findOrFail($id)]);
             
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
                  return Redirect::to('ventas/cliente');
           
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
                 return Redirect::to('ventas/cliente');
                 
                 
                 
                 
                
	}
}

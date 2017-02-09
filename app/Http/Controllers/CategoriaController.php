<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Categoria;
use sisVentas\Http\Requests\CategoriaFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class CategoriaController extends Controller
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
                    $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
                            ->where('condicion','=','1')
                            ->orderBy('idcategoria','desc')
                            ->paginate(2);
                    return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query
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
		return view('almacen.categoria.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CategoriaFormRequest $request)
	{
		 $category = new Categoria($request->all());
                 $category->save();
//                 flash::success("Categoria creada correctamente");
                 return Redirect::to('almacen/categoria');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('almacen.categoria.show',["categoria"=>Categoria::findOrFail($id)]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            
              return view('almacen.categoria.edit',["categoria"=>Categoria::findOrFail($id)]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CategoriaFormRequest $request,$id)
	{
            $category = Categoria::find($id);
            $category->fill($request->all());
            $category->save();
//                flash::warning("categoria editada correctamente");
                return Redirect::to('almacen/categoria');
           
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria=Categoria::findOrFail($id);
                $categoria->condicion='0';
                $categoria->update();
                 return Redirect::to('almacen/categoria');
                
	}
    
    
    
    
}

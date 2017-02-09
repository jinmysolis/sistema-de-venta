<?php

namespace sisVentas\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\ArticuloFormRequest;
use sisVentas\Articulo;
use Illuminate\Support\Facades\DB;


use sisVentas\Http\Requests;

class ArticuloController extends Controller
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
                    $articulos=DB::table('articulo as a')
                            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
                            ->where('a.nombre','LIKE','%'.$query.'%')
                            ->orwhere('a.codigo','LIKE','%'.$query.'%')
                            ->orderBy('a.idarticulo','desc')
                            ->paginate(2);
                    return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query
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
               $categorias=DB::table('categoria')->where('condicion','=','1')->get();
		return view('almacen.articulo.create',['categorias'=>$categorias]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticuloFormRequest $request)
	{
		 $articulo = new Articulo($request->all());
                 $articulo->estado='activo';
                 if (Input::hasFile('imagen')){
                     $file=Input::file('imagen');
                     $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
                     $articulo->imagen=$file->getClientOriginalName();
                 }
                 
                 $articulo->save();
//                 flash::success("Categoria creada correctamente");
                 return Redirect::to('almacen/articulo');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('almacen.articulo.show',["articulo"=>Articulo::findOrFail($id)]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $articulo=Articulo::findOrFail($id);
            $categorias=DB::table('categorias')->where('condicion','=','1')->get();
              return view('almacen.articulo.edit',["articulo"=>$articulo,"categorias"=>$categorias]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ArticuloFormRequest $request,$id)
	{
            $articulo = Articulo::find($id);
            $articulo->fill($request->all());
            $articulo->save();
//                flash::warning("categoria editada correctamente");
                return Redirect::to('almacen/articulo');
           
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$articulo=Articulo::findOrFail($id);
                $articulo->estado='Inactivo';
                $articulo->update();
                 return Redirect::to('almacen/articulo');
                
	}
    
}

<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryPost;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
         //$categories = Category::get();
         $categories = Category::orderBy('created_at','asc')->paginate();
         // dd($categories);          
         return view('dashboard.category.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create',['category'=> new Category()]);
        //return view('dashboard.category.create',compact('category')); -- versión 9 de laravel
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryPost $request)
    {
        Category::create($request->validated());
        //echo "Hola mundo:" .$request->title;
        return back()->with('status', 'Categoria creada con exito');  
      //  return to_route("category.index")->with('status',"Registro creado ") -- versión 9 de laravel     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show',["category"=> $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit',['category'=> $category]);
        //echo view('dashboard.category.edit',compact('category')); -- versión 9 de laravel
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryPost $request, Category $category)
    {
        $category->update($request->validated());
        //echo "Hola mundo:" .$request->title;
        return back()->with('status', 'Categoria actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('status', 'Categoria eliminada con exito');
    }
}

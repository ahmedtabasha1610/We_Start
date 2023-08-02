<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('categories')->get();
        return view ('categories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data_a = $request->validated();

        unset($data_a['image']);
        $data_a['slug'] = Str::slug($request->name);
        if($request->hasFile('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_name = time() . '_' . rand() .'.'. $ex;
            //$new_name = intval(time()) . '_' . intval(rand()) .'.' . $ex;

            $request->file('image')->move(public_path('images'),$new_name);
            $data_a['image'] = $new_name;
        }
        DB::table('categories')->insert($data_a);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = DB::table('categories')->find($id);

        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $data_a = $request->validated();

        unset($data_a['image']);
        if($request->hasFile('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_name = time() . '_' . rand() .'.' . $ex;
            $request->file('image')->move(public_path('images'),$new_name);
            $data_a['image'] = $new_name;
        }
        
        //$category = DB::table('categories')->where('id','=', $id)->first();
        //$category = Category::find($id);

        //$category->update($data_a);
        DB::table('categories')->where('id', '=', $id)->update($data_a);
        dd($data_a);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('categories')->delete($id);
        return redirect()->route('category.index');

    }
}

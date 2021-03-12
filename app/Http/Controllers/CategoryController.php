<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $categories = Category::orderBy('id', 'desc')->get();
//        $categories = Category::latest()->get();
        $categories = Category::latest()->paginate(5);

//        dd($categories);

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);

//        $data = $request->all();
//        $data['slug'] = Str::slug($data['name']);
//        $data['status'] = $data['status'] == 'active' ? '1' : 0;
//       $category = Category::create($data);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status == 'active' ? '1' : 0
        ]);

//        dd($category);

        return redirect()->to('categories')->with('status', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

//        $data = $request->except(['_token', '_method']);
        $data = $request->only(['name', 'description', 'status']);

        $data['slug'] = Str::slug($data['name']);
        $data['status'] = $data['status'] == 'active' ? '1' : 0;
        $category->update($data);

//        $category->update([
//            'name' => $request->name,
//            'slug' => Str::slug($request->name),
//            'description' => $request->description,
//            'status' => $request->status == 'active' ? '1' : 0
//        ]);

        return redirect()->to('categories')->with('status', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('status', 'Category deleted successfully');
    }

    public function statusChange(Category $category)
    {
        $category->status  = !$category->status;
        $category->save();

        return back()->with('status', 'Category updated successfully');
    }
}

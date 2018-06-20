<?php

namespace WhatsShop\Http\Controllers\Api;

use WhatsShop\Http\Controllers\Controller;
use WhatsShop\Http\Requests\CategoryRequest;
use WhatsShop\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Category[]
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Database\Eloquent\Model|Category
     */
    public function store(CategoryRequest $request)
    {
        return Category::create($request->all())->refresh();
    }

    /**
     * Display the specified resource.
     *
     * @param  \WhatsShop\Models\Category  $category
     * @return Category
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryRequest  $request
     * @param  \WhatsShop\Models\Category  $category
     * @return Category
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \WhatsShop\Models\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response([], 204);
    }
}

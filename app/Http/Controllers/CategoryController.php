<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService $category;
    public function __construct(CategoryService $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $categories = $this->category->getAll();
        return view('index' , ['categories' => $categories]);
    }
}

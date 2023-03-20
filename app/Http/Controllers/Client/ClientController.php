<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $categories = $this->category->all();
        return view('client.home', compact('categories'));
    }
    public function showRoom()
    {
        $categories = $this->category->all();
        return view('client.rooms.index', compact('categories'));
    }
}

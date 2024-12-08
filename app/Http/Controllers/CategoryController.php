<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Services\Utilities\FileUploadService;

class CategoryController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', 1)->latest()->paginate(5);
        return view('admin.category.index', compact('categories')); // Return index view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        try {
            $src_path = $this->fileUploadService->uploadFile($data['image'], 'category', true);
            $data['image'] = $src_path;
            Category::create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'image' => $data['image'] ?? null,
                'description' => $data['description'],
            ]);
            Toastr::success('User profile successfully update :)', 'Success');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Category creation failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category = Category::find($id);
        $data = $request->all();
        try {
            if ($request->hasFile('image')) {
                $src_path = $this->fileUploadService->uploadFile($data['image'], 'category', true);
                $data['image'] = $src_path;
            }
            $category->update($data);
            Toastr::success('User profile successfully update :)', 'Success');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Category update failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        Toastr::success('User profile successfully deleted :)', 'Success');
        return redirect()->route('categories.index');
    }
}

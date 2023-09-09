<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id)
    {
        // Set the category_id to the selected category_id
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        // Find the category to be deleted
        $category = Category::find($this->category_id);

        if (!$category) {
            // Category not found, do something (optional)
            // For example, show an error message or log the issue.
            return;
        }

        // Delete the category from the database
        $category->delete();

        // Delete the associated image file from the server
        $path = 'uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        // Show a success message after successful deletion
        session()->flash('message', 'Category deleted successfully.');
     
        // Reset the category_id property
        $this->category_id = null;
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}

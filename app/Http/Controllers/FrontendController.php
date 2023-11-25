<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class FrontendController extends Controller
{
    /**
     * find sub category on category change dropdown.
     */
    public function findSubcategory($id)
    {
        $data = SubCategory::where('category_id', $id)->get();
        return json_decode($data);
    }
}

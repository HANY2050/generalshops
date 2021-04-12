<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::paginate(env('PAGINATION_COUNT'));
        return view('admin.categories.categories')->with([
            'categories'=> $categories,
            'showLinks'=>true,
        ]);



    }


    public function store(Request $request){

        $request->validate([

            'category_name' => 'required'

        ]);
        $categoryName = $request->input('category_name');
        $category= Category::where('name','=',$categoryName)->get();
        if(count($category) > 0){

            return redirect()->back()->with('error','موجود من قبل (   '.  $categoryName .'   )عفوا هذا الاسم' );


        }

        $newTag = new Category();
        $newTag ->name = $categoryName;

        $newTag ->save();

        return redirect()->back()->with('success',' بنجاح  (   '. $categoryName .'   )تم ادخال ' );



    }

    public function search(Request $request){

        $request->validate([
            'category_search'=>'required'
        ]);

        $searchTerm = $request->input('category_search');

        $categories = Category::where(

            'name' , 'LIKE' ,'%' . $searchTerm . '%'

        )->get();


        $search= $request->input('category_search');

        if( count ($categories) > 0){

            return view('admin.categories.categories')->with([

                'categories' => $categories,
                'showLinks'=>false,

            ]);


        }

        return redirect()->back()->with('error','موجود من قبل (   '. $search .'   )عفوا هذا الاسم' );

    }

    public function update (Request $request){

        $request->validate([

            'category_name'=>'required',

            'category_id'=>'required',

        ]);


        $categoryName= $request->input('category_name');
        $category= Category::where('name','=',$categoryName)->get();
        if(count($category) > 0){

            return redirect()->back()->with('error','موجود من قبل (   '. $categoryName .'   )عفوا هذا الاسم' );


        }

        $categoryID= intval($request->input('category_id'));
        $category = Category::find($categoryID);

        $category->name = $request->input('category_name');
        $category->save();
        return redirect()->back()->with('success','تم التعديل بنجاح' );
    }


    public  function delete(Request $request){
        $id = $request->input('category_id');
        Category::destroy($id);
        return redirect()->back()->with('success','تم حذف البيانات بنجاح' );



    }








}

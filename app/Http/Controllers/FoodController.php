<?php


namespace App\Http\Controllers;
use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Foods::all();
        return view('food.index', ['foods' => $foods]);
    }

    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     */


     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'food_name' => 'required|string|max:255',
             'food_price' => 'required|integer|min:3',
             'description' => 'required|string',
             'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
     
         if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $folderPath = 'foods/' . date('Y') . '/' . date('m');
            $imagePath = $image->store($folderPath, 'public');
            $validatedData['img_url'] = 'storage/' . $imagePath;
        }
     
         $food = new Foods([
             'name' => $validatedData['food_name'],
             'price' => $validatedData['food_price'],
             'description' => $validatedData['description'],
             'img_url' => $validatedData['img_url'] ?? null,
         ]);
     
         $food->save();
     
         return redirect(route('daftarFoods'));
     }
     

   

    public function show(Foods $food)
    {
        //
    }

 }
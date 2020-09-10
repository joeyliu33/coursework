<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\User;
use Auth;

class DishController extends Controller
{

    function __construct(){
        //$this->middleware('auth',['except'=>'index']);
        $this->middleware('auth',['only'=>['create','edit']]);
        //$this->middleware('auth',['only'=>'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dish.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dish.create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=$request->user_id;
        $this->validate($request, [
            'name'=>[
                'required','max:255',Rule::unique('dishes', 'name')->where(function ($query) use ($user_id){
                    return $query->where('user_id',$user_id);
                }),
            ],
            'price'=>'required|numeric|min:1',
            'image'=>'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        //$image_store=request()->file('image')->store('dishes_images','public');
        //$image_store=request()->file('image');
        //$image_store->store('toPath', ['disk'=>'public_uploads']);
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->user_id = $request->user_id;
        //$dish->image=$image_store;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $request->image->getClientOriginalName();
            $destinationPath = public_path('/dishes_images');
            $image->move($destinationPath, $name);
            $dish->image = $name;
        }
        $dish->save();
        return redirect("dish/$dish->user_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::whereRaw('id= ?', array($id))->get();
        //$dishes = Dish::whereRaw('user_id = ?', $id)->get();
        $dishes = Dish::whereRaw('user_id = ?', $id)->paginate(5);
        return view('dish.show')->with('dishes',$dishes)->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dishes = Dish::whereRaw('user_id = ?', Auth::user()->id)->get();
        foreach ($dishes as $key => $value) {
            $dish_id = $value['id'];
            if($id == $dish_id) {
                $dish = Dish::find($id);
                return view('dish.edit_form')->with('dish', $dish);
                break;
            }
        }
        return view("dish.error");
        //dd($dishes);
        //if $id
        //$dish = Dish::find($id);
        //return view('dish.edit_form')->with('dish', $dish);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $user_id=Auth::user()->id;
        $dish = Dish::find($id);
        $this->validate($request, [            
            //'name'=>'required|max:255|unique:dishes',
            'name'=>[
                'required','max:255',Rule::unique('dishes', 'name')->where(function ($query) use ($user_id){
                    return $query->where('user_id',$user_id);
                })->ignore($dish),
            ],
            'price'=>'required|numeric|min:1',
            'image'=>'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $dish = Dish::find($id);
        $dish->name = $request->name;
        $dish->price = $request->price;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $request->image->getClientOriginalName();
            $destinationPath = public_path('/dishes_images');
            $image->move($destinationPath, $name);
            $dish->image = $name;
        }
        $dish->save();
        return redirect("dish/$dish->user_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function delete($id)
     {
         $dish= Dish::find($id);
         $dish->delete();
         return redirect(URL()->previous());
     }
     
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->delete();
        return redirect(URL()->previous());
    }

    public function ER()
    {
        return view('dish.ER');
    }
}

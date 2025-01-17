<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShowController extends Controller
{
    public function listShow(){
        $dl = new DataLayer();
        $show_list = $dl->getShowList();
        return view('show', compact('show_list'));
    }

    public function show($name){
        $dl = new DataLayer();
        if (!($dl->nameShowExists($name))) {
            abort(404);
        }
        $show = $dl->getShowByTitle($name);
        return view('singleshow',compact('show'));
    }

    public function addShow(){
        return view('addshow');
    }


    private function storeImageShow(Request $request)
    {
        $request->validate([
            'image' => ['required',
                'image',
                'mimes:jpg,png,jpeg,webp',
                'max:4096'],
        ]);
        $imageName = '/img/show/show'.time().'.'.$request->image->extension();
        $request->image->move(public_path('img/show'), $imageName);
        return $imageName;
    }


    public function storeShow(Request $request){
        $dl = new DataLayer();
        $title = $request->input('title');
        $short_description = $request->input('short_description');
        $description = $request->input('description');
        $directed_by = $request->input('directed_by');
        $collaboration = $request->input('collaboration');
        $imageName = $this->storeImageShow($request);
        $dl->storeShow($title, $short_description, $description, $directed_by, $collaboration, $imageName);
        return Redirect::route('show')->with('newShow',true);
    }

    public function destroyShow($id){
        $dl = new DataLayer();
        $show = $dl->getShowById($id);
        $dl->destroyShow($show);
        return Redirect::route('show')->with('destroyedShow',true);
    }

}

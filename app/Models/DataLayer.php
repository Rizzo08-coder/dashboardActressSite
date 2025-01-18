<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataLayer extends Model
{
    public function getShowList(){
        return Show::all();
    }

    public function nameShowExists($name){
        $num_show=Show::where('title',$name)->count();
        if($num_show == 0)
            return false;
        return true;
    }

    public function getShowByTitle($name){
        return Show::where('title',$name)->first();
    }

    public function storeShow($title, $short_description, $description, $directed_by, $collaboration, $imageName){
        $show = new Show();
        $show->title = $title;
        $show->short_description = $short_description;
        $show->description = $description;
        $show->directed_by = $directed_by;
        $show->collaboration = $collaboration;
        $show->img_url = $imageName;
        $show->save();
    }

    public function getShowById($id){
        return Show::find($id);
    }

    public function destroyShow($show){
        $show->events()->delete();
        $show->delete();
    }

    public function updateShow($show, $title, $short_description, $description, $directed_by, $collaboration){
        $show->title = $title;
        $show->short_description = $short_description;
        $show->description = $description;
        $show->directed_by = $directed_by;
        $show->collaboration = $collaboration;
        $show->save();
    }

    public function getFutureEventList()
    {
        //todo: not implemented yet
    }

    public function getPastEventList()
    {
        //todo: not implemented yet
    }


}

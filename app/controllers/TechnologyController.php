<?php

class TechnologyController extends BaseController{
    
    public function getIndex() {
        $data['technology']=  TechnologyModel::all();
        return View::make('technology.index', $data);
    }
    
    public function getAdd($id=null){
        if($id==null){
            $new=new TechnologyModel;
            $new->name="";
            $data['row']=$new;
        }else{
            $id=  SiteHelpers::encryptID($id,true);
            $data['row']=  TechnologyModel::where('id',$id)->first();
        }
        return View::make('technology.form', $data);
    }
    
    public function postSave(){
        $data=new TechnologyModel;
        $data->name=Input::get('name');
        $data->info=Input::get('info');
        $data->save();
        return Redirect::to('technology')->with('message',  SiteHelpers::alert('success', "Data saved successfully"));
    }
    
    public function getDelete($id=null){
        if(!is_null($id)){
            $id=  SiteHelpers::encryptID($id,true);
            TechnologyModel::where('id',$id)->delete();
            return Redirect::to('technology')->with('message',  SiteHelpers::alert('success', "Data deleted esuccessfully"));
        }
    }
}


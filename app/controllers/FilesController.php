<?php

class FilesController extends BaseController {

    public function getIndex() {
        $data['file'] = FileModel::all();
        return View::make('files.index', $data);
    }

    public function getAdd($id = null) {
        $data['technology'] = TechnologyModel::all();
        if ($id == null) {
            $new = new PlotModel();
            $new->name = "";
            $new->id_tech = "";
            $data['row'] = $new;
        } else {
            $id = SiteHelpers::encryptID($id, true);
            $data['row'] = PlotModel::where('id', $id)->first();
            $data['plot'] = PlotDataModel::where('id_plot', $id)->get();
        }
//        print_r ($data['row']);exit();
//        print_r  ($data['row']['name']);exit();
        return View::make('files.form', $data);
    }

    public function postSave() {
        $id = Input::get('id');
        $starts = Input::get('start');
        $ends = Input::get('end');
        if (empty($id)) {
            $data = new PlotModel();
            $data->name = Input::get('name');
            $data->id_tech = Input::get('id_tech');
            $data->info = Input::get('info');
            $data->save();
            $i = 0;
            foreach ($starts as $start) {
                $plot = new PlotDataModel();
                $plot->id_plot = $data->id;
                $plot->start = $start;
                $plot->end = $ends[$i];
                $plot->save();
                $i++;
            }
        } else {
            $data = PlotModel::find($id);
            $data->name = Input::get('name');
            $data->id_tech = Input::get('id_tech');
            $data->info = Input::get('info');
            $data->save();
            PlotDataModel::where('id_plot',$id)->delete();
            $i = 0;
            foreach ($starts as $start) {
                $plot = new PlotDataModel();
                $plot->id_plot = $data->id;
                $plot->start = $start;
                $plot->end = $ends[$i];
                $plot->save();
                $i++;
            }
        }
        return Redirect::to('plot')->with('message', SiteHelpers::alert('success', "Data saved successfully"));
    }

    public function getDelete($id = null) {
        if (!is_null($id)) {
            $id = SiteHelpers::encryptID($id, true);
            $del=  FileModel::where('id',$id)->first();
            @unlink(public_path('uploads/'.$del->filename));
            FileModel::where('id', $id)->delete();
            return Redirect::to('files')->with('message', SiteHelpers::alert('success', "Data deleted successfully"));
        }
    }
     public function getDestroy() {
	$ids=Input::get('del');
$i=0;
	foreach($ids as $id){
            $del=  FileModel::where('id',$id)->first();
            @unlink(public_path('uploads/'.$del->filename));
            FileModel::where('id', $id)->delete();
$i++;
	}
 return Redirect::to('files')->with('message', SiteHelpers::alert('success', $i." Data deleted successfully"));
	}
    function postUpload() {
        $file = Input::file('file');

        if ($file) {
            $destinationPath = public_path() . '/uploads/';
            $dir = date('Y-m-d');
            if (!file_exists(public_path() . '/uploads/' . $dir)) {
                mkdir(public_path() . "/uploads/" . $dir, 0777);
            }
            $destinationPath = public_path() . '/uploads/'.$dir.'/';
            $filename = $file->getClientOriginalName();

            $upload_success = Input::file('file')->move($destinationPath, $filename);
            $file = new FileModel();
            $file->filename = $dir.'/'.$filename;
            $file->uploaded_at = date('Y:m:d h:i:s');
            $file->save();
            if ($upload_success) {

                // resizing an uploaded file
                Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);
                return Response::json('success', 200);
            } else {
                return Response::json('error', 400);
            }
        }
    }

}

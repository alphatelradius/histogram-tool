<?php

class PlotController extends BaseController {

    public function getIndex() {
        $data['plot'] = PlotModel::join('his_technology', 'id_tech', '=', 'his_technology.id')
                ->select('his_technology.name as id_tech', 'his_plot.id', 'his_plot.name', 'his_plot.info')
                ->get();
        return View::make('plot.index', $data);
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
        return View::make('plot.form', $data);
    }

    public function postSave() {
        $id = Input::get('id');
//        print_r (Input::get('file')); exit();
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
            PlotModel::where('id', $id)->delete();
            return Redirect::to('plot')->with('message', SiteHelpers::alert('success', "Data deleted esuccessfully"));
        }
    }

}

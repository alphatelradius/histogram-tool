<?php

use PhpOffice\PhpPowerpoint\Autoloader;
use PhpOffice\PhpPowerpoint\Settings;
use PhpOffice\PhpPowerpoint\IOFactory;
use PhpOffice\PhpPowerpoint\PhpPowerpoint;
use PhpOffice\PhpPowerpoint\Shape\Chart\Type\Bar3D;
use PhpOffice\PhpPowerpoint\Shape\Chart\Type\Line;
use PhpOffice\PhpPowerpoint\Shape\Chart\Type\Pie3D;
use PhpOffice\PhpPowerpoint\Shape\Chart\Type\Scatter;
use PhpOffice\PhpPowerpoint\Shape\Chart\Series;
use PhpOffice\PhpPowerpoint\Style\Alignment;
use PhpOffice\PhpPowerpoint\Style\Border;
use PhpOffice\PhpPowerpoint\Style\Color;
use PhpOffice\PhpPowerpoint\Style\Fill;
use PhpOffice\PhpPowerpoint\Style\Shadow;

error_reporting(E_ALL);
define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
define('IS_INDEX', SCRIPT_FILENAME == 'index');

require_once 'src/PhpPowerpoint/Autoloader.php';
Autoloader::register();

class AutomateController extends BaseController {

    public $data = array();
    public $writers = NULL;
    public $value = array();
    public $frekuensi = array();

    function __construct() {
        $this->writers = array('PowerPoint2007' => 'pptx', 'ODPresentation' => 'odp');

        $files = '';
        if ($handle = opendir('.')) {
            while (false !== ($file = readdir($handle))) {
                if (preg_match('/^Sample_\d+_/', $file)) {
                    $name = str_replace('_', ' ', preg_replace('/(Sample_|\.php)/', '', $file));
                    $files .= "<li><a href='{$file}'>{$name}</a></li>";
                }
            }
            closedir($handle);
        }
    }

    public function getIndex() {
        $data['result'] = AutomateModel::all();
        return View::make('automate.index', $data);
    }

    public function getAdd($id = null) {
        if ($id == null) {
            $new = new AutomateModel();
            $new->name = "";
            $data['row'] = $new;
            $data['technology'] = TechnologyModel::all();
            $data['plot'] = PlotModel::join('his_technology', 'his_technology.id', '=', 'his_plot.id_tech')
                    ->select('his_plot.id', 'his_plot.name', 'his_technology.name as technology')
                    ->orderBy('his_plot.id_tech')
                    ->get();
            $data['file'] = FileModel::where('filename', 'like', '%xls%')->get();
        } else {
            $id = SiteHelpers::encryptID($id, true);
            $data['technology'] = TechnologyModel::all();
            $data['plot'] = PlotModel::all();
            $data['file'] = FileModel::where('filename', 'like', '%xls%');
            $data['row'] = AutomateModel::where('id', $id)->first();
        }
        return View::make('automate.form', $data);
    }

    public function getResult() {
        return View::make('automate.result');
    }

    public function postSave() {
        $result = new AutomateModel;
        $result->info = Input::get('info');
        $result->save();
        $named = NULL;
        $result->file_result = $named;
        $result->save();
        $res = $result->id;
        $file_id = Input::get('files');
        $plot = Input::get('id_plot');
        $charts_data = array();
        $index = 0;
        foreach ($file_id as $file) {
            $myfile = DB::table('his_file')
                    ->where('id', '=', $file)
                    ->first();
            $filename = $myfile->filename;
            $path = public_path('uploads') . '/' . $filename;

            Excel::selectSheetsByIndex(1)->load($path, function($reader) {
//                 echo json_encode($reader->toArray());
//                 exit();
                $this->value = $reader->toArray()[1];
                $this->frekuensi = $reader->toArray()[0];
//                var_dump($reader)->toArray();exit();
//                }
            });
//            print_r($this->value);
//            print_r($this->frekuensi);
//            exit();
            $selected_plot = $plot[$index];
            $range = DB::table('his_plot_data')
                    ->where('id_plot', '=', $selected_plot)
                    ->get();
            $plot_name = DB::table('his_plot')
                    ->join('his_technology', 'his_technology.id', '=', 'his_plot.id_tech')
                    ->where('his_plot.id', '=', $selected_plot)
                    ->select('his_plot.name as name', 'his_plot.id as id', 'his_technology.name as technology')
                    ->first();
//            print_r($plot_name);exit();
            $xchart = array();
            $ychart = array();
            $z = 0;
            $new_x_chart = array();
            $new_y_chart = array();
            $new_yy_chart = array();
            $title = "";
            $flagin = 0;
//            print_r($range); exit();
            foreach ($range as $key => $val) {
                if ($val->start == -999) {
                    $xchart[$z] = ' <span style="text-decoration:underline;">&lt;</span> ' . $val->end;
                } else
                if ($val->end == 999) {
                    $xchart[$z] = $val->start . ' &lt; ';
                } else {
                    $xchart[$z] = $val->start . ' &lt; ' . $plot_name->name . ' <span style="text-decoration:underline;">&lt;</span> ' . $val->end;
                }
                $ychart[$z] = 0;
                $j = 0;
                foreach ($this->value as $roy) {
                    if ($roy > $val->start && $roy <= $val->end) {
                        $ychart[$z] = $ychart[$z] + $this->frekuensi[$j];
                    } else {
                        if (!is_numeric($this->frekuensi[$j]) && strlen($this->frekuensi[$j]) > 5 && $flagin == 0) {
                            $title = $title . ' ' . $this->frekuensi[$j];
                            $flagin = 1;
                        }
                    }
                    $j++;
                }
                $z++;
            }
            $sum = array_sum($ychart);
            $series1Data = array();
            $ind = 0;
            $yy = 0;
            for ($st = 0; $st < $z; $st++) {
                if ($ychart[$st] > 0) {
                    $yy = $yy + $ychart[$st];
                    $series1Data[$xchart[$st]] = $ychart[$st];
                    $new_x_chart[$ind] = $xchart[$st];
                    $new_y_chart[$ind] = ($ychart[$st] / $sum) * 100;
                    $new_yy_chart[$ind] = ($yy / $sum) * 100;
                    $ind++;
                }
            }

            $tech = PlotModel::join('his_technology', 'his_technology.id', '=', 'his_plot.id_tech')
                    ->select('his_technology.name')
                    ->where('his_plot.id', $selected_plot)
                    ->first();
            $charts_data['title'][$index] = $title;
            $charts_data['tech'][$index] = $tech->name;
            $charts_data['plot'][$index] = $selected_plot;
            $charts_data['x'][$index] = $new_x_chart;
            $charts_data['y'][$index] = $new_y_chart;
            $charts_data['yy'][$index] = $new_yy_chart;
            $index++;
        }
        $json = json_encode($charts_data['x'][0]);
//        print_r($json);
//        exit();
//        $this->createPresentation();
        $data['charts_data'] = $charts_data;
        $data['res'] = $res;
        return View::make('automate.result', $data);
//        return Redirect::to('automate/result')
//                ->with('charts_data', $charts_data);
    }

    public function getDelete($id = null) {
        if (!is_null($id)) {
            $id = SiteHelpers::encryptID($id, true);
            $del = AutomateModel::where('id', $id)->first();
            $del_log = LogChartModel::where('id_result', $id)->get();
            foreach ($del_log as $data) {
                unlink(public_path($data->filename));
            }
            unlink(public_path('presentation/' . $del->file_result . '.pptx'));
            unlink(public_path('presentation/' . $del->file_result . '.odp'));
            AutomateModel::where('id', $id)->delete();
            return Redirect::to('automate')->with('message', SiteHelpers::alert('success', "Data deleted successfully"));
        }
    }

   public function getDestroy() {
	$ids=Input::get('del');
$i=0;
	foreach($ids as $id){
           $del = AutomateModel::where('id', $id)->first();
            $del_log = LogChartModel::where('id_result', $id)->get();
            foreach ($del_log as $data) {
                unlink(public_path($data->filename));
            }
            unlink(public_path('presentation/' . $del->file_result . '.pptx'));
            unlink(public_path('presentation/' . $del->file_result . '.odp'));
            AutomateModel::where('id', $id)->delete();
$i++;
	}
 return Redirect::to('automate')->with('message', SiteHelpers::alert('success', $i." Data deleted successfully"));
	}

    /**
     * Write documents
     *
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     * @param string $filename
     * @param array $writers
     */
    function write($phpPowerPoint, $filename, $writers) {
        $result = '';

        // Write documents
        foreach ($writers as $writer => $extension) {
            $result .= date('H:i:s') . " Write to {$writer} format";
            $dir = date('Y-m-d');
            if (!file_exists(public_path() . '/presentation/' . $dir)) {
                mkdir(public_path() . "/presentation/" . $dir, 0777);
            }
            if (!is_null($extension)) {
                $xmlWriter = IOFactory::createWriter($phpPowerPoint, $writer);
                $xmlWriter->save(public_path('presentation/' . $dir) . "/{$filename}.{$extension}");
//                rename(public_path('presentation/'.$dir) . "/{$filename}.{$extension}", public_path() . "/results/{$filename}.{$extension}");
            } else {
                $result .= ' ... NOT DONE!';
            }
            $result .= EOL;
        }

        $result .= $this->getEndingNotes($writers);

        return $result;
    }

    /**
     * Get ending notes
     *
     * @param array $writers
     */
    function getEndingNotes($writers) {
        $result = '';

        // Do not show execution time for index
        if (!IS_INDEX) {
            $result .= date('H:i:s') . " Done writing file(s)" . EOL;
            $result .= date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB" . EOL;
        }

        // Return
        if (CLI) {
            $result .= 'The results are stored in the "results" subdirectory.' . EOL;
        } else {
//      if (!IS_INDEX) {
            $types = array_values($writers);
            $result .= '<p>&nbsp;</p>';
            $result .= '<p>Results: ';
            foreach ($types as $type) {
                if (!is_null($type)) {
                    $resultFile = 'results/' . SCRIPT_FILENAME . '.' . $type;
                    if (file_exists($resultFile)) {
                        $result .= "<a href='{$resultFile}' class='btn btn-primary'>{$type}</a> ";
                    }
                }
            }
            $result .= '</p>';
//      }
        }

        return $result;
    }

    /**
     * Creates a templated slide
     *
     * @param PHPPowerPoint $objPHPPowerPoint
     * @return PHPPowerPoint_Slide
     */
    function createTemplatedSlide(PhpOffice\PhpPowerpoint\PhpPowerpoint $objPHPPowerPoint) {
        // Create slide
        $slide = $objPHPPowerPoint->createSlide();

        // Add logo
        $shape = $slide->createDrawingShape();
        $shape->setName('PHPPowerPoint logo')
                ->setDescription('PHPPowerPoint logo')
                ->setPath(public_path('resources/logo_right_alpha.png'))
                ->setHeight(18)
                ->setOffsetX(680)
                ->setOffsetY(10);
        $shape->getShadow()->setVisible(true)
                ->setDirection(45)
                ->setDistance(10);


        $shape_2 = $slide->createRichTextShape()
                ->setHeight(50)
                ->setWidth(700)
                ->setOffsetX(70)
                ->setOffsetY(660)
                ->setInsetTop(5)
                ->setInsetBottom(5);
        $shape_2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRun = $shape_2->createTextRun('© 2015 AT&T Intellectual Property. All rights reserved. AT&T and the AT&T logo are trademarks of AT&T Intellectual Property.');
        $textRun->getFont()->setBold(false)
                ->setSize(7)
                ->setColor(new Color('4A4A49'));

        $shape_4 = $slide->createRichTextShape()
                ->setHeight(50)
                ->setWidth(700)
                ->setOffsetX(70)
                ->setOffsetY(675)
                ->setInsetTop(5)
                ->setInsetBottom(5);
        $shape_4->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $textRun = $shape_4->createTextRun('AT&T Proprietary (Internal Use Only) Not for use or disclosure outside the AT&T companies except under written agreement');
        $textRun->getFont()->setBold(false)
                ->setSize(7)
                ->setColor(new Color('4A4A49'));

        $shape_3 = $slide->createDrawingShape();
        $shape_3->setName('PHPPowerPoint logo')
                ->setDescription('PHPPowerPoint logo')
                ->setPath(public_path('resources/logo_bottom_alpha.png'))
                ->setHeight(40)
                ->setOffsetX(890)
                ->setOffsetY(660);
        $shape_3->getShadow()->setVisible(true)
                ->setDirection(45)
                ->setDistance(10);
        // Return slide
        return $slide;
    }

    public function anySavecharts() {
        $id_res = $_POST['id_res'];
        $plot = $_POST['plot'];
        $title = urldecode($_POST['title']);
        $data = str_replace(' ', '+', $_POST['bin_data']);
        $data = base64_decode($data);
        $fileName = rand(1, 1000) . '-' . date('ymdhis') . '.png';
        $im = imagecreatefromstring($data);
        $dir = date('Y-m-d');
        if (!file_exists(public_path() . '/charts/' . $dir)) {
            mkdir(public_path() . "/charts/" . $dir, 0777);
        }
        if ($im !== false) {
            // Save image in the specified location
            imagepng($im, public_path() . '/charts/' . $dir . '/' . $fileName);
            $save_image = new LogChartModel;
            $save_image->id_result = $id_res;
            $save_image->id_plot = $plot;
            $save_image->title = $title;
            $save_image->filename = '/charts/' . $dir . '/' . $fileName;
            $save_image->save();
            imagedestroy($im);
//            echo "Saved successfully";
        } else {
            echo 'An error occurred.';
        }
    }

    public function postFinalpresentation() {
        $id_result = Input::get('id_result');
        $resulted = AutomateModel::where('id', $id_result)->first();
//        $range_name_id = Input::get('range_name_id');
        $result = LogChartModel::where('id_result', $id_result)->get();
        $objPHPPowerPoint = new PhpPowerpoint();

// Set properties
//        echo date('H:i:s') . ' Set properties' . EOL;
        $objPHPPowerPoint->getProperties()->setCreator('HAT Developer')
                ->setLastModifiedBy('HAT Developer')
                ->setTitle('Sample 07 Title')
                ->setSubject('Sample 07 Subject')
                ->setDescription('Sample 07 Description')
                ->setKeywords('office 2007 openxml libreoffice odt php')
                ->setCategory('Sample Category');

// Remove first slide
//        echo date('H:i:s') . ' Remove first slide' . EOL;
        $objPHPPowerPoint->removeSlideByIndex(0);

// Set Style
        $oFill = new Fill();
//        $oFill->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FFE06B20'));

        $oShadow = new Shadow();
        $oShadow->setVisible(true)->setDirection(45)->setDistance(10);

        //FIRST SLIDE
        $currentSlide = $this->createTemplatedSlide($objPHPPowerPoint); // local function
        // Create a shape (text)
        // Create a shape (text)

        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(600)
                ->setWidth(930)
                ->setOffsetX(40)
                ->setOffsetY(300);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT)
                ->setMarginLeft(25)
                ->setIndent(-25);
        $shape->getActiveParagraph()->getFont()->setSize(18)
                ->setColor(new Color('E07116'));
//        $shape->getActiveParagraph()->getBulletStyle()->setBulletType(Bullet::TYPE_BULLET);

        $shape->createTextRun($resulted->info);

        //END OF FIRST SLIDE



        $index = 0;
//        print_r('here'); exit();
        foreach ($result as $file) {
//            echo $file->filename.'<br>';
            $currentSlide = $this->createTemplatedSlide($objPHPPowerPoint);

            $shape = $currentSlide->createDrawingShape();
            $shape->setName('Result Chart')
                    ->setDescription('PHPPowerPoint logo')
                    ->setPath(public_path($file->filename))
                    ->setHeight(450)
                    ->setWidth(650)
                    ->setOffsetX(100)
                    ->setOffsetY(160);
            $shape->getShadow()->setVisible(true)
                    ->setDirection(45)
                    ->setDistance(10);


            $shape = $currentSlide->createRichTextShape();
            $shape->setHeight(50)
                    ->setWidth(930)
                    ->setOffsetX(20)
                    ->setOffsetY(45);
            $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setMarginLeft(25)
                    ->setIndent(-25);
            $shape->getActiveParagraph()->getFont()->setSize(23)
                    ->setColor(new Color('D66204'));
//        $shape->getActiveParagraph()->getBulletStyle()->setBulletType(Bullet::TYPE_BULLET);
            $title = explode(',', $file->title);
            $plot_data = PlotDataModel::where('id_plot', $file->id_plot)->get();
            $plot_name = PlotModel::where('id', $file->id_plot)->first();
            $technya = TechnologyModel::where('id', $plot_name->id_tech)->first();
            if ($technya->name == 'UMTS') {
                if($plot_name->name=='RX Power'){
                    $ket=' Io (RSSI) ';
                }else if($plot_name->name=='RSCP'){
                    $ket=' Ec (RSCP) ';
                }else{
                    $ket=' Ec/Io ';
                }
                $shape->createTextRun(str_ireplace('ch.', 'UARFCN ', @$title[1]) .' '.$ket. ' Histogram');
                
            } else if ($technya->name == 'LTE') {
                $ket='('.$plot_name->name.')';
                $shape->createTextRun(str_ireplace('ch.', 'EARFCN ', @$title[1]) .' '.$ket. ' Histogram');
            } else {
                $shape->createTextRun(str_ireplace('ch.', 'ARFCN ', @$title[1]) . ' Histogram');
            }

            $co = count($plot_data);

            $shape = $currentSlide->createTableShape(1);
            $shape->setWidth(150);
            $shape->setOffsetX(760);
            $shape->setOffsetY(200);
            $row = $shape->createRow();
            $row->getFill()->setFillType(Fill::FILL_SOLID)
                    ->setStartColor(new Color('EEF0EB'))
                    ->setEndColor(new Color('EEF0EB'));
            $row->nextCell()->createTextRun($plot_name->name);
            $i = 2;
            foreach ($plot_data as $rw) {

                $row = $shape->createRow();
                if ($i % 2 == 0) {
                    $row->getFill()->setFillType(Fill::FILL_SOLID)
                            ->setStartColor(new Color('DCEBCA'))
                            ->setEndColor(new Color('DCEBCA'));
                } else {
                    $row->getFill()->setFillType(Fill::FILL_SOLID)
                            ->setStartColor(new Color('EEF0EB'))
                            ->setEndColor(new Color('EEF0EB'));
                }
		if($rw->start==-999 || $rw->start==999){
	                $row->nextCell()->createTextRun(' < ' . $rw->end);
		}else if($rw->end==999||$rw->end==-999){
			$row->nextCell()->createTextRun($rw->start . ' < ');
		}else{
			$row->nextCell()->createTextRun($rw->start . ' to ' . $rw->end);
		}
                $i++;
            }
            $index++;
        }
        // Save file
        $named = date('Ymdhis_') . $this->toAscii($resulted->info);
        $this->write($objPHPPowerPoint, $named, $this->writers);
        $resultsave = AutomateModel::find($id_result);
        $resultsave->file_result = date('Y-m-d') . '/' . $named;
        $resultsave->save();
        Session::flash('message', SiteHelpers::alert('success', Lang::get('Process has completed, check the result on table bellow')));
        return Redirect::to('/automate');
    }

    function toAscii($str) {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_| -]+/", '-', $clean);

        return $clean;
    }

}

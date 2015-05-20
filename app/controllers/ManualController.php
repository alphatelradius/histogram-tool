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

require_once 'src/PhpPowerpoint/Autoloader.php';
Autoloader::register();

class ManualController extends BaseController {

    public $data = array();
    public $writers = NULL;
    public $value = array();
    public $frekuensi = array();
    public $man_info = array();
    public $man_x = array();
    public $man_y = array();

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
        return View::make('manual.index', $data);
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
        return View::make('manual.form', $data);
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
        $file = Input::get('files');
        $ammount = Input::get('ammount');
        $line = ($ammount * 3) - 1;
        $charts_data = array();
        $index = 0;
//        foreach ($file_id as $file) {
        $myfile = DB::table('his_file')
                ->where('id', '=', $file)
                ->first();
        $filename = $myfile->filename;
//            print_r($filename);exit();
        $path = public_path('uploads') . '/' . $filename;

        Excel::selectSheetsByIndex(0)->load($path, function($reader) use($ammount) {
            $all_data = count($reader->toArray());
//            print_r($all_data);
//            exit();
            $start = 0;
            $index = 0;
            for ($i = $all_data - 1; $i > 0; $i--) {
//                if (is_array(@$reader->toArray()[$start + $i])) {
                if ($index < $ammount) {
                    $this->man_x[$index] = $reader->toArray()[$i - $start];
                    $start++;
                    $this->man_y[$index] = $reader->toArray()[$i - $start];
                    $start++;
                    $this->man_info[$index] = $reader->toArray()[$i - $start];
                    $index++;
                }
            }
        });

        $ioke = 0;
        for ($i = 0; $i < $ammount; $i++) {
            if (is_array(@$this->man_info[$i])) {
//                print_r($this->man_info[$i]);
//                exit();
                $c = count($this->man_info[$i]);
//                if ($this->man_x[$i][$c - 1] > 0) {
                $title = $this->man_info[$i][$c - 4];
                $selected_plot = $this->man_info[$i][$c - 3];
                $technology = $this->man_info[$i][$c - 2];
                if (empty($selected_plot) || empty($technology)) {
                    
                } else {
                    unset($new_x_chart);
                    unset($new_y_chart);
                    unset($new_yy_chart);
                    $new_x_chart = array();
                    $new_y_chart = array();
                    $new_yy_chart = array();
                    $ind = 0;
                    $co = count($this->man_x[$i]) - 1;
                    $last_man_y = 0;
                    $start = 0;
                    for ($iz = $co; $iz >= 0; $iz--) {
                        if (($this->man_y[$i][$iz]) > 0) {
                            $new_y_chart[$ind] = $this->man_y[$i][$iz];
                            $new_yy_chart[$ind] = $this->man_y[$i][$iz] + $last_man_y;
                            $new_x_chart[$ind] = $this->man_x[$i][$iz];
                            $last_man_y = $last_man_y + $this->man_y[$i][$iz];
                            $ind++;
                            $start++;
                        } else {
                            
                        }
                        $ioke++;
                    }



                    $tech = PlotModel::where('his_plot.name', $selected_plot)
                            ->first();
//if($tech==null){
                  // print_r($selected_plot);
                // exit();}
                    $charts_data['title'][$index] = $title;
                    $charts_data['tech'][$index] = $technology;
                    $charts_data['plot'][$index] = $tech->id;
                    $charts_data['x'][$index] = $new_x_chart;
                    $charts_data['y'][$index] = $new_y_chart;
                    $charts_data['yy'][$index] = $new_yy_chart;
                    $index++;
                }
//                }
            }
        }

        $data['charts_data'] = $charts_data;
        $data['res'] = $res;
        return View::make('manual.result', $data);
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
        $ids = Input::get('del');
        $i = 0;
        foreach ($ids as $id) {
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
        return Redirect::to('automate')->with('message', SiteHelpers::alert('success', $i . " Data deleted successfully"));
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
        $result = LogChartModel::where('id_result', $id_result)->orderBy('id', 'DESC')->get();
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
            $title = $file->title;
            $plot_data = PlotDataModel::where('id_plot', $file->id_plot)->get();
            $plot_name = PlotModel::where('id', $file->id_plot)->first();
            $technya = TechnologyModel::where('id', $plot_name->id_tech)->first();
//            if ($technya->name == 'UMTS') {
//                if ($plot_name->name == 'RX Power') {
//                    $ket = ' Io (RSSI) ';
//                } else if ($plot_name->name == 'RSCP') {
//                    $ket = ' Ec (RSCP) ';
//                } else {
//                    $ket = ' Ec/Io ';
//                }
//                $shape->createTextRun(str_ireplace('ch.', 'UARFCN ', @$title[1]) . ' ' . $ket . ' Histogram');
//            } else if ($technya->name == 'LTE') {
//                $ket = '(' . $plot_name->name . ')';
//                $shape->createTextRun(str_ireplace('ch.', 'LARFCN ', @$title[1]) . ' ' . $ket . ' Histogram');
//            } else {
//                $shape->createTextRun(str_ireplace('ch.', 'ARFCN ', @$title[1]) . ' Histogram');
//            }
            $shape->createTextRun($title);

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
                if ($rw->start == -999 || $rw->start == 999) {
                    $row->nextCell()->createTextRun(' < ' . $rw->end);
                } else if ($rw->end == 999 || $rw->end == -999) {
                    $row->nextCell()->createTextRun($rw->start . ' < ');
                } else {
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

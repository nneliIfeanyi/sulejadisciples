<?php
class Db extends Controller
{

    public $attendanceModel;
    public $userModel;
    public function __construct()
    {
        $this->attendanceModel = $this->model('Attend');
        $this->userModel = $this->model('User');
    }

    // Load Homepage
    public function index($param)
    {


        if ($param == 'day1') {
            $names = $this->attendanceModel->getDay1();
            $day1Count = $this->attendanceModel->getCountDay1();
            $data = [
                'param' => $param,
                'day1Count' => $day1Count,
                'numbering' => 1,
                'names' => $names
            ];

            // Load homepage/index view
            $this->view('db/index', $data);
        } elseif ($param == 'day2') {
            $names = $this->attendanceModel->getDay2();
            $day2Count = $this->attendanceModel->getCountDay2();
            $data = [
                'param' => $param,
                'day2Count' => $day2Count,
                'numbering' => 1,
                'names' => $names
            ];

            // Load homepage/index view
            $this->view('db/index', $data);
        } elseif ($param == 'day3') {

            $names = $this->attendanceModel->getDay3();
            $day3Count = $this->attendanceModel->getCountDay3();
            //Set Data
            $data = [
                'param' => $param,
                'day3Count' => $day3Count,
                'numbering' => 1,
                'names' => $names
            ];

            // Load homepage/index view
            $this->view('db/index', $data);
        }
    }

    //Bulk View
     public function bulk()
  {
    $bulks = $this->userModel->getBulk();
    $total = $this->userModel->getBulkNumRows();
    $data = [
      'bulks' => $bulks,
      'total' => $total
    ];

    // Load about view
    $this->view('db/bulk', $data);
  }
}

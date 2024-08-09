<?php
class Attendance extends Controller
{
    public $attendanceModel;

    public function __construct()
    {
        $this->attendanceModel = $this->model('Attend');
    }

    // Load Homepage
    public function index($param)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_POST['user_id'],
                'fullname' => $_POST['fullname'],
                'yearz' => $_POST['yearz'],
                'dayz' => $param,
                'timez' => $_POST['timez'],

            ];
            $success = $this->attendanceModel->markAttendance($data['user_id'], $data['fullname'], $data['yearz'], $data['dayz'], $data['timez']);
            if ($success) {
                echo "
                  <div class='flash-msg alert alert-success'>
                    Attendance Marked Successfully.. </span>
                </div>
                
            ";
            } else {
                echo "
                  <div class='flash-msg alert alert-danger'>
                    Something went wrong.. </span>
                </div>

            ";
            }
        } // End if post request
        else {

            $names = $this->attendanceModel->getNames();
            if ($param == 'day1') {
                $day1Count = $this->attendanceModel->getCountDay1();
                $data = [
                    'param' => $param,
                    'day1Count' => $day1Count,
                    'numbering' => 1,
                    'names' => $names
                ];

                // Load homepage/index view
                $this->view('attendance/index', $data);
            } elseif ($param == 'day2') {
                $day2Count = $this->attendanceModel->getCountDay2();
                $data = [
                    'param' => $param,
                    'day2Count' => $day2Count,
                    'numbering' => 1,
                    'names' => $names
                ];

                // Load homepage/index view
                $this->view('attendance/index', $data);
            } elseif ($param == 'day3') {


                $day3Count = $this->attendanceModel->getCountDay3();
                //Set Data
                $data = [
                    'param' => $param,
                    'day3Count' => $day3Count,
                    'numbering' => 1,
                    'names' => $names
                ];

                // Load homepage/index view
                $this->view('attendance/index', $data);
            }
        }
    }

    public function unmark($param)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($param == 'day1') {
                $data = [
                    'user_id' => $_POST['user_id'],
                    'yearz' => $_POST['yearz'],
                    'fullname' => $_POST['fullname'],
                    'dayz' => $param

                ];
                $success = $this->attendanceModel->unMarkAttendance($data['user_id'], $data['yearz'], $data['dayz']);
                if ($success) {
                    flash('msg', 'Attendance removed successfully for ' . $data['fullname'] . ' ' . $param);
                    redirect('attendance/index/day1');
                } else {
                    die('Something went wrong');
                }
            } elseif ($param == 'day2') {
                $data = [
                    'user_id' => $_POST['user_id'],
                    'yearz' => $_POST['yearz'],
                    'fullname' => $_POST['fullname'],
                    'dayz' => $param

                ];
                $success = $this->attendanceModel->unMarkAttendance($data['user_id'], $data['yearz'], $data['dayz']);
                if ($success) {
                    flash('msg', 'Attendance removed successfully for ' . $data['fullname'] . ' ' . $param);
                    redirect('attendance/index/day2');
                } else {
                    die('Something went wrong');
                }
            } elseif ($param == 'day3') {
                $data = [
                    'user_id' => $_POST['user_id'],
                    'yearz' => $_POST['yearz'],
                    'fullname' => $_POST['fullname'],
                    'dayz' => $param

                ];
                $success = $this->attendanceModel->unMarkAttendance($data['user_id'], $data['yearz'], $data['dayz']);
                if ($success) {
                    flash('msg', 'Attendance removed successfully for ' . $data['fullname'] . ' ' . $param);
                    redirect('attendance/index/day3');
                } else {
                    die('Something went wrong');
                }
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('attendance/index/' . $param);
        }
    }
}

<?php
class Youth_summit extends Controller
{
    public $postModel;
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $data = [];
        $this->view('youth_summit/index', $data);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Set response header to JSON
            header('Content-Type: application/json');
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'firstname' => trim($_POST['firstname'] ?? ''),
                'middlename' => trim($_POST['middlename'] ?? ''),
                'surname' => trim($_POST['surname'] ?? ''),
                'phone' => trim($_POST['phone'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'age' => trim($_POST['age'] ?? ''),
                'marital_status' => trim($_POST['marital_status'] ?? ''),
                'denomination' => trim($_POST['denomination'] ?? ''),
                'address' => trim($_POST['address'] ?? ''),
                'event_ongoing' => trim($_POST['event_ongoing'] ?? ''),
                'is_member' => trim($_POST['is_member'] ?? ''),
                'firstname_err' => '',
                'surname_err' => '',
                'phone_err' => '',
                'email_err' => '',
                'age_err' => '',
                'marital_status_err' => '',
                'event_ongoing_err' => ''
            ];

            // Validate firstname
            if (empty($data['firstname'])) {
                $data['firstname_err'] = 'Please enter first name';
            }

            // Validate surname
            if (empty($data['surname'])) {
                $data['surname_err'] = 'Please enter surname';
            }

            // Validate phone
            if (empty($data['phone'])) {
                $data['phone_err'] = 'Please enter phone number';
            } elseif (!preg_match('/^\d{10,11}$/', $data['phone'])) {
                $data['phone_err'] = 'Please enter a valid phone number (10-11 digits)';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Please enter a valid email';
            }

            // Validate age bracket
            if (empty($data['age'])) {
                $data['age_err'] = 'Please select age bracket';
            }

            // Validate marital status
            if (empty($data['marital_status'])) {
                $data['marital_status_err'] = 'Please select marital status';
            }

            // Validate event ongoing
            if (empty($data['event_ongoing'])) {
                $data['event_ongoing_err'] = 'Please select event';
            }

            // Make sure there are no errors
            if (
                empty($data['firstname_err']) && empty($data['surname_err']) &&
                empty($data['phone_err']) && empty($data['email_err']) &&
                empty($data['age_err']) && empty($data['marital_status_err']) &&
                empty($data['event_ongoing_err'])
            ) {

                // Validation passed - execute registration
                if ($this->postModel->register($data)) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Registration successful! Thank you for registering.'
                    ]);
                } else {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Something went wrong. Please try again.'
                    ]);
                }
            } else {
                // Return validation errors
                echo json_encode([
                    'success' => false,
                    'errors' => $data
                ]);
            }
        } else {
            // Load View
            redirect('youth_summit');
        }
    }


    // Display participant list page
    public function participants()
    {
        $data = [];
        $this->view('youth_summit/participants', $data);
    }

    // Return JSON list of participants for the datatable
    public function getParticipants()
    {
        header('Content-Type: application/json');

        $participants = $this->postModel->getRegistrations();

        echo json_encode([
            'success' => true,
            'data' => $participants
        ]);
    }

    // Return a participant record or update it
    public function edit($id)
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $participant = $this->postModel->getRegistrationById($id);
            if ($participant) {
                echo json_encode(['success' => true, 'data' => $participant]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Participant not found.']);
            }
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'firstname' => trim($_POST['firstname'] ?? ''),
                'middlename' => trim($_POST['middlename'] ?? ''),
                'surname' => trim($_POST['surname'] ?? ''),
                'phone' => trim($_POST['phone'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'age' => trim($_POST['age'] ?? ''),
                'marital_status' => trim($_POST['marital_status'] ?? ''),
                'denomination' => trim($_POST['denomination'] ?? ''),
                'address' => trim($_POST['address'] ?? ''),
                'event_ongoing' => trim($_POST['event_ongoing'] ?? ''),
                'is_member' => trim($_POST['is_member'] ?? ''),
                'firstname_err' => '',
                'surname_err' => '',
                'phone_err' => '',
                'email_err' => '',
                'age_err' => '',
                'marital_status_err' => '',
                'event_ongoing_err' => ''
            ];

            if (empty($data['firstname'])) {
                $data['firstname_err'] = 'Please enter first name';
            }

            if (empty($data['surname'])) {
                $data['surname_err'] = 'Please enter surname';
            }

            if (empty($data['phone'])) {
                $data['phone_err'] = 'Please enter phone number';
            } elseif (!preg_match('/^\d{10,11}$/', $data['phone'])) {
                $data['phone_err'] = 'Please enter a valid phone number (10-11 digits)';
            }

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Please enter a valid email';
            }

            if (empty($data['age'])) {
                $data['age_err'] = 'Please select age bracket';
            }

            if (empty($data['marital_status'])) {
                $data['marital_status_err'] = 'Please select marital status';
            }

            if (empty($data['event_ongoing'])) {
                $data['event_ongoing_err'] = 'Please select event';
            }

            if (
                empty($data['firstname_err']) && empty($data['surname_err']) &&
                empty($data['phone_err']) && empty($data['email_err']) &&
                empty($data['age_err']) && empty($data['marital_status_err']) &&
                empty($data['event_ongoing_err'])
            ) {
                if ($this->postModel->updateRegistration($data)) {
                    echo json_encode(['success' => true, 'message' => 'Participant updated successfully.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Unable to update participant.']);
                }
            } else {
                echo json_encode(['success' => false, 'errors' => $data]);
            }
            return;
        }

        echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    }

    public function delete($id)
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteRegistration($id)) {
                echo json_encode(['success' => true, 'message' => 'Participant deleted successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Unable to delete participant.']);
            }
            return;
        }

        echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    }
}

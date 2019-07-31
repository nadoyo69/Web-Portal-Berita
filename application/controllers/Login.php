<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }


    public function index()
    {
        $botToken = "881663171:AAHnbbTVRqoP7XaF83_gtJvyXa53E0oApSE";
        $perangkat = $_SERVER['HTTP_USER_AGENT'];
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');
        $website = "https://api.telegram.org/bot" . $botToken;
        $chatId = -286303573;
        $params = [
            'chat_id' => $chatId,
            'text' => 'Ada yang sedang mencoba untuk Login' . ' ____IP=>' . $_SERVER['REMOTE_ADDR'] . ' ____Tanggal&Jam=>' . $waktu . ' ____Perangkat Lunak =>' . $perangkat,
        ];
        $ch = curl_init($website . '/sendMessage');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        $this->load->view('Login/loginotp');
    }

    public function kodeotp()
    {
        $this->load->library('form_validation');
        $botToken = "863142829:AAEj52JcKit7GdwgrXZgupO7RAsgnLHQIXo";

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));

            $result = $this->Login_model->cekemail($email);
            if (!empty($result)) {

                $length = 10;
                $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $otp = "";

                for ($i = 0; $i < $length; $i++) {
                    $otp .= $chars[mt_rand(0, strlen($chars) - 1)];
                }

                $this->Login_model->updateotp($otp, $email);
                date_default_timezone_set('Asia/Jakarta');
                $waktu = date('Y-m-d H:i:s');
                $website = "https://api.telegram.org/bot" . $botToken;
                $chatId = -286303573;
                $params = [
                    'chat_id' => $chatId,
                    'text' => 'Kode OTP Anda dengan: ____Email=>' . $email . ' __jam & tanggal=>' . $waktu . ' __KODEOTP=>' . '( ' . $otp . ' )' . ' ************KODE INI HANYA BERLAKU SEKALI SAJA************',
                ];
                $ch = curl_init($website . '/sendMessage');
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $this->isLoggedIn();
            } else {
                $this->session->set_flashdata('error', 'Email not listed');

                $this->load->view('Login/loginotp');
            }
        }
    }

    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != true) {
            $this->load->view('Login/login');
        } else {
            redirect('/dashboard');
        }
    }

    public function loginMe()
    {
        $this->load->library('form_validation');
        $botToken = "881663171:AAHnbbTVRqoP7XaF83_gtJvyXa53E0oApSE";

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[32]');
        $this->form_validation->set_rules('otp', 'KodeOTP', 'required|trim|min_length[10]');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = strtolower($this->security->xss_clean($this->input->post('password')));
            $otp = strtolower($this->security->xss_clean($this->input->post('otp')));

            $result = $this->Login_model->loginMe($email, $password, $otp);

            if (!empty($result)) {
                $lastLogin = $this->Login_model->lastLoginInfo($result->userId);

                $sessionArray = array(
                    'userId' => $result->userId,
                    'role' => $result->roleId,
                    'roleText' => $result->role,
                    'name' => $result->name,
                    'lastLogin' => $lastLogin->createdDtm,
                    'isLoggedIn' => true
                );

                $this->session->set_userdata($sessionArray);

                unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

                $loginInfo = array("userId" => $result->userId, "sessionData" => json_encode($sessionArray), "machineIp" => $_SERVER['REMOTE_ADDR'], "userAgent" => getBrowserAgent(), "agentString" => $this->agent->agent_string(), "platform" => $this->agent->platform());

                $this->Login_model->lastLogin($loginInfo);

                $perangkat = $_SERVER['HTTP_USER_AGENT'];
                date_default_timezone_set('Asia/Jakarta');
                $waktu = date('Y-m-d H:i:s');
                $website = "https://api.telegram.org/bot" . $botToken;
                $chatId = -286303573;
                $params = [
                    'chat_id' => $chatId,
                    'text' => 'User yang sedang Login : ____Email=>' . $email . ' ____IP=>' . $_SERVER['REMOTE_ADDR'] . ' ____Tanggal & Jam=>' . $waktu . ' ____Perangkat Lunak =>' . $perangkat . ' ____Session Data=>' . json_encode($sessionArray),
                ];
                $ch = curl_init($website . '/sendMessage');
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);


                redirect('/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Email or password or OTP mismatch');

                $this->load->view('Login/login');
            }
        }
    }
}

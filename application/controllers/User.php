<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class User extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }
    public function index()
    {
        $this->global['pageTitle'] = 'Nadoyo : Dashboard';
        $data['total_konten'] = $this->user_model->konten();
        $data['total_komen'] = $this->user_model->komentar();
        $data['total_user'] = $this->user_model->user();
        $data['total_tags'] = $this->user_model->total_tags();
        $data['grafik'] = $this->user_model->grafik();
        $this->loadViews("User/dashboard", $this->global, $data, null);
    }
    function userListing()
    {
        if ($this->isAdmin() == true) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->user_model->userListingCount($searchText);

            $returns = $this->paginationCompress("User/userListing/", $count, 10);

            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Nadoyo : User Listing';

            $this->loadViews("User/users", $this->global, $data, null);
        }
    }
    function addNew()
    {
        if ($this->isAdmin() == true) {
            $this->loadThis();
        } else {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();

            $this->global['pageTitle'] = 'Nadoyo : Add New User';

            $this->loadViews("User/addNew", $this->global, $data, null);
        }
    }
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            echo ("true");
        } else {
            echo ("false");
        }
    }
    function addNewUser()
    {
        if ($this->isAdmin() == true) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');

            if ($this->form_validation->run() == false) {
                $this->addNew();
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));

                $userInfo = array(
                    'email' => $email, 'password' => getHashedPassword($password), 'roleId' => $roleId, 'name' => $name,
                    'mobile' => $mobile, 'createdBy' => $this->vendorId, 'createdDtm' => date('Y-m-d H:i:s')
                );

                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New User created successfully');
                } else {
                    $this->session->set_flashdata('error', 'User creation failed');
                }

                redirect('User/addNew');
            }
        }
    }

    function editOld($userId = null)
    {
        if ($this->isAdmin() == true || $userId == 1) {
            $this->loadThis();
        } else {
            if ($userId == null) {
                redirect('userListing');
            }

            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);

            $this->global['pageTitle'] = 'Nadoyo : Edit User';

            $this->loadViews("User/editOld", $this->global, $data, null);
        }
    }

    function editUser()
    {
        if ($this->isAdmin() == true) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $userId = $this->input->post('userId');

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');

            if ($this->form_validation->run() == false) {
                $this->editOld($userId);
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));

                $userInfo = array();

                if (empty($password)) {
                    $userInfo = array(
                        'email' => $email, 'roleId' => $roleId, 'name' => $name,
                        'mobile' => $mobile, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s')
                    );
                } else {
                    $userInfo = array(
                        'email' => $email, 'password' => getHashedPassword($password), 'roleId' => $roleId,
                        'name' => ucwords($name), 'mobile' => $mobile, 'updatedBy' => $this->vendorId,
                        'updatedDtm' => date('Y-m-d H:i:s')
                    );
                }

                $result = $this->user_model->editUser($userInfo, $userId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'User updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'User updation failed');
                }

                redirect('User/userListing');
            }
        }
    }

    function deleteUser()
    {
        if ($this->isAdmin() == true) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted' => 1, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->deleteUser($userId, $userInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => true)));
            } else {
                echo (json_encode(array('status' => false)));
            }
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Nadoyo : 404 - Page Not Found';

        $this->loadViews("User/404", $this->global, null, null);
    }

    function loginHistoy($userId = null)
    {
        if ($this->isAdmin() == true) {
            $this->loadThis();
        } else {
            $userId = ($userId == null ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;

            $this->load->library('pagination');

            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress("User/login-history/" . $userId . "/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Nadoyo : User Login History';

            $this->loadViews("User/loginHistory", $this->global, $data, null);
        }
    }
    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;

        $this->global['pageTitle'] = $active == "details" ? 'Nadoyo : My Profile' : 'Nadoyo : Change Password';
        $this->loadViews("User/profile", $this->global, $data, null);
    }
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|callback_emailExists');

        if ($this->form_validation->run() == false) {
            $this->profile($active);
        } else {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));

            $userInfo = array('name' => $name, 'email' => $email, 'mobile' => $mobile, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->editUser($userInfo, $this->vendorId);

            if ($result == true) {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('User/profile/' . $active);
        }
    }
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldPassword', 'Old password', 'required');
        $this->form_validation->set_rules('newPassword', 'New password', 'required|min_length[15]');
        $this->form_validation->set_rules('cNewPassword', 'Confirm new password', 'required|matches[newPassword]|min_length[15]');

        if ($this->form_validation->run() == false) {
            $this->profile($active);
        } else {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if (empty($resultPas)) {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('User/profile/' . $active);
            } else {
                $usersData = array(
                    'password' => getHashedPassword($newPassword), 'updatedBy' => $this->vendorId,
                    'updatedDtm' => date('Y-m-d H:i:s')
                );

                $result = $this->user_model->changePassword($this->vendorId, $usersData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Password updation successful');
                } else {
                    $this->session->set_flashdata('error', 'Password updation failed');
                }

                redirect('User/profile/' . $active);
            }
        }
    }

    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            $return = true;
        } else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }

    function upload()
    {
        $this->load->model('user_model');
        $data['roles'] = $this->user_model->getUserRoles();
        $data['tags'] =  $this->user_model->tags();
        $this->global['pageTitle'] = 'Nadoyo : Upload Berita';

        $this->loadViews("User/upload", $this->global, $data, null);
    }

    function newupload()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->upload();
        } else {
            $this->upload->do_upload('foto');
            $upload_data = $this->upload->data();
            $file_name =   base_url() . 'assets/images/' . $upload_data['file_name'];
            $judul = ucwords(strtolower($this->security->xss_clean($this->input->post('judul'))));
            $nama = ucwords(strtolower($this->security->xss_clean($this->input->post('nama'))));
            $jenis = ucwords(strtolower($this->security->xss_clean($this->input->post('jenis'))));
            $preg = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $judul);
            $trim = trim($preg);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $pre_slug . '.html';
            $foto = $file_name;
            $isi = $this->input->post('isi');

            $databerita = array('judul' => $judul, 'nama' => $nama, 'jenis' => $jenis, 'slug' => $slug, 'foto' => $foto, 'isi' => $isi);

            $this->load->model('user_model');
            $result = $this->user_model->newupload($databerita);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil di Tambah');
            } else {
                $this->session->set_flashdata('error', 'Gagal upload data');
            }

            redirect('User/upload');
        }
    }

    function daftar()
    {
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;

        $this->load->library('pagination');

        $count = $this->user_model->listdaftarCount($searchText);

        $returns = $this->paginationCompress("daftar/", $count, 10);

        $data['daftarRecords'] = $this->user_model->daftar($searchText, $returns["page"], $returns["segment"]);

        $this->global['pageTitle'] = 'Nadoyo : Daftar Berita';

        $this->loadViews("User/daftar", $this->global, $data, null);
    }
    function daftarsource()
    {
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;

        $this->load->library('pagination');

        $count = $this->user_model->listsourceCount($searchText);

        $returns = $this->paginationCompress("daftar/", $count, 10);

        $data['daftarRecords'] = $this->user_model->source($searchText, $returns["page"], $returns["segment"]);

        $this->global['pageTitle'] = 'Nadoyo : Daftar Sourcecode';

        $this->loadViews("User/daftarsource", $this->global, $data, null);
    }
    function deleteberita()
    {
        $id = $this->uri->segment(3);
        $this->user_model->deleteberita($id);
        redirect('User/daftar');
    }


    function editberita($idberita = null)
    {
        $data['berita'] = $this->user_model->getdaftarById($idberita);
        $data['tags'] =  $this->user_model->tags();

        $this->global['pageTitle'] = 'Nadoyo : Edit Berita';

        $this->loadViews("User/editberita", $this->global, $data, null);
    }

    function editdaftarberita()
    {
        $this->load->library('form_validation');
        $idberita = $this->input->post('idberita');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->editberita($idberita);
        } else {
            $this->upload->do_upload('foto');
            $upload_data = $this->upload->data();
            $file_name =   base_url() . 'assets/images/' . $upload_data['file_name'];
            $judul = ucwords(strtolower($this->security->xss_clean($this->input->post('judul'))));
            $nama = ucwords(strtolower($this->security->xss_clean($this->input->post('nama'))));
            $jenis = ucwords(strtolower($this->security->xss_clean($this->input->post('jenis'))));
            $foto = $file_name;
            $isi = $this->input->post('isi');
            $databerita = array('judul' => $judul, 'nama' => $nama, 'jenis' => $jenis, 'foto' => $foto, 'isi' => $isi);

            $result = $this->user_model->editdaftarberita($databerita, $idberita);

            if ($result == true) {
                $this->session->set_flashdata('success', 'User updated successfully');
            } else {
                $this->session->set_flashdata('error', 'User updation failed');
            }

            redirect('User/daftar');
        }
    }

    function komen()
    {
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;

        $this->load->library('pagination');

        $count = $this->user_model->listkomenCount($searchText);

        $returns = $this->paginationCompress("komen", $count, 10);

        $data['komenRecords'] = $this->user_model->komen($searchText, $returns["page"], $returns["segment"]);

        $this->global['pageTitle'] = 'Nadoyo : Daftar Komentar';

        $this->loadViews("User/komen", $this->global, $data, null);
    }
    function deletekomen()
    {
        $id = $this->uri->segment(3);
        $this->user_model->deletekomen($id);
        redirect('User/komen');
    }

    function deleteallkomen()
    {
        $id = $this->uri->segment(3);
        $this->user_model->deleteallkomen();
        redirect('User/komen');
    }

    public function backup()
    {
        $this->global['pageTitle'] = 'Nadoyo : Backup Database';
        $this->loadViews('User/backupdatabase', $this->global);
    }

    public function backupdata()
    {
        $this->load->helper('download');
        $this->load->dbutil();
        $prefs = array(
            'format'      => 'zip',
            'filename'    => 'my_db_backup.sql'
        );
        $backup = &$this->dbutil->backup($prefs);
        $db_name = 'backup-on-' . date("Y-m-d-H-i-s") . '.zip';
        $save = 'pathtobkfolder/' . $db_name;
        $this->load->helper('file');
        write_file($save, $backup);
        $this->load->helper('download');
        force_download($db_name, $backup);
    }

    public function tag()
    {
        $this->load->model('user_model');
        $data['tags'] =  $this->user_model->tags();
        $this->global['pageTitle'] = 'Nadoyo : Tags';

        $this->loadViews("User/tag", $this->global, $data, null);
    }

    public function newtag()
    {
        $tag = ucwords(strtolower($this->security->xss_clean($this->input->post('tag'))));
        $this->load->model('user_model');
        $tag = array('tag' => $tag);
        $result = $this->user_model->newuploadtag($tag);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil di Tambah');
        } else {
            $this->session->set_flashdata('error', 'Gagal upload data');
        }
        redirect('User/tag');
    }

    function deletetag()
    {
        $id = $this->uri->segment(3);
        $this->user_model->deletetag($id);
        redirect('User/tag');
    }
}

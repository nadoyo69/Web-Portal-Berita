<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User_model extends CI_Model
{
    function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.mobile  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.mobile  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);
        $this->db->where("isDeleted", 0);
        if ($userId != 0) {
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }


    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return true;
    }



    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');

        $user = $query->result();

        if (!empty($user)) {
            if (verifyHashedPassword($oldPassword, $user[0]->password)) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }


    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     */
    function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '" . date('Y-m-d', strtotime($fromDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if (!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '" . date('Y-m-d', strtotime($toDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if ($userId >= 1) {
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        if (!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '" . date('Y-m-d', strtotime($fromDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if (!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '" . date('Y-m-d', strtotime($toDate)) . "'";
            $this->db->where($likeCriteria);
        }
        if ($userId >= 1) {
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfoById($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }

    /**
     * This function used to get user information by id with role
     * @param number $userId : This is user id
     * @return aray $result : This is user information
     */
    function getUserInfoWithRole($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles', 'Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        return $query->row();
    }

    function newupload($databerita)
    {
        $this->db->trans_start();
        $this->db->insert('berita', $databerita);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    function getdaftarById($idberita)
    {
        $this->db->select('idberita, judul, nama, jenis, slug, foto, isi');
        $this->db->from('berita');
        $this->db->where('idberita', $idberita);
        $query = $this->db->get();

        return $query->row();
    }

    function listdaftarCount($searchText = '')
    {
        $this->db->select('idberita, judul, nama, jenis, foto, isi');
        $this->db->from('berita');
        if (!empty($searchText)) {
            $likeCriteria = "(judul  LIKE '%" . $searchText . "%'
                            OR  nama  LIKE '%" . $searchText . "%'
                            OR  jenis  LIKE '%" . $searchText . "%'
                            OR  isi  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();

        return $query->num_rows();
    }
    function daftar($searchText = '', $page, $segment)
    {
        $this->db->select('idberita, judul, slug, nama, jenis,foto, isi');
        $this->db->from('berita');
        if (!empty($searchText)) {
            $likeCriteria = "(judul  LIKE '%" . $searchText . "%'
                            OR  nama  LIKE '%" . $searchText . "%'
                            OR  jenis  LIKE '%" . $searchText . "%'
                            OR  isi  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('berita.idberita', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function listsourceCount($searchText = '')
    {
        $this->db->select('idsource, judul, nama, jenis, foto, isi');
        $this->db->from('sourcecode');
        if (!empty($searchText)) {
            $likeCriteria = "(judul  LIKE '%" . $searchText . "%'
                            OR  nama  LIKE '%" . $searchText . "%'
                            OR  jenis  LIKE '%" . $searchText . "%'
                            OR  isi  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();

        return $query->num_rows();
    }
    function source($searchText = '', $page, $segment)
    {
        $this->db->select('idsource, judul, slug, nama, jenis,foto, isi');
        $this->db->from('sourcecode');
        if (!empty($searchText)) {
            $likeCriteria = "(judul  LIKE '%" . $searchText . "%'
                            OR  nama  LIKE '%" . $searchText . "%'
                            OR  jenis  LIKE '%" . $searchText . "%'
                            OR  isi  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('sourcecode.idsource', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function deleteberita($id)
    {
        $this->db->where('idberita', $id);
        $this->db->delete('berita');
    }

    function editdaftarberita($databerita, $idberita)
    {
        $this->db->where('idberita', $idberita);
        $this->db->update('berita', $databerita);

        return true;
    }

    function getkomenById($idkomen)
    {
        $this->db->select('idkomen, nama, email, website, isi');
        $this->db->from('komentar');
        $this->db->where('idkomen', $idkomen);
        $query = $this->db->get();

        return $query->row();
    }

    function listkomenCount($searchText = '')
    {
        $this->db->select('idkomen, nama, email, website, isi');
        $this->db->from('komentar');
        if (!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%" . $searchText . "%'
                            OR  email  LIKE '%" . $searchText . "%'
                            OR  website  LIKE '%" . $searchText . "%'
                            OR  isi  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();

        return $query->num_rows();
    }
    function komen($searchText = '', $page, $segment)
    {
        $this->db->select('idkomen, nama, email, website, isi');
        $this->db->from('komentar');
        if (!empty($searchText)) {
            $likeCriteria = "(nama  LIKE '%" . $searchText . "%'
                            OR  email  LIKE '%" . $searchText . "%'
                            OR  website  LIKE '%" . $searchText . "%'
                            OR  isi  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('komentar.idkomen', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function deletekomen($id)
    {
        $this->db->where('idkomen', $id);
        $this->db->delete('komentar');
    }

    function deleteallkomen()
    {
        $this->db->empty_table('komentar');
    }

    function konten()
    {
        $query = $this->db->get('berita');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function komentar()
    {
        $query = $this->db->get('komentar');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function user()
    {
        $query = $this->db->get('tbl_users');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    function total_tags()
    {
        $query = $this->db->get('tags');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    function tags()
    {
        $this->db->order_by('idtag', 'DESC');
        $query = $this->db->get('tags');
        return $query->result_array();
    }
    function newuploadtag($tag)
    {
        $this->db->trans_start();
        $this->db->insert('tags', $tag);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function deletetag($id)
    {
        $this->db->where('idtag', $id);
        $this->db->delete('tags');
    }
    public function grafik()
    {
        $this->db->select('jenis,COUNT(jenis) as total');
        $this->db->group_by('jenis');
        $this->db->order_by('jenis', 'asc');
        $query = $this->db->get('berita');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}

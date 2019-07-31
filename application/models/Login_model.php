<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{

    function updateotp($otp, $email)
    {
        $this->db->set('otp', $otp);
        $this->db->where('email', $email);
        $this->db->update('tbl_users');
        return true;
    }

    function cekemail($email)
    {
        $this->db->select('email');
        $this->db->where('email', $email);
        $this->db->from('tbl_users');
        $query = $this->db->get();
        return $query->row();
    }

    function loginMe($email, $password, $otp)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.password, BaseTbl.otp, BaseTbl.name, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles', 'Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.otp', $otp);
        $this->db->where('BaseTbl.email', $email);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        $user = $query->row();

        if (!empty($user)) {
            if (verifyHashedPassword($password, $user->password)) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    function lastLogin($loginInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_last_login', $loginInfo);
        $this->db->trans_complete();
    }

    function lastLoginInfo($userId)
    {
        $this->db->select('BaseTbl.createdDtm');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_last_login as BaseTbl');

        return $query->row();
    }
}

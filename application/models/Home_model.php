<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_model
{
    public function getAllberita()
    {
        $this->db->order_by('idberita', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get('berita');
        return $query->result_array();
    }

    public function cariberita($cari)
    {
        $this->db->like('judul', $cari);
        $this->db->or_like('jenis', $cari);
        $this->db->or_like('isi', $cari);
        $this->db->order_by('idberita', 'Desc');
        return $this->db->get('berita')->result_array();
    }


    public function getblog()
    {
        $this->db->order_by('idberita', 'DESC');
        $query = $this->db->get('berita');
        return $query->result_array();
    }

    public function getberitaById($slug)
    {
        return $this->db->get_where('berita', ['slug' => $slug])->row_array();
    }

    public function bawah()
    {
        $this->db->order_by('idberita', 'RANDOM');
        $this->db->limit(6);
        $query = $this->db->get('berita');
        return $query->result_array();
    }
    public function komentar($komen)
    {
        $this->db->trans_start();
        $this->db->insert('komentar', $komen);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function samping()
    {
        $this->db->order_by('idberita', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get('berita');
        return $query->result_array();
    }

    public function getarsip()
    {
        $this->db->order_by('idberita', 'DESC');
        $query = $this->db->get('berita');
        return $query->result_array();
    }
    public function gettag()
    {
        $this->db->order_by('idtag', 'DESC');
        $query = $this->db->get('tags');
        return $query->result_array();
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
    public function getbytag($tag)
    {
        $this->db->order_by('idberita', 'DESC');
        $query = $this->db->get_where('berita', ['jenis' => $tag]);
        return $query->result_array();
    }
    public function getbytagbread($tag)
    {
        return $this->db->get_where('berita', ['jenis' => $tag])->row_array();
    }
}

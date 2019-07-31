<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data['judul'] = 'Nadoyo || Website yang membahas tentang dunia IT';
        $data['berita'] =  $this->Home_model->getAllberita();
        $data['tag'] = $this->Home_model->gettag();
        $this->load->view('Tempelate/header', $data);
        $this->load->view('Home/index', $data);
        $this->load->view('Tempelate/footer');
    }

    public function cariberita()
    {
        $cari = $this->security->xss_clean($this->input->get('cari'));
        $data['judul'] = 'Search || Nadoyo';
        $data['berita'] = $this->Home_model->cariberita($cari);
        $data['tag'] = $this->Home_model->gettag();
        $this->load->view('Tempelate/header', $data);
        $this->load->view('Home/cari', $data, "refresh");
        $this->load->view('Tempelate/footer');
    }

    public function blog()
    {
        $data['judul'] = 'Blog || Nadoyo';
        $data['berita'] =  $this->Home_model->getblog();
        $data['tag'] = $this->Home_model->gettag();
        $this->load->view('Tempelate/header', $data);
        $this->load->view('Home/blog', $data);
        $this->load->view('Tempelate/footer');
    }

    public function detail($slug)
    {
        $data['detailberita'] = $this->Home_model->getberitaById($slug);
        $data['beritasamping'] = $this->Home_model->samping();
        $data['tag'] = $this->Home_model->gettag();
        $data['beritabawah'] = $this->Home_model->bawah();
        $data['grafik'] = $this->Home_model->grafik();
        $this->load->view('tempelate/headerdetail', $data);
        $this->load->view('Home/detail', $data);
        $this->load->view('tempelate/footer');
    }

    public function sendkomen()
    {
        $komen = array(
            'nama' => ucwords(strtolower($this->security->xss_clean($this->input->post('nama')))),
            'email' => ucwords(strtolower($this->security->xss_clean($this->input->post('email')))),
            'website' => ucwords(strtolower($this->security->xss_clean($this->input->post('website')))),
            'isi' => ucwords(strtolower($this->security->xss_clean($this->input->post('isi'))))
        );
        $this->Home_model->komentar($komen);
    }

    public function arsip()
    {
        $data['judul'] = ' Arsip || Nadoyo ';
        $data['berita'] =  $this->Home_model->getarsip();
        $data['tag'] = $this->Home_model->gettag();
        $this->load->view('Tempelate/header', $data);
        $this->load->view('Home/arsip', $data);
        $this->load->view('Tempelate/footer');
    }

    public function about()
    {
        $data['judul'] = ' About || Nadoyo ';
        $data['berita'] =  $this->Home_model->getAllberita();
        $data['tag'] = $this->Home_model->gettag();
        $this->load->view('Tempelate/header', $data);
        $this->load->view('Home/about', $data);
        $this->load->view('Tempelate/footer');
    }

    public function kontak()
    {
        $data['judul'] = ' Kontak || Nadoyo ';
        $data['berita'] = $this->Home_model->bawah();
        $data['tag'] = $this->Home_model->gettag();
        $this->load->view('Tempelate/header', $data);
        $this->load->view('Home/Kontak', $data);
        $this->load->view('Tempelate/footer');
    }
    public function maintenance()
    {
        $this->load->view('Home/maintenance');
    }

    public function bytag($tag)
    {
        $data['beritatag'] = $this->Home_model->getbytag($tag);
        $data['beritabread'] = $this->Home_model->getbytagbread($tag);
        $data['tag'] = $this->Home_model->gettag();
        $data['judul'] = $tag . " || Nadoyo";
        $this->load->view('Tempelate/header', $data);
        $this->load->view('Home/tags', $data);
        $this->load->view('Tempelate/footer');
    }
    public function sitemap()
    {
        $this->load->database();
        $query = $this->db->get("berita");
        $data['beritasite'] = $query->result();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("Home/sitemap", $data);
    }
}

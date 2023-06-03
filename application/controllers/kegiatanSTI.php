<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatanSTI extends CI_Controller {
    //construct
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_KegiatanSTI');
        $this->load->library('form_validation');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewKegiatan(){
        $allKegiagatan = $this->M_KegiatanSTI->getKegiatanDetail(1);
        $data = array(
            'kegiatan' => $allKegiagatan,
            'title' => 'Kegiatan'
        );
        $this->load->view('admin/V_STI_Kegiatan', $data);
    }

    public function updateKegiatan(){
        $idKegiatan = $this->input->post('idKegiatanUPDATE');
        //if idKegiatan is null, redirect to viewKegiatan
        if($idKegiatan == null){
            redirect('kegiatanSTI/viewKegiatan');
        }
        
        $query = $this->M_KegiatanSTI->getKegiatanDetail($idKegiatan);
        $data = array(
            'kegiatan' => $query, 
            'title' => 'Update Kegiatan'
        );
        $this->load->view('admin/V_STI_UpdateKegiatan', $data);
    }

    public function updateKegiatanAction(){
        $this->form_validation->set_rules('judulKegiatan', 'Judul Kegiatan', 'required|trim',
            array(
                'required' => 'Judul Kegiatan harus diisi'
            )
        );
        $this->form_validation->set_rules('deskripsiKegiatan', 'Deskripsi Kegiatan', 'required|trim',
            array(
                'required' => 'Deskripsi Kegiatan harus diisi'
            )
        );
        $idKegiatan = $this->input->post('idKegiatan');
        $oldImage = $this->input->post('oldGambarKegiatan');

        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('message', validation_errors());
            redirect('kegiatanSTI/viewKegiatan');
        }
        else{
            $judulKegiatan = $this->input->post('judulKegiatan');
            $judulKegiatan = $this->security->xss_clean($judulKegiatan);
            $deskripsiKegiatan = $this->input->post('deskripsiKegiatan');
            //$tanggalKegiatan = $this->input->post('tanggalKegiatan');

            $config['upload_path'] = './assets/kegiatan/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = "kegiatan_".time();

            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambarKegiatan')){
                $gambarKegiatan = $this->upload->data('file_name');
                $gambarKegiatan = $this->security->xss_clean($gambarKegiatan);
                $arrayUpdate = array(
                    'judulKegiatan' => $judulKegiatan,
                    'deskripsiKegiatan' => $deskripsiKegiatan,
                    'gambarKegiatan' => $gambarKegiatan,
                    // 'tanggalKegiatan' => $tanggalKegiatan
                );
                //delete old image
                $path = './assets/kegiatan/' . $oldImage;
                unlink($path);

                $this->M_KegiatanSTI->updateKegiatan($idKegiatan, $arrayUpdate);
                $this->session->set_flashdata('message', 'Kegiatan berhasil diupdate');
                //back to controller viewKegiatan
                redirect('kegiatanSTI/viewKegiatan');
            }
            //if no update gambar
            else if($_FILES['gambarKegiatan']['name'] == ""){
                $arrayUpdate = array(
                    'judulKegiatan' => $judulKegiatan,
                    'deskripsiKegiatan' => $deskripsiKegiatan,
                    // 'tanggalKegiatan' => $tanggalKegiatan
                );
                $this->M_KegiatanSTI->updateKegiatan($idKegiatan, $arrayUpdate);
                $this->session->set_flashdata('message', 'Kegiatan berhasil diupdate');
                //back to controller viewKegiatan
                redirect('kegiatanSTI/viewKegiatan');
            }
            else{
                $this->session->set_flashdata('message', 'Kegiatan gagal diupdate');
                redirect('kegiatanSTI/updateKegiatan/'.$idKegiatan);
            }
        }
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_penyaluran extends CI_Model {
	public function tahunini(){
		$this->db->where('status','Aktif');
		$data = $this->db->get('tahunakademik')->row();
		return $data;
   }

   public function datapenyaluran(){
        $this->db->from('penyaluran')
        ->join('klien','klien.id_klien=penyaluran.id_klien');
        $this->db->order_by('tgl_disalurkan','asc');
        return $this->db->get();
    }

    public function dataklien(){
        return $this->db->query('select * from klien where not exists (select * from penyaluran where penyaluran.id_klien=klien.id_klien) and klien.status="aktif"');
    }

    public function tambahpenyaluran($data){
        return $this->db->insert('penyaluran',$data);
    }

    public function hapuspenyaluran($id_penyaluran){
        $data = array(
            'id_penyaluran' => $id_penyaluran
        );
        return $this->db->delete('penyaluran',$data);
    }
    public function editpenyaluran($id,$dt){
		return $this->db->update('penyaluran',$dt,$id);
    }
    
    public function editklien($id_klien,$status){
        $data= array ("status"=>$status);
        $this->db->where('id_klien',$id_klien);
        return $this->db->update('klien',$data);
    }

    public function cekpenyaluran($id_penyaluran){
		$this->db->where('id_penyaluran',$id_penyaluran);
		$data = $this->db->get('penyaluran');
		return $data ;
    }
  
}

?>
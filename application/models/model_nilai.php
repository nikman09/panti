<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_nilai extends CI_Model {
	public function tahunini(){
		$this->db->where('status','Aktif');
		$data = $this->db->get('tahunakademik')->row();
		return $data;
   }

   public function datapelajaran(){
        $tahunini = $this->tahunini()->id_tahunakademik;
        $this->db->select('rombel.rombel,mapel,rombel.kelas,probi.probi,jadwal.id_rombel,jadwal.kd_mapel');
        $this->db->from('jadwal');
        $this->db->join('mapel','mapel.kd_mp = jadwal.kd_mapel');
        $this->db->join('instruktur','instruktur.id_instruktur = jadwal.id_instruktur');
        $this->db->join('rombel ','rombel.id_rombel = jadwal.id_rombel');
        $this->db->join('probi ','probi.kd_probi = rombel.kd_probi');
        $this->db->where('jadwal.id_tahunakademik',$tahunini);
        $this->db->group_by('jadwal.id_rombel');
        $this->db->group_by('jadwal.kd_mapel');
        $data = $this->db->get();
        return $data;
    }

    public function datapelajaraninstruktur($id_instruktur){
        $tahunini = $this->tahunini()->id_tahunakademik;
        $this->db->select('rombel.rombel,mapel,rombel.kelas,probi.probi,jadwal.id_rombel,jadwal.kd_mapel');
        $this->db->from('jadwal');
        $this->db->join('mapel','mapel.kd_mp = jadwal.kd_mapel');
        $this->db->join('instruktur','instruktur.id_instruktur = jadwal.id_instruktur');
        $this->db->join('rombel ','rombel.id_rombel = jadwal.id_rombel');
        $this->db->join('probi ','probi.kd_probi = rombel.kd_probi');
        $this->db->where('jadwal.id_tahunakademik',$tahunini);
        $this->db->where('jadwal.id_instruktur',$id_instruktur);
        $this->db->group_by('jadwal.id_rombel');
        $this->db->group_by('jadwal.kd_mapel');
        $this->db->group_by('jadwal.id_instruktur');
        $data = $this->db->get();
        return $data;
    }

    public function dataklien($id_rombel,$kd_mapel){
        $tahunini = $this->tahunini()->id_tahunakademik;
        return $this->db->query(
            "SELECT 
                    penentuan_rombel.id_klien,
                    nilai.id_nilai, 
                    penentuan_rombel.id_rombel, 
                    rombel.rombel, 
                    klien.nama_klien, 
                    klien.nir, 
                    jadwalmapel.mapel, 
                    nilai.nilai 
            FROM 
                    `penentuan_rombel` 
            INNER JOIN 
                    rombel 
                     on rombel.id_rombel=penentuan_rombel.id_rombel 
            INNER JOIN 
                     klien 
                     on klien.id_klien = penentuan_rombel.id_klien 
            
            inner join 
                    (select * from jadwal  inner join
                    mapel on mapel.kd_mp = jadwal.kd_mapel where jadwal.`id_tahunakademik`='$tahunini' and jadwal.`id_rombel`='$id_rombel' and jadwal.`kd_mapel`='$kd_mapel' group by kd_mapel, id_rombel) as jadwalmapel 
                     on jadwalmapel.id_rombel = penentuan_rombel.id_rombel 
            left join 
                    (select * from nilai  where id_tahunakademik='$tahunini' and kd_mp='$kd_mapel' ) as nilai 
                     on nilai.id_klien=penentuan_rombel.id_klien 
            where 
                penentuan_rombel.id_tahunakademik='$tahunini' and penentuan_rombel.id_rombel='$id_rombel' and jadwalmapel.kd_mapel='$kd_mapel' ");
    }

    public function dataklienada($id_rombel,$kd_mapel){
        $tahunini = $this->tahunini()->id_tahunakademik;
        return $this->db->query("SELECT penentuan_rombel.id_klien,  penentuan_rombel.id_rombel, rombel.rombel, klien.nama_klien, klien.nir, jadwalmapel.mapel, jadwalmapel.kd_mapel FROM `penentuan_rombel` INNER JOIN rombel on rombel.id_rombel=penentuan_rombel.id_rombel INNER JOIN klien on klien.id_klien = penentuan_rombel.id_klien inner join (select kd_mapel, mapel, jadwal.id_rombel from jadwal inner join  mapel on mapel.kd_mp = jadwal.kd_mapel group by jadwal.id_rombel,  jadwal.kd_mapel) as jadwalmapel on jadwalmapel.id_rombel = penentuan_rombel.id_rombel where penentuan_rombel.id_tahunakademik='$tahunini' and penentuan_rombel.id_rombel='$id_rombel' and jadwalmapel.kd_mapel='$kd_mapel' and not exists (select * from nilai where nilai.id_rombel=penentuan_rombel.id_rombel and nilai.id_klien=penentuan_rombel.id_klien and nilai.kd_mp=jadwalmapel.kd_mapel  and nilai.id_tahunakademik='$tahunini' )");
    }


    public function ambilmapel($kd_mp){
        $this->db->where('kd_mp',$kd_mp);
        $data = $this->db->get('mapel');
        return $data->row();
        }

    public function tambahnilai($data){
        return $this->db->insert('nilai',$data);
    }
    public function hapusnilai($id_nilai){
        $data = array(
            'id_nilai' => $id_nilai
        );
        return $this->db->delete('nilai',$data);
    }
    public function ceknilai($id_nilai){

		$this->db->where('id_nilai',$id_nilai);
		$data = $this->db->get('nilai');
		return $data ;
    }
    
    public function editnilai($id,$dt){
		return $this->db->update('nilai',$dt,$id);
	}

}

?>
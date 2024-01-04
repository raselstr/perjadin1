<?php

namespace App\Models;

use CodeIgniter\Model;

class SpjHotelModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'spjhotels';
    protected $primaryKey       = 'spjhotel_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'spjhotel_pelaksanaid',
        'spjhotel_nama',
        'spjhotel_nokamar',
        'spjhotel_typekamar',
        'spjhotel_checkin',
        'spjhotel_checkout',
        'spjhotel_hargatotal',
        'spjhotel_bill',
        'spjhotel_verif',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'spjhotel_created_at';
    protected $updatedField  = 'spjhotel_updated_at';
    protected $deletedField  = 'spjhotel_deleted_at';

    // Validation
    protected $validationRules      = [
        'spjhotel_pelaksanaid' => 'required',
        'spjhotel_nama' => 'required',
        'spjhotel_nokamar' => 'required',
        'spjhotel_typekamar' => 'required',
        'spjhotel_checkin' => 'required|valid_date[]',
        'spjhotel_checkout' => 'required|valid_date[]',
        'spjhotel_hargatotal' => 'required',
        'spjhotel_bill' => 'required',
        'spjhotel_verif' => 'required',
    ];
    protected $validationMessages   = [
        'spjhotel_nama'      => [
            'required' => 'Jenis SPJ Hotel Wajib di Pilih !!!'
        ],
        'spjhotel_nokamar'      => [
            'required' => 'Maskapai Hotel Wajib di Isi !!!'
        ],
        'spjhotel_typekamar'      => [
            'required' => 'Nomor Tiket Hotel Wajib di Isi !!!'
        ],
        'spjhotel_checkin'      => [
            'required' => 'Kode Boking Hotel Wajib di Isi !!!',
            'valid_date' => 'Tanggal harus Valid !!'
        ],
        'spjhotel_checkout'      => [
            'required' => 'Tanggal Wajib di Pilih !!!',
            'valid_date' => 'Tanggal harus Valid !!'
        ],
        'spjhotel_hargatotal'      => [
            'required' => 'Keberangkatan Hotel dari Bandahara mana Wajib di Isi !!!'
        ],
        
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



    function pelaksanaall()
    {
        // dd($subquery);
        $builder = $this->db->table('pelaksanas');
        $builder->select('*');
        $builder->join('spts','spts.spt_id = pelaksanas.spt_id');
        $builder->join('pegawais','pegawais.pegawai_id = pelaksanas.pegawai_id');
        $builder->join('pejabats','pejabats.pejabat_id = spts.spt_pjb_tugas');
        $builder->join('pangkats','pangkats.pangkat_id = pegawais.pangkat_id');
        $builder->join('lokasiperjadins','lokasiperjadins.lokasiperjadin_id = spts.spt_tujuan');
        $builder -> where('spts.spt_verif', 1);
        $query = $builder->get();
        return $query->getResult();
    }
    
    function hotelidpelaksana($id)
    {
        $builder = $this->db->table('spjhotels As a');
        $builder -> select('a.*, b.pelaksana_id, c.spt_id, c.spt_nomor, c.spt_tgl, c.spt_mulai, c.spt_berakhir, c.spt_tempat,d.pegawai_nama, d.pegawai_nip,d.pegawai_id, c.spt_uraian');
        $builder -> join('pelaksanas As b', 'b.pelaksana_id = a.spjhotel_pelaksanaid', 'RIGHT');
        $builder -> join('spts As c', 'c.spt_id = b.spt_id');
        $builder -> join('pegawais As d', 'd.pegawai_id = b.pegawai_id');
        $builder -> where('c.spt_verif', 1);
        $builder -> where('b.pelaksana_id', $id);
        $builder -> orderBy('a.spjhotel_created_at', 'DESC');
        
        $query = $builder -> get();
        $result = $query->getResult();
            

        return $result;
    }
}

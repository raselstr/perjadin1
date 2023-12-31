<?php

namespace App\Controllers;

use App\Models\SpjhotelModel;
use App\Models\SpjPesawatModel;
use CodeIgniter\RESTful\ResourcePresenter;

class SpjPesawat extends ResourcePresenter
{
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $model = new SpjPesawatModel();
        $spjpesawat = $model->spjpesawat();
        $data = [
            'title'     => 'Pertanggung Jawaban Pesawat',
            'subtitle'  => 'Home',
            'spjpesawat'  => $spjpesawat,
                       
        ];
        // dd($data);
        return view('pesawat/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
       
        //
    }

    // public function new1()
    // {
    //     if($this->request->isAJAX()){
    //         $idPelaksana = $this->request->getPost('id_pelaksana');
    //         $data = [
    //             'title'     => 'Tiket Pesawat',
    //             'subtitle'  => 'Home',
    //             'spjpesawat'  => $idPelaksana,
                        
    //         ];
    //         // dd($data);
    //         return view('pesawat/spjpesawat', $data);
    //     }
    // }

    
    public function formspj($id)
    {
        $model = new SpjPesawatModel();
        $pesawatidpelaksana = $model->pesawatidpelaksana($id);
        $data = [
            'title'     => 'Form Tiket Pesawat',
            'subtitle'  => 'Home',
            'data'      => $pesawatidpelaksana,
                    
        ];
        // dd($data);
        return view('pesawat/spjpesawat', $data);
        
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        
        
        $spjpesawat = new SpjPesawatModel();
        $data = $this->request->getPost();
        
        $save = $spjpesawat->save($data);
        if($save){
            $ket = [
                    'error' => false,
                    'message' => 'Data Berhasil',
                ];
            return $this->response->setJSON($ket);
        } else {
            $validationerror = [
                'error'     => true,
                'message'   => $spjpesawat->errors(),
            ];
            return $this->response->setJSON($validationerror);
        };
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $spjpesawat = new SpjPesawatModel();
        $data = $spjpesawat->find($id);
        return $this->response->setJSON($data);
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        $spjpesawat = new SpjPesawatModel();
        $data = $spjpesawat->delete($id);
        return $this->response->setJSON($data);
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}

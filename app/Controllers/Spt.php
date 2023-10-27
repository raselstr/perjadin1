<?php

namespace App\Controllers;

use App\Models\SptModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Spt extends ResourcePresenter
{
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $spt = new SptModel();
        $dataspt = $spt->findAll();
        $data = [
            'title'     => 'Surat Perintah Tugas',
            'subtitle'  => 'Home',
            'spt'       => $dataspt,
        ];
        return view('spt/index', $data);
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
        $spt = new SptModel();
        $dataspt = $spt->findAll();
        $data = [
            'title'     => 'Surat Perintah Tugas',
            'subtitle'  => 'Home',
            'spt'       => $dataspt,
        ];
        return view('spt/tambahspt', $data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $spt = new SptModel();
        $data = $this->request->getPost();

        $save = $spt->save($data);
        if ($save){
            return redirect()->to(site_url('spt'))->with('info','Data Berhasil di Simpan');
        } else {
            return redirect()->back()->withInput()->with('validation', $spt->errors());
        }
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
        //
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
        //
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
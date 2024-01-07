<?php

namespace App\Controllers;

use App\Models\LaporjadinModel;
use App\Models\SptModel;
use CodeIgniter\RESTful\ResourcePresenter;

class LaporJadin extends ResourcePresenter
{
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $model = new LaporjadinModel();
        $query = $model->dataspt();
        $data = [
            'title' => 'Laporan Kegiatan Perjalanan Dinas',
            'subtitle' => 'Home',
            'data' => $query,
        ];
        // dd($data);
        return view('laporperjadin/index', $data);

    }

    public function form($id=null)
    {
        $model = new LaporjadinModel();
        $query = $model->datasptid($id);

        $data = [
            'title' => 'Laporanan Perjalanan Dinas',
            'subtitle' => 'Home',
            'data'  => $query,
        ];
        // dd($data);
        return view('laporperjadin/spjlapor', $data);

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

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $model = new LaporjadinModel();
        $post = $this->request->getPost();
        $save = $model->save($post);
            // dd($model->errors());
            if ($save) {
                return redirect()->to(site_url('laporjadin'))->with('info', 'Data Berhasil di Simpan');
            } else {
                return redirect()->back()->withInput()->with('validation', $model->errors());
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

<?php

namespace App\Controllers;

use App\Models\PegawaisModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Pegawai extends ResourcePresenter
{
    protected $helpers = ['form'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    function __construct()
    {
       
        
    }
    public function index()
    {

         $pegawais = new PegawaisModel();
         $datapegawais = $pegawais->findAll();
         $data = [
            'title' => 'Daftar Pegawai',
            'subtitle' => 'Home',
            'pegawais' => $datapegawais,
        ];
        // dd($data);
        return view('pegawai/index', $data);
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
        $pegawais = new PegawaisModel();
        $datapegawais = $pegawais->findAll();
        $data = [
            'title' => 'Tambah Pegawai',
            'subtitle' => 'Home',
            'pegawais' => $datapegawais,
        ];
        // dd($data);
        return view('pegawai/tambahpegawai', $data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
       $pegawais = new PegawaisModel();
       $peg = $this->request->getPost();  
       $save = $pegawais->save($peg);

       if ($save){
        session()->setFlashdata(['info' => 'success','message'=>'Sukses disimpan']);
        return redirect()->back();
       } else {
        dd($pegawais->errors());
       }
    //    dd($save);
    //    dd($peg);   
       
    //    $validrule = $pegawais->getValidationRules();
    //    $validpesan = $pegawais->getValidationMessages();
    //    $valid = $this->validateData($validrule,$validpesan);
    //    if (save)
        
    //    $error = $pegawais->set
    //    if (!$this->validateData($validrule,$validpesan)){
        
    //         return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
    //    } else {
    //        return redirect()->back();
    //    }
        
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
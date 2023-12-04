<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Spjpesawat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'spjpesawat_id'         => [
                'type'              => 'BIGINT',
                'constraint'         => 20,
                'unsigned'          => true,
                'auto_incremen'     => true, 
            ],   
            'spjpesawat_pelaksanaid' => [
                'type'              => 'INT',
                'unsigned'          => true,
            ],
            'spjpesawat_jenis'      => [
                'type'              => 'VARCHAR',
                'constraint'         => 15,
            ],
            'spjpesawat_maskapai'   => [
                'type'              => 'VARCHAR',
                'constraint'         => 20,
            ],
            'spjpesawat_notiket'    => [
                'type'              => 'VARCHAR',
                'constraint'         => 20,
            ],
            'spjpesawat_kdboking'   => [
                'type'              => 'VARCHAR',
                'constraint'         => 20,
            ],
            'spjpesawat_tgl'        => [
                'type'              => 'date',
            ],
            'spjpesawat_harga'      => [
                'type'              => 'DOUBLE',
            ],
            'spjpesawat_verif'      => [
                'type'              => 'INT',
            ],
            'spjpesawat_created_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'spjpesawat_updated_at' =>[
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'spjpesawat_deleted_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);
        $this->forge->addKey('spjpesawat_id', true);
        $this->forge->addForeignKey('spjpesawat_id','pelaksanas','pelaksana_id','CASCADE','CASCADE','FKspjpesawatpelaksanaid');

        $this->forge->createTable('spjpesawats');
    }

    public function down()
    {
        $this->forge->dropForeignKey('spjpesawats','FKspjpesawatpelaksanaid');

        $this->forge->dropTable('spjpesawats');
    }
}

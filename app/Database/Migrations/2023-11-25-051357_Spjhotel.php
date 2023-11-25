<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Spjhotel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'hotel_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'hotel_idspt' => [
                'type'          => 'INT',
                'unsigned'       => true,
            ],
            'hotel_idpegawai' => [
                'type'          => 'INT',
                'unsigned'       => true,
            ],
            'hotel_file' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
             'hotel_created_at'        => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'hotel_updated_at'        => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'hotel_deleted_at'        => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            
        ]);
        $this->forge->addKey('hotel_id', true);
        $this->forge->addForeignKey('hotel_idspt','spts','spts.spt_id','CASCADE','CASCADE','FKspthotel');
        $this->forge->addForeignKey('hotel_idpegawai','pegawais','pegawais.pegawai_id','CASCADE','CASCADE','FKpegawaihotel');
        
        $this->forge->createTable('spjhotels');
    }

    public function down()
    {
        $this->forge->dropForeignKey('spjhotels','FKspthotel');
        $this->forge->dropForeignKey('spjhotels','FKpegawaihotel');

        $this->forge->dropTable('pejabats');
    }
}

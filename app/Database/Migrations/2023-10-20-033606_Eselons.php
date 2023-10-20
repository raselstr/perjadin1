<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Eselons extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'eselon_id' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'eselon_nama' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100'
            ],
             'created_at'        => [
                'type'          => 'TIMESTAMP',
                'default'       => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at'        => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'deleted_at'        => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
        ]);
        $this->forge->addKey('eselon_id', true);

        $this->forge->createTable('eselons');
    }

    public function down()
    {
        $this->forge->dropTable('eselons');
    }
}

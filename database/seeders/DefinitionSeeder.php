<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefinitionSeeder extends Seeder
{
    public function run(): void
    {
        $definitions = [
            ['term' => 'Cloud Computing', 'definition' => 'Model komputasi yang menyediakan akses on-demand ke resource komputasi melalui internet'],
            ['term' => 'Docker', 'definition' => 'Platform containerization untuk packaging dan deployment aplikasi'],
            ['term' => 'Kubernetes', 'definition' => 'Container orchestration platform untuk automated deployment dan scaling'],
            ['term' => 'IaaS', 'definition' => 'Infrastructure as a Service - layanan cloud yang menyediakan infrastruktur IT'],
            ['term' => 'PaaS', 'definition' => 'Platform as a Service - layanan cloud yang menyediakan platform development'],
            ['term' => 'SaaS', 'definition' => 'Software as a Service - software yang diakses via internet'],
            ['term' => 'Oracle Cloud', 'definition' => 'Platform cloud computing dari Oracle Corporation'],
            ['term' => 'Laravel', 'definition' => 'PHP web framework untuk web application development'],
            ['term' => 'API', 'definition' => 'Application Programming Interface - protokol komunikasi antar aplikasi'],
            ['term' => 'MySQL', 'definition' => 'Open-source relational database management system'],
            ['term' => 'Container', 'definition' => 'Unit software yang membungkus kode dan dependensinya'],
            ['term' => 'Microservices', 'definition' => 'Arsitektur aplikasi yang terdiri dari layanan-layanan kecil independen'],
            ['term' => 'DevOps', 'definition' => 'Praktik yang menggabungkan development dan operations untuk delivery yang cepat'],
            ['term' => 'CI/CD', 'definition' => 'Continuous Integration/Continuous Deployment - praktik otomasi build dan deploy'],
            ['term' => 'REST API', 'definition' => 'Architectural style untuk web services menggunakan HTTP methods'],
        ];

        foreach ($definitions as $def) {
            DB::table('definitions')->insert([
                'term' => $def['term'],
                'definition' => $def['definition'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

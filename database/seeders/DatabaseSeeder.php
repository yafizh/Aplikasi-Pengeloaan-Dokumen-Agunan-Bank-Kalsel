<?php

namespace Database\Seeders;

use App\Models\Lemari;
use App\Models\LemariDetail;
use App\Models\Pegawai;
use App\Models\Pengguna;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $lemari = [
            [
                'nama' => 'Lemari 1',
                'lokasi' => 'Lantai 1',
                'keterangan' => '-'
            ],
            [
                'nama' => 'Lemari 2',
                'lokasi' => 'Lantai 2',
                'keterangan' => '-'
            ],
            [
                'nama' => 'Lemari 3',
                'lokasi' => 'Lantai 3',
                'keterangan' => '-'
            ],
        ];
        foreach ($lemari as $item) {
            Lemari::create($item);
        }
        $huruf = ['A', 'B', 'C', 'D', 'E'];
        foreach ($lemari as $index => $item) {
            LemariDetail::create([
                'lemari_id' => $index + 1,
                'nomor' => '1' . $huruf[$index],
                'status' => 'Tersedia',
            ]);
            LemariDetail::create([
                'lemari_id' => $index + 1,
                'nomor' => '2' . $huruf[$index],
                'status' => 'Tersedia',
            ]);
            LemariDetail::create([
                'lemari_id' => $index + 1,
                'nomor' => '3' . $huruf[$index],
                'status' => 'Tersedia',
            ]);
            LemariDetail::create([
                'lemari_id' => $index + 1,
                'nomor' => '4' . $huruf[$index],
                'status' => 'Tersedia',
            ]);
            LemariDetail::create([
                'lemari_id' => $index + 1,
                'nomor' => '5' . $huruf[$index],
                'status' => 'Tersedia',
            ]);
        }

        Pengguna::create([
            'username' => 'admin',
            'password' => 'admin',
            'status' => 'Admin'
        ]);

        $pegawai = [
            [
                "nama" => "GT FEBRI RACHMATILLAH",
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '0864003134',
                'tanggal_lahir' => '1996-10-10',
                'alamat' => 'Psr. Agus Salim No. 620',
            ],
            [
                "nama" => "LULU AFIFAH",
                'jenis_kelamin' => 'Peremepuan',
                'nomor_telepon' => '08132380561',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => '',
            ],
            [
                "nama" => "DARU PRATAMA",
                'jenis_kelamin' => 'Laki - Laki',
                'nomor_telepon' => '08797019014',
                'tanggal_lahir' => '1986-09-26',
                'alamat' => 'Dk. Babadak No. 557',
            ],
            [
                "nama" => "ALNADIA",
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '08379476457',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => '',
            ],
            [
                "nama" => "Bachtiar",
                'jenis_kelamin' => 'Laki - Laki',
                'nomor_telepon' => '08605803450',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => '',
            ],
            [
                "nama" => "DINA ANGGRAINI",
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '0822572958',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => '',
            ],
            [
                "nama" => "NURUL FITRIAH",
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '08205720809',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => '',
            ],
            [
                "nama" => "MELLY",
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '0894410658393',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => '',
            ],
            [
                "nama" => "RAHMI ROBIATY",
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '08581746425',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => '',
            ],
            [
                "nama" => "GANI FAUZI",
                'jenis_kelamin' => 'Laki - Laki',
                'nomor_telepon' => '089556748780',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => '',
            ],
            [
                "nama" => "REZKI AULIA RAHMAH",
                'jenis_kelamin' => 'Perempuan',
                'nomor_telepon' => '0851228536',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => '',
            ],
        ];

        foreach ($pegawai as $item) {
            Pegawai::create([
                'nama' => $item['nama'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'nomor_telepon' => $item['nomor_telepon'],
                'tanggal_lahir' => $item['tanggal_lahir'],
                'alamat' => $item['alamat'],
            ]);
        }
    }
}

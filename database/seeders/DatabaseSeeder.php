<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::unprepared("INSERT INTO `akses` (`id`, `nama`, `aksi`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'Group', 'Lihat', NULL, NULL, NULL), (2, 'Group', 'Tambah', NULL, NULL, NULL), (3, 'Group', 'Ubah', NULL, NULL, NULL), (4, 'Group', 'Hapus', NULL, NULL, NULL);");
        DB::unprepared("INSERT INTO `akses` (`id`, `nama`, `aksi`, `created_at`, `updated_at`, `deleted_at`) VALUES (5, 'User', 'Lihat', NULL, NULL, NULL), (6, 'User', 'Tambah', NULL, NULL, NULL), (7, 'User', 'Ubah', NULL, NULL, NULL), (8, 'User', 'Hapus', NULL, NULL, NULL);");

        DB:: unprepared("INSERT INTO `groups` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
        (1, 'Administrator', '2019-08-06 01:29:40', '2019-08-06 01:29:40', NULL),
        (2, 'Operator', '2019-08-06 01:29:41', '2019-08-06 01:29:41', NULL);");

        Group::find('1')->akses()->attach([1,2,3,4,5,6,7,8]);

        DB:: unprepared('INSERT INTO `users` (`id`, `group_id`, `nama`, `email`, `password`, `alamat`, `pekerjaan`, `jabatan`, `no_hp`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
        (1, 1, "Admin", "admin@admin.com", "$2y$10$dpfQEVJ3aVvUs5mMsWyOoe9yFDzD/kEhWSllU6l6ZEu4xL7qEoCkq", NULL, NULL, NULL, NULL, NULL, "2019-08-05 09:29:41", "2019-08-05 09:29:41", NULL);');
    }
}

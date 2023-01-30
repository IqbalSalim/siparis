<?php

namespace Database\Factories;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arsip>
 */
class ArsipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_1' => $this->faker->name(),
            'nama_2' => $this->faker->name(),
            'judul_akta' => 'Jual Beli Ini Itu',
            'no_akta' => '1234567',
            'tanggal_akta' => $this->faker->dateTimeThisYear('+12 months')->format('Y-m-d'),
            'jenis' => 'NOTARIS',
            'file_cover' => 'cover/cover/dSB1urtElFVpXOlwjhx1REAck4snW4EqUNpLSB5M.jpg',
            'file_isi' => 'files/llISYar4x0wJDvwpyRQygMuoFtL51EycpuXytExD.pdf',
        ];
    }
}

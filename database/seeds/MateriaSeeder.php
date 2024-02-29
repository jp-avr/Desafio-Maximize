<?php

use App\Models\Materia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = file_get_contents(public_path('img\bmw.png')); // Substitua 'sample.jpg' pelo nome do seu arquivo de imagem
        $imageName = 'bmw.png'; // Nome da imagem a ser armazenada

        Storage::disk('public')->put('imagens/' . $imageName, $image);

        Materia::create([
            'materia_titulo' => 'Titulo1',
            'materia_descricao' => 'Descrição1',
            'materia_imagem' => 'imagens/' . $imageName,
            'materia_data_publicacao' => '2024-02-29',
            'materia_texto_completo' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore illum neque illo dolor harum! Perspiciatis aut hic sunt officia iure autem doloribus possimus architecto ratione eius, nihil dolores, debitis fuga.,'
        ]);

        $image = file_get_contents(public_path('img\ford_ka_sedan_1_0.png')); // Substitua 'sample.jpg' pelo nome do seu arquivo de imagem
        $imageName = 'ford_ka_sedan.png'; // Nome da imagem a ser armazenada
        Storage::disk('public')->put('imagens/' . $imageName, $image);

        Materia::create([
            'materia_titulo' => 'Titulo2',
            'materia_descricao' => 'Descrição2',
            'materia_imagem' => 'imagens/' . $imageName,
            'materia_data_publicacao' => '2024-02-29',
            'materia_texto_completo' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore illum neque illo dolor harum! Perspiciatis aut hic sunt officia iure autem doloribus possimus architecto ratione eius, nihil dolores, debitis fuga.,'
        ]);

        $image = file_get_contents(public_path('img\hyundai_hb20_1_0.png')); // Substitua 'sample.jpg' pelo nome do seu arquivo de imagem
        $imageName = 'hyundai_hb20.png'; // Nome da imagem a ser armazenada

        Storage::disk('public')->put('imagens/' . $imageName, $image);

        Materia::create([
            'materia_titulo' => 'Titulo3',
            'materia_descricao' => 'Descrição3',
            'materia_imagem' => 'imagens/' . $imageName,
            'materia_data_publicacao' => '2024-02-29',
            'materia_texto_completo' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore illum neque illo dolor harum! Perspiciatis aut hic sunt officia iure autem doloribus possimus architecto ratione eius, nihil dolores, debitis fuga.,'
        ]);
    }
}

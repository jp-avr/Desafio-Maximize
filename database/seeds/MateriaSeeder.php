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
        $image = file_get_contents(public_path('img/cachorro.png')); // Substitua 'sample.jpg' pelo nome do seu arquivo de imagem
        $imageName = 'cachorro.png'; // Nome da imagem a ser armazenada

        Storage::disk('public')->put('imagens/' . $imageName, $image);

        Materia::create([
            'materia_titulo' => 'Resgate de cães',
            'materia_descricao' => 'Após denúncia, cães abandonados são resgatados de dentro de casa em São Luís',
            'materia_imagem' => 'imagens/' . $imageName,
            'materia_data_publicacao' => '2024-02-29',
            'materia_texto_completo' => 'Após uma denúncia, feita por vizinhos, três cães dos 20 cães que viviam dentro de uma casa situada no bairro Anjo da Guarda, em São Luís, foram resgatados nessa quarta-feira (2) por uma equipe da Vigilância Sanitária da capital. O resgate foi realizado após a tutora deles, uma idosa de 72 anos, ter sido hospitalizada. Segundo a atendente de lanchonete, Yara Cristina Brito Gomes, a idosa mora sozinha com os animais e depois de ser mordida por um deles foi levada para um hospital onde está internada há 10 dias. “Ela foi mordida por um cachorro dela mesma, onde ele veio a chegar a morder e quebrou o dedo dela. Aí ela foi fazendo curativo, mas infeccionou e hoje ela se encontra internada”.'
        ]);

        $image = file_get_contents(public_path('img/veterinario.jpg')); // Substitua 'sample.jpg' pelo nome do seu arquivo de imagem
        $imageName = 'veterinario.jpg'; // Nome da imagem a ser armazenada
        Storage::disk('public')->put('imagens/' . $imageName, $image);

        Materia::create([
            'materia_titulo' => 'Estudo sobre Leptospirose na Ilha',
            'materia_descricao' => 'Pesquisadores do Hospital Veterinário da UEMA realizam estudo sobre Leptospirose na Ilha.',
            'materia_imagem' => 'imagens/' . $imageName,
            'materia_data_publicacao' => '2023-01-13',
            'materia_texto_completo' => 'Um importante estudo desenvolvido no Hospital Veterinário da Universidade Estadual do Maranhão (UEMA) atesta a incidência de Cães e Gatos contaminados por Leptospirose, principalmente nos períodos chuvosos, na Ilha de São Luís. O estudo, que tem a coordenação da professora Lenka de Morais Lacerda, do departamento de Patologia, do Curso de Medicina Veterinária da UEMA, conta com a participação do co-autor do projeto, Hamilton Santos, da aluna bolsista, Anny Gabrielly e do aluno voluntário, Marcos Lacerda. A leptospirose é uma doença infecciosa, com sintomas de mucosas amareladas (icterícia), vômito, febre, urina concentrada, apatia e falta de apetite. É potencialmente grave, causada por uma bactéria chamada Leptospira. Embora seja considerada uma zoonose, ou seja, uma doença de animais, essa infecção afeta também o homem, que se contamina, sobretudo, por meio do contato com a urina ou sangue de animais infectados. '
        ]);

        $image = file_get_contents(public_path('img/acao.jpg')); // Substitua 'sample.jpg' pelo nome do seu arquivo de imagem
        $imageName = 'acao.jpg'; // Nome da imagem a ser armazenada

        Storage::disk('public')->put('imagens/' . $imageName, $image);

        Materia::create([
            'materia_titulo' => 'Serviços de saúde para cães e gatos',
            'materia_descricao' => 'A Secretaria de Estado da Saúde (SES) leva a última edição do Mais Saúde Animal para o bairro da Vila Embratel, em São Luís, neste sábado (10).',
            'materia_imagem' => 'imagens/' . $imageName,
            'materia_data_publicacao' => '2023-11-27',
            'materia_texto_completo' => 'Os tutores poderão levar cães e gatos para a ação que acontece no Centro de Ensino Educa Mais Dayse Galvão de Sousa para vacinação antirrábica, triagem de doenças, consultas com médicos veterinários. Para o atendimento especializado, serão ofertadas senhas limitadas por ordem de chegada. Durante a consulta, os animais passarão por testagem rápida para diagnóstico da leishmaniose (calazar). Os pets com resultado negativo receberão coleiras preventivas, que funcionam como repelente do mosquito transmissor da doença.'
        ]);
    }
}

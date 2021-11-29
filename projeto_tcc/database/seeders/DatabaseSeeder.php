<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Calendario;
use App\Models\CalendarioItem;
use App\Models\Consultorio;
use App\Models\ConsultorioHorario;
use App\Models\Endereco;
use App\Models\Especialidade;
use App\Models\Medico;
use App\Models\MedicoConsultorio;
use App\Models\MedicoEspecialidade;
use App\Models\User;
use App\Models\UsuarioMedicoConsultorio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $this->call(EstadoSeeder::class);
        $this->call(CidadeSeeder::class);

        User::create([
            'usunome' => 'Raimundo Lima',
            'usucpf' => '939.774.759-24',
            'usudatanascimento' => '15/01/1985',
            'email' => 'rraimundosamuelcauelima@iega.com.br',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'usunome' => 'Fábio Gonçalves',
            'usucpf' => '754.003.899-37',
            'usudatanascimento' => '19/06/1956',
            'email' => 'fabiolucasdanilogoncalves-90@zk.arq.br',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'usunome' => 'Enzo Cardoso',
            'usucpf' => '167.003.279-54',
            'usudatanascimento' => '04/01/1983',
            'email' => 'enzoandrediogocardoso_@nogueiramoura.adv.br',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'usunome' => 'Marcos da Paz',
            'usucpf' => '165.764.089-27',
            'usudatanascimento' => '02/05/1975',
            'email' => 'marcosviniciusluandapaz-74@zipmail.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'usunome' => 'Geraldo Yago da Rosa',
            'usucpf' => '480.401.889-11',
            'usudatanascimento' => '25/02/1953',
            'email' => 'geraldoyagodarosa-85@alliancarh.com.br',
            'password' => Hash::make('12345678')
        ]);

        Medico::create([
            'medregistro' => '174786',
            'usucodigo' => 1
        ]);

        Medico::create([
            'medregistro' => '132036',
            'usucodigo' => 2
        ]);

        Especialidade::create([
            'espnome' => 'Clínico Geral'
        ]);

        Especialidade::create([
            'espnome' => 'Dermatologista'
        ]);

        MedicoEspecialidade::create([
            'medcodigo' => 1,
            'espcodigo' => 1
        ]);

        MedicoEspecialidade::create([
            'medcodigo' => 2,
            'espcodigo' => 1
        ]);

        MedicoEspecialidade::create([
            'medcodigo' => 2,
            'espcodigo' => 2
        ]);

        Calendario::create([
            'calano' => 2021,
            'calativo' => 1
        ]);

        CalendarioItem::create([
            'calcodigo' => 1,
            'caidata' => '29/11/2021'
        ]);

        CalendarioItem::create([
            'calcodigo' => 1,
            'caidata' => '30/11/2021'
        ]);

        CalendarioItem::create([
            'calcodigo' => 1,
            'caidata' => '01/12/2021'
        ]);

        CalendarioItem::create([
            'calcodigo' => 1,
            'caidata' => '02/12/2021'
        ]);

        CalendarioItem::create([
            'calcodigo' => 1,
            'caidata' => '03/12/2021'
        ]);

        Endereco::create([
            'endlogradouro' => 'Rua Vila Inconfidência, Jardim América',
            'endnumero' => '54',
            'endcomplemento' => 'Ao lado da padaria',
            'cidcodigo' => 4526
        ]);

        Endereco::create([
            'endlogradouro' => 'Rua Onze de Março, Centro',
            'endnumero' => '104',
            'endcomplemento' => 'Ao lado da Ponte',
            'cidcodigo' => 4417
        ]);

        Consultorio::create([
            'condescricao' => 'Clínica Geral',
            'conativo' => 1,
            'endcodigo' => 1
        ]);

        Consultorio::create([
            'condescricao' => 'Clínica de Dermatologia',
            'conativo' => 1,
            'endcodigo' => 2
        ]);

        ConsultorioHorario::create([
            'concodigo' => 1,
            'cohhorainicio' => '08:00:00',
            'cohhorafim' => '09:00:00',
            'cohtipo' => 1
        ]);

        ConsultorioHorario::create([
            'concodigo' => 1,
            'cohhorainicio' => '09:00:00',
            'cohhorafim' => '10:00:00',
            'cohtipo' => 1
        ]);

        ConsultorioHorario::create([
            'concodigo' => 1,
            'cohhorainicio' => '10:00:00',
            'cohhorafim' => '11:00:00',
            'cohtipo' => 1
        ]);

        ConsultorioHorario::create([
            'concodigo' => 2,
            'cohhorainicio' => '14:00:00',
            'cohhorafim' => '15:00:00',
            'cohtipo' => 1
        ]);

        ConsultorioHorario::create([
            'concodigo' => 2,
            'cohhorainicio' => '15:00:00',
            'cohhorafim' => '16:00:00',
            'cohtipo' => 1
        ]);

        ConsultorioHorario::create([
            'concodigo' => 2,
            'cohhorainicio' => '16:00:00',
            'cohhorafim' => '17:00:00',
            'cohtipo' => 1
        ]);

        MedicoConsultorio::create([
            'concodigo' => 1,
            'medcodigo' => 1
        ]);

        MedicoConsultorio::create([
            'concodigo' => 1,
            'medcodigo' => 2
        ]);

        MedicoConsultorio::create([
            'concodigo' => 2,
            'medcodigo' => 2
        ]);

        UsuarioMedicoConsultorio::create([
            'usucodigo' => 3,
            'meccodigo' => 1
        ]);

        UsuarioMedicoConsultorio::create([
            'usucodigo' => 3,
            'meccodigo' => 2
        ]);


    }
}

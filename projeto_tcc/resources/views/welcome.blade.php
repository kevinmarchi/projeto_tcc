@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Catálogo de Médicos</h1>
        <p>Catálogo de médicos líder no agendamento de consultas e avaliações de médicos.</p>
        <p>
            Estamos no mercado há 1 ano, sempre oferecendo um produto com a melhor experiência possível para todos os nossos clientes,
            desenvolvendo com preocupação para que tudo funcione corretamente e de forma rápida, facilitando assim a vida de toda à população.
        </p>
        <p><a class="btn btn-primary btn-lg" href="#avaliacoes" role="button">Confira as avaliações! &raquo;</a></p>
    </div>
</div>

<div class="container">

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Agendamento de Consultas</h2>
            <p class="lead">
                Nosso sistema permite um agendamento extremamente eficiente de consultas, basta fazer o cadastro no site
                e todos os médicos cadastrados para uma determinada cidade serão listados, após isso é só escolher o profissional,
                um horário disponível e pronto, sua consulta está marcada.
            </p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="img/agendamento.jpg" alt="Cesta com vários pães dentro">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Sistema de Avaliação</h2>
            <p class="lead">
                Após a efetivação de uma consulta, será disponibilizado para todos os usuários um sistema de avaliação,
                assim é possível ranquear os profissionais de uma determinada cidade, facilitando portanto a escolha do profissional mais adequado.
            </p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="img/sistema_avaliacao.jpg" alt="Cesta com vários pastéis dentro">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Gestão de agendas</h2>
            <p class="lead">
                O sistema permite que os consultórios tenham equipes que façam a gestão das agendas dos médicos, possibilitando
                uma maior produtividade ao profissional.
            </p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="img/gestao.jpg" alt="Bandeja com várias coxinhas dentro">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Confiabilidade</h2>
            <p class="lead">
                Com a utilização do sistema, será minimizado o agendamento de consultas erradas ou que o paciente não possa comparecer na determinada data,
                pois o cancelamento das consultas pode ser feito de maneira totalmente transparente e rápida, flexibilizando a agenda do profissional em tempo real.
            </p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="img/confiabilidade.jpg" alt="Pão com mortadela">
        </div>
    </div>

    <hr class="featurette-divider">

    <section id="avaliacoes" class="reviews container">
        <h1 class="mb-3">Avaliações</h1>
        <div class="row">
            <div class="media col-md-6">
                <img class="mr-3" src="img/avaliacao.png" alt="Imagem Roberto Ford">
                <div class="media-body">
                    <h2 class="h5">Roberto Ford</h2>
                    <p>
                        Experiência incrível, o sistema funciona de maneira simples e muito rápida.
                    </p>
                </div>
            </div>
            <div class="media col-md-6">
                <img class="mr-3" src="img/avaliacao.png" alt="imagem Arnold Veber">
                <div class="media-body">
                    <h2 class="h5">Arnold Veber</h2>
                    <p>
                        O MELHOR SOFTWARE DE AGENDAMENTO! Marquei diversas consultas pelo sistema, e nunca tive nenhum tipo de problema,
                        não vejo a hora de precisar ir no médico novamente!
                    </p>
                </div>
            </div>
            <div class="media col-md-6">
                <img class="mr-3" src="img/avaliacao.png" alt="Imagem Antônio Hopinz">
                <div class="media-body">
                    <h2 class="h5">Antônio Hopinz</h2>
                    <p>
                        Consegui poupar muito tempo em busca de um médico, como todos são listados por especialidade o sistema
                        facilita em muito nossas vidas.
                    </p>
                </div>
            </div>
            <div class="media col-md-6">
                <img class="mr-3" src="img/avaliacao.png" alt="Imagem Rasmus Lerdorf">
                <div class="media-body">
                    <h2 class="h5">Rasmus Lerdorf</h2>
                    <p>
                        Bom.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <hr class="featurette-divider">

</div>

@endsection

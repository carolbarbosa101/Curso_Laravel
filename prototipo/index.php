<?php

class Usuario{
  public $id;
  public $nome;
  public $email;
  public $senha;
}

class Bolao{
  public $id;
  public $usuario_id; // id do gerenciador do Bolão
  public $titulo;
  public $rodadaAtual = 0; //vai incrementar a cada rodada
  public $pontosResultado = 10;
  public $pontosExtras = 5;
  public $pontosTaxa = 5;
}

class Rodada{
  public $id;
  public $bolao_id;
  public $titulo;
  public $dataIni;
  public $dataFim;
}

class Partida{
  public $id;
  public $rodada_id;
  public $titulo;
  public $estadio;
  public $timeA;
  public $timeB;
  public $resultado; // (A,B,E) E = empate.
  public $placarTimeA; // placar time A
  public $placarTimeB;// placar time B
  public $data;
}

// relaciona usuário que podem apostar no bolão
class BolaoUsuario{
  public $bolao_id;
  public $usuario_id;
  public $pontos; // pontuação do usuário no bolão
}

class PartidaUsuario{
  public $partida_id;
  public $usuario_id;
  public $resultado; // (A,B,E) E = empate.
  public $placarTimeA; // placar time A
  public $placarTimeB; // placar time B
}

// Testes:

// Gerenciador do Bolão
$admin = new Usuario;
$admin->id = 1;
$admin->nome = "Admin";
$admin->email = "admin@mail.com";
$admin->senha = "123456";

// Apostador
$apostador = new Usuario;
$apostador->id = 1;
$apostador->nome = "Apostador";
$apostador->email = "apostador@mail.com";
$apostador->senha = "123456";

// Cadastro do Bolão
$bolao = new Bolao;
$bolao->id = 1;
$bolao->usuario_id = $admin->id;
$bolao->titulo = "Bolão 1";
$bolao->rodadaAtual = 0;
$bolao->pontosResultado = 10;
$bolao->pontosExtras = 5;
$bolao->pontosTaxa = 5;

$rodada = new Rodada;
$rodada->id = 1;
$rodada->bolao_id = $bolao->id;
$rodada->titulo = "Primeira rodada";
$rodada->dataIni = "2018-07-8";
$rodada->dataFim = "2018-07-10";

$partida1 = new Partida;
$partida1->id = 1;
$partida1->rodada_id = $rodada->id;
$partida1->titulo = "Inter X Grêmio";
$partida1->estadio = "Beira Rio";
$partida1->timeA = "Inter";
$partida1->timeB = "Grêmio";
//$partida1->resultado = ; // (A,B,E) E = empate.
//$partida1->placarTimeA = ; // placar time A
//$partida1->placarTimeB = ;// placar time B
$partida1->data = "2018-07-11";

// Apostador no Bolão
$bolaoUsuario = new BolaoUsuario;
$bolaoUsuario->bolao_id = $bolao->id;
$bolaoUsuario->usuario_id = $apostador->id;
$bolaoUsuario->pontos = 0;

// aposta do usuário

$partida1Apostador = new PartidaUsuario;
$partida1Apostador->partida_id = $partida1->id;
$partida1Apostador->usuario_id = $apostador->id;
$partida1Apostador->resultado = "A"; // (A,B,E) E = empate.
$partida1Apostador->placarTimeA = 2; // placar time A
$partida1Apostador->placarTimeB = 1; // placar time B

// Finalização da rodada
$bolao->rodadaAtual++;
$partida1->resultado = "A"; // (A,B,E) E = empate.
$partida1->placarTimeA = 2; // placar time A
$partida1->placarTimeB = 1;// placar time B


// lógica cálculo de pontos
if($partida1Apostador->resultado == $partida1->resultado){
  $bolaoUsuario->pontos += $bolao->pontosResultado;
}
if($partida1Apostador->placarTimeA == $partida1->placarTimeA
    && $partida1Apostador->placarTimeB == $partida1->placarTimeB){
  $bolaoUsuario->pontos += $bolao->pontosExtras;
}

// lógica incrementar valores bolão
$bolao->pontosResultado += $bolao->pontosTaxa;
$bolao->pontosExtras += $bolao->pontosTaxa;

echo "Pontos do Apostador: ".$bolaoUsuario->pontos;

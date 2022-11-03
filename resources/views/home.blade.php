@extends('layouts.default')
@section('content')
    <h1 style="text-align: center">Teste Superlógica</h1>
    <div id="exercicio 1">
        <h4>Exercício 1</h4>
        ● Realizar validações para cada input do form (quantas e quais validações fica a seu critério) Todos os campos tem required 
        campo senha tem tamanho minimo de 8 caracteres com validação se há letra e número na senha cep só aceita números - Ok
        <br>
        ● Crie um BD para armazenar os dados - Ok
        <br>
        ● Crie um método para inserir os dados no BD - Ok
        <br>
        ● Crie um método para consultar os dados do BD - Ok
    </div>
    <div id="exercicio 3">
        <h4>Exercício 2</h4>
        é imprimido na tela o passo a passo de cada item solicitado!
        1) Crie um array - Ok<br>
        2) Popule este array com 7 números - Ok<br>
        3) Imprima o número da posição 3 do array - Ok<br>
        4) Crie uma variável com todas as posições do array no formato de string separado por vírgula - Ok
        5) Crie um novo array a partir da variável no formato de string que foi criada e destrua o array anterior - Ok
        6) Crie uma condição para verificar se existe o valor 14 no array - Ok<br>
        7) Faça uma busca em cada posição. Se o número da posição atual for menor que o da posição anterior
        (valor anterior que não foi excluído do array ainda), exclua esta posição - Ok<br>
        8) Remova a última posição deste array - Ok<br>
        9) Conte quantos elementos tem neste array - Ok<br>
        10) Inverta as posições deste array - Ok<br>
        
    </div>
    
    <div id="exercicio 3">
        <h4>Exercício 3</h4>
        No exercício 3 na blade, há código comentado, porém deixei comentado a listagem de usuários e info
        caso vocês queiram visualizar!
    </div>
@stop
@section('pagespecificscripts')    
@endsection

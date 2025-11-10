@extends('produtos.layout')

@section('content')

<div class="row">
    <div class="col-xs-12 margin-tb">
        <br><br><br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('produtos.create') }}"> Novo Produto</a>
        </div>
        <br>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-hover table-striped">
    <tr>
        <th>Nº</th>
        <th>Descrição</th>
        <th>QTD</th>
        <th>Custo</th>
        <th>Venda</th>
        <th width="280px">Ações</th>
    </tr>

    @if(isset($produtos) && count($produtos) > 0)
    @foreach ($produtos as $produto)
    <tr>
        <td>{{ isset($i) ? ++$i : $loop->iteration }}</td>
        <td>{{ $produto->descricao }}</td>
        <td>{{ $produto->qtd }}</td>
        <td>{{ $produto->precoUnitario }}</td>
        <td>{{ $produto->precoVenda }}</td>
        <td>
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('produtos.show', $produto->id) }}">Exibir</a>

                <a class="btn btn-primary" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="6" class="text-center">Nenhum produto cadastrado!</td>
    </tr>
    @endif
</table>

@if(isset($produtos) && count($produtos) > 0)
{{ $produtos->links() }}
@endif

@endsection
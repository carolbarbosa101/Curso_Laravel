@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Painel de Controle</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $key => $value)
                       
                        
                        <tr>
                            <th scope="row"> {{$value -> id}}</th>
                            <td> {{$value ->name}}</td>
                            <td> {{$value ->email}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    <div class="">
                    {{$list}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

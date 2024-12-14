@extends('layouts.app') <!-- Estende o layout app.blade.php -->

@section('title', 'Moon Nightlife')

@section('content') <!-- Define o conteúdo da página -->
    <h1>Bem-vindo à Noite</h1>
    
    <div class="buttons" style="margin-top: 50px; display: flex; flex-direction: column; align-items: center;">
        <a href="{{ route('cadastro') }}" class="button" 
            style="display: inline-block; padding: 15px 50px; margin: 15px; background-color: #ff4081; color: #fff; text-decoration: none; font-size: 20px; font-weight: bold; border-radius: 8px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255, 64, 129, 0.5);">
            Cadastro
        </a>
        <a href="{{ route('clientes') }}" class="button" 
            style="display: inline-block; padding: 15px 50px; margin: 15px; background-color: #ff4081; color: #fff; text-decoration: none; font-size: 20px; font-weight: bold; border-radius: 8px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255, 64, 129, 0.5);">
            Clientes
        </a>
        <a href="{{ route('funcionarios') }}" class="button"
            style="display: inline-block; padding: 15px 50px; margin: 15px; background-color: #ff4081; color: #fff; text-decoration: none; font-size: 20px; font-weight: bold; border-radius: 8px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255, 64, 129, 0.5);">
            Funcionários
        </a>
        <a href="{{ route('todos') }}" class="button" 
            style="display: inline-block; padding: 15px 50px; margin: 15px; background-color: #ff4081; color: #fff; text-decoration: none; font-size: 20px; font-weight: bold; border-radius: 8px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255, 64, 129, 0.5);">
            Todos
        </a>
    </div>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");

            window.location.href = "{{ url('/') }}";
        </script>
    @endif

    <style>
        .button:hover {
            background-color: #e53977;
            box-shadow: 0 6px 20px rgba(255, 64, 129, 0.8);
            transform: translateY(-3px);
        }
    </style>
@endsection

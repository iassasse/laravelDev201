@extends('layouts.app')

@section('title', 'Catégories - ' . $config['company']['name'])

@section('content')
<div class="breadcrumb">
    <a href="{{ route('index') }}">Accueil</a>
    <span>/</span>
    <strong>Catégories</strong>
</div>

<h1 class="page-title">Nos catégories</h1>

<div class="categories-grid">
    @foreach($categories as $category)
    <div class="category-card">
        <h3>{{ $category['icon'] }} {{ $category['name'] }}</h3>
        <p>{{ $category['description'] }}</p>
        <a href="{{ route($category['route']) }}" class="btn">Voir les produits</a>
    </div>
    <p>Aucune catégorie disponible.</p>
    @endforeach
</div>
@endsection
@extends('layouts.app')

@section('title', 'Informatique - ' . $config['company']['name'])

@section('content')

<div class="breadcrumb">
    <a href="{{ route('index') }}">Accueil</a>
    <span>/</span>
    <a href="{{ route('categories') }}">Catégories</a>
    <span>/</span>
    <strong>Informatique</strong>
</div>

<h1 class="page-title">💻 Informatique</h1>

<div class="products-grid">
    @foreach($products as $product)
    <div class="product-card">
        <div class="product-image">{{ $product['image'] }}</div>
        <div class="product-info">
            <div class="product-name">{{ $product['name'] }}</div>
            <div class="product-price">{{ $product['price'] }} €</div>
            <div class="product-description">{{ $product['description'] }}</div>
            <a href="{{ route('produit', ['id' => $product['id']]) }}" class="btn">Détails</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
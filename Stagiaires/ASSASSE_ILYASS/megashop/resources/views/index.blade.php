@extends('layouts.app')

@section('title', 'Accueil - ' . $config['company']['name'])

@section('content')

<div class="hero">
    <h1>Bienvenue chez MegaShop</h1>
    <p>Découvrez notre sélection complète d'électronique et d'électroménager</p>
    <a href="{{ route('categories') }}" class="btn">Voir nos catégories</a>
</div>

<section class="featured-products">
    <h2 class="page-title">Produits en Vedette</h2>
    <div class="products-grid">
        @foreach($featuredProducts as $product)
        <div class="product-card">
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
            <div class="product-info">
                <div class="product-name">{{ $product['name'] }}</div>
                <div class="product-price">{{ $product['price'] }} €</div>
                <div class="product-description">{{ $product['description'] }}</div>
                <a href="{{ route('produit', ['id' => $product['id']]) }}" class="btn">Voir les détails</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
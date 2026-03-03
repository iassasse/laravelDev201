@extends('layouts.app')

@section('title', $product['name'] . ' - ' . $config['company']['name'])

@section('content')

<div class="breadcrumb">
    <a href="{{ route('index') }}">Accueil</a>
    <span>/</span>
    <a href="{{ route('categories') }}">Catégories</a>
    <span>/</span>
    <strong>{{ $product['name'] }}</strong>
</div>

<h1 class="page-title">Détail du Produit</h1>

<div class="product-detail">
    <div class="two-col-grid">
        <div>
            <div class="product-detail-img">{{ $product['image'] }}</div>
        </div>
        <div class="product-detail-info">
            <h2>{{ $product['name'] }}</h2>
            <div class="product-detail-price">{{ $product['price'] }} €</div>

            <div class="badge">
                <h3>Disponibilité</h3>
                @if($product['stock'] > 0)
                <p class="in-stock">✓ En stock ({{ $product['stock'] }} disponibles)</p>
                @else
                <p class="out-of-stock">✗ stock indisponible</p>
                @endif
            </div>

            <div class="badge">
                <h3>Évaluation</h3>
                <p class="rating">⭐⭐⭐⭐⭐ ({{ $product['rating'] }}/5 - {{ $product['reviews'] }} avis)</p>
            </div>

            <button class="btn btn-secondary full-width">Ajouter au panier</button>
            <button class="btn full-width">Acheter maintenant</button>
        </div>
    </div>

    <div class="product-specs">
        <h3 class="section-title">Caractéristiques Principales</h3>
        <ul>
            @foreach($product['specs'] as $key => $value)
            <li><strong>{{ $key }} :</strong> {{ $value }}</li>
            @endforeach
        </ul>
    </div>

    <div class="description-box">
        <h3 class="section-title">Description Détaillée</h3>
        <p>{{ $product['details'] }}</p>
    </div>

    <div class="service-box">
        <h4>📦 Livraison et Service</h4>
        <ul>
            <li>Livraison gratuite en France métropolitaine</li>
            <li>Garantie 2 ans pièces et main d'œuvre</li>
            <li>Service client disponible 7j/7</li>
            <li>Retour gratuit sous 30 jours</li>
            <li>Installation et configuration gratuites</li>
        </ul>
    </div>
</div>

@endsection
@extends('layouts.app')

@section('title', 'Grand Électroménager - ' . $config['company']['name'])

@section('content')

<div class="breadcrumb">
    <a href="{{ route('index') }}">Accueil</a>
    <span>/</span>
    <strong>Grand Électroménager</strong>
</div>

<h1 class="page-title">❄️ Grand Électroménager</h1>

<div class="products-grid">
    @foreach($products as $product)
    <div class="product-card">
        <div class="product-image">{{ $product['image'] }}</div>
        <div class="product-info">
            <div class="product-name">{{ $product['name'] }}</div>
            <div class="product-price">{{ number_format($product['price'], 2, ',', ' ') }} €</div>
            <div class="product-description">{{ $product['description'] }}</div>
            <a href="{{ route('produit', ['id' => $product['id']]) }}" class="btn">Détails</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
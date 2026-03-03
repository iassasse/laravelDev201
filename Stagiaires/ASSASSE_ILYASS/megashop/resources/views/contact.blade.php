@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<h1 class="page-title">Nous Contacter</h1>

<div class="two-col-grid">
    <!-- Formulaire de contact -->
    <div class="form-container">
        <h2 class="section-title">Formulaire de Contact</h2>
        <form>
            <div class="form-group">
                <label for="nom">Nom Complet *</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse Email *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone">
            </div>

            <div class="form-group">
                <label for="sujet">Sujet *</label>
                <select id="sujet" name="sujet" required>
                    <option value="">-- Sélectionnez un sujet --</option>
                    <option value="commande">À propos d'une commande</option>
                    <option value="retour">Retour / Échange</option>
                    <option value="produit">Informations sur un produit</option>
                    <option value="technique">Problème technique</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" required></textarea>
            </div>

            <button type="submit" class="btn btn-secondary full-width">
                Envoyer le message
            </button>
        </form>
    </div>

    <!-- Informations de contact -->
    <div>
        <div class="card">
            <h3 class="section-title">📞 Nos Coordonnées</h3>

            <div class="badge">
                <h4>Siège Social</h4>
                <p>
                    {{ $config['company']['name'] }}<br>
                    {{ $config['company']['address'] }}<br>
                    {{ $config['company']['zip'] }} {{ $config['company']['city'] }}<br>
                    {{ $config['company']['country'] }}
                </p>
            </div>

            <div class="badge">
                <h4>Téléphone</h4>
                <p>
                    <strong>Général :</strong> {{ $config['contact']['phone_general'] }}<br>
                    <strong>Support :</strong> {{ $config['contact']['phone_support'] }}<br>
                    <strong>Ventes :</strong> {{ $config['contact']['phone_sales'] }}
                </p>
            </div>

            <div class="badge">
                <h4>Email</h4>
                <p>
                    <strong>General :</strong> {{ $config['company']['email'] }}<br>
                    <strong>Support :</strong> {{ $config['company']['support_email'] }}<br>
                    <strong>Ventes :</strong> {{ $config['company']['sales_email'] }}
                </p>
            </div>

            <div class="badge">
                <h4>Horaires d'Ouverture</h4>
                <p>
                    Lundi - Vendredi : {{ $config['hours']['monday_friday'] }}<br>
                    Samedi : {{ $config['hours']['saturday'] }}<br>
                    Dimanche : {{ $config['hours']['sunday'] }}
                </p>
            </div>
        </div>

        <div class="card">
            <h3 class="section-title">💬 Réseaux Sociaux</h3>
            <p>Suivez-nous sur nos réseaux sociaux pour les dernières actualités et offres :</p>
            <div class="social-links">
                <a href="{{ $config['social']['facebook'] }}" class="btn-link">📘 Facebook</a>
                <a href="{{ $config['social']['instagram'] }}" class="btn-link">📷 Instagram</a>
                <a href="{{ $config['social']['twitter'] }}" class="btn-link">🐦 Twitter</a>
                <a href="{{ $config['social']['youtube'] }}" class="btn-link">▶️ YouTube</a>
            </div>
        </div>
    </div>
</div>

<section class="card">
    <h2 class="section-title">❓ Questions Fréquemment Posées</h2>

    <div class="faq-list">
        @foreach($faq as $item)
        <div>
            <h4>{{ $item['question'] }}</h4>
            <p class="faq-answer">{{ $item['answer'] }}</p>
        </div>
        @endforeach
    </div>
</section>

<section class="card highlight">
    <h2 class="section-title">📍 Où nous trouver</h2>
    <p>
        Notre siège social est situé au cœur de Paris. Vous pouvez nous rendre visite sur rendez-vous pour
        discuter de vos besoins en électroménager et informatique.
    </p>
    <div class="map-placeholder">Carte Google Maps (à intégrer)</div>
</section>
@endsection
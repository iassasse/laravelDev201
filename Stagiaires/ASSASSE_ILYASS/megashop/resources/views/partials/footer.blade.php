<footer>
    <p>MegaShop &copy; 2026 - Tous droits réservés</p>
    <div class="footer-links">
        <a href="{{ route('cgv') }}">CGV</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="#">Mentions Légales</a>
    </div>
    <p><strong>Email :</strong> {{ $config['company']['email'] }} | <strong>Téléphone :</strong> {{ $config['company']['phone'] }}</p>
</footer>
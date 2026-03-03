<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductController extends Controller
{
    private function getConfig(): array
    {
        return [
            'company' => [
                'name'          => 'MegaShop',
                'siret'         => '123 456 789 00012',
                'address'       => '123 Avenue du Commerce',
                'city'          => 'Paris',
                'zip'           => '75001',
                'country'       => 'France',
                'phone'         => '+212 1 23 45 67 89',
                'email'         => 'info@megashop.com',
                'support_email' => 'support@megashop.com',
                'sales_email'   => 'ventes@megashop.com',
            ],
        ];
    }

    private function getAllProducts(): array
    {
        return [
            1  => ['id' => 1,  'name' => 'Ordinateur Portable Pro',        'price' => 1299.99, 'description' => 'Intel i7, 16GB RAM, SSD 512GB',        'image' => 'PC Portable',       'stock' => 5,  'rating' => 4.8, 'reviews' => 156, 'specs' => ['Processeur' => 'Intel Core i7-13700K', 'RAM' => '16 GB DDR5', 'Stockage' => 'SSD NVMe 512 GB', 'Écran' => '15.6" IPS 1920x1080', 'Carte Graphique' => 'NVIDIA RTX 4060', 'Batterie' => '80 Wh (10h)', 'Poids' => '1.8 kg'], 'details' => "L'Ordinateur Portable Pro est conçu pour les professionnels qui exigent performance et mobilité."],
            2  => ['id' => 2,  'name' => 'PC Bureau Gaming',                'price' => 1899.99, 'description' => 'RTX 4070, i9, 32GB RAM',               'image' => 'Desktop PC',        'stock' => 3,  'rating' => 4.9, 'reviews' => 89,  'specs' => ['Processeur' => 'Intel Core i9-13900K', 'GPU' => 'NVIDIA RTX 4070', 'RAM' => '32 GB DDR5', 'Stockage' => 'SSD 1TB', 'Alimentation' => '850W'], 'details' => 'Le PC Bureau Gaming offre des performances exceptionnelles pour tous vos jeux.'],
            3  => ['id' => 3,  'name' => 'Tablette 12 pouces',              'price' => 599.99,  'description' => 'OLED, 128GB, Stylet inclus',           'image' => 'Tablette',          'stock' => 8,  'rating' => 4.7, 'reviews' => 234, 'specs' => ['Écran' => '12" OLED 2560x1600', 'Processeur' => 'Apple M2', 'RAM' => '8GB', 'Stockage' => '128GB', 'Batterie' => '40Wh (12h)'], 'details' => 'La tablette 12 pouces offre un écran OLED magnifique et une productivité maximale.'],
            4  => ['id' => 4,  'name' => 'Clavier Mécanique RGB',           'price' => 179.99,  'description' => 'Switches personnalisées, Rétroéclairage', 'image' => 'Clavier Mécanique', 'stock' => 12, 'rating' => 4.6, 'reviews' => 145, 'specs' => ['Type' => 'Mécanique', 'Layout' => 'AZERTY', 'Rétroéclairage' => 'RGB par touche', 'Connectivité' => 'USB-C'], 'details' => 'Un clavier mécanique premium avec des switches personnalisables et un rétroéclairage RGB.'],
            5  => ['id' => 5,  'name' => 'Souris Gamer Wireless',           'price' => 89.99,   'description' => '12000 DPI, Batterie 100h',             'image' => 'Souris',            'stock' => 15, 'rating' => 4.5, 'reviews' => 98,  'specs' => ['DPI' => "Jusqu'à 12000", 'Capteur' => 'PMW3389', 'Autonomie' => '100 heures', 'Boutons' => '11'], 'details' => 'La souris sans fil parfaite pour les gamers avec une longue autonomie.'],
            6  => ['id' => 6,  'name' => 'Écran 4K 27 pouces',             'price' => 449.99,  'description' => '144Hz, HDR, USB-C',                    'image' => 'Écran 4K',          'stock' => 4,  'rating' => 4.8, 'reviews' => 76,  'specs' => ['Résolution' => 'UHD 4K 3840x2160', 'Fréquence' => '144Hz', 'Panel' => 'IPS', 'USB-C' => '90W Power Delivery'], 'details' => "L'écran 4K 27 pouces est idéal pour le design graphique et le gaming haute résolution."],
            7  => ['id' => 7,  'name' => 'Casque Bluetooth Pro',            'price' => 249.99,  'description' => 'Réduction active, 40h autonomie',      'image' => 'Casque Audio',      'stock' => 10, 'rating' => 4.7, 'reviews' => 523, 'specs' => ['Réduction Bruit' => 'Active ANC', 'Autonomie' => '40 heures', 'Codec' => 'LDAC, AAC', 'Poids' => '250g'], 'details' => 'Le casque Bluetooth Pro offre une réduction de bruit active et une qualité sonore exceptionnelle.'],
            8  => ['id' => 8,  'name' => 'Webcam 4K Auto-focus',            'price' => 129.99,  'description' => 'Microphone intégré, Vision nocturne',  'image' => 'Webcam HD',         'stock' => 7,  'rating' => 4.4, 'reviews' => 112, 'specs' => ['Résolution' => '4K 30fps / 1080p 60fps', 'Champ de vision' => '90°', 'Microphone' => 'Stéréo intégré', 'Vision nocturne' => 'Oui'], 'details' => 'La webcam 4K Auto-focus est idéale pour les visioconférences et le streaming.'],
            21 => ['id' => 21, 'name' => 'Cafetière Programmable',          'price' => 79.99,   'description' => '12 tasses, Minuteur programmable',     'image' => 'Cafetière',         'stock' => 6,  'rating' => 4.5, 'reviews' => 67,  'specs' => ['Capacité' => '12 tasses', 'Programmable' => 'Oui (24h)', 'Puissance' => '1000W', 'Filtre' => 'Réutilisable'], 'details' => 'La cafetière programmable vous permet de programmer votre café à tout moment.'],
            22 => ['id' => 22, 'name' => 'Grille-pain Premium',             'price' => 49.99,   'description' => '4 fentes, 7 niveaux de cuisson',       'image' => 'Grille-pain',       'stock' => 11, 'rating' => 4.3, 'reviews' => 45,  'specs' => ['Fentes' => '4', 'Niveaux' => '7', 'Puissance' => '1500W', 'Fonction Dégivrage' => 'Oui'], 'details' => 'Le grille-pain Premium vous offre un toastage parfait grâce à ses 7 niveaux de cuisson.'],
            23 => ['id' => 23, 'name' => 'Blender Haute Vitesse',           'price' => 129.99,  'description' => '2000W, 8 vitesses, Bol sans BPA',      'image' => 'Mixeur',            'stock' => 5,  'rating' => 4.6, 'reviews' => 198, 'specs' => ['Puissance' => '2000W', 'Vitesses' => '8', 'Capacité' => '1.5L', 'Sans BPA' => 'Oui'], 'details' => 'Le blender haute vitesse est idéal pour préparer des smoothies et des soupes.'],
            24 => ['id' => 24, 'name' => 'Bouilloire Électrique Sans Fil',  'price' => 34.99,   'description' => 'Arrêt automatique, 1.7L',              'image' => 'Bouilloire',        'stock' => 20, 'rating' => 4.4, 'reviews' => 234, 'specs' => ['Capacité' => '1.7L', 'Temps de chauffe' => '3-5 minutes', 'Arrêt auto' => 'Oui', 'Puissance' => '2200W'], 'details' => 'La bouilloire électrique sans fil avec arrêt automatique pour votre sécurité.'],
            25 => ['id' => 25, 'name' => 'Robot Culinaire Multifonction',   'price' => 189.99,  'description' => '15 accessoires, 1200W',                'image' => 'Robot Culinaire',   'stock' => 3,  'rating' => 4.7, 'reviews' => 156, 'specs' => ['Puissance' => '1200W', 'Accessoires' => '15', 'Capacité' => '3.5L', 'Vitesses' => '12'], 'details' => 'Le robot culinaire multifonction avec 15 accessoires pour toutes vos préparations.'],
            26 => ['id' => 26, 'name' => 'Micro-ondes Numérique',           'price' => 99.99,   'description' => '800W, 20L, Mode grill',                'image' => 'Micro-ondes',       'stock' => 8,  'rating' => 4.5, 'reviews' => 89,  'specs' => ['Puissance' => '800W', 'Capacité' => '20L', 'Programmes' => '10', 'Grill' => 'Oui'], 'details' => 'Le micro-ondes numérique avec mode grill pour réchauffer et cuisiner facilement.'],
            27 => ['id' => 27, 'name' => 'Fer à Repasser Vapeur',           'price' => 59.99,   'description' => '2400W, Semelle en céramique',          'image' => 'Fer à repasser',    'stock' => 9,  'rating' => 4.3, 'reviews' => 67,  'specs' => ['Puissance' => '2400W', 'Semelle' => 'Céramique', 'Vapeur' => 'Oui', 'Réservoir' => '200ml'], 'details' => 'Le fer à repasser vapeur avec semelle en céramique pour un repassage facile.'],
            28 => ['id' => 28, 'name' => 'Appareil à Raclette Électrique',  'price' => 44.99,   'description' => '4 portions, Non-adhésif',              'image' => 'Appareil Raclette', 'stock' => 14, 'rating' => 4.2, 'reviews' => 43,  'specs' => ['Portions' => '4', 'Surface' => 'Non-adhésif', 'Puissance' => '600W', 'Thermostat' => 'Oui'], 'details' => "L'appareil à raclette électrique pour des soirées conviviales en famille."],
            29 => ['id' => 29, 'name' => 'Aspirateur Sans Fil Cyclonique',  'price' => 299.99,  'description' => '60 min autonomie, Programmable',       'image' => 'Aspirateur',        'stock' => 2,  'rating' => 4.6, 'reviews' => 112, 'specs' => ['Autonomie' => '60 minutes', 'Cyclonique' => 'Oui', 'Puissance' => '200W', 'Programmable' => 'Oui'], 'details' => "L'aspirateur sans fil cyclonique pour un nettoyage efficace et pratique."],
            41 => ['id' => 41, 'name' => 'Réfrigérateur Connecté',          'price' => 1499.99, 'description' => 'French Door, 620L, WiFi intégré',     'image' => 'Réfrigérateur',     'stock' => 1,  'rating' => 4.8, 'reviews' => 76,  'specs' => ['Type' => 'French Door', 'Capacité' => '620L', 'Classe' => 'A+++', 'Connectivité' => 'WiFi', 'Écran' => 'Tactile 7"'], 'details' => 'Le réfrigérateur connecté avec écran tactile et contrôle via application mobile.'],
            42 => ['id' => 42, 'name' => 'Lave-linge Haut de Gamme',       'price' => 899.99,  'description' => '9kg, A+++, 1400 tours/min',            'image' => 'Lave-linge',        'stock' => 2,  'rating' => 4.7, 'reviews' => 134, 'specs' => ['Capacité' => '9kg', 'Classe' => 'A+++', 'Vitesse' => '1400 tours/min', 'Programmes' => '15'], 'details' => 'Le lave-linge haut de gamme pour un lavage parfait et économique.'],
            43 => ['id' => 43, 'name' => 'Lave-vaisselle Encastrable',     'price' => 599.99,  'description' => '14 couverts, A+++, 42dB',              'image' => 'Lave-vaisselle',    'stock' => 4,  'rating' => 4.6, 'reviews' => 98,  'specs' => ['Couverts' => '14', 'Classe' => 'A+++', 'Bruit' => '42dB', 'Programmes' => '8'], 'details' => 'Le lave-vaisselle encastrable silencieux avec classe énergétique A+++.'],
            44 => ['id' => 44, 'name' => 'Cuisinière Multi-fonction',       'price' => 749.99,  'description' => 'Induction, Convection, Vapeur',        'image' => 'Cuisinière',        'stock' => 3,  'rating' => 4.5, 'reviews' => 67,  'specs' => ['Table' => 'Induction', 'Four' => 'Convection + Vapeur', 'Puissance' => '7000W'], 'details' => 'La cuisinière multi-fonction avec table induction et four vapeur.'],
            45 => ['id' => 45, 'name' => 'Four Électrique Premium',         'price' => 599.99,  'description' => '80L, Nettoyage automatique',           'image' => 'Four',              'stock' => 2,  'rating' => 4.7, 'reviews' => 89,  'specs' => ['Capacité' => '80L', 'Classe' => 'A', 'Nettoyage' => 'Automatique', 'Fonctions' => '10'], 'details' => 'Le four électrique premium avec nettoyage automatique et 10 fonctions de cuisson.'],
            46 => ['id' => 46, 'name' => 'Congélateur Vertical',            'price' => 449.99,  'description' => '260L, A+, Décongélation rapide',       'image' => 'Congélateur',       'stock' => 5,  'rating' => 4.4, 'reviews' => 54,  'specs' => ['Capacité' => '260L', 'Classe' => 'A+', 'Décongélation' => 'Rapide'], 'details' => 'Le congélateur vertical avec décongélation rapide et grande capacité.'],
            47 => ['id' => 47, 'name' => 'Climatiseur Réversible',          'price' => 1299.99, 'description' => '3000W, Chauffage + Refroidissement',   'image' => 'Climatiseur',       'stock' => 2,  'rating' => 4.8, 'reviews' => 142, 'specs' => ['Puissance' => '3000W', 'Réversible' => 'Oui', 'Classe' => 'A+++', 'Bruit' => '24dB'], 'details' => 'Le climatiseur réversible pour le chauffage et la climatisation.'],
            48 => ['id' => 48, 'name' => 'Sèche-linge Condensation',        'price' => 649.99,  'description' => '8kg, A++, Capteur humidité',           'image' => 'Sèche-linge',       'stock' => 3,  'rating' => 4.5, 'reviews' => 76,  'specs' => ['Capacité' => '8kg', 'Classe' => 'A++', 'Technologie' => 'Pompe à chaleur'], 'details' => 'Le sèche-linge à condensation avec pompe à chaleur économique.'],
            49 => ['id' => 49, 'name' => 'Radiateur Électrique Connecté',   'price' => 399.99,  'description' => '2000W, WiFi, Thermostat',              'image' => 'Chauffage',         'stock' => 8,  'rating' => 4.6, 'reviews' => 203, 'specs' => ['Puissance' => '2000W', 'WiFi' => 'Oui', 'Thermostat' => 'Programmable', 'Détecteur' => 'Présence'], 'details' => 'Le radiateur électrique connecté avec thermostat programmable via WiFi.'],
        ];
    }

    public function categories(): View
    {
        $config = $this->getConfig();
        $categories = [
            ['id' => 'informatique',         'name' => 'Informatique',          'icon' => '💻', 'description' => 'Ordinateurs, laptops, accessoires informatiques et bien plus...', 'route' => 'informatique'],
            ['id' => 'petit_electromenager', 'name' => 'Petit Électroménager',  'icon' => '🍳', 'description' => 'Cafetières, grille-pain, mixeurs, robots culinaires...',           'route' => 'petit-electromenager'],
            ['id' => 'grand_electromenager', 'name' => 'Grand Électroménager',  'icon' => '❄️', 'description' => 'Réfrigérateurs, lave-linge, lave-vaisselle, fours...',             'route' => 'grand-electromenage'],
        ];
        return view('categories', compact('config', 'categories'));
    }

    public function produit($id): View
    {
        $config = $this->getConfig();
        $product = $this->getAllProducts()[$id];
        return view('produit-details', compact('config', 'product'));
    }
}

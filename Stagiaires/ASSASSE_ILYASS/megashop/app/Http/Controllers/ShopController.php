<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ShopController extends Controller
{
    private function getConfig(): array
    {
        return [
            'company' => [
                'name' => 'MegaShop',
                'siret' => '123 456 789 00012',
                'address' => '123 Avenue du Commerce',
                'city' => 'Paris',
                'zip' => '75001',
                'country' => 'France',
                'phone' => '+212 1 23 45 67 89',
                'email' => 'info@megashop.com',
                'support_email' => 'support@megashop.com',
                'sales_email' => 'ventes@megashop.com',
            ],
            'contact' => [
                'phone_general' => '+212 1 23 45 67 89',
                'phone_support' => '+212 1 23 45 67 00',
                'phone_sales' => '+212 1 23 45 67 99',
            ],
            'hours' => [
                'monday_friday' => '9:00 - 18:00',
                'saturday' => '10:00 - 16:00',
                'sunday' => 'Fermé',
            ],
            'social' => [
                'facebook' => 'https://facebook.com/megashop',
                'instagram' => 'https://instagram.com/megashop',
                'twitter' => 'https://twitter.com/megashop',
                'youtube' => 'https://youtube.com/megashop',
            ],
        ];
    }

    public function accueil(): View
    {
        $config = $this->getConfig();
        $featuredProducts = [
            ['id' => 1,  'image' => 'Image Produit 1', 'name' => 'Ordinateur Portable Pro', 'price' => 1299.99, 'description' => 'Intel i7, 16GB RAM, SSD 512GB'],
            ['id' => 21, 'image' => 'Image Produit 2', 'name' => 'Cafetière Programmable',  'price' => 79.99,   'description' => '12 tasses, Minuteur programmable'],
            ['id' => 41, 'image' => 'Image Produit 3', 'name' => 'Réfrigérateur Connecté',  'price' => 1499.99, 'description' => 'French Door, 620L, WiFi intégré'],
        ];

        return view('index', compact('config', 'featuredProducts'));
    }



    public function contact(): View
    {
        $config = $this->getConfig();

        $faq = [
            [
                'id' => 1,
                'question' => 'Quelle est la durée standard de livraison ?',
                'answer' => 'La livraison standard prend 5 à 7 jours ouvrables. Une livraison express est également disponible en 2 à 3 jours ouvrables.',
            ],
            [
                'id' => 2,
                'question' => 'Comment puis-je retourner un produit ?',
                'answer' => 'Vous disposez de 30 jours pour retourner votre produit. Veuillez nous contacter pour obtenir une étiquette de retour.',
            ],
            [
                'id' => 3,
                'question' => 'Acceptez-vous les paiements en plusieurs fois ?',
                'answer' => 'Oui, nous proposons le paiement en 3 ou 4 fois sans frais pour les achats supérieurs à 100 €.',
            ],
            [
                'id' => 4,
                'question' => 'Comment puis-je suivre ma commande ?',
                'answer' => 'Un numéro de suivi vous sera envoyé par email après la confirmation de votre commande.',
            ],
            [
                'id' => 5,
                'question' => 'Proposez-vous une garantie sur vos produits ?',
                'answer' => 'Tous nos produits bénéficient d\'une garantie légale de 2 ans.',
            ],
        ];

        return view('contact', compact('config', 'faq'));
    }

    public function cgv(): View
    {
        $config = $this->getConfig();

        $cgvSections = [
            [
                'title' => '1. Dispositions Générales',
                'paragraphs' => [
                    "Les présentes Conditions Générales de Vente régissent les relations commerciales entre {$config['company']['name']} (ci-après « le vendeur ») et ses clients (ci-après « l'acheteur »). Tout achat implique l'acceptation inconditionnelle de ces conditions.",
                    "{$config['company']['name']} est une entreprise proposant la vente de produits électroniques et électroménagers par voie électronique. L'accès au site marchand implique l'acceptation des conditions qui y figurent.",
                ],
            ],
            [
                'title' => '2. Offres de Produits',
                'subsections' => [
                    [
                        'title' => '2.1 Validité des Offres',
                        'paragraphs' => ["Les produits présentés sur le site sont offerts à titre informatif. Les prix affichés sont valables au moment de leur publication et peuvent être modifiés sans préavis. Les offres sont valables sous réserve de disponibilité en stock."],
                    ],
                    [
                        'title' => '2.2 Description des Produits',
                        'paragraphs' => ["Les descriptions, photographies et caractéristiques des produits présentés sur le site sont aussi précises que possible. Cependant, {$config['company']['name']} ne peut garantir l'absence d'erreur ou d'omission."],
                    ],
                ],
            ],
            [
                'title' => '3. Commandes et Confirmation',
                'subsections' => [
                    [
                        'title' => '3.1 Processus de Commande',
                        'paragraphs' => ["La commande en ligne constitue une offre d'achat. La confirmation de commande n'est effective que lorsque {$config['company']['name']} a confirmé par écrit (email) l'acceptation de la commande et le paiement a été reçu."],
                    ],
                    [
                        'title' => '3.2 Droit de Rétractation',
                        'paragraphs' => ["Conformément à la loi, vous disposez d'un délai de 30 jours à compter de la réception de votre commande pour exercer votre droit de rétractation sans motif et sans pénalité."],
                    ],
                    [
                        'title' => '3.3 Conditions de Retour',
                        'items' => [
                            "Le produit doit être retourné dans son emballage d'origine, en parfait état",
                            "Les frais de retour sont à la charge de l'acheteur sauf si le retour est dû à un défaut de livraison ou produit",
                            "Le remboursement sera effectué sous 14 jours suivant la réception du produit",
                        ],
                    ],
                ],
            ],
            [
                'title' => '4. Conditions de Règlement',
                'subsections' => [
                    [
                        'title' => '4.1 Modes de Paiement',
                        'paragraphs' => ["{$config['company']['name']} accepte les modes de paiement suivants :"],
                        'items' => [
                            "Carte bancaire (Visa, MasterCard, American Express)",
                            "Virement bancaire",
                            "PayPal",
                            "Paiement en 3 ou 4 fois sans frais",
                        ],
                    ],
                    [
                        'title' => '4.2 Sécurité des Paiements',
                        'paragraphs' => ["Tous les paiements en ligne sont sécurisés par un protocole HTTPS et un système d'authentification 3D Secure. {$config['company']['name']} n'a accès qu'aux derniers chiffres de votre carte bancaire."],
                    ],
                    [
                        'title' => '4.3 Facture',
                        'paragraphs' => ["Une facture numérique vous sera adressée par email après confirmation du paiement."],
                    ],
                ],
            ],
            [
                'title' => '5. Conditions de Livraison',
                'subsections' => [
                    [
                        'title' => '5.1 Zones de Livraison',
                        'paragraphs' => ["MegaShop assure la livraison en France métropolitaine et en Belgique. D'autres zones peuvent être disponibles sur demande."],
                    ],
                    [
                        'title' => '5.2 Délais de Livraison',
                        'items' => [
                            "Livraison standard : 5 à 7 jours ouvrables",
                            "Livraison express : 2 à 3 jours ouvrables",
                            "Retrait en magasin : immédiat après confirmation de stock",
                        ],
                    ],
                    [
                        'title' => '5.3 Frais de Livraison',
                        'paragraphs' => ["La livraison est <strong>gratuite</strong> pour les commandes supérieures à 50 €. Pour les commandes inférieures, un forfait de 5.99 € s'applique."],
                    ],
                    [
                        'title' => '5.4 Responsabilité',
                        'paragraphs' => ["MegaShop décline toute responsabilité pour les retards dus à la météo, aux grèves, ou à des facteurs extérieurs indépendants de sa volonté. En cas de dommages pendant le transport, l'acheteur doit signaler le sinistre à MegaShop dans les 48 heures."],
                    ],
                ],
            ],
            [
                'title' => '6. Garantie et Service Après-Vente',
                'subsections' => [
                    [
                        'title' => '6.1 Garantie Légale',
                        'paragraphs' => ["Tous les produits bénéficient de la garantie légale de 2 ans à partir de la date d'achat couvrant les défauts de fonctionnement."],
                    ],
                    [
                        'title' => '6.2 Service Technique',
                        'paragraphs' => ["Un service technique est disponible par email ({$config['company']['support_email']}) ou par téléphone ({$config['company']['phone']}) du lundi au vendredi, 9h à 18h."],
                    ],
                    [
                        'title' => '6.3 Exclusions de Garantie',
                        'paragraphs' => ["La garantie ne couvre pas :"],
                        'items' => [
                            "Les dommages dus à une mauvaise utilisation",
                            "L'usure normale",
                            "Les dégâts causés par des chocs ou des liquides",
                            "Les modifications ou réparations non autorisées",
                        ],
                    ],
                ],
            ],
            [
                'title' => '7. Responsabilité',
                'subsections' => [
                    [
                        'title' => '7.1 Limitation de Responsabilité',
                        'paragraphs' => ["La responsabilité de MegaShop est limitée au montant de la commande passée. MegaShop ne peut être tenu responsable des dommages indirects, pertes de données, ou préjudices commerciaux."],
                    ],
                    [
                        'title' => '7.2 Disponibilité du Site',
                        'paragraphs' => ["MegaShop s'efforce de maintenir le site opérationnel 24h/24. Cependant, des interruptions pour maintenance peuvent survenir sans préavis. MegaShop ne peut être tenu responsable des interruptions de service."],
                    ],
                ],
            ],
            [
                'title' => '8. Propriété Intellectuelle',
                'paragraphs' => ["Tous les contenus du site (textes, images, logos, marques) sont la propriété exclusive de MegaShop ou de ses partenaires. Toute reproduction, modification ou utilisation sans autorisation est interdite."],
            ],
            [
                'title' => '9. Protection des Données Personnelles',
                'paragraphs' => ["Les données personnelles collectées lors de votre inscription et de vos achats sont soumises à notre <a href=\"#\">politique de confidentialité</a>. MegaShop s'engage à protéger vos données conformément à la réglementation RGPD."],
            ],
            [
                'title' => '10. Modification des CGV',
                'paragraphs' => ["MegaShop se réserve le droit de modifier les présentes Conditions Générales de Vente à tout moment. Les modifications entreront en vigueur immédiatement après leur publication sur le site."],
            ],
            [
                'title' => '11. Loi Applicable et Juridiction',
                'paragraphs' => ["Les présentes CGV sont régies par la loi française. Tout litige relative à l'utilisation du site ou à la vente de produits sera de la compétence exclusive des tribunaux français."],
            ],
            [
                'title' => '12. Contact',
                'paragraphs' => [
                    "<strong>Siège social :</strong> {$config['company']['name']}, {$config['company']['address']}, {$config['company']['zip']} {$config['company']['city']}, {$config['company']['country']}",
                    "<strong>Email :</strong> {$config['company']['support_email']}",
                    "<strong>Téléphone :</strong> {$config['company']['phone']}",
                    "<strong>SIRET :</strong> {$config['company']['siret']}",
                ],
            ],
        ];

        return view('cgv', compact('config', 'cgvSections'));
    }

    public function informatique(): View
    {
        $config = $this->getConfig();
        $products = [
            ['id' => 1, 'name' => 'Ordinateur Portable Pro',  'price' => 1299.99, 'description' => 'Intel i7, 16GB RAM, SSD 512GB',           'image' => 'PC Portable'],
            ['id' => 2, 'name' => 'PC Bureau Gaming',          'price' => 1899.99, 'description' => 'RTX 4070, i9, 32GB RAM',                  'image' => 'Desktop PC'],
            ['id' => 3, 'name' => 'Tablette 12 pouces',        'price' => 599.99,  'description' => 'OLED, 128GB, Stylet inclus',              'image' => 'Tablette'],
            ['id' => 4, 'name' => 'Clavier Mécanique RGB',     'price' => 179.99,  'description' => 'Switches personnalisées, Rétroéclairage', 'image' => 'Clavier Mécanique'],
            ['id' => 5, 'name' => 'Souris Gamer Wireless',     'price' => 89.99,   'description' => '12000 DPI, Batterie 100h',                'image' => 'Souris'],
            ['id' => 6, 'name' => 'Écran 4K 27 pouces',       'price' => 449.99,  'description' => '144Hz, HDR, USB-C',                       'image' => 'Écran 4K'],
            ['id' => 7, 'name' => 'Casque Bluetooth Pro',      'price' => 249.99,  'description' => 'Réduction active, 40h autonomie',         'image' => 'Casque Audio'],
            ['id' => 8, 'name' => 'Webcam 4K Auto-focus',      'price' => 129.99,  'description' => 'Microphone intégré, Vision nocturne',     'image' => 'Webcam HD'],
        ];
        return view('informatique', compact('config', 'products'));
    }

    public function petitElectromenage(): View
    {
        $config = $this->getConfig();
        $products = [
            ['id' => 21, 'name' => 'Cafetière Programmable',          'price' => 79.99,  'description' => '12 tasses, Minuteur programmable',  'image' => 'Cafetière'],
            ['id' => 22, 'name' => 'Grille-pain Premium',             'price' => 49.99,  'description' => '4 fentes, 7 niveaux de cuisson',    'image' => 'Grille-pain'],
            ['id' => 23, 'name' => 'Blender Haute Vitesse',           'price' => 129.99, 'description' => '2000W, 8 vitesses, Bol sans BPA',   'image' => 'Mixeur'],
            ['id' => 24, 'name' => 'Bouilloire Électrique Sans Fil',  'price' => 34.99,  'description' => 'Arrêt automatique, 1.7L',           'image' => 'Bouilloire'],
            ['id' => 25, 'name' => 'Robot Culinaire Multifonction',   'price' => 189.99, 'description' => '15 accessoires, 1200W',             'image' => 'Robot Culinaire'],
            ['id' => 26, 'name' => 'Micro-ondes Numérique',           'price' => 99.99,  'description' => '800W, 20L, Mode grill',             'image' => 'Micro-ondes'],
            ['id' => 27, 'name' => 'Fer à Repasser Vapeur',           'price' => 59.99,  'description' => '2400W, Semelle en céramique',       'image' => 'Fer à repasser'],
            ['id' => 28, 'name' => 'Appareil à Raclette Électrique',  'price' => 44.99,  'description' => '4 portions, Non-adhésif',           'image' => 'Appareil Raclette'],
            ['id' => 29, 'name' => 'Aspirateur Sans Fil Cyclonique',  'price' => 299.99, 'description' => '60 min autonomie, Programmable',    'image' => 'Aspirateur'],
        ];
        return view('petit-electromenager', compact('config', 'products'));
    }

    public function grandElectromenage(): View
    {
        $config = $this->getConfig();
        $products = [
            ['id' => 41, 'name' => 'Réfrigérateur Connecté',    'price' => 1499.99, 'description' => 'French Door, 620L, WiFi intégré',       'image' => 'Réfrigérateur'],
            ['id' => 42, 'name' => 'Lave-linge Haut de Gamme',  'price' => 899.99,  'description' => '9kg, A+++, 1400 tours/min',               'image' => 'Lave-linge'],
            ['id' => 43, 'name' => 'Lave-vaisselle Encastrable', 'price' => 599.99,  'description' => '14 couverts, A+++, 42dB',                 'image' => 'Lave-vaisselle'],
            ['id' => 44, 'name' => 'Cuisinière Multi-fonction',  'price' => 749.99,  'description' => 'Induction, Convection, Vapeur',           'image' => 'Cuisinière'],
            ['id' => 45, 'name' => 'Four Électrique Premium',    'price' => 599.99,  'description' => '80L, Nettoyage automatique',              'image' => 'Four'],
            ['id' => 46, 'name' => 'Congélateur Vertical',       'price' => 449.99,  'description' => '260L, A+, Décongélation rapide',          'image' => 'Congélateur'],
            ['id' => 47, 'name' => 'Climatiseur Réversible',     'price' => 1299.99, 'description' => '3000W, Chauffage + Refroidissement',      'image' => 'Climatiseur'],
            ['id' => 48, 'name' => 'Sèche-linge Condensation',   'price' => 649.99,  'description' => '8kg, A++, Capteur humidité',              'image' => 'Sèche-linge'],
            ['id' => 49, 'name' => 'Radiateur Électrique Connecté', 'price' => 399.99, 'description' => '2000W, WiFi, Thermostat',               'image' => 'Chauffage'],
        ];
        return view('grand-electromenage', compact('config', 'products'));
    }
}

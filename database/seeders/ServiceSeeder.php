<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'slug' => 'conseil-management',
                'icon' => 'building',
                'title_fr' => 'Conseil en Management des Organisations',
                'title_en' => 'Organisational Management Consulting',
                'summary_fr' => 'Stratégie fiable, outils simples, pour atteindre la performance par anticipation.',
                'summary_en' => 'Reliable strategy and simple tools to achieve anticipated performance.',
                'body_fr' => "Gérer une entreprise demande beaucoup d'énergie. J'interviens pour mettre en place une stratégie fiable permettant d'atteindre la performance escomptée et de prendre les bonnes décisions au moment opportun.\n\nMon intervention couvre : la fidélisation clients, l'innovation, la qualité des relations internes, fournisseurs et clients.",
                'body_en' => "Running a business takes a great deal of energy. I step in to establish a reliable strategy enabling you to reach expected performance and make the right decisions at the right time.\n\nMy scope covers: customer loyalty, innovation, and the quality of internal, supplier and client relationships.",
                'order' => 1,
            ],
            [
                'slug' => 'conception-gestion-projets',
                'icon' => 'clipboard',
                'title_fr' => 'Conception et Gestion des Projets',
                'title_en' => 'Project Design and Management',
                'summary_fr' => "+10 ans d'expérience dans la conduite de projets complexes pour des organisations africaines et internationales.",
                'summary_en' => '+10 years of experience managing complex projects for African and international organisations.',
                'body_fr' => "Maîtrise de la conception de projets avec +10 ans d'expérience.\n\nProjet phare : Incubateur d'entrepreneurs sociaux → +500 jeunes accompagnés, +90 entreprises stables, agrément gouvernemental 2022.\n\nRôles : conception, recherche de financements, mise en œuvre, pilotage d'équipe, reporting bailleurs.",
                'body_en' => "Project design expertise with +10 years of experience.\n\nFlagship project: Social entrepreneur incubator → +500 young people supported, +90 stable businesses, government accreditation 2022.\n\nRoles: design, fundraising, implementation, team management, donor reporting.",
                'order' => 2,
            ],
            [
                'slug' => 'intelligence-economique',
                'icon' => 'search',
                'title_fr' => 'Intelligence Économique en Afrique',
                'title_en' => 'Economic Intelligence in Africa',
                'summary_fr' => "+15 ans dans la conduite de missions d'Intelligence Économique.",
                'summary_en' => '+15 years conducting Economic Intelligence missions.',
                'body_fr' => "+15 ans dans la conduite de missions d'IE : procédés défensifs / offensifs / d'influence.\n\nMissions types :\n- Collecte OSINT\n- Benchmarking — Best Practices\n- Veille OSINT + SWOT\n- Due Diligence\n- Cartographie client\n- Construction d'argumentaires de lobbying\n- Implémentation de départements IE",
                'body_en' => "+15 years conducting EI missions: defensive / offensive / influence.\n\nTypical missions:\n- OSINT data collection\n- Benchmarking — Best Practices\n- OSINT + SWOT monitoring\n- Due Diligence\n- Client mapping\n- Lobbying strategy building\n- EI department setup",
                'order' => 3,
            ],
            [
                'slug' => 'veille-due-diligence',
                'icon' => 'shield',
                'title_fr' => 'Veille Stratégique · Due Diligence · Protection des données',
                'title_en' => 'Strategic Watch · Due Diligence · Data Protection',
                'summary_fr' => 'Veille concurrentielle, diligence raisonnable et conformité des données personnelles.',
                'summary_en' => 'Competitive watch, due diligence and personal data compliance.',
                'body_fr' => "Veille Stratégique : veille concurrentielle, environnementale et sociétale.\n\nDue Diligence : vérifications juridiques, financières, environnementales et sociales avant toute signature.\n\nProtection des données : conformité aux lois camerounaises et internationales.",
                'body_en' => "Strategic Watch: competitive, environmental and societal monitoring.\n\nDue Diligence: legal, financial, environmental and social checks before any signature.\n\nData Protection: compliance with Cameroonian and international law.",
                'order' => 4,
            ],
            [
                'slug' => 'projets-developpement',
                'icon' => 'globe',
                'title_fr' => 'Projets de Développement',
                'title_en' => 'Development Projects',
                'summary_fr' => "Conception, gestion opérationnelle, gestion financière et évaluation d'impact de projets financés par des bailleurs internationaux.",
                'summary_en' => 'Design, operational management, financial management and impact assessment of internationally funded projects.',
                'body_fr' => "Conception, gestion opérationnelle, gestion financière et évaluation d'impact de projets de développement, notamment financés par des bailleurs internationaux (AICS, CEI, ONG AVSI).\n\nExpérience directe de coordination locale, rédaction de rapports bailleurs, gestion des relations institutionnelles.",
                'body_en' => "Design, operational management, financial management and impact assessment of development projects, notably funded by international donors (AICS, CEI, AVSI NGO).\n\nDirect experience in local coordination, donor reporting, and institutional relations management.",
                'order' => 5,
            ],
        ];

        foreach ($services as $data) {
            Service::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}

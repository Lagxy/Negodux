<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mentor;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mentors = [
            [
                'name' => 'Budi Santoso',
                'title' => 'Supply Chain Expert',
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'expertise' => 'Supply Chain',
                'years_experience' => '15+ years in logistics and distribution',
                'email' => 'budi.santoso@example.com',
                'about' => 'Supply chain expert passionate about optimizing distribution networks and logistics operations. Proven track record in helping SMEs streamline their supply chain processes and reduce costs.',
                'education' => 'Master in Supply Chain Management, ITB Bandung',
                'areas_of_expertise' => [
                    'Logistics Optimization',
                    'Distribution Strategy',
                    'Inventory Management',
                    'Warehouse Operations',
                    'Cost Reduction'
                ],
                'achievements' => [
                    'Reduced logistics costs by 30% for 10+ businesses',
                    'Implemented WMS for traditional businesses',
                    'Certified Supply Chain Professional (CSCP)',
                    'Speaker at Indonesia Logistics Summit'
                ],
                'portfolio' => [
                    [
                        'title' => 'Kopi Distribution Network',
                        'description' => 'Expanded distribution network from 5 to 25 outlets within 6 months'
                    ],
                    [
                        'title' => 'Batik Supply Chain',
                        'description' => 'Optimized raw material sourcing, reducing costs by 25%'
                    ]
                ]
            ],
            [
                'name' => 'Dewi Lestari',
                'title' => 'Marketing Strategist',
                'photo' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&h=400&fit=crop',
                'expertise' => 'Marketing',
                'years_experience' => '12+ years in digital marketing and branding',
                'email' => 'dewi.lestari@example.com',
                'about' => 'Digital marketing expert passionate about helping traditional Indonesian businesses transition to the digital age. Proven track record in e-commerce growth and social media strategy.',
                'education' => 'Master in Marketing Communication, LSPR Jakarta',
                'areas_of_expertise' => [
                    'Digital Marketing Strategy',
                    'Social Media Management',
                    'E-commerce Development',
                    'Brand Positioning',
                    'Content Marketing'
                ],
                'achievements' => [
                    'Grew online sales by 300% for 15+ SME clients',
                    'Built e-commerce presence for 50+ traditional businesses',
                    'Speaker at Indonesia Digital Marketing Summit',
                    'Certified Google Digital Marketing Expert'
                ],
                'portfolio' => [
                    [
                        'title' => 'Batik Heritage',
                        'description' => 'Launched e-commerce website within 3 months, achieving 100+ online sales in first month'
                    ],
                    [
                        'title' => 'Kerajian Nusantara',
                        'description' => 'Built Instagram following from 0 to 50K in 1 year'
                    ]
                ]
            ],
            [
                'name' => 'Ahmad Wijaya',
                'title' => 'Finance Consultant',
                'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop',
                'expertise' => 'Finance',
                'years_experience' => '20+ years in financial planning and investment',
                'email' => 'ahmad.wijaya@example.com',
                'about' => 'Finance consultant specializing in helping SMEs with financial planning, investment strategies, and sustainable growth. Expert in financial modeling and business valuation.',
                'education' => 'Master of Finance, University of Indonesia',
                'areas_of_expertise' => [
                    'Financial Planning',
                    'Investment Strategy',
                    'Business Valuation',
                    'Cash Flow Management',
                    'Risk Assessment'
                ],
                'achievements' => [
                    'Helped 25+ businesses secure funding',
                    'Certified Financial Planner (CFP)',
                    'Published author on SME finance',
                    'Reduced financial risks for 100+ businesses'
                ],
                'portfolio' => [
                    [
                        'title' => 'Furniture Expansion',
                        'description' => 'Secured $500K investment for furniture export expansion'
                    ],
                    [
                        'title' => 'Organic Products',
                        'description' => 'Optimized pricing strategy, increasing profit margins by 15%'
                    ]
                ]
            ],
            [
                'name' => 'Siti Nurhaliza',
                'title' => 'Export Specialist',
                'photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop',
                'expertise' => 'International Trade',
                'years_experience' => '10+ years in export-import regulations',
                'email' => 'siti.nurhaliza@example.com',
                'about' => 'Export specialist helping Indonesian SMEs navigate international trade. Expert in export documentation, compliance, and developing international market entry strategies.',
                'education' => 'Bachelor in International Trade, Universitas Gadjah Mada',
                'areas_of_expertise' => [
                    'Export Documentation',
                    'Trade Compliance',
                    'International Marketing',
                    'Customs Procedures',
                    'Market Entry Strategy'
                ],
                'achievements' => [
                    'Helped 30+ businesses secure first export orders',
                    'Expert in ASEAN trade agreements',
                    'Facilitated $2M+ in export transactions',
                    'Certified International Trade Professional'
                ],
                'portfolio' => [
                    [
                        'title' => 'Furniture Export Success',
                        'description' => 'Helped secure first European export order within 6 months'
                    ],
                    [
                        'title' => 'Handicraft International',
                        'description' => 'Obtained all necessary export certifications for 5 different product lines'
                    ]
                ]
            ],
            [
                'name' => 'Rudi Hartono',
                'title' => 'Operations Manager',
                'photo' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=400&fit=crop',
                'expertise' => 'Operations',
                'years_experience' => '18+ years in production optimization',
                'email' => 'rudi.hartono@example.com',
                'about' => 'Operations expert passionate about improving production efficiency and quality management. Specialized in helping manufacturing SMEs scale without compromising quality.',
                'education' => 'Master in Industrial Engineering, Institut Teknologi Sepuluh Nopember',
                'areas_of_expertise' => [
                    'Production Optimization',
                    'Quality Management',
                    'Process Improvement',
                    'Lean Manufacturing',
                    'Team Training'
                ],
                'achievements' => [
                    'Reduced production defects by 50% on average',
                    'Lean Six Sigma Black Belt certified',
                    'Trained 200+ craftsmen and workers',
                    'Implemented QC systems for 40+ businesses'
                ],
                'portfolio' => [
                    [
                        'title' => 'Leather Goods Quality',
                        'description' => 'Implemented standardized QC checklist, reducing defect rate to under 1%'
                    ],
                    [
                        'title' => 'Manufacturing Efficiency',
                        'description' => 'Increased production capacity by 40% without additional staff'
                    ]
                ]
            ],
            [
                'name' => 'Linda Kusuma',
                'title' => 'Branding Expert',
                'photo' => 'https://images.unsplash.com/photo-1594744803329-e58b31de8bf5?w=400&h=400&fit=crop',
                'expertise' => 'Branding',
                'years_experience' => '14+ years in brand development and design',
                'email' => 'linda.kusuma@example.com',
                'about' => 'Branding expert helping businesses create compelling brand identities that resonate with customers. Specialized in package design and visual identity for traditional businesses.',
                'education' => 'Bachelor in Visual Communication Design, Institut Seni Indonesia',
                'areas_of_expertise' => [
                    'Brand Identity',
                    'Package Design',
                    'Visual Communication',
                    'Brand Strategy',
                    'Logo Design'
                ],
                'achievements' => [
                    'Designed brand identities for 60+ businesses',
                    'Award-winning package designs',
                    'Increased brand recognition by 80% on average',
                    'Featured in Indonesian Design Magazine'
                ],
                'portfolio' => [
                    [
                        'title' => 'Snack Rebranding',
                        'description' => 'Complete brand refresh leading to 50% increase in retail presence'
                    ],
                    [
                        'title' => 'Organic Soap Brand',
                        'description' => 'Developed eco-friendly packaging that won sustainability award'
                    ]
                ]
            ]
        ];

        foreach ($mentors as $mentor) {
            Mentor::create($mentor);
        }
    }
}

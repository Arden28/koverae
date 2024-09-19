<?php
namespace Modules\Contact\Handlers;

use App\Models\Company\Company;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Modules\App\Handlers\AppHandler;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Entities\HonorificTitle;
use Modules\Contact\Entities\Industrie;
use Modules\Contact\Entities\Localization\Country;

class ContactAppHandler extends AppHandler
{
    protected function getModuleSlug()
    {
        return 'contact';
    }

    protected function handleInstallation($company)
    {
        // Example: Create contact-related data and initial configuration
        $this->createHonorificsTitles($company);
        $this->createIndustries($company);
        $this->createCountries($company);
        $this->createContacts($company);
    }

    protected function handleUninstallation()
    {
        // Example: Drop blog-related tables and clean up configurations
    }

    /**
     * Create honorifics titles.
     *
     * @param int $companyId
     */
    private function createHonorificsTitles(int $companyId){

        $titles = [
            [
                'title' => 'Mister',
                'abbreviation' => 'Mr.',
            ],
            [
                'title' => 'Madam',
                'abbreviation' => 'Mrs.',
            ],
            [
                'title' => 'Miss',
                'abbreviation' => 'Ms.',
            ],
            [
                'title' => 'Doctor',
                'abbreviation' => 'Dr.',
            ],
            [
                'title' => 'Professor',
                'abbreviation' => 'Prof.',
            ],
        ];

        foreach($titles as $title){
            HonorificTitle::create(array_merge(['company_id' => $companyId], $title));
        }
    }

    /**
     * Create honorifics titles.
     *
     * @param int $companyId
     */
    private function createIndustries(int $companyId){

        $industries = [
                [
                    'name' => 'Agriculture',
                    'full_name' => "Agriculture and Agri-food Sector",
                ],
                [
                    'name' => 'Mining',
                    'full_name' => 'Mining Industry and Mineral Extraction',
                ],
                [
                    'name' => 'Energy',
                    'full_name' => "Energy and Natural Resources Sector",
                ],
                [
                    'name' => 'Finance',
                    'full_name' => 'Financial and Banking Services',
                ],
                [
                    'name' => 'Telecommunications',
                    'full_name' => 'Telecommunications and Network Industry',
                ],
                [
                    'name' => 'Transport',
                    'full_name' => 'Transport and Logistics',
                ],
                [
                    'name' => 'Logistics',
                    'full_name' => "Logistics and Supply Chain Management",
                ],
                [
                    'name' => 'Construction',
                    'full_name' => 'Construction and Civil Engineering Sector',
                ],
                [
                    'name' => 'Real Estate',
                    'full_name' => 'Real Estate Market and Property Management',
                ],
                [
                    'name' => 'Tourism',
                    'full_name' => "Tourism and Hospitality Industry",
                ],
                [
                    'name' => 'Education',
                    'full_name' => 'Educational System and Training',
                ],
                [
                    'name' => 'Health',
                    'full_name' => "Health and Medical Services",
                ],
                [
                    'name' => 'Trade',
                    'full_name' => 'Retail and Wholesale Trade',
                ],
                [
                    'name' => 'Industry',
                    'full_name' => 'Manufacturing and Industrial Sector',
                ],
                [
                    'name' => 'Technology',
                    'full_name' => "Information and Communication Technology (ICT)",
                ],
                [
                    'name' => 'Water and Sanitation',
                    'full_name' => "Water Resources Management and Sanitation Services",
                ],
                [
                    'name' => 'Renewable Energy',
                    'full_name' => "Renewable Energy Production and Sustainable Solutions",
                ],
                [
                    'name' => 'Forestry',
                    'full_name' => 'Forestry Management and Sustainable Exploitation',
                ],
                [
                    'name' => 'Fishing',
                    'full_name' => 'Fishing Industry and Aquaculture',
                ],
                [
                    'name' => 'Agri-food',
                    'full_name' => 'Agri-food Industry and Food Processing',
                ],
                [
                    'name' => 'Professional Services',
                    'full_name' => 'Professional, Scientific, and Technical Services',
                ],
                [
                    'name' => 'Environment',
                    'full_name' => "Environmental Protection and Sustainable Resource Management",
                ],
                [
                    'name' => 'Media',
                    'full_name' => "Media, Information and Communication Sector",
                ],
                [
                    'name' => 'Culture',
                    'full_name' => 'Cultural and Artistic Sector',
                ],
                [
                    'name' => 'Crafts',
                    'full_name' => "Crafts and Production of Cultural Goods",
                ],
                [
                    'name' => 'E-commerce',
                    'full_name' => 'E-commerce and Online Sales',
                ],
                [
                    'name' => 'Mobile Financial Services',
                    'full_name' => 'Mobile Financial Services and Digital Banking',
                ],
                [
                    'name' => 'Solar Energy',
                    'full_name' => "Solar Energy Industry and Photovoltaic Solutions",
                ],
                [
                    'name' => 'Aquaculture',
                    'full_name' => "Aquaculture and Aquatic Production Sector",
                ],
                [
                    'name' => 'Biotechnology',
                    'full_name' => 'Biotechnology Sector and Scientific Research',
                ],
                [
                    'name' => 'Security',
                    'full_name' => 'Security Services and Protection',
                ],
                [
                    'name' => 'Waste Management',
                    'full_name' => 'Waste Management and Recycling',
                ],
                [
                    'name' => 'Microfinance',
                    'full_name' => 'Microfinance Services and Support for Small Businesses',
                ],
                [
                    'name' => 'Agricultural Processing',
                    'full_name' => 'Agricultural Processing Industry and Local Product Enhancement',
                ],
                [
                    'name' => 'Pharmaceutical Industry',
                    'full_name' => "Production and Distribution of Pharmaceutical Products",
                ],
                [
                    'name' => 'Fintech',
                    'full_name' => 'Financial Technologies and Innovation in Financial Services',
                ],
        ];

        foreach($industries as $industry){
            Industrie::create(array_merge(['company_id' => $companyId], $industry));
        }
    }

    /**
     * Create honorifics titles.
     *
     * @param int $companyId
     */
    private function createCountries(int $companyId){

        $response = Http::retry(3, 100)->get('https://restcountries.com/v3.1/all');
        $countries = $response->json();

        foreach($countries as $country){
            Country::create([
                'company_id' => $companyId,
                'common_name' => $country['name']['common'],
                'official_name' => $country['name']['official'],
                'country_code' => $country['cca2'],
                // 'currency_code' => ,
                'flag' => $country['flags']['svg'],
                'start_of_week' => $country['startOfWeek'],
                'googleMaps' => $country['maps']['googleMaps'],
                'openStreetMaps' => $country['maps']['openStreetMaps'],
            ]);
        }
    }

    private function createContacts(int $companyId){
        $company = Company::find($companyId)->first();

        $businessContacts = [
            [
            'company_id' => $companyId,
            'user_id' => null,
            'name' => $company->name,
            'street' => $company->address,
            'city' => $company->city,
            'phone' => $company->phone,
            'mobile' => null,
            'email' => $company->email,
            'website' => $company->domain_name.'.koverae.com',
            'reference' => $company->name,
            'type' => 'company',
            ]
        ];
        foreach($businessContacts as $contact){
            Contact::create($contact);
        }

        $personalContacts = User::isCompany($companyId)->get();

        foreach($personalContacts as $contact){
            Contact::create([
                'company_id' => $companyId,
                'user_id' => null,
                'name' => $contact->name,
                'company_name' => $contact->company->name,
                'street' => $contact->address,
                'city' => $contact->city,
                'phone' => $contact->phone,
                'mobile' => null,
                'email' => $contact->email,
                'reference' => $contact->name,
                'type' => 'individual',
            ]);
        }

    }
}

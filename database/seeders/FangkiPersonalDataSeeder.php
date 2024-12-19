<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\PersonalData;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FangkiPersonalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [

            [
                'company_name'  => 'PT ADS Digital Partner Surabaya',
                'job_title'     => 'Fullstack Web Developer',
                'start_date'    => '2024-02',
                'end_date'      => '2024-06',
                'description'   => 'Apply the Agile method in software development//Convert the page that has been created by the UI/UX designer into PHP program code using the Laravel framework//Integrating the database that has been created by the backend developer into the financing management website//Collaborating with other developers in developing the financing management website using GitLab//Optimising the performance and efficiency of the website program code using the Laravel Debugbar tool//Maintain and test the program code that has been created using PHPUnit and those available in Laravel',
            ],
            [
                'company_name'  => 'Diponegoro University',
                'job_title'     => 'Practice Assistant of Database System Practicum',
                'start_date'    => '2023-09',
                'end_date'      => '2023-12',
                'description'   => 'Provide students with an understanding of MySQL and Oracle Database//Explain and apply the use of Oracle Database in Java EE Netbeans programme',
            ],
            [
                'company_name'  => 'Diponegoro University',
                'job_title'     => 'Practice Assistant of Software Engineering Practicum',
                'start_date'    => '2023-02',
                'end_date'      => '2023-06',
                'description'   => 'Guiding students in preparing Software functional and non-functional Requirement Specification documents//Provide students with an understanding of modelling and requirements analysis using diagrams in software design//Assist students in understanding object-oriented design techniques using the Unified Modeling Language (UML) in software design',
            ],
            [
                'company_name'  => 'PT Kalimas Arubu Indonesia Semarang',
                'job_title'     => 'Backend Web Developer',
                'start_date'    => '2022-12',
                'end_date'      => '2023-02',
                'description'   => 'Designing and developing backend systems for web using MySQL//Sorting through data for 100+ car types available//Performing checks and validation for each cars data//Implementing the relationship between model data and car types using Eloquent in Laravel',
            ],
            [
                'company_name'  => 'LPPM Diponegoro University',
                'job_title'     => 'Data Entry',
                'start_date'    => '2022-08',
                'end_date'      => '2022-09',
                'description'   => 'Validate 1000++ lecturer journal data available in spreadsheet form//Synchronizing available journal data and data in the SINTA (Science and Technology Index) system//Inputting research data of lecturers and students into SINTA (Science and Technology Index) system',
            ],
            [
                'company_name'  => 'Tegal Learning Center',
                'job_title'     => 'Web Developer Internship',
                'start_date'    => '2021-06',
                'end_date'      => '2021-07',
                'description'   => 'Designing the website system requirements for the organization//Designing the user interface using Figma software//Implementing HTML, JS, and CSS code according to the user interface design//Developing and maintaining the website',
            ],
        ];


        $projects = [
            [
                'name' => 'Barcode App',
                'category' => 'Web',
                'tech_stacks' => 'React, Tailwind, React-QR, Node',
                'demo_url' => 'kiar.vercel.app',
                'thumbnail_image' => 'project_kiar.jpg', 
            ],
            [
                'name' => 'Bookshelf API',
                'category' => 'API',
                'tech_stacks' => 'Node JS, Express',
                'demo_url' => 'bookshelf-api-express.vercel.app',
                'thumbnail_image' => 'project_bookshelf.jpeg'
            ],
            [
                'name' => 'Furniture Store',
                'category' => 'Web',
                'tech_stacks' => 'Laravel, Livewire, Furniture API',
                'demo_url' => 'furni-store.kihub.net',
                'thumbnail_image' => 'project_furni_store.jpg'
            ],
            [
                'name' => 'Unicon Company Profile',
                'category' => 'Web',
                'tech_stacks' => 'Odoo Software',
                'demo_url' => 'uniconindonesia.com',
                'thumbnail_image' => 'project_unicon_compro_web.jpg'
            ],
        ];
        
        foreach ($experiences as $experience) {
            Experience::create([
                'company_name'  => $experience['company_name'],  
                'job_title'     => $experience['job_title'],     
                'start_date'    => $experience['start_date'],    
                'end_date'      => $experience['end_date'],      
                'description'   => $experience['description'],   
            ]);
        }

        foreach ($projects as $project) {
            Project::create([
                'name' => $project['name'],
                'category' => $project['category'],
                'tech_stacks' => $project['tech_stacks'],
                'demo_url' => $project['demo_url'],
                'thumbnail_image' => $project['thumbnail_image'],
            ]);
        }



    }
}

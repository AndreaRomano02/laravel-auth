<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $project = new Project();
    $project->title = 'Boolzap';
    $project->url = 'https://github.com/AndreaRomano02/boolzap_api';
    $project->description = 'Un\'applicazine web dove replica il designe e le funzionalità di boolzap.
     L\' ho gestita con Vite e Vue in quanto Frontend, mentre lato Backend ho utilizato PHP plane, simulato come Database un file JSON. ';
    $project->save();
  }
}

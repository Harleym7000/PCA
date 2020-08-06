<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::truncate();
        Contact::create([
            'first_name' => 'Test',
            'surname' => 'User',
            'subject' => 'Subject',
            'message' => 'This is a test contact message'
            ]);
    }
}

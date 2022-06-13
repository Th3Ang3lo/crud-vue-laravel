<?php

namespace App\Console\Commands;

use App\Models\Admins;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->validate_cmd(function() {
            return $this->ask('Enter admin name');
        }, ['name', 'required', 'max:255']);

        $email = $this->validate_cmd(function() {
            return $this->ask('Enter admin e-mail');
        }, ['email', 'email', 'required', 'max:255']);

        $password = Hash::make($this->validate_cmd(function() {
            return $this->ask('Enter admin password');
        }, ['password', 'required', 'max:255', 'min:6']));

        $admin = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        Admins::create($admin);

        $this->info('Admin "'.$name.'" with e-mail "'.$email.'" successful created');

        return 0;
    }

    public function validate_cmd($method, $rules)
    {
        $value = $method();
        $validate = $this->validateInput($rules, $value);

        if ($validate !== true) {
            $this->warn($validate);
            $value = $this->validate_cmd($method, $rules);
        }
        return $value;
    }

    public function validateInput($rules, $value)
    {

        $validator = Validator::make([$rules[0] => $value], [ $rules[0] => $rules[1] ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return $error->first($rules[0]);
        }else{
            return true;
        }

    }
}

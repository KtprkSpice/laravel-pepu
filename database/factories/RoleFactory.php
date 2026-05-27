<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
           $roles = [
             [
            "name"=> "admin",
            "description"=> "for admin",
             ],
             [
            "name"=> "member",
            "description"=> "for member",
             ],
             [
            "name"=> "staff",
            "description"=> "for staff",
             ],
           ];

           return fake()->randomElement($roles);
    }
}

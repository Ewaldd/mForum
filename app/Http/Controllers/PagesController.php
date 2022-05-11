<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Database\Seeders\PermissionsSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PagesController extends Controller {
    public function setupFirstStep() {
        return view('setup.first-step');
    }

    public function setupFirstStepCreate(Request $request) {
        return redirect(route('setupSecondStep'));
    }

    public function setupSecondStep() {
        return view('setup.second-step');
    }

    public function setupSecondStepCreate(Request $request) {
        $request->validate(
            ['name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],]
        );
        $role = Role::create(['name' => 'Administrator']);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->assignRole($role);
        return redirect(route('setupThirdStep'));
    }

    public function setupThirdStep() {
        return view('setup.third-step');
    }

    public function setupThirdStepCreate(Request $request) {
        $request->validate(
            ['category_name' => ['required', 'string', 'max:255']]
        );
        $category = Category::create([
            'name' => $request['category_name']
        ]);
        Post::create([
            'title' => "Hello World!",
            'content' => "Thank You for using mForum!",
            'author_id' => 1,
            'category_id' => $category->id
            ]);
        return redirect('/');
    }
}

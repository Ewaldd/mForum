<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class PagesController extends Controller {
    public function index() {
        return view('welcome', ['cats' => Category::where('category_parent_id', '=', null)->with(['posts', 'sub_categories'])->withcount('posts')->get()]);
    }

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
            'name' => $request['category_name'],
            'slug' => Str::slug($request['category_name'])
        ]);
        Post::create([
            'title' => "Hello World!",
            'slug' => Str::slug("Hello World!"),
            'content' => "Thank You for using mForum!",
            'author_id' => 1,
            'category_id' => $category->id,
            'ended' => 0
        ]);
        return redirect('/');
    }

    public function acp_index() {
        return view('acp.index');
    }

    public function acp_reports() {
        $open = Report::where(['ended' => 0])->with(['reporter', 'reported', 'post'])->get();
        $closed = Report::where(['ended' => 1])->with(['reporter', 'reported', 'post'])->get();
        return view('acp.reports', ['open' => $open, 'closed' => $closed]);
    }

    public function acp_users() {
        return view('acp.users', ['users' => User::all(['id', 'name', 'created_at'])]);
    }

    public function acp_user($user) {
        return view('acp.user', ['user' => User::where(['name' => $user])->with(['roles', 'posts'])->first()]);
    }

    public function acp_stats_user($user) {
        $user = User::where(['name' => $user])->with(['roles', 'posts'])->first();
        $posts=DB::table('posts')
            ->select(DB::raw('count(*) as total'),DB::raw('date(created_at) as dates'))
            ->where(['author_id' => $user->id])
            ->groupBy('dates')
            ->orderBy('dates')
            ->get();
        $days = [];
        $count = [];
        foreach($posts as $post){
            $days[] = $post->dates;
            $count[]=$post->total;
        }
        return view('acp.user_stats', ['user' => $user, 'days' => json_encode($days), 'count' => json_encode($count)]);
    }

    public function acp_change_user_information(Request $request) {
        $request->validate([
            'newName' => 'required|min:3'
        ]);
        $user = User::where(['name' => $request->name])->first();
        $user->name = $request->newName;
        $user->save();
        return redirect(route('acp_user', ['name' => $request->newName]));
    }

}

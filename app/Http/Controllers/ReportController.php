<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'reason' => 'required|min:5'
        ]);
        $post = Post::where(['id' => $request->id])->with('user')->first();
        $report = new Report();
        $report->reported_post_id = $post->id;
        $report->reporter_user_id = auth()->user()->id;
        $report->reported_user_id = $post->user->id;
        $report->reason = $request->reason;
        $report->save();
        return redirect(route('post_show', ['id' => $post->id, 'slug' => $post->slug]));
    }
    public function showReport($id){
        $report = Report::where(['id' => $id])->with('post', 'reporter', 'reported')->first();
        return view('acp.report', ['report' => $report]);
    }
    public function setResult(Request $request){
        $report = Report::find($request->id);
        $report->ended = 1;
        $report->save();

        return redirect(route('acp_reports'));
    }
}

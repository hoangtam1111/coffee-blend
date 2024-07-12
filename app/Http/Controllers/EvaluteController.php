<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\EvaluteRepositoryInterface;
use Illuminate\Http\Request;

class EvaluteController extends Controller
{
    private $evalute;

    public function __construct(EvaluteRepositoryInterface $evaluteRepositoryInterface){
        $this->evalute=$evaluteRepositoryInterface;

    }

    public function index(){
        $evalutes=$this->evalute->getAllEvalutes();
        return view('admin.evalute.index',compact('evalutes'));
    }
    public function addEvalute(Request $request){
        if(session()->get('id')){
            $request->validate([
                'subject' => 'required',
                'message' => 'required',
            ],[
                'subject.required' => 'Please enter your subject',
                'message.required' => 'Please enter your message',
            ]);

            $this->evalute->insertEvalute([
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
                'email' => $request->get('email'),
                'name' => $request->get('name'),
                'user_id' => session()->get('id')
            ]);
        }else{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ],[
                'name.required' => 'Please enter your subject',
                'email.required' => 'Please enter your subject',
                'subject.required' => 'Please enter your subject',
                'message.required' => 'Please enter your message',
            ]);

            $this->evalute->insertEvalute([
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
                'email' => $request->get('email'),
                'name' => $request->get('name'),
                'user_id' => 1
            ]);
        }

        return redirect()->route('home');
    }
    public function insert(){
        return view('admin.evalute.insert');
    }
    public function postInsert(Request $request){
        $data = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'email' => 'required|email',
            'name' => 'required'
        ],[
            'subject.required' => 'Please enter your subject',
            'message.required' => 'Please enter your message',
            'email.required' => 'Please enter your email',
            'email.email' => 'Please enter your email',
            'name.required' => 'Please enter your name'
        ]);
        $this->evalute->insertEvalute($data);
        return redirect()->route('admin.evalute.index');
    }
    public function update($id){
        $evalute=$this->evalute->getEvalute($id);
        if($evalute){
            return view('admin.evalute.update',compact('evalute'));
        }
        return redirect()->route('admin.evalute.update');
    }
    public function postUpdate(Request $request){
        $data = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'email' => 'required|email',
            'name' => 'required'
        ],[
            'subject.required' => 'Please enter your subject',
            'message.required' => 'Please enter your message',
            'email.required' => 'Please enter your email',
            'email.email' => 'Please enter your email',
            'name.required' => 'Please enter your name'
        ]);
        $this->evalute->updateEvalute($data,$request->get('id'));
        return redirect()->route('admin.evalute.index');
    }
    public function delete($id){
        $this->evalute->deleteEvalute($id);
        return redirect()->route('admin.evalute.index');
    }
}

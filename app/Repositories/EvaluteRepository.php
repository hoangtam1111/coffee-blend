<?php
namespace App\Repositories;
use App\Repositories\Interfaces\EvaluteRepositoryInterface;
use App\Models\Evalute;
class EvaluteRepository implements  EvaluteRepositoryInterface{
    public function getAllEvalutes(){
        return Evalute::get();
    }
    public function getEvalute($id){
        return Evalute::find($id);
    }
    public function getQuantityEvalute($num){
        return Evalute::limit($num)->get();

    }
    public function insertEvalute($data){
        Evalute::create($data);
    }
    public function updateEvalute($data,$id){
        $evalute=Evalute::where('id',$id)->first();
        $evalute->subject=$data['subject'];
        $evalute->message=$data['message'];
        $evalute->name=$data['name'];
        $evalute->email=$data['email'];
        $evalute->user_id=$data['user_id'];
        $evalute->save();
    }
    public function deleteEvalute($id){
        $evalute=Evalute::find($id);
        $evalute->delete();
    }
}

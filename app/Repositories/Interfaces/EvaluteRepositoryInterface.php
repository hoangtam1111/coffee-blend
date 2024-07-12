<?php
namespace App\Repositories\Interfaces;
interface EvaluteRepositoryInterface{
    public function getAllEvalutes();
    public function getEvalute($id);
    public function getQuantityEvalute($num);
    public function insertEvalute($data);
    public function updateEvalute($data,$id);
    public function deleteEvalute($id);
}

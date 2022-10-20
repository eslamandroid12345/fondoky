<?php


namespace App\Interfaces\Web;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{

    public function welcome(Request $request);
    public function index();
    public function update($id);
    public function rooms($id);
    public function reservation(Request $request,$id);
    public function delete($id);
    public function ratesCreate($id);
    public function rates(Request $request);




}
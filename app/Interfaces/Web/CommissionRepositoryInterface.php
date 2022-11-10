<?php


namespace App\Interfaces\Web;

use Illuminate\Http\Request;

interface CommissionRepositoryInterface
{
    public function commissions(Request $request);
    public function index($id);
    public function commissionOfMonth($id);
}
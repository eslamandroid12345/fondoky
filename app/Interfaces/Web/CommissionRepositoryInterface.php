<?php


namespace App\Interfaces\Web;

interface CommissionRepositoryInterface
{
    public function commissions();
    public function index($id);
    public function commissionOfMonth($id);
}
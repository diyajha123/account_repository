<?php
namespace App\Interfaces;

interface AccountRepositoryInterface
{
    public function getAllAccount();
    public function getAccountById($id);
    public function deleteAccount($id);
    public function CreateAccount( $accounts);
    public function updateAccount($account,$newDetails);
   


}



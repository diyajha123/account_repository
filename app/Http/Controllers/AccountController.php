<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Interfaces\AccountRepositoryInterface;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function index()
    {
        $accounts = $this->accountRepository->getAllAccount()
            $accounts = Account::paginate(5);
        return view('accounts.index', ['accounts' => $accounts]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $account = Account::create($request->all());
       
        return redirect()->route('accounts.index')->with('status', 'User Created Successfully');
    }
    public function show($id)
    {
        $account = Account::find($id);
        return view('accounts.show', compact('account'));
    }
    public function edit($id)

    { 
            $account = $this->accountRepository->getAccountById($id);
            return view('accounts.edit', compact('account'));
        
    }

    public function update(Request $request, Account $account)
    {

        Account::find($account->id)->update($request->all());
        $newDetails = $request->except(['_token', '_method']);

        $this->accountRepository->updateAccount($account, $newDetails);

        return redirect()->route('accounts.index')->with('status', 'ACCOUNT UPDATED SUCCESSFULLY');
    }
    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $this->accountRepository->deleteAccount($account);
        return redirect()->route('accounts.index')->with('status', 'deleted');
    }
   
}

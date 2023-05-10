@extends('layouts.app')
@section('content')
    <h1 class="container p-3 bg-dark text-white text-center" style="width:80%;margin-top:5%"> ACCOUNT DETAILS</h1>
    <button type="button" class="btn btn-primary sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
        style="margin-left:10%">
        create
    </button>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    CREATE ACCOUNT

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @include('accounts.create')
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <table class="table table-light table-striped"style=width:80%;margin:auto;>
        <thead>
            <tr>
                {{-- <th scope="col">ID</th> --}}
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Hobbies</th>
                <th scope="col">Gender</th>
                <th scope="colspan=2">Operations</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>

                    <td>{{ $account->name }}</td>
                    <td>{{ $account->contact }}</td>
                    <td>{{ $account->email }}</td>
                    <td>{{ $account->hobbies }}</td>
                    <td>{{ $account->gender }}</td>
                    <td style="display: flex">
                    
                    {{-- EDIT --}}

                        <a href="{{ route('accounts.edit', ['account' => $account->id]) }}"
                            class="btn btn-outline-primary btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $account->id }}">edit</a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $account->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Page</h1>
                                      
                                    </div>
                                    <div class="modal-body">
                                        @include('accounts.edit')
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- view page --}}

                        <a href="{{ route('accounts.show', ['account' => $account->id]) }}" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop1{{ $account->id }}"
                            class="btn btn-outline-success btn">show</a>

                        <div class="modal fade" id="staticBackdrop1{{ $account->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel1">SHOW PAGE</h1>
                                       
                                    </div>
                                    <div class="modal-body">
                                        @include('accounts.show')
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('accounts.index') }}" class="btn btn-dark">Back</a>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('accounts.destroy', ['account' => $account['id']]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn">Delete</button>
                            </td>
                </tr>
                </form>
            @endforeach
        </tbody>
    </table>
    <div class="page" style="padding:30px;margin-left:37%;line-height:2">
        {{ $accounts->links() }}

        <style>
            .w-5 {
                display: none;
            }
        </style>
    @endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @include('layouts.sidebar')
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                <h3 class="text-secondry"> 
                                    <i class="fas fa-chair"> Tables </i>
                                </h3>
                                <a href="{{ route("tables.create") }}" class="btn btn-primary">
                                    <i class="fas fa-plus fa-x2"></i>
                                </a>
                               
                            </div>
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Disponible</th>
                                        <th>action</th>
                                    </tr>
                                    <tbody>
                                        @foreach ($tables as $table)
                                        <tr>
                                            <td>
                                                {{ $table->id }}
                                            </td>
                                            <td>
                                                {{ $table->name }}
                                            </td>
                                            <td>
                                                @if ($table->status)
                                                <span class="badge badge-success">
                                                    oui
                                                </span>
                                                @else 
                                                <span class="badge badge-danger">
                                                    non
                                                </span>
                                                @endif
                                            </td>
                                            <td class="d-flex flex-row justify-content-center align-items-centers">
                                                <a href="{{ route("tables.edit" , $table->slug) }}" class="btn btn-warning mr-1">
                                                    <i class="fas fa-edit "></i>
                                                </a>
                                                <form id="{{ $table->id }}" action="{{ route("tables.destroy" , $table->slug) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button
                                                    onclick="
                                                    event.preventDefault();
                                                    if(confirm('Voulez vous supprimer la table {{ $table->name }} ?'))
                                                    document.getElementById({{ $table->id }}).submit()
                                                     "
                                                    class="btn btn-danger" >
                                                        <i class="fas fa-trash ">

                                                        </i>
                    
                                                    </button>
                                                    </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </thead>
                            </table>
                            <div class="my-3 d-flex justify-content-center align-items-center">
                                {{ $tables->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@extends('layout.app')
@include('home.navbar')


<div class="container mt-5">
    <div class="row mt-5 m-2">
        <div class="card col-md-8 mx-auto col-sm-12">
            <div class="card-body">
                <table class="table table-sm">
                    <thead class="text-center">
                        <th class="col-2">ID</th>
                        <th>Name User</th>
                        <th>rol</th>
                        <th>option</th>
                    </thead>
                    <tbody>
                        <form action="" method="POST">
                            @foreach ($user as $usu => $value)
                            <tr>
                                <td class="text-center">
                                    <input type="text" class="col-2 border border-0" disabled value="{{$value->id}}"  />
                                </td>
                                <td>{{$value->name}}</td>
                                <td class="col-4">
                                    <select class="form-select form-select-sm border-0 " required aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        
                                      </select>
                                </td>
                                <td class="text-center col-2"><input type="submit" value="update" class="btn btn-sm btn-success"></td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach     
                        </form>         
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</div>


@extends('layouts.master')
@section('content')

<div class="container mt-4">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>statu</th>
                        <th>.....</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011-04-25</td>
                        <td><button type="button" class="btn btn-danger" > <i class="bi bi-trash"></i>Dark</button></td>
                    </tr>
                   
                    
                </tbody>
               
            </table>
</div>           

@stop
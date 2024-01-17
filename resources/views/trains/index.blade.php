@extends('layouts.app')

@section('content')
   <div class="container">
    <h1>Treni in partenza:</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope='col'>Codice</th>
                <th scope='col'>Compagnia</th>
                <th scope='col'>Stazione di partenza</th>
                <th scope='col'>Stazione di arrivo</th>
                <th scope='col'>Orario di partenza</th>
                <th scope='col'>Orario di arrivo</th>
                <th scope='col'>Puntuale?</th>
                <th scope='col'>Cancellato?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
                <tr>
                    <th scope='row'>{{ $train->codice }}</th>
                    <th>{{ $train->azienda }}</th>
                    <th>{{ $train->stazione_partenza }}</th>
                    <th>{{ $train->stazione_arrivo }}</th>
                    <th>{{ $train->orario_partenza }}</th>
                    <th>{{ $train->orario_arrivo }}</th>
                    <th>{{ $train->puntuale ? 'Puntuale' : 'In ritardo' }}</th>
                    <th>{{ $train->cancellato ? 'Cancellato' : ''}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
   </div>
@endsection
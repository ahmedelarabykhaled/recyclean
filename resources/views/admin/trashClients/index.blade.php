@extends('layouts.admin')
@section('content')


    <table class="table border table-hover table-striped">
        <thead>
        <th>الرقم :</th>
        <th>الID :</th>
        <th>الاسم :</th>
        <th>عدد الاسر :</th>
        <th>المبلغ الشهرى :</th>
        <th>المنطقة :</th>
        </thead>
        <tbody>
        @foreach($trashClients as $client)
            <tr>
                <td>#</td>
                <td>{{ $client->user->user_id }}</td>
                <td>{{ $client->user->name }}</td>
                <td>{{ $client->families_count }}</td>
                <td>{{ \App\Models\TrashSubscription::get()->last()->coast }}</td>
                <td>{{ $client->region->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection

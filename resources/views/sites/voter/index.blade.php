@extends('layouts.header')

@section('nameHeader')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">VOTERS</h1>
    </div>
@endsection

@section('cardTittle')
<h5 class="card-title">List Voter</h5>
@endsection

@section('content')
<div class="col-md-12">
<div class="box">
    <div class="box-body">
        <a href="{{ route('admin.voter.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah</a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">Unique</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Class</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            @if ($voters->count() == 0)
            <tr>
                <td class="text-center"> No Data</td>
            </tr>
            @endif
            @foreach($voters as $i => $voter)
                <tr>
                    <td class="text-center">{{ $i+1 }}</td>
                    <td class="text-center">{{ $voter->unique }}</td>
                    <td class="text-center">{{ $voter->name }}</td>
                    <td class="text-center">{{ $voter->class }}</td>
                    <td class="text-center">{{ $voter->status }}</td>
                    <td class="text-center">
                        <a href="" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

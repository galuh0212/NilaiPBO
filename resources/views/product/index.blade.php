@extends('layouts.app')

@section('title')
<title>Product Page</title>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard')}}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-succes">
                        {{session('status')}}
                    </div>
                    @endif
                    {{__('Halaman Product')}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <a href="{{route('Product.create')}}" class="btn btn-primary">Add Product</a>
                                </div>
                                <div class="card-body">
                                    <div class="table table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>No</th>
                                                <th>Name Product</th>
                                                <th>Stock</th>
                                                <th>Harga</th>
                                            </thead>
                                            <tbody>
                                                @forelse ($product as $pr)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$pr->name_product}}</td>
                                                    <td>{{$pr->stock}}</td>
                                                    <td>{{$pr->harga}}</td>
                                                    <td>{{$pr->category_id}}</td>
                                                    <td>
                                                        <a href="{{route('Product.edit', $pr->id)}}"
                                                            class="btn btn-outline-warning">Edit</a>
                                                        <form action="{{route('Product.destroy', $pr->id)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text">Belum Ada Data</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

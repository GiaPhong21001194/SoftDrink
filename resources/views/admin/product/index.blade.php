@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <span> Manage Products</span>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary ">Add</a>

                </div>
            </div>


        </div>


        <div class="card-body">
            <table class="table table-bordered table-striped">
                <!-- load tablelist of products from here -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($viewData['products'] as $product)
                            @isset($product)
                                <tr>
                                    <td>{{ $product->getId() }}</td>
                                    <td>{{ $product->getName() }}</td>
                                    <td><a href="{{ route('admin.product.edit', ['id' => $product->getId()]) }}"
                                            class="btn btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endisset
                        @endforeach
                    </tbody>
                </table>
            </table>
        </div>
    </div>
    <!-- Add Modal -->
    {{-- <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Error Detection -->
                    @if ($errors->any())
                        <ul class="alert alert-danger list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <!-- Form input field -->
                    <form method="POST" action="{{ route('admin.product.create') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- add form controls to create product -->
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="price" value="{{ old('price') }}" type="number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description') }}
                            </textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                                    <div class="col-lg-10 col-md-6 col-sm-12">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div> --}}
    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirn Delete </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @isset($product)
                        <form action="{{ route('admin.product.delete', $product->getId()) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <span>Are you sure want to delete this product {{ $product->getname() }}?</span>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Confirn</button>
                            </div>
                        </form>
                    @endisset

                </div>

            </div>
        </div>
    </div>

    <!-- Edit  Modal -->
    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif


                        <form method="POST" action="{{ route('admin.product.update', $product->getId()) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')




                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ $product->getName() }}" type="text" class="form-control">
                            </div>



                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="price" value="{{ $product->getPrice() }}" type="number"
                                    class="form-control">
                            </div>





                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input class="form-control" type="file" name="image">
                            </div>


                            <div class="col">
                                &nbsp;
                            </div>


                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ $product->getDescription() }}</textarea>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submi" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div> --}}

@endsection

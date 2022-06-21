@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Added Colleges</div>

                <div class="card-body">
                    @if($colleges->count() > 0)
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th>College Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($colleges as $college)
                                    <tr>
                                        <td><a href="{{route('college.show', $college->id) }}">{{ $college->name }}</a></td>
                                        <td>
                                            <a href="{{route('college.show', $college->id) }}"><button class="btn btn-dark">Info</button></a>
                                            <a href="{{route('college.edit', $college->id) }}"><button class="btn btn-secondary">Edit</button></a>
                                            <button class="btn btn-danger" onclick="handleDelete({{ $college->id }})">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><hr>
                    @else
                    <h4 class="text-center">No Colleges added yet.</h4><br>
                    <a class="" href="{{route('college.create')}}">Add College</a>
                    @endif

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="POST" id="deleteCollegeForm">
                            @csrf
                            @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete College</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <p class="text-center strong">Are you sure you want to delete this college?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deleteCollegeForm')
            form.action='/college/' + id
            $('#deleteModal').modal('show')

        }
    
    </script>
@endsection
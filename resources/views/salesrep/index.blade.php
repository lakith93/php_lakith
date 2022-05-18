@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" integrity="sha512-0V10q+b1Iumz67sVDL8LPFZEEavo6H/nBSyghr7mm9JEQkOAm91HNoZQRvQdjennBb/oEuW+8oZHVpIKq+d25g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    @yield('styles')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row d-flex justify-content-center">
                    <x-alert/>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                {{ __('Sales Team') }}
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('sales-rep.create') }}" class="btn btn-success">Add New</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Current Route</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reps as $rep)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$rep->name}}</td>
                                    <td>{{$rep->email}}</td>
                                    <td>{{$rep->telephone}}</td>
                                    <td>{{$rep->route->name}}</td>
                                    <!--data-target="#repModal" -->
                                    <td><a href=""  onclick="viewSalesRep(event,  {{$rep->id}})" ><i
                                                class="fas fa-eye"
                                                style="color: gray"></i></a>
                                    </td>
                                    <td><a href="sales-rep/{{$rep->id}}/edit"><i class="fas fa-edit"></i></a></td>
                                    {{--                                    <td><a href="products/{{$product->id}}/edit"><i class="fas fa-edit"></i></a></td>--}}
                                    <td><a href="" onclick="deleteSalesRep(event,'delete-form-{{$rep->id}}')"><i class="fas fa-trash" style="color: red"></i></a></td>
                                    <form id="delete-form-{{$rep->id}}" action="{{ route('sales-rep.delete', $rep->id) }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--                        {{ $reps->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="repModal" tabindex="-1" role="dialog" aria-labelledby="repModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="repModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label for="name" class="form-label font-weight-bold">ID:</label>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="id" id="id" value=""
                                   disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label for="name" class="form-label">Full Name:</label>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name" id="name"
                                   value="">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label for="email" class="form-label">Email Address:</label>
                        </div>

                        <div class="col-md-4">
                            <input type="email" class="form-control" name="email" id="email"
                                   value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label for="telephone" class="form-label">Telephone:</label>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="telephone" id="telephone"
                                   value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label for="joined_date" class="form-label">Joined Date:</label>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="joined_date" id="joined_date"
                                   value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label for="route_id" class="form-label">Current Route:</label>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="route_id" id="route_id"
                                   value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label for="comments" class="form-label">Comments:</label>
                        </div>

                        <div class="col-md-6">
                            <textarea id="comments" class="form-control" name="comments" rows="4"
                                      cols="50"></textarea>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <button type="button" data-bs-toggle="modal" id="launch_modal" data-bs-target="#repModal" class="d-none"></button>
@endsection

{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--        crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"--}}
{{--        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"--}}
{{--        crossorigin="anonymous"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"--}}
{{--        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"--}}
{{--        crossorigin="anonymous"></script>--}}

<script>


    function deleteSalesRep(event, form_id) {
        event.preventDefault();
        $.confirm({
            title: 'Confirm?',
            content: 'Are you sure you want to delete this record?',
            type: 'blue',
            buttons: {
                Okey: {
                    text: 'confirm',
                    btnClass: 'btn-blue',
                    action: function () {
                        $(`#${form_id}`).submit();
                    }
                },
                cancel: {
                    text: 'cancel',
                    btnClass: 'btn-red',
                    action: function () {

                    }
                }
            }
        });
    }

    function viewSalesRep(event, id) {
        event.preventDefault();
        $.ajax({
            type: "GET",
            url: "{{ url('sales-rep',) }}" + "/" + id,
            success: function (response) {
                console.log(response);
                $('#id').val(response[0].id);
                $('#repModalLabel').html(response[0].name);
                $('#name').val(response[0].name);
                $('#email').val(response[0].email);
                $('#telephone').val(response[0].telephone);
                $('#joined_date').val(response[0].joined_date);
                $('#route_id').val(response[0].route.name);
                $('#comments').html(response[0].comments);
                $('#launch_modal').click();
            }
        });
    }

</script>

@extends('layouts.admin_layout')
@section('page_title')
    Contact Messages
@endsection
@section('main_content')
    <style>
        #datatable-buttons_info, #datatable-buttons_paginate, #datatable-buttons_filter{
            display: none;
        }
    </style>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="">{{ __('Manage Complain') }}</h5>
                </div>
                <div class="col-md-6 text-end">
                    <button form="delete-form" type="submit" class="btn btn-outline-warning text-dark" onclick="return confirm('Are you sure to delete selected items?')">
                        <i class="fa fa-trash"></i> Delete Selected
                    </button>
                    <button form="allDelete" type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete all messages?')">
                        <i class="fa fa-trash"></i> Delete All
                    </button>
                </div>

            </div>
        </div>
        <form action="{{ route('contact_message.all_delete') }}" id="allDelete" method="POST">
            @csrf
            @method('DELETE')

        </form>

        <div class="card-body form-body">
            <form action="" method="get" id="search_form"></form>
            <form id="delete-form" action="{{ route('contact_message.bulk_delete') }}" method="POST">
                @csrf
                @method('DELETE')
            </form>

            <table class="table  dt-responsive text-center"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr class="main_title">
                    <th scope="col">
                        <input type="checkbox" id="select-all"> <!-- Select All Checkbox -->
                    </th>
                    <th scope="col">{{ __('Time') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Phone') }}</th>
                    <th scope="col">{{ __('Message') }}</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($messages as $message)
                    <tr>
                        <td>
                            <input form="delete-form" type="checkbox" name="ids[]" value="{{ $message->id }}"> <!-- Checkbox for each row -->
                        </td>
                        <td>{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}
                        </td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#exampleModal{{$message->id}}">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            <form id="singleDelete" action="{{ route('contact_message.destroy', $message->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" form="singleDelete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete?')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>

                        </td>
                    </tr>

                    <div class="modal fade" id="exampleModal{{$message->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$message->complain_type}}</h1>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                                </div>
                                <div class="modal-body fs-5">
                                    <div class="">
                                        {!! $message->message !!}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="100">No Data Found!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $messages->appends(request()->input())->links() }}
        </div>
    </div>


    <script>
        function confirmStatusChange(selectElement) {
            var selectedValue = selectElement.value;
            var confirmationMessage = "Are you sure you want to change the status to " + selectedValue + "?";

            Swal.fire({
                title: 'Confirmation',
                text: confirmationMessage,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0eb041',
                cancelButtonColor: '#ff0000',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "OK", submit the form
                    selectElement.form.submit();
                } else {
                    // If the user clicks "Cancel", reset the select to the previous value
                    var previousValue = selectElement.getAttribute('data-previous-value');
                    selectElement.value = previousValue;
                    window.location.reload();
                }
            });
        }

    </script>
    <script>
        document.getElementById('select-all').addEventListener('click', function (e) {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
        });
    </script>

@endsection

@extends('mainframe')
@section('content')
     <div class="ui-tables" style="width:100%">
        <div class="mdl-card mdl-shadow--2dp" style="width:100%">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Register User List</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <table class="mdl-data-table mdl-js-data-table" style="width:100%">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">#</th>
                        <th class="mdl-data-table__cell--non-numeric">Name</th>
                        <th class="mdl-data-table__cell--non-numeric">Phone</th>
                        <th class="mdl-data-table__cell--non-numeric">Gender</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ ($key+1) }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->fullName }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->phone }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->gender }}</td>
                            </tr>        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('css_script')
@endsection

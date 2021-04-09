@extends('mainframe')
@section('content')
    <div class="ui-tables" style="width:100%">
        <div class="mdl-card mdl-shadow--2dp" style="width:100%">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Event List</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <table class="mdl-data-table mdl-js-data-table" style="width:100%">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">#</th>
                        <th class="mdl-data-table__cell--non-numeric">Title</th>
                        <th class="mdl-data-table__cell--non-numeric">Start</th>
                        <th class="mdl-data-table__cell--non-numeric">End</th>
                        <th class="mdl-data-table__cell--non-numeric">Fee</th>
                        <th class="mdl-data-table__cell--non-numeric">Location</th>
                        <th class="mdl-data-table__cell--non-numeric">Feature</th>
                        <th class="mdl-data-table__cell--non-numeric">Banner</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventList as $key => $event)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $event->id }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $event->title }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $event->startTime }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $event->endTime }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $event->entryFee }}</td>
                                <td class="mdl-data-table__cell--non-numeric"> {{ $event->lat }}, {{ $event->long }} | <a target="_blank" href="https://maps.google.com/?q={{ $event->lat }},{{ $event->long }}">View</a></td>
                                <td class="mdl-data-table__cell--non-numeric"><input type="checkbox" class="eventFeatureCheckbox" id="{{ $event->id }}" {{ ($event->feature==0)?"":"checked" }}/></td>
                                <td class="mdl-data-table__cell--non-numeric"><input type="checkbox" class="eventBannerCheckbox" id="{{ $event->id }}" {{ ($event->banner==0)?"":"checked" }}/></td>
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('css_script')
    <script>
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        $(".eventFeatureCheckbox").change(function(){
            const state = $(this).prop("checked");
            const id = $(this).prop("id");
            var loading = $("#table").loading({message: "updating feature image..."});
            $.ajax({
                url:"{{ route('events-feature') }}", method:"POST", data: {id:id, state:state},
                success:function(data){
                    if(data.status == 200){ window.location.reload(); }
                    else{ Swal.fire({ title: 'Error', text: data.content, icon: 'error' }); }
                    loading.loading("stop");
                },
                error:function(data){
                    loading.loading("stop");
                }
            });
        });

        $(".eventBannerCheckbox").change(function(){
            const state = $(this).prop("checked");
            const id = $(this).prop("id");
            var loading = $("#table").loading({message: "updating banner state..."});
            $.ajax({
                url:"{{ route('events-banner') }}", method:"POST", data: {id:id, state:state},
                success:function(data){
                    if(data.status == 200){ window.location.reload(); }
                    else{ Swal.fire({ title: 'Error', text: data.content, icon: 'error' }); }
                    loading.loading("stop");
                },
                error:function(data){
                    loading.loading("stop");
                }
            });
        });
    </script>
@endsection

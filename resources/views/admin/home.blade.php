{{-- @extends('admin.master.app') --}}
@extends('layouts.app')

@section('content')

    <div class="card-header">Hi {{ $user->name }}!</div>

                

    <div id="main" data-user='{{ $user }}'></div>


@endsection



@section('js')


<script type="text/javascript">


</script>

@endsection

@extends('layouts.app')

@section('page-scripts')
    @parent
    <script src="{{ asset('js/data.js') }}" defer></script>
@endsection

@section('content')
<div class="container" id="data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <data-table></data-table>

        </div>
    </div>
</div>
@endsection

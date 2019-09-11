@extends('layouts.dashboard')
@section('title','Dashboard')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="navbar-form navbar-left navbar-search-form" role="search" _lpchecked="1">
                                <div class="input-group" style="margin-left: 30%;">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <input type="text" value="" id="search" class="form-control" placeholder="Search...">
                                </div>
                            </form>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover">
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>ID</th>--}}
{{--                                    <th>Product Name</th>--}}
{{--                                    <th>Description</th>--}}
{{--                                    <th>Price</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                </tbody>--}}
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#search').on('keyup',function(){
            let value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{ route('admin.search.index') }}',
                data:{'search':value},
                success:function(data){
                    $('table').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection

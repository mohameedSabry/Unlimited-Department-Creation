@extends('layout.layout')

@section('content')
    @push('js')
        <script type="text/javascript">
            $(document).ready(function () {
                $('#jstree').jstree({
                    "core": {
                        'data':{!! load_dep(old('parent')) !!},
                        "themes": {
                            "variant": "large"
                        }
                    },
                    "checkbox": {
                        "keep_selected_style": false
                    },
                    "plugins": ["wholerow"]
                });

                $('#jstree').on('changed.jstree', function (e, data) {
                    var i, j, r = [];
                    for (i = 0, j = data.selected.length; i < j; i++) {
                        r.push(data.instance.get_node(data.selected[i]).id);
                    }
                    $('#parent').val(r.join(', '));
                    console.log(data)
                });

            });
        </script>
    @endpush
    @include('layout.header')
    @include('layout.sidemenu')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Control panel
                <small>Department</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Department</a></li>
                <li class="active">create</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif

        <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="box">
                    <div class="box-body">
                        {!! Form::open(array('url' => 'saveDept')) !!}
                        {!! Form::token(); !!}
                        <input type="hidden" id="parent" name="parent" value="{{old('parent')}}">
                        <div class="form-group">
                            {!!   Form::label('dep_name', 'Department name in english'); !!}
                            {!!   Form::text('deb_name', old('dep_name'),['class'=>'form-control']) !!}
                            <div class="clearfix"></div>
                            <div id="jstree"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            {!!   Form::label('description', 'Description'); !!}
                            {!!   Form::textarea('description', old('description'),['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!   Form::label('keyword', 'Keyword'); !!}
                            {!!   Form::text('keyword', old('keyword'),['class'=>'form-control']) !!}
                        </div>
                        {!!  Form::submit('Submit', ['class'=>'btn btn-primary']); !!}
                        {!!  Form::close()!!}
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->

        </section>
    </div>
    @include('layout.footer')


@endsection



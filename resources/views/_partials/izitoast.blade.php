@if(session()->has("errors"))
    <script>
        iziToast.error({
            message:`<ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach</ul>`,
            toast:true,
            timeout: {{config('app.izitoast_delay')}},
            position:"topLeft"
        })
    </script>
@endif
@if(session()->has(ReturnStatus::SUCCESS))
    <script>
        iziToast.success({
            message:`<li>{{session()->get(ReturnStatus::SUCCESS)}}</li>`,
            toast:true,
            timeout: {{config('app.izitoast_delay')}},
            position:"topLeft"
        })
    </script>
@endif
@if(session()->has(ReturnStatus::WARNING))
    <script>
        iziToast.warning({
            message:`<li>{{session()->get(ReturnStatus::WARNING)}}</li>`,
            toast:true,
            timeout: {{config('app.izitoast_delay')}},
            position:"topLeft"
        })
    </script>
@endif

@if(session()->has(ReturnStatus::INFO))
    <script>
        iziToast.info({
            message:`<li>{{session()->get(ReturnStatus::INFO)}}</li>`,
            toast:true,
            timeout: {{config('app.izitoast_delay')}},
            position:"topLeft"
        })
    </script>
@endif

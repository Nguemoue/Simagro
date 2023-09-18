@props(["type","dismissible"])
@php
    $type = $type??"info";
    $dismissible = $dismissible??false;
@endphp
@if($dismissible)
    <div {{$attributes->merge(['class'=>"alert alert-{$type} alert-dismissible show fade"])}}>
        <div class="alert-body">
            <button class="btn-close" data-bs-dismiss="alert">
                <span>×</span>
            </button>
            {{$slot}}
        </div>
    </div>
@else
    <div {{$attributes->merge(['class'=>"alert alert-{$type} alert-has-icon"])}}>
        <div class="alert-icon fa-2x"><i class="fa fa-lightbulb-o"></i></div>
        <div class="alert-body">
            <div class="alert-title">{{str($type)->title()}}</div>
            {{$slot}}
        </div>
    </div>
@endif

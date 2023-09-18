@props(['size','modalId',"title"])
@php
    $footer = $footer??null;
    $title = $title??'Modal title';
    $size = $size??'lg';
@endphp
<div class="modal fade" data-backdrop="static" role="dialog" id="{{$modalId}}"  aria-hidden="true">
    <div class="modal-dialog modal-{{$size}}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$title}}</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            {{$footer}}
        </div>
    </div>
</div>

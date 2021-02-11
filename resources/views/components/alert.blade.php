<div class="alert alert-danger">
    <div class="alert-title">{{$title}}</div>
    {{$slot}}
    
    <div class="footer-alert" >
        {{$footer ?? ''}}
    </div>
    
</div>
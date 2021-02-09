<div class="content-header-left col-12 mb-2">
  <div class="row breadcrumbs-top">
    <div class="col-12">
      <div class="breadcrumb-wrapper d-none d-sm-block">
        <ol class="breadcrumb p-0 mb-0">
          @isset($breadcrumbs)
          @foreach ($breadcrumbs as $breadcrumb)
          <li class="breadcrumb-item {{ !isset($breadcrumb['link']) ? 'active' :''}}">
            @if(isset($breadcrumb['link']))
            <a href="{{asset($breadcrumb['link'])}}">@if($breadcrumb['name'] == "Home")<i
                class="bx bx-home-alt"></i>@else{{$breadcrumb['name']}}@endif</a>
            @else{{$breadcrumb['name']}}@endif
          </li>
          @endforeach
          @endisset
        </ol>
      </div>
    </div>
  </div>
</div>

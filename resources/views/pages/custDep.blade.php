@extends('layouts.app')

@section('content')
<div class="container">
   <!-- Breadcrumb -->
   <nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a><span class="mr-1 ml-1"> > </span> </li>
        <?php $link = "" ?>
        @for($i = 1; $i <= count(Request::segments()); $i++) @if($i < count(Request::segments()) & $i> 0)
            <?php $link .= "/" . Request::segment($i); ?>
            <li class="breadcrumb-item"><a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a></li> >
            @else {{ucwords(str_replace('-',' ',Request::segment($i)))}}
            @endif
            @endfor
    </ol>
</nav>
<!-- /Breadcrumb -->
    <h1>Customer Service Categories</h1>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      @foreach ($results as $item)
          <li class="nav-item">
              <a class="nav-link {{ $item->category_id == 1 ? 'active' : '' }}" id="home-tab{{$item->category_id}}" data-toggle="tab" href="#home{{$item->category_id}}" role="tab" aria-controls="home" aria-selected="true">{{$item->category_name}}</a>
          </li>
      @endforeach
      </ul>
   
    
    <div class="tab-content" id="myTabContent">
        @foreach ($results as $item)
          <div class="tab-pane fade show {{ $item->category_id == 1 ? 'active' : '' }}" id="home{{$item->category_id}}" role="tabpanel" aria-labelledby="home-tab">
            
              @foreach ($post as $posts)
                  @if ($posts->category_id == $item->category_id)
                  <div class="list-group mb-2">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$posts->title}}</h5>
                        <button type="button" id="show-info" data-id="{{$posts->material_id}}" class="btn btn-link">Read More</button>
                      </div>
                      <p class="mb-1">{!! $posts->description !!}</p>
                      <small>Posted on: {{date('d-m-Y H:i:s', strtotime($posts->created_at))}}</small>
                    </a>
                  </div>
                  @endif
              @endforeach
          </div>
        @endforeach
    </div>

</div>
<!-- /.container -->
@endsection

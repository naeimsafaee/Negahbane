@foreach($items as $menu_item)
<a class="flex-box" href="{{$menu_item->link()}}">{{$menu_item->title}}</a>
@endforeach

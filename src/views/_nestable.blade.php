<ol class="dd-list">
    @foreach($data as $d)
        <li class="dd-item dd3-item" data-id="{{ $d->id }}">
        	<div class="dd-handle dd3-handle"></div>
            <div class="dd3-content" style='display:flex'>
                <span id='menu-{{$d->id}}' class="name">{{ $d->title }}</span>
                <div style="flex-grow: 1">
                @if(!$d->child->count())
                    <a href="{{ url('delete/'.$d->id) }}" onclick="return window.confirm('Bạn có chắc muốn xoá không?')" style="color:red; float: right" >&#x2716; </a>
                @endif
                <a href="{{url('edit/'.$d->id)}}" type="submit"  style="color:blue; float: right">&#9998;</a>
                </div>
            </div>

            @if($d->child->count())
                @include('menu::_nestable', ['data' => $d->child])
            @endif
        </li>
    @endforeach
</ol>

<script>
    function alertt() {
        var txt;
        var r = confirm("Press a button!");
        if (r == true) {
            txt = "You pressed OK!";
        } else {
            txt = "You pressed Cancel!";
        }
        document.getElementById("demo").innerHTML = txt;
    }

    function getitem(id){
      $.get("index/"+id, function(data, status){
            item=JSON.parse(data);
            console.log(item);
            document.getElementById('menu-id').value=item['id'];
            document.getElementById('menu-title').value=item['title'];
            document.getElementById('menu-link').value=item['link'];
            document.getElementById('menu-img').src=item['image'];
            document.getElementById('menu-image').value=item['image'];
            document.getElementById('menu-parent').value=item['paren_id'];
            document.getElementById('menu-position').value=item['position'];
            document.getElementById('menu-color').value=item['color'];
            document.getElementById('menu-bold').value=item['bold'];
            document.getElementById('menu-status').value=item['status'];
        }); 
    }
    
</script>

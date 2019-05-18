<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<data-set xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	@if(isset($books))
		@foreach($books as $key=>$value)
	    <record>
	       @if(isset($value['title']))<title>{{$value['title']}}</title>@endif
	       @if(isset($value['author']))<author>{{$value['author']}}</author>@endif
	    </record>
	    @endforeach
	@endif
</data-set>

{!! Form::open(['route' => 'search', 'class'=>'tg-formtheme tg-formbannersearch']) !!}
<div class="typeahead control-group">
<fieldset>
	<div class="form-group tg-inputwithicon">
		<i class="icon-bullhorn"></i>

		{{Form::text('query','', ['class' => 'form-control', 'id' => 'query','autocomplete' => 'off','placeholder' => 'Search for companies, platforms, developers, researchers ...','required'])}}
	</div>
	<button class="tg-btn"  type="submit"> <i class="icon-search"></i> Search Now </a></button>
</fieldset>
  </div>
	<script>
          $(function () {
              $("#query").autocomplete({
                  source: '{{ route('autocomplete') }}',
                  open: function (event, ui) {

                  },
                  select: function (event, ui) {

                  }
              }).data("ui-autocomplete")._renderItem = function (ul, item) {

								var url = "/ad/" + item.value;//suppose item.value is username...
								return $("<li>").append("<a href='" + url + "' >" + item.label + "</a>").appendTo(ul);

                  //return $("<li>").append("<a href='http://www.google.com' >"+item.label+"</a>").appendTo(ul);
              };


          });


      </script>

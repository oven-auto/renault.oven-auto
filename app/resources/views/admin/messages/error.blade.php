@if ($errors->any())
<div class="alert alert-danger" role="alert">

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	
  	<h4 class="alert-heading">Ошибка выполнения скрипта</h4>
  	
  	<p>Не удалось выполнить скрипт, по следующим причинам</p>
  	<hr>
  	@foreach ($errors->all() as $error)
    	<div> * {{ $error }}</div>
	@endforeach  	
</div>
@endif
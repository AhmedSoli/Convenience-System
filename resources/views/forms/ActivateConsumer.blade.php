<form method="POST" action="/consumers/{{$consumer->id}}/activate">
	{{ csrf_field() }}
	{{ method_field('PATCH')}}
	<button class="btn btn-warning" type="submit" value="submit">Activate</button>
</form>
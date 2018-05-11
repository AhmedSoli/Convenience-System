 <form method="POST" action="/consumers/{{$consumer->id}}/deactivate">
 	{{ csrf_field() }}
 	{{ method_field('PATCH')}}
 	<button class="btn btn-warning" type="submit" value="submit">Deactivate</button>
 </form>
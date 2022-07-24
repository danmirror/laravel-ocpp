<!-- Button trigger modal -->


<!-- Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Select ID</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="row">
@foreach($data as $dt)

					<div class="col-sm-6 text-center mb-2">
						<a href="{{route('detail',$dt->idHW)}}">{{$dt->idHW}}</a>
					</div>
@endforeach

				</div>
			</div>	
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
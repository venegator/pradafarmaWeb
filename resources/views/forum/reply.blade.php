<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="panel panel-default">
        <div class="panel-heading">
            <div class="level">
                <h5 class="flex" style="color: white;">
                    <a href="{{ route('profile', $reply->owner) }}">
                        {{ $reply->owner->name }}
                    </a> said {{ $reply->created_at->diffForHumans() }}... | @if($reply->owner->isAdmin()) Administrador @endif
                </h5>

                <div>
{{-- 				                    <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                            {{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count) }}
                        </button>
                    </form> --}}
                    @if (auth()->check())
                    	<favorite :reply="{{ $reply }}"></favorite>
                    @endif
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>

                <button class="btn btn-xs btn-primary" @click="update">Actualizar</button>
                <button class="btn btn-xs btn-link" @click="editing = false">Cancelar</button>
            </div>

            <div v-else v-html="body"></div>
        </div>

        @can ('update', $reply)
            <div class="panel-footer level">
                <button class="btn btn-xs mr-1" @click="editing = true">Editar</button>
                <button class="btn btn-xs btn-danger mr-1" @click="destroy">Eliminar</button>

                {{--<form method="POST" action="/replies/{{ $reply->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                </form>--}}
            </div>
        @endcan
    </div>
</reply>

				{{--	<div class="panel panel-default">
						<div class="panel-heading">
							<div class="level">
								<h5 class="flex">
									<a href="{{ route('profile', $reply->owner) }}">
										{{ $reply->owner->name }}
									</a> dijo {{ $reply->created_at->diffForHumans() }}...
								</h5>
								<div>
									<form method="POST" action="/replies/{{ $reply->id }}/favorites">
										{{ csrf_field() }}

										<button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : ''}}>
											{{ $reply->favorites_count }} {{ str_plural('Like', $reply->favorites_count) }}
										</button>
									</form>
								</div>
							</div>	
						</div>
						<div class="panel-body">{{ $reply->body }}</div>
						@can ('update', $reply)
					        <div class="panel-footer level">
					        	
						        	<form method="POST" action="/replies/{{ $reply->id }}">
						                {{ csrf_field() }}
						                {{ method_field('DELETE') }}

						                <button type="submit" class="btn btn-danger btn-xs mr-1">Eliminar</button>
						            </form>
									<a href="#collapse{{ $reply->id }}" class="btn btn-primary btn-xs mr-1" data-toggle="collapse">Editar</a>
									
									  <div id="collapse{{ $reply->id }}" class="collapse" style="width: 100%;">
									    <form method="POST" action="/replies/update/{{ $reply->id }}">

											{{ csrf_field() }}
											{{ method_field('PATCH') }}

												<div class="form-group">
													<textarea id="body" name="body" class="form-control" rows="5" required>{{ $reply->body }}</textarea>
												</div>
												<div class="form-group">
												  	<button type="submit" class="btn btn-xs">Guardar cambios</button>
												</div>
										</form>
									  </div>

					        </div>
					    @endcan
					</div>--}}
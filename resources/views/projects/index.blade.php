@extends('layout');

@section('title', 'Projects')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
<h1 class="display-5 mb-0">@lang('Projects')</h1>
@auth
	<a class="btn btn-primary"
		href="{{ route('projects.create') }}">
	Crear proyecto</a>
@endauth
</div>
<p class="lead text-secondary">Proyectos realizados Lorem sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat.</p>
<ul class="list-group">
	@forelse ($projects as $project)
		<li class="list-group-item border-0 mb-3 shadow-sm">
			<a class="text-secondary d-flex justify-content-between align-items-center"
			href="{{ route('projects.show', $project) }}" {{ $project->title }}>

					<span class=" font-weight-bold">
						<small>
					{{ $project->title}}
						</small>
					</span>
					<span>
						<small class="text-black-50">
					{{ $project->created_at->format('d/m/y') }}
						</small>
					</span>

			</a>
		</li>
		@empty
				<li class="list-group-item border-0 mb-3 shadow-sm">
				No hay proyectos para mostrar
				</li>
	@endforelse
	{{ $projects->links()}}
</ul>
</div>

@endsection
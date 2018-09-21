<h1>
  Belongs To relationship
  <small>Internship details => Internship Category</small>
  <small>Post Project => Users</small>
  <small>Project accept => Post Project, Users</small>
  <small>Project Category Job => Project Category</small>
  <small>Project Request => Post Project, Users</small>
  <small>Skills Category => Skills</small>
</h1>
<p>
<h3>User => Post Project</h3>
@foreach($users as $user)
  {{ $user->id }}
  @foreach($user->projects as $use)
  {{ $use->id }}
  @endforeach
@endforeach
</p>
<p>
<h3>Post Project => User</h3>
@foreach($projects as $project)
  {{ $project->user->name }}
  <br>
@endforeach
</p>
@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{$task->description}}</p>

    @if($task->long_description)
        <p>{{$task->long_description}}</p>
    @endif

    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>

    <p class="mb-4">
    @if ($task->completed)
      <span class="font-medium text-green-500">Completed</span>
    @else
      <span class="font-medium text-red-500">Not completed</span>
    @endif
  </p>

    <div>
        <a href="{{route('tasks.edit', ['task' => $task])}}">Edit</a>
    </div>

    <div>
    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
      @csrf
      @method('PUT')
      <button type="submit" class="btn">
        Mark as {{ $task->completed ? 'not completed' : 'completed' }}
      </button>
    </form>
    </div>

    <div>
        <form action="{{route('tasks.destroy', ['task' => $task])}}" method="POST">
            @csrf
            <!--METHOD SPOOPHING-->
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
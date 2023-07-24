@if ($model1)
    <h1>Search Result</h1>
    <p>UID: {{ $model1->uid }}</p>
    <p>Name: {{ $model1->name }}</p>
    <p>District: {{ $model2->district }}</p>
    <p>Division: {{ $model2->division }}</p>
    <p>Level: {{ $model3->level }}</p>
    <p>Semester: {{ $model3->semester }}</p>
    <form action="{{ route('edit', ['uid' => $model1->uid]) }}" method="GET">
        @csrf
        <button type="submit">Edit</button>
    </form>

@else
    <p>No record found for the provided UID.</p>
@endif

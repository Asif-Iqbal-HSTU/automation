<form action="{{ route('update', ['uid' => $model1->uid]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $model1->name }}">
    <input type="text" name="district" value="{{ $model2->district }}">
    <input type="text" name="division" value="{{ $model2->division }}">
    <input type="text" name="level" value="{{ $model3->level }}">
    <input type="text" name="semester" value="{{ $model3->semester }}">
    <button type="submit">Update</button>
</form>

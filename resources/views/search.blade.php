<form action="{{ route('search') }}" method="POST">
    @csrf
    <input type="text" name="uid" placeholder="Enter UID">
    <button type="submit">Search</button>
</form>

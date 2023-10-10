@extends('master')

@section('titleContent')
    <title>Add Student Page</title>
@endsection

@section('content')
    <div class="container">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">HSTU Automation Program</a>

                <!-- Navbar links -->
                <ul class="navbar-nav ml-auto flex-row">
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="{{ route('homePage') }}"><i class="fa-solid fa-house-user fa-lg"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <form action="{{ route('searchUser') }}" method="POST">
            @csrf
            @if (\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                </div>
            @endif

            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('success') }}
                </div>
            @endif
            <div>Enter UID to search:</div>
            <input type="text" name="uid" placeholder="Enter UID">
            <button type="submit">Search</button>
        </form>
    </div>


    <div class="container mt-4">
        <input type="text" id="filterInput" class="form-control" placeholder="Type to filter">
        <ul class="list-group mt-2" id="autocompleteList">
          <!-- Autocomplete suggestions will be inserted here -->
        </ul>
      </div>
      <script>
        // Sample data for autocomplete
        const autocompleteData = ["Apple", "Banana", "Cherry", "Date", "Grape", "Lemon", "Orange"];

        // Function to update the autocomplete suggestions based on user input
        function updateAutocomplete(input) {
          const autocompleteList = document.getElementById("autocompleteList");
          autocompleteList.innerHTML = '';

          // Filter the data based on user input
          const filteredData = autocompleteData.filter(item => item.toLowerCase().includes(input.toLowerCase()));

          // Create and append autocomplete items
          filteredData.forEach(item => {
            const autocompleteItem = document.createElement("li");
            autocompleteItem.classList.add("list-group-item");
            autocompleteItem.textContent = item;
            autocompleteList.appendChild(autocompleteItem);
          });
        }

        // Event listener for input changes
        const filterInput = document.getElementById("filterInput");
        filterInput.addEventListener("input", function () {
          const inputValue = this.value;
          updateAutocomplete(inputValue);
        });

        // Event listener for selecting an autocomplete suggestion
        const autocompleteList = document.getElementById("autocompleteList");
        autocompleteList.addEventListener("click", function (event) {
          const clickedItem = event.target;
          if (clickedItem.classList.contains("list-group-item")) {
            // Set the selected suggestion as the input value
            filterInput.value = clickedItem.textContent;
            // Clear the autocomplete suggestions
            autocompleteList.innerHTML = '';
          }
        });
      </script>



@endsection

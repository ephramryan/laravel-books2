

<h1>Welcome back, {{ $user->name }}</h1>


<form action="{{ route('logout') }}" method="post">
 
    @csrf
 
    <button>Logout</button>
 
</form>
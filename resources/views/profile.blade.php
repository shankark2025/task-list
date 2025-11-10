<h1>Welcome, {{ $user['name'] ?? 'Guest' }}</h1>
<p>Your city: {{ $user['city'] ?? 'Unknown' }}</p>
<p>{!!  $siteName !!}</p>
<p>{{  $title }}</p>
<br><br>
<h3>Profile Page - {{ $appName }}</h3>
<p>Year: {{ $year }}</p>

<br><br><br>
The number of Users: <strong>{{ $count }}</strong><br>
The number of Verified Users: <strong>{{ $verifiedCount }}</strong>
<br><br><br>
The user value: <br>
<strong>Name</strong> {{ $userValue["name"] }}
<br>
<strong>Email</strong> {{ $userValue["email"] }}

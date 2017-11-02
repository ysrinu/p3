<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'Shipping Cost Calculator')
    </title>

	<meta charset='utf-8'>
    <link href="/css/cost.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

	<header>
		<img src='/images/logo.jpg' style='width:50px' alt='Shipping Cost Calculator Logo'>
        <a href="/">Home</a>
        <a href="/cost">Calculate </a>
		<a href="/ship/admin">Admin </a>
	</header>

	<section>
		@yield('content')
	</section>

	<footer>
		&copy; {{ date('Y') }}
	</footer>

    @stack('body')

</body>
</html>

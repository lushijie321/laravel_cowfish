<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>静谧之夜 - spot的笔记</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<div class="overflow-container">
		<header class="site-header">
			<div class="max-width">
				<div class="title-container">
					<div class="site-title">{{$Website->title}}</div>
					<p>{{$Website->subtitle}}</p>
				</div>
				<div class="site-nav">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<div class="container-fluid">
						  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						  </button>
						  <div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							    <li class="nav-item"><a class="nav-link active" aria-current="page" href="http://cowfish.cc">主页</a></li>
							    @foreach ($nav as $val)
							  <li class="nav-item">
							      <!--<a class="nav-link active" aria-current="page" href="http://cowfish.cc/">主页</a>-->
							    <a class="nav-link" aria-current="page" href="{{url('home/lists', ['id' => $val->id])}}">{{$val->name}}</a>
							  </li>
							  @endforeach
							 <!-- <li class="nav-item">-->
								<!--<a class="nav-link" href="#">JAVA入坑</a>-->
							 <!-- </li>-->
							 <!-- <li class="nav-item">-->
								<!--<a class="nav-link" href="#">随笔</a>-->
							 <!-- </li>-->
							</ul>
						  </div>
						</div>
					</nav>
				</div>
			</div>
		</header>
		<div class="container site-main">
			<div class="row">
			  <div class="col-lg-8">
			    @foreach ($list as $val)
				<div class="stie-article">
					<div class="article-header">
						<h2 class="article-title">
						    <a href="{{url('home/content', ['id' => $val->id])}}">{{$val->title}}</a>
						</h2>
						<div class="article-byline">
							published on
							<a href="">2021</a>
							by
							<a href="">spot</a>
						</div>
					</div>
					<div class="article-content">
						<p>{{$val->	introduce}}</p>
						<div class="article-categories">
							<span>Filed in </span>
							<a href="">随笔</a>
						</div>
					</div>
				</div>
				@endforeach
				<div class="stie-article">
					{{ $list->links() }}
				</div>
			  </div>
			  <div class="col d-none">
				<section class="author-profile">
					<div class="profile_picture">
						<img src="images/head-img.jpeg"/>
					</div>
					<div class="profile_intro">
						<p>spot</p>
						<p class="intro">一个在底层摸爬滚打的咸鱼</p>
					</div>
				</section>
			  </div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="max-width">
			<a href="">{{$Website->beian}}</a>
		</div>
	</footer>
	<script src="/js/bootstrap.min.js"></script>
</body>
</html>
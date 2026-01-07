<h3>{{ $job->title }}</h3>
<div>
    Congrats! Your job is now live in our website. <br>
    Very little is needed to make a happy life. - Marcus Aurelius
</div>

<p>

    <a href="{{ url('/jobs') }}/{{ $job->id }}">You can see your job just published</a>
</p>

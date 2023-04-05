@component('mail::message')
**{{$like->likeAble()->isLikedBy()}}** has liked your post

@component('mail::panel')
{{$like->likeAble()->likeAbleSubject()}}
@endcomponent

@component('mail::button', ['url' => route('threads.show', ['category' => $like->likeAble()->category->slug(),
'thread' => $like->likeAble()->slug()])])

View Post
@endcomponent

Thanks,
Forum
@endcomponent
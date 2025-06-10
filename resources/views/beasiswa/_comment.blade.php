<div class="border-b border-gray-200 pb-4 last:border-0 last:pb-0">
    <div class="flex items-start space-x-3">
        <div class="flex-shrink-0">
            <div class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-800 font-semibold">
                {{ substr($comment->user->name, 0, 1) }}
            </div>
        </div>
        <div class="flex-1">
            <div class="flex items-center justify-between">
                <h4 class="font-medium text-gray-900">{{ $comment->user->name }}</h4>
                <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-gray-700 mt-1">{{ $comment->komentar }}</p>

            @if(auth()->id() === $comment->user_id || auth()->user()?->role === "super admin")
            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="mt-2 delete-comment-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs text-red-500 hover:text-red-700">
                    Hapus
                </button>
            </form>
            @endif
        </div>
    </div>
</div>

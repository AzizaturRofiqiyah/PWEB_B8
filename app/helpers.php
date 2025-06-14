<?php

if (!function_exists('supabase_public_url')) {
    function supabase_public_url(string $path): string
    {
        $projectRef = config('services.supabase.project_ref');
        $bucket = config('services.supabase.bucket');

        return "https://{$projectRef}.supabase.co/storage/v1/object/public/schoolarmate/storage/v1/s3/schoolarmate/{$bucket}/{$path}";
    }

}

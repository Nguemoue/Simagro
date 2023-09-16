<?php
if(!function_exists("defaultPath")){
	function defaultPath(string $resource  = ''):string{
		if($resource == 'avatars'){
			return config("misc.default_path.$resource","storage/");
		}
		return config('misc.default_path.default','storage');
	}
}
if(!function_exists("storePath")){
    function storePath(string $resource  = ''):string{

        return config('app.store_path.'.$resource,'resource');
    }
}
if(!function_exists("defaultPoster")){
	function defaultPoster(string $resource=''): string
	{
		return  asset('images/image_1.jpg');
	}
}

if(!function_exists("webAuth")){
	function webAuth(): \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Auth\Factory
	{
		return auth("web");
	}
}

if(!function_exists("currentLocale")){
	function currentLocale(): bool|string
	{
		return LaravelLocalization::getCurrentLocale();
	}
}

if(!function_exists("updateSuccess")){
    function updateResponse(string $resource="resource"): string
    {
        return __('response.update.success',['resource'=>$resource]);
    }
}

if(!function_exists("deleteSuccess")){
    function deleteResponse(string $resource="resource"): string
    {
        return __('response.delete.success',['resource'=>$resource]);
    }
}
if(!function_exists("createSuccess")){
    function createResponse(string $resource="resource"): string
    {
        return __('response.create.success',['resource'=>$resource]);
    }
}

if(!function_exists("getTypeForMime")){
    function getTypeForMime($name): string
    {
        $correspondances = [
            "video"=>"video/*",
            "audio"=>"audio/*",
            "image"=>"image/*",
            "pdf"=>"application/pdf"
        ];
        foreach ($correspondances as $key=>$item){
            if(str($name)->lower()->is($item)){
                return $key;
            }
        }
        return  "image";
    }
}

if(!function_exists("adminAuth")){
    function adminAuth(): \App\Models\Administrateur|\Illuminate\Contracts\Auth\Authenticatable|null
    {
        return auth('admin')->user();
    }
}

<?php
if(!function_exists("getDefaultPathFor")){
	function getDefaultPathFor(string $resource  = ''):string{
		if($resource == 'avatars'){
			return config("misc.default_path.$resource","storage/");
		}
		return config('misc.default_path.default','storage');
	}
}
if(!function_exists("getStoragePathFor")){
    function getStoragePathFor(string $resource  = ''):string{

        return config('app.store_path.'.$resource,'resource');
    }
}
if(!function_exists("getDefaultPosterUrl")){
	function getDefaultPosterUrl(string $resource=''): string
	{
		return  asset('images/image_1.jpg');
	}
}



if(!function_exists("currentLocale")){
	function currentLocale(): bool|string
	{
		return LaravelLocalization::getCurrentLocale();
	}
}

if(!function_exists("responseTextAfterUpdate")){
    function responseTextAfterUpdate(string $resource="resource"): string
    {
        return __('response.update.success',['resource'=>$resource]);
    }
}

if(!function_exists("responseTextAfterDelete")){
    function responseTextAfterDelete(string $resource="resource"): string
    {
        return __('response.delete.success',['resource'=>$resource]);
    }
}
if(!function_exists("responseTextAfterCreate")){
    function responseTextAfterCreate(string $resource="resource"): string
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


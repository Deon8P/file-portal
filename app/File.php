<?php

namespace Dockable;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Collaborator;

class File extends Model
{
	protected $fillable = [
		'id', 'owner_username', 'last_uploader_username', 'type', 'name', 'comments', 'byte_size', 'path', 'shared', 'global', 'version', 'updated_at', 'created_at'
	];

	public function files()
	{
        return $this->hasMany(File::class);
	}

	public static function getPrivateFiles()
	{
		return File::where('owner_username', Auth::user()->username)->Where('shared', 0)->where('global', '=', 0)->get();
	}

	public static function getSharedFiles()
	{
		return File::where('owner_username', Auth::user()->username)->Where('shared', 1)->where('global', '=', 0)->get();
    }

    public static function getMyGlobalFiles()
    {
        return  $files = File::where('global', '=', 1)->where('owner_username', Auth::user()->username)->get();
    }

    public static function getAllGlobalFiles()
    {
        return  $files = File::where('global', '=', 1)->get();
    }

    public static function getFileIDS()
    {
        return File::where('owner_username', Auth::user()->username)->pluck('id')->toArray();
    }

	public static function getCollaboratorFiles()
	{
        $ids = DB::table('collaborators')->where('collaborator_username', Auth::user()->username)->pluck('file_id')->toArray();

        return DB::table('files')->whereIn('id', $ids)->where('shared', '=', 1)->get();
    }

    public static function getName($id)
    {
        return File::where('id', $id)->pluck('name')->first();
    }

    public static function getFullPath($file)
    {
        return str_replace('\\', '/',storage_path('app/'.$file->path.'/'.$file->name.'.'.$file->type));
    }

    public static function checkName($new_file, $id)
    {
        if (str_replace('.'.$new_file->getClientOriginalExtension(), '', $new_file->getClientOriginalName()) == str_replace('_', ' ', File::getName($id)))
        {
            return true;
        }
    }

    public static function checkType($new_file, $type)
    {
        //returns file permission
        if($new_file->getClientOriginalExtension() == $type)
        {
            return true;
        }
    }

    public static function checkChanged($new_file, $old_file)
    {
        //check if a file has been edited.
        if(md5_file($new_file) != md5_file($old_file))
        {
            return true;
        }
    }

	public static function createFileDirectory($owner_email, $global, $name)
	{
        //creates a server side directory
		if(!$global)
		{
			$path = 'public/users-storage/'.$owner_email.'/private/'.$name.uniqid();

			Storage::makeDirectory($path, $mode = 777, true, true);

			return $path;
		}
		else
		{
			$path = 'public/users-storage/'.$owner_email.'/global/'.$name.uniqid();

			Storage::makeDirectory($path, $mode = 777, true, true);

			return $path;
		}
    }

	public static function storeUserFile($path, $file, $storeFileAs)
	{
		return Storage::putFileAs($path, $file, $storeFileAs);
    }

	public static function rerollFileDirectory($path)
	{
		return Storage::deleteDirectory($path);
	}

	public static function setFileShared($id, $old_path)
	{
        //sets a file permission
        File::where('id', $id)->update(['shared' => 1]);
        $new_path = dirname($old_path, 2).'/shared/'.basename($old_path);

        File::where('id', $id)->update(['path' => $new_path]);

        Storage::move($old_path, $new_path);
	}

	public static function setFilePrivate($id, $old_path)
	{
        //sets a file permission
        File::where('id', $id)->update(['shared' => 0]);
        $new_path = dirname($old_path, 2).'/private/'.basename($old_path);

        File::where('id', $id)->update(['path' => $new_path]);

		Storage::move($old_path, $new_path);
    }

    public static function setGlobalFileShared($id)
    {
        if(File::where('id', $id)->pluck('global')->first() == 1)
        {
            File::where('id', $id)->update(['shared' => 1]);
        }
    }

    public static function addCollaborator($id)
    {
        //File::setGlobalFileShared($id);
        File::where('id', $id)->Cache::increment('collaborators', 1);
    }

    public static function deductCollaborator($id)
    {
        File::where('id', $id)->Cache::decrement('collaborators', 1);
    }

	public static function updateFileVersion($id)
	{
		File::where('id', $id)->Increment('version');
	}

	public static function updateLastFileUploader($id, $username)
	{
		File::where('id', $id)->update(['last_uploader_username' => $username]);
    }

    public static function updateSize($id, $size)
    {
        File::where('id', $id)->update(['byte_size' => $size]);
    }

	public static function updateDatabaseFileName($id, $newName)
	{
		File::where('id', $id)->update(['name' => $newName]);
    }

    public static function updateServerFileName($oldFullPath, $path, $newName, $type)
	{
		Storage::move($oldFullPath, $path.'/'.$newName.'.'.$type);
	}

	public static function deleteServerStoredFile($path)
	{
		Storage::deleteDirectory($path);
	}

	public static function deleteDatabaseStoredFile($id)
	{
		File::where('id', $id)->delete();
    }

    public static function checkFileName($name, $file)
    {
        //Assigns as given file name to a file or keeps the original name.
        if($name == null)
        {
            $name = str_replace($file->getClientOriginalExtension(), '' , $file->getClientOriginalName());
            $name = str_replace(' ', '_', $name);
            return substr_replace($name , '', -1);

        }else{
            return $name = str_replace(' ', '_', $name);
        }
    }
}

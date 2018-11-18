<?php

namespace Dockable\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Dockable\File;
use Dockable\User;
use Dockable\Collaborator;

class FilesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function showFilesDefault()
	{
        /**
         * Gathers all the files for a specific user and returns
         * them with as well as the file collaborators.
         */

		$privateFiles = File::getPrivateFiles();

		$sharedFiles = File::getSharedFiles();

        $collabFiles = File::getCollaboratorFiles();

        $globalFiles = File::getMyGlobalFiles();

        $collaborations = Collaborator::getCollaborations(File::getFileIDS());

        if(Collaborator::getMyCollaborations())
            $collaborations = $collaborations->merge(Collaborator::getCollaborations(Collaborator::getMyCollaborations()));


        return view('dashboard.index', compact('privateFiles', 'sharedFiles', 'collabFiles', 'globalFiles', 'collaborations'));
    }

	public function showFiles($filter)
	{
        /**
         * This method retruns all files for a specific filter
         * either being all the private, shared or just all the files.
         */
        $collaborations = Collaborator::getCollaborations(File::getFileIDS());

		if($filter != null)
		{

			if ($filter == 'private') {

				$privateFiles = File::getPrivateFiles();
				$sharedFiles = [];
                $collabFiles = [];
                $globalFiles = [];

				return view('dashboard.index', compact('privateFiles', 'sharedFiles', 'collabFiles', 'globalFiles', 'collaborations'));

			} elseif ($filter == 'shared') {

				$sharedFiles = File::getSharedFiles();
				$privateFiles = [];
                $collabFiles = [];
                $globalFiles = [];

				return view('dashboard.index', compact('privateFiles', 'sharedFiles', 'collabFiles', 'globalFiles', 'collaborations'));

			} elseif ($filter == 'collab') {

				$collabFiles = File::getCollaboratorFiles();
				$privateFiles = [];
                $sharedFiles = [];
                $globalFiles = [];

				return view('dashboard.index', compact('privateFiles', 'sharedFiles', 'collabFiles', 'globalFiles', 'collaborations'));

            }elseif ($filter == 'global') {

				$collabFiles = [];
				$privateFiles = [];
                $sharedFiles = [];
                $globalFiles = File::getMyGlobalFiles();

				return view('dashboard.index', compact('privateFiles', 'sharedFiles', 'collabFiles', 'globalFiles', 'collaborations'));

            }
		}

		//In case of specific use cases
		/*
		$files = $files->get(['id', 'owner_username', 'last_uploader_username', 'type', 'name', 'comments', 'path', 'byte_size', 'shared', 'collaborators', 'version', 'created_at', 'updated_at']);
		*/

		return $this->showFilesDefault();
    }

    public function showGlobalFiles()
    {
        $files = File::getAllGlobalFiles();
        return view('global.index', compact('files'));
    }



	public function destroy(File $file)
	{
        /**
         * Method deletes a file on the server it's self
         * as well as on the database.
         */
		File::deleteServerStoredFile($file->path);
		File::deleteDatabaseStoredFile($file->id);

		return redirect('dashboard')->with('status', 'File has been deleted!');
	}

	public function store(Request $request)
	{
        /**
         * The main method for storing files it takes the requested file
         * of a given file type
         * then generates all teh necesary details about the file
         * and stores it onto the database and the server.
         */
		$this->validate(request(), [
			'file-upload' => 'required|mimes:txt,doc,docx,csv,xlxs',
        ]);
/*
        if ($validator->fails()) {
            return view('view_name');
        } else {
            return view('view_name');
        }

*/
		$file = $request->file('file-upload');

		$owner_username = Auth::user()->username;

		$owner_email = Auth::user()->email;

        $name = File::checkFileName(request('name'), $file);

        $type = $file->getClientOriginalExtension();

        $global = (int)$request->input('global');

		$path = File::createFileDirectory($owner_email, $global, $name);

		if(! File::storeUserFile($path, $file, $name.'.'.$type))
		{
            File::rerollFileDirectory($path);
            return redirect('dashboard')->with('error', 'The file was not created!');
        }

		$byte_size = filesize($file);

		File::create([
			'owner_username' => $owner_username,
			'last_uploader_username' => $owner_username,
			'type' => $type,
			'name' => $name,
			'path' => $path,
            'byte_size' => $byte_size,
            'shared' => 0,
            'global' => $global,
			'version' => 1
		]);

		return $this->showFilesDefault()->with('status', 'File has been uploaded!');
	}

	public function addCollaborators(File $file, Request $request)
	{
        /**
         * Takes a requested file id and a username
         * and then adds the user as a collaborator for the file
         */
		$this->validate(request(), [
			'username' => 'required',
        ]);


		$username = strtolower($request->input('username'));

		if(Collaborator::checkValidity($file->id, $username)){
            Collaborator::addCollaborator($file->id, $username);
		}
		else{
			return redirect('dashboard')->with('error', 'Collaborator does not exist or has been added previously!');
		}

		$collaborators = DB::table('collaborators')->where('file_id', $file->id)->get();

		return redirect('dashboard')->with('status', 'Collaborator has been added!');
    }

    public function removeCollaborators(File $file, Request $request)
    {
        /**
         * takes a requested file id and username
         * and removes the user from the files collaborators
         */
        $this->validate(request(), [
			'username' => 'required'
        ]);

        Collaborator::removeCollaborator($file->id, strtolower(request('username')));

		return back()->with('status', 'Collaboration has been removed!');
    }

	public function updateFile(File $file, Request $request)
	{
        /**
         * Executes code for updating a $requested $file
         * updates teh details about the file and then stores the
         * updated file after deleting the old one
         */
		$this->validate(request(), [
			'file-upload' => 'required'
        ]);

        $new_file = request('file-upload');

        if(!File::checkName($new_file, $file->id)) { return back()->with('error', 'The file names do not correspond!'); };
        if(!File::checkType($new_file, $file->type)) { return back()->with('error', 'The file type is incorrect!'); };

        $old_file = File::getFullPath($file);

        if(!File::checkChanged($new_file, $old_file)) { return back()->with('error', 'This file contains no changes.'); };

        File::updateFileVersion($file->id);
        File::updateLastFileUploader($file->id, Auth::user()->username);
        File::updateSize($file->id, filesize($new_file));

        File::deleteServerStoredFile($file->path);
        File::storeUserFile($file->path, $new_file, $file->name.'.'.$file->type);

		return redirect('dashboard')->with('status', 'Your file has been updated!');
	}

	public function updateFileName(File $file, Request $request)
	{
        /**
         * For renaming the server stored as well as
         * database record about the file.
         */
		$this->validate(request(), [
			'new-file-name' => 'required'
		]);
            //Does not rename file repo file but it is possible just move twice
        File::updateDatabaseFileName($file->id, $request->input('new-file-name'));
        File::updateServerFileName($file->path.'/'.$file->name.'.'.$file->type, $file->path, request('new-file-name'), $file->type);

		return redirect('dashboard')->with('status', 'The file name has been updated');
    }

    public function makeFileShared(File $file)
    {
        /**
         * Changes the permission on a file to be accessed
         * by a shared collaborator
         */
        File::setFileShared($file->id, $file->path);
        return redirect('dashboard')->with('status', 'The file has been made public to collaborators');
    }

    public function makeFilePrivate(File $file)
    {
        /**
         * Changes teh permission on a file to not to be accessed
         * by another user
         */
        File::setFilePrivate($file->id, $file->path);
        return redirect('dashboard')->with('status', 'The file is now hidden');
    }

	public function download(File $file)
	{
        /**
         * fetches the specified file and returns the request to the user to download
         * the file to their local drive.
         */
        $name = str_replace('_', ' ', $file->name).'.'.$file->type;
        $requestFile = $file->name.'.'.$file->type;
		return Storage::download($file->path.'/'.$requestFile, $name);
	}
}
